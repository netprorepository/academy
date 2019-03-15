<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Candidates Controller
 *
 * @property \App\Model\Table\CandidatesTable $Candidates
 *
 * @method \App\Model\Entity\Candidate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CandidatesController extends AppController
{

    
    //candidates dashboard
    public function dashboard(){
        
        $this->viewBuilder()->setLayout('candidatebackend'); 
    }

    
 //candidates method for viewing all courses
    public function courses(){
         $courses_table = TableRegistry::get('Courses');
        // $center_tables = TableRegistry::get('Courses');
         $courses = $courses_table->find()
                 ->where(['status'=>'live'])->order(['id'=>'DESC']);
         $this->paginate($courses);
        $centers = $this->Candidates->Centers->find('list', ['limit' => 200]);
        $this->set(compact('courses','centers'));
         $this->viewBuilder()->setLayout('candidatebackend');
    }


    
    //candidates method for viewing their profile
    public function viewprofile(){
        $check_profile = $this->Candidates->find()->where(['user_id' => $this->Auth->user('id')]);
        if(empty($check_profile->toArray())){
          $this->Flash->error(__('Sorry, You have no profile yet. Please update your profile'));

                return $this->redirect(['action' => 'updateprofile']);   
        }
        $candidate = $this->Candidates->find()->contain(['Users','Transactions.Courses','Transactions.Centers'])
                ->where(['user_id' => $this->Auth->user('id')])->first();
        if(!$candidate){
            $this->Flash->error(__('Sorry, You have no profile yet. Please sign up and pay for a course so you can create a profile'));

                return $this->redirect(['action' => 'courses']); 
        }
        
         // debug(json_encode($candidate, JSON_PRETTY_PRINT)); exit;
        $this->set(compact('candidate'));
          $this->viewBuilder()->setLayout('candidatebackend');
    }

    
    
    
    //candidate method for contacting us via email
    public function contactus(){
        
           if ($this->request->is('post')) {
               $title = $this->request->getData('title');
               $message = $this->request->getData('message');
        $email = new Email('default');
        $email->setFrom(['no-reply@netproacademy.net' => 'NetPro Int\'l Ltd']);
        $email->setTo('contact@netproacademy.net');
        $email->setBcc(['chukwudi@netpro.com.ng']);
        $email->setEmailFormat('html');
        $email->setSubject($title);
        if ($email->send($message)) {
            $this->Flash->success('An email has been sent to the admin, hopefully, they would get back to you soon');
        } else {
            $this->Flash->error('Oh!, sorry, We are unable to send mail.');
        }
               
           }
        
         $this->viewBuilder()->setLayout('candidatebackend');
    }

    




    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Centers', 'Users', 'Courses']
        ];
        $candidates = $this->paginate($this->Candidates);

        $this->set(compact('candidates'));
    }

    /**
     * View method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidate = $this->Candidates->get($id, ['contain' => ['Users','Transactions.Courses','Transactions.Centers'] ]);

       // $candidate = $this->Candidates->find()->contain(['Users','Transactions.Courses','Transactions.Centers'])->where(['user_id' => $this->Auth->user('id')])->first();
       
        
         // debug(json_encode($candidate, JSON_PRETTY_PRINT)); exit;
        $this->set(compact('candidate'));
          $this->viewBuilder()->setLayout('backend');
        
    }

    
    
    //user method for completing their profile
    public function updateprofile(){
         $candidate = $this->Candidates->newEntity();
        if ($this->request->is('post')) {
           
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData());
            $candidate->user_id = $this->Auth->user('id');
            if ($this->Candidates->save($candidate)) {
               $this->Flash->success(__('Your details have be saved.'));
                return $this->redirect(['controller'=>'Candidates','action' => 'courses']);
            }
            else{//if unable to save candidate
            $this->Flash->error(__('Unable to save details. Please, try again.'));
            return $this->redirect(['action' => 'updateprofile']); 
            }
             
        }
        
        $this->set(compact('candidate'));
       $this->viewBuilder()->setLayout('candidatebackend');
    }

    



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newcandidate()
    {
        $candidate = $this->Candidates->newEntity();
        if ($this->request->is('post')) {
            $course_id = $this->request->getData('course_id');
            $center_id = $this->request->getData('center_id');
             $users_table = TableRegistry::get('Users');
              $user = $users_table->newEntity();
              $user  = $users_table->patchEntity($user , $this->request->getData());
              //ensure user data was saved first before proceeding
             if($users_table->save($user)){
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData());
            $candidate->user_id = $user->id;
            if ($this->Candidates->save($candidate)) {
                //arange for online payment
                $transactioncontroller = new TransactionsController();
              // $response =  $transactioncontroller->testremita($this->request->getData('username'), $this->request->getData('phone'), $this->request->getData('fname'),
               //        $this->request->getData('amount'), 12);
              // debug(json_encode( $response, JSON_PRETTY_PRINT));exit;
              $pay_url =  $transactioncontroller->gotopaystack($this->request->getData('username'), $this->request->getData('phone'), 
                      $this->request->getData('fname'), $this->request->getData('amount'), $candidate->course_id, $candidate->id,$center_id);
               // $this->Flash->success(__('The candidate has been saved.'));
               return $this->redirect($pay_url);
               // return $this->redirect(['controller'=>'Courses','action' => 'index']);
            }
            else{//if unable to save candidate
            $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            return $this->redirect(['controller'=>'Courses','action' => 'view', $course_id]); 
            }
             }
             else{//if unable to save user
               $this->Flash->error(__('Sorry, unable to signup. Please, try again.'));  
                 return $this->redirect(['controller'=>'Courses','action' => 'view', $course_id]); 
             }
        }
        $centers = $this->Candidates->Centers->find('list', ['limit' => 200]);
       // $users = $this->Candidates->Users->find('list', ['limit' => 200]);
        $courses = $this->Candidates->Courses->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'centers', 'users', 'courses'));
        $this->viewBuilder()->setLayout('otherpages');
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData());
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
        }
        $centers = $this->Candidates->Centers->find('list', ['limit' => 200]);
        $users = $this->Candidates->Users->find('list', ['limit' => 200]);
        $courses = $this->Candidates->Courses->find('list', ['limit' => 200]);
        $this->set(compact('candidate', 'centers', 'users', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidate = $this->Candidates->get($id);
        if ($this->Candidates->delete($candidate)) {
            $this->Flash->success(__('The candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
     // allow unrestricted pages
     public function beforeFilter(Event $event)
        {
              $this->Auth->allow(['newcandidate']);
        }
}
