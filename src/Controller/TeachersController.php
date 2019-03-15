<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Teachers Controller
 *
 * @property \App\Model\Table\TeachersTable $Teachers
 *
 * @method \App\Model\Entity\Teacher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeachersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
         //ensure admin is loggedin
        $admincontroller = new AdminsController();
        $admin = $admincontroller->isadmin();
      $this->set('admin', $admin);
        $this->paginate = [
            'contain' => ['Users']
        ];
        $teachers = $this->paginate($this->Teachers);

        $this->set(compact('teachers'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('teacher', $teacher);
    }

    
    
    //shows our teachers
    public function ourteachers(){
         $this->paginate = [
           // 'contain' => ['Users']
        ];
        $teachers = $this->paginate($this->Teachers);

        $this->set(compact('teachers'));
         $this->viewBuilder()->setLayout('otherpages');
        
    }

    



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newteacher()
    {
           //ensure admin is loggedin
        $admincontroller = new AdminsController();
        $admin = $admincontroller->isadmin();
      $this->set('admin', $admin);
        $teacher = $this->Teachers->newEntity();
        if ($this->request->is('post')) {
            //upload teacher passport
            $image_name = "";
             $imagearray = $this->request->getData('passport'); 
              if (!empty($imagearray['tmp_name'])) {
                  $course_contriller = new CoursesController();
                $image_name = $course_contriller->addimage($imagearray);
            }
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
            $teacher->passport = $image_name;
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
        }
        $users = $this->Teachers->Users->find('list', ['limit' => 200]);
        $this->set(compact('teacher', 'users'));
         $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editteacher($id = null)
    {
         //ensure admin is loggedin
        $admincontroller = new AdminsController();
        $admin = $admincontroller->isadmin();
      $this->set('admin', $admin);
        $teacher = $this->Teachers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
               //upload teacher passport
            $image_name = "";
             $imagearray = $this->request->getData('passport'); 
              if (!empty($imagearray['tmp_name'])) {
                  $course_contriller = new CoursesController();
                $image_name = $course_contriller->addimage($imagearray);
            }
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
             $teacher->passport = $image_name;
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
        }
        $users = $this->Teachers->Users->find('list', ['limit' => 200]);
        $this->set(compact('teacher', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teacher = $this->Teachers->get($id);
        if ($this->Teachers->delete($teacher)) {
            $this->Flash->success(__('The teacher has been deleted.'));
        } else {
            $this->Flash->error(__('The teacher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
        // allow unrestricted pages
     public function beforeFilter(Event $event)
        {
              $this->Auth->allow(['ourteachers']);
              $this->Security->setConfig('unlockedActions', ['newcourse','editcourse']);
        }
}
