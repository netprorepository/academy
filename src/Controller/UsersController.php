<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
          //ensure admin is loggedin
        $adminController = new AdminsController();
        $admin = $adminController->isadmin();
         $this->set('admin', $admin);
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Admins', 'Candidates']
        ]);

        $this->set('user', $user);
    }

     
      public function login(){
        
         if ($this->request->is('post')) {
           //logs you in as a user
             $user = $this->Auth->identify();
       if(!$user){ 
       $this->Flash->error('Invalid  login codes, Please try again.');
        return $this->redirect(['controller'=>'Users','action' => 'login']); 
     }
      else{//sets you in session
           $this->Auth->setUser($user);
           
           if($user['usertype']=='Admin'){
               return $this->redirect(['controller'=>'Admins','action' => 'dashboard']);
           }
           else{
               //set variable to be used in the view(otherpages)
               $this->request->getSession()->write('userdata',$user);
                $this->set('user', $user);
          return $this->redirect(['controller'=>'Candidates','action' => 'dashboard']); 
           }
      }
             
         }
          //sets the page title
   $this->set('title', "User login");
    $this->viewBuilder()->setLayout('plain'); 
    }
    
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newuser()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your user account has been saved. Please login and update your profile'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Your user account could not be saved. Please, try again.'));
           // return $this->redirect(['action' => 'newuser']);
        }
        $this->set(compact('user'));
         $this->set('title', 'Africa\'s leading Code Academy');
        $this->viewBuilder()->setLayout('plain'); 
    }

    
    //candidate method for changing their password
    public function changepassword(){
       $user = $this->Users->find()->where(['id' => $this->Auth->user('id')])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
           $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your Password Has Been Updated.'));

                return $this->redirect(['controller'=>'Candidates','action' => 'viewprofile']);
            }
            $this->Flash->error(__('Sorry, unable to update password. Please, try again.'));
            
        }
       
         $this->set(compact('user'));
         $this->set('title', 'Africa\'s leading Code Academy');
        $this->viewBuilder()->setLayout('candidatebackend'); 
        
    }
    
    
    //method for reseting password
    public function resetpassword(){
         if ($this->request->is(['patch', 'post', 'put'])) {
             $username = $this->request->getData('username');
              $user = $this->Users->find()->where(['username' => $username])->first();
              if($user){
                  $key = md5($username.time());
                  $user->verificationkey = $key;
                  $this->Users->save($user);
                  //call a function that will send him a link from where to reset the password
                  $this->changepasswordmail($username,$key);
                  $this->Flash->success(__('A limk has been sent to your mail, please check your inbox and click on the link'
                          . 'to change your password'));
              }
              $this->Flash->error(__('Sorry, user not found. Please check your username and try again'));
         }
         $this->set('title', 'Africa\'s leading Code Academy');
        $this->viewBuilder()->setLayout('plain'); 
    }

    
    
    
    //method that does the password reset
    public function updatepass($key){
        $user = $this->Users->find()->where(['verificationkey' => $key])->first();
         if ($this->request->is('post')) {
        if($user){
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your Password Has Been Updated.'));

                return $this->redirect(['controller'=>'Users','action' => 'login']);
            }
            $this->Flash->error(__('Sorry, unable to update password. Please, try again.'));
            return $this->redirect(['controller'=>'Users','action' => 'login']);
            
        }
        else{
            $this->Flash->success(__('Invalid Data.'));

                return $this->redirect(['controller'=>'Users','action' => 'login']);
        }
         }
         $this->set(compact('user'));
         $this->set('title', 'Africa\'s leading Code Academy');
        $this->viewBuilder()->setLayout('candidatebackend');  
        }
        
    






    //method that sends a link to the user for password reset
    public function changepasswordmail($username,$key){
        
          $email = new Email('default');
        $message = "Hello,  please click on the below link to reset your password";
        $message .= "www.netproacademy.com.ng/users/updatepass/<?=$key ?>";
        $message .= "<br /><p>Regards,<br /> NetPro Academy</p>";
        $email->from(['contact@netpro.com.ng'  =>'NetPro Academy']);
        
        $email->to($username);
       // $email->addBcc($destination);
        $email->addHeaders(['Content-type: text/html; charset=iso 8859-1', 'MIME-Version: 1.0' . '\r\n']);
        //$email->addHeaders("Content-type: text/html; charset=iso 8859-1");
        $email->emailFormat('html');
        $email->subject('Password Reset');
        $email->send($message);
        return;
    }

    



    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    //the about us Page
    public function aboutus(){
        
        
        
         $this->set('title', 'About Us');
        
         $this->viewBuilder()->setLayout('plain'); 
    }






    //user method for contacting us
    public function contactus(){
         if ($this->request->is('post')) {
              //  debug(json_encode($this->request->getData(), JSON_PRETTY_PRINT)); exit;
        $email = new Email('default');
        $name = $this->request->getData('name');
        $email_address = $this->request->getData('emailaddress');
        $message = "Hello admin, we just got a message from ". $name.'( '.$email_address.' )<br />';
        $message .= $this->request->getData('message');
        
        $message .= "<br /><p>Regards,<br /> NetPro Academy</p>";
        $email->setFrom(['no-reply@netproacademy.net' => 'NetPro Academy']);
         $email->setTo('academy@netpro.com.ng');
        $email->addBcc('chukwudi@netpro.com.ng');
       // $email->addBcc($destination);
        $email->addHeaders(['Content-type: text/html; charset=iso 8859-1', 'MIME-Version: 1.0' . '\r\n']);
        //$email->addHeaders("Content-type: text/html; charset=iso 8859-1");
        $email->setEmailFormat('html');
        $email->setSubject('Contact @ NetPro Academy');
        if($email->send($message)){
             $this->Flash->success(__('Mail has been sent to admin, we will get back to you in a jiffy.'));
        }
        else{
            $this->Flash->error(__('Soryy, unable to send mail. Please try again'));
        }
        return $this->redirect(['action' => 'contactus']);
             
         }
         $this->set('title', 'Contact Us');
          $this->viewBuilder()->setLayout('plain'); 
        
    }






    //the log out method
   public function logout()
{
      $this->request->getSession()->destroy();
        return $this->redirect($this->Auth->logout());
        
}

   // allow unrestricted pages
     public function beforeFilter(Event $event)
        {
              $this->Auth->allow(['newuser','contactus','resetpassword','aboutus']);
        }
        
}
