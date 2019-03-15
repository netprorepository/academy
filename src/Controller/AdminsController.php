<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 *
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminsController extends AppController
{

      //function that ensures admin is loggedin
    public function isadmin(){
         //ensure admin is loggedin
        $admin = $this->Admins->find('all')->where(['user_id' => $this->Auth->user('id')])->first();

        if (!$admin) {
            $this->Flash->error('Please login to continue.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        //update last active time
        $admin->last_active_date = date('Y:m:d H:i:s');
        $this->Admins->save($admin);
        return $admin;
        //$this->set('admin', $admin);
    }

    
    //admin dashboard
    public function dashboard(){
        
        
        $this->viewBuilder()->setLayout('backend'); 
    }

    
    
    //admin method for creating training centers
    public function newcenter(){
        //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
         $centers_table = TableRegistry::get('Centers');
          $center = $centers_table->newEntity();
        if ($this->request->is('post')) {
            $center = $centers_table->patchEntity($center, $this->request->getData());
            if ($centers_table->save($center)) {
                $this->Flash->success(__('The center has been saved.'));

                return $this->redirect(['action' => 'viewallcenters']);
            }
            $this->Flash->error(__('The center could not be saved. Please, try again.'));
        }
        $this->set(compact('center'));
         
          $this->viewBuilder()->setLayout('backend'); 
    }

    
    //admin method for editing a training center
     public function editcenter($id = null)
    {
           //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
         $centers_table = TableRegistry::get('Centers');
        $center = $centers_table->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $center = $centers_table->patchEntity($center, $this->request->getData());
            if ($centers_table->save($center)) {
                $this->Flash->success(__('The center has been saved.'));

                return $this->redirect(['action' => 'viewallcenters']);
            }
            $this->Flash->error(__('The center could not be saved. Please, try again.'));
        }
        $this->set(compact('center'));
        $this->viewBuilder()->setLayout('backend'); 
    }
    
    
    //admin method for viewing all training centers
    public function viewallcenters(){
         //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
         $centers_table = TableRegistry::get('Centers');
         $centers = $centers_table->find();

        $this->set(compact('centers'));
        
         $this->viewBuilder()->setLayout('backend');
    }

    
    
    //admin method for viewing all candidates
    public function viewallcandidates(){
         //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
         $candidates_table = TableRegistry::get('Candidates');
         $candidates =  $candidates_table->find()->contain(['Users'])->order(['registeredon'=>'DESC']);
          $this->set(compact('candidates'));
         $this->viewBuilder()->setLayout('backend');
        
    }
    
    
     //admin method for viewing a candidate profile
    public function viewcandidate($id){
         //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
         $candidates_table = TableRegistry::get('Candidates');
          $candidate = $candidates_table->get($id,['contain'=>['Courses','Centers','Users','Transactions']]);
      //  $candidate = $this->Candidates->find()->contain(['Courses','Centers','Users','Transactions'])->where(['user_id' => $this->Auth->user('id')])->first();
        if(!$candidate){
            $this->Flash->error(__('Sorry, no such candidate was found'));

                return $this->redirect(['action' => 'viewallcandidates']); 
        }
        
        $this->set(compact('candidate'));
          $this->viewBuilder()->setLayout('backend');
    }

    
    //admin method for editing a candidate
    public function editcandidate($id=null){
         //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
         $candidates_table = TableRegistry::get('Candidates');
          $candidate = $candidates_table->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $candidates_table->patchEntity($candidate, $this->request->getData());
            if ($candidates_table->save($candidate)) {
                $this->Flash->success(__('The candidate has been updated.'));

                return $this->redirect(['action' => 'viewallcandidates']);
            }
             if($candidate->errors()){
                $error_msg = [];
                foreach( $candidate->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]    =   $error;
                        }
                    }else{
                        $error_msg[]    =   $errors;
                    }
                }

                if(!empty($error_msg)){
                    $this->Flash->error(
                        __("The candidate could not be saved. Please fix the following error(s):".implode("\n \r", $error_msg))
                    );
                }
            }
            //$this->Flash->error(__('The candidate could not be saved. Please, try again.'));
        }
        $centers = $candidates_table->Centers->find('list', ['limit' => 200]);
        $users = $candidates_table->Users->find('list', ['limit' => 200]);
        $courses = $candidates_table->Courses->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'centers', 'users', 'courses'));
        
         $this->viewBuilder()->setLayout('backend');
        
    }

    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
         //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
        $this->paginate = [
            'contain' => ['Users']
        ];
        $admins = $this->paginate($this->Admins);

        $this->set(compact('admins'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function myprofile($id = null)
    {
        $admin = $this->Admins->find()->where(['user_id' => $this->Auth->user('id')])->contain(['Users'])->first();

        $this->set('admin', $admin);
         $this->viewBuilder()->setLayout('backend');
    }
    
    
    //admin method for changing password
    public function changepassword(){
         //ensure admin is loggedin
        $admin = $this->isadmin();
         $this->set('admin', $admin);
         $users_table = TableRegistry::get('Users');
         $user = $users_table->find()->where(['user_id' => $this->Auth->user('id')])->first();
         if ($this->request->is(['patch', 'post', 'put'])) {
          
             $user = $users_table->patchEntity($user, $this->request->getData());
            if ($users_table->save($user)) {
                $this->Flash->success(__('Your Password has been updated successfully.'));

                return $this->redirect(['action' => 'myprofile',$admin->id]);
            }
            $this->Flash->error(__('Sorry, unable to change password. Please, try again.'));
        }
        $this->set(compact('user'));
    
         $this->viewBuilder()->setLayout('backend');
    }

    
    
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newadmin()
    {
         //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
         
        $admin = $this->Admins->newEntity();
         $users_table = TableRegistry::get('Users');
         $user = $users_table->newEntity();
        if ($this->request->is('post')) {
          
              $user  = $users_table->patchEntity($user , $this->request->getData());
              $user->usertype = "Admin";
               if($users_table->save($user)){
            $admin = $this->Admins->patchEntity($admin, $this->request->getData());
             $admin->user_id = $user->id;
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        }
       // $users = $this->Admins->Users->find('list', ['limit' => 200]);
        $this->set(compact('admin', 'users'));
         $this->viewBuilder()->setLayout('backend');
    }
    
    
    //method for deactivating an admin
    public function deactivateadmin($id){
        //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
        $admin = $this->Admins->get($id);
        $admin->status = 'deactivated';
        if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been deactivated.'));

            }
            else{
                $this->Flash->error(__('Unable to deactivate admin. Please try again'));

            }
            
                return $this->redirect(['action' => 'index']);
    }

    
     
    //method for deactivating an admin
    public function activateadmin($id){
        //ensure admin is loggedin
         $this->set('admin', $this->isadmin());
        $admin = $this->Admins->get($id);
        $admin->status = 'active';
        if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been activated.'));

            }
            else{
                $this->Flash->error(__('Unable to deactivate admin. Please try again'));

            }
            
                return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admin = $this->Admins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admin = $this->Admins->patchEntity($admin, $this->request->getData());
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $users = $this->Admins->Users->find('list', ['limit' => 200]);
        $this->set(compact('admin', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admins->get($id);
        if ($this->Admins->delete($admin)) {
            $this->Flash->success(__('The admin has been deleted.'));
        } else {
            $this->Flash->error(__('The admin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
