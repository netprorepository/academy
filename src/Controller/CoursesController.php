<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Email\Email;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 *
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
        $courses = $this->Courses->find()->where(['status'=>'live'])
                ->order(['postdate'=>'DESC']);
        $categories = $this->listcategories();

        $this->set(compact('courses','categories'));
        $this->set('title', 'Africa\'s leading Code Academy');
    }

    
    //method that changes the status of a course to either live or offline
    public function changestatus($id, $status){
        $course = $this->Courses->get($id);
        $course->status =  $status;
        $this->Courses->save($course);
        return $this->redirect(['action' => 'viewallcourses']); 
        
    }




    //method that lists the categories
    public function listcategories(){
         $categories_table = TableRegistry::get('Categories');
        $categories = $categories_table->find();
        return $categories;
        //$this->set(compact('categories'));
    }
    
    
    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $course = $this->Courses->get($id, [
          //   'contain' => ['Admins', 'Categories', 'CandidateCourses', 'Courseregistrations', 'Transactions']
        ]);
        if(!$course || $course->status !='live'){
            $this->Flash->error(__('Sorry, the document you are looking for either does not exist or has been removed.'));

                return $this->redirect(['controller'=>'Courses','action' => 'index']); 
            
        }
        //increment the viewcount
        $course->viewcount+=1;
        $this->Courses->save($course);
         $centers_table = TableRegistry::get('Centers');
         $centers = $centers_table->find('list', ['limit' => 200]);
          $categories = $this->listcategories();
          //get the related courses
          $related = $this->Courses->find()
                  ->where(['category_id'=>$course->category_id,'status'=>'live'])
                  ->limit(5);
          //get popular courses
          $popular = $this->Courses->find()->contain(['Categories'])
                   ->where(['status'=>'live'])
                  ->order(['viewcount'=>'DESC'])->limit(5);
        $this->set('title', $course->title);
        $substring = substr($course->description, 0, 90);
        
        $this->set('description', $course->title." - ".strip_tags($substring)." - " .'NetPro Academy');
        $this->set('keywords', str_replace(" ", ", ", $course->title));
        $this->set('related', $related);
        $this->set(compact('categories','popular'));
         $this->set('course', $course);
        $this->set('centers', $centers);
         $this->viewBuilder()->setLayout('otherpages');
    }

    
    
    //user function for searching for courses
    public function search(){
        if ($this->request->is('post')) {
            $search_term = $this->request->getData('search_term');
            if(!empty($search_term)){
            $courses = $this->Courses->find()->where(['title LIKE'=>'%'.$search_term.'%'])
                    ->where(['status'=>'live'])
                    ->orWhere(['description LIKE'=>'%'.$search_term.'%']);
             $this->set(compact('courses'));
            }
            else{//if user did not type a search term
                $courses = $this->Courses->find()->where(['status'=>'live'])->limit(12);
            }
        }
        else{
           $courses = $this->Courses->find()->limit(12);

        $this->set(compact('courses')); 
        }
        $categories = $this->listcategories();
        $this->set('categories', $categories);
         $this->set('title', 'Search Courses');
        
    }
    
    
    //list all the courses
    public function listcourses(){
        $courses = $this->Courses->find()->where(['status'=>'live'])->order(['postdate'=>'DESC']);
        $categories = $this->listcategories();

        $this->set(compact('courses','categories'));
        
         $this->set('title', 'Africa\'s leading Code Academy');
        // $this->viewBuilder()->setLayout('otherpages');
    }







    //serach courses by category
    public function findcourse($category_id = null){
        
          if(!empty($category_id)){
               $categories_table = TableRegistry::get('Categories');
              $category = $categories_table->get($category_id);
            $courses = $this->Courses->find()->where(['category_id'=>$category_id])
                     ->contain(['Categories'])
                    ->where(['status'=>'live'])
                    ->order(['postdate'=>'DESC'])
                    ->limit(12);
             $this->set(compact('courses','category'));
            }
            //$category = 
           //  debug(json_encode($this->request->getData(), JSON_PRETTY_PRINT)); exit;
             $this->set('title', 'Africa\'s leading Code Academy');
        $categories = $this->listcategories();
        $this->set('categories', $categories);
    }





    //course registration method for a loggedin candidate
    public function register(){
         if ($this->request->is('post')) {
          // debug(json_encode($this->request->getData(), JSON_PRETTY_PRINT)); exit;
        $course_id = $this->request->getData('course_id');
         $center_id = $this->request->getData('center_id');
         $amount = $this->request->getData('amount');
         $candidates_table = TableRegistry::get('Candidates');
        
        $candidate = $candidates_table->find()->contain(['Users'])->where(['user_id' => $this->Auth->user('id')])->first();
        if(!$candidate){
            $this->Flash->error(__('Sorry, You have no profile yet. Please update your profile so you can proceed'));

                return $this->redirect(['controller'=>'Candidates','action' => 'updateprofile']); 
        }
        else{
         $course = $this->Courses->get($course_id); 
         //arange for online payment
                $transactioncontroller = new TransactionsController();
              $pay_url =  $transactioncontroller->gotopaystack($candidate->user->username, $candidate->phone,
                      $candidate->firstname, $amount, $course_id, $candidate->id,$center_id);
               // $this->Flash->success(__('The candidate has been saved.'));
               return $this->redirect($pay_url);
        }
         }
         else{
             return $this->redirect(['controller'=>'Candidates','action' => 'courses']);  
         }
         $this->viewBuilder()->setLayout('candidatebackend');
          $this->set('title', 'Africa\'s leading Code Academy');
        
    }

    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newcourse()
    {
           //ensure admin is loggedin
        $admincontroller = new AdminsController();
        $admin = $admincontroller->isadmin();
      $this->set('admin', $admin);
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            //$image =  $this->request->getData('courseimage'); 
              $imagearray = $this->request->getData('courseimage'); 
              if (!empty($imagearray['tmp_name'])) {
                $image_name = $this->addimage($imagearray);
            }
            $course = $this->Courses->patchEntity($course, $this->request->getData());
            $course->admin_id = $admin->id;
            $course->courseimage = $image_name;
            $course->cost = $this->request->getData('weekendclass');
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'viewallcourses']);
            }
             if($course->errors()){
                $error_msg = [];
                foreach( $course->errors() as $errors){
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
                        __("The course could not be saved. Please fix the following error(s):".implode("\n \r", $error_msg))
                    );
                }
            }
           // $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $categories = $this->Courses->Categories->find('list', ['limit' => 200]);
      //  $admins = $this->Courses->Admins->find('list', ['limit' => 200]);
        $this->set(compact('course', 'admins','categories'));
        $this->viewBuilder()->setLayout('backend'); 
    }

    
    
      //function for adding image to a course
    public function addimage($imagearray) {

        $extension = array("jpeg", "jpg", "png", "gif");
        if (empty($imagearray['tmp_name'])) {
            return;
        }
        //$message = " ";
        $size = \getimagesize($imagearray['tmp_name']);
        // $mimetype = stripslashes($size['mime']); 
        if ((empty($size) || ($size[0] === 0) || ($size[1] === 0))) {
            throw new \Exception('This is unacceptable!. image must be of type : gif, jpeg, png or jpg and less than 2mb.');
        }
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
//     //$filename = "company_staff_ids/".$staff_id;
        $file_type = $finfo->file(h($imagearray['tmp_name']), FILEINFO_MIME_TYPE);
//    
//    echo $file_type; exit;
        if (!(($file_type == "image/gif") || ($file_type == "image/png") || ($file_type == "image/jpeg") ||
                ($file_type == "image/pjpeg") || ($file_type == "image/x-png"))) {
            throw new \Exception('This is unacceptable!. image must be of type : gif, jpeg, png or jpg and less than 2mb .');
        }

        $file_name = $imagearray['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, $extension)) {
            $file_name = md5(uniqid($imagearray['name'], true)) . time();

            if (!file_exists("img/" . $file_name . '.' . $ext)) {
                $file_name = $file_name . '.' . $ext;
                move_uploaded_file($imagearray["tmp_name"], "img/" . $file_name);
                // $image_type = $data["type"];
                // $image_size = $data["size"];
                chmod("img/" . $file_name, 0644);
                return $message = $file_name;
            } else {
                $filename = basename($file_name, $ext);
                $newFileName = crypt($filename . time()) . "." . $ext;
                move_uploaded_file($imagearray["tmp_name"], "img/" . $newFileName);
                chmod("img/" . $newFileName, 0644);
                return $message = $file_name;
            }
        } else {
            return $message = 'Unable to upload image, please ensure you are uploading a jpg,png,gif or Jpeg file. ';
            // debug(json_encode( $error, JSON_PRETTY_PRINT)); exit;
        }


        return $message = "images upload successful";
    }
    
    
    
    //admin method for viewing all courses
    public function viewallcourses(){
         //ensure admin is loggedin
        $admincontroller = new AdminsController();
        $admin = $admincontroller->isadmin();
      $this->set('admin', $admin);
         $courses = $this->Courses->find()->contain(['Admins']);
         $this->paginate($courses);
        $this->set(compact('courses'));
         $this->viewBuilder()->setLayout('backend');
    }

    

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editcourse($id = null)
    {
          //ensure admin is loggedin
        $admincontroller = new AdminsController();
        $admin = $admincontroller->isadmin();
      $this->set('admin', $admin);
        $course = $this->Courses->get($id, [ 'contain' => [] ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
              //$image =  $this->request->getData('courseimage'); 
              $imagearray = $this->request->getData('courseimage'); 
              if (!empty($imagearray['tmp_name'])) {
                $image_name = $this->addimage($imagearray);
                $course->courseimage = $image_name;
            }
            $course = $this->Courses->patchEntity($course, $this->request->getData());
              
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been updated.'));

                return $this->redirect(['action' => 'viewallcourses']);
            }
              if($course->errors()){
                $error_msg = [];
                foreach( $course->errors() as $errors){
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
                        __("The course could not be saved. Please fix the following error(s):".implode("\n \r", $error_msg))
                    );
                }
            }
            //$this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
       // $admins = $this->Courses->Admins->find('list', ['limit' => 200]);
        $categories = $this->Courses->Categories->find('list', ['limit' => 200]);
        $this->set(compact('course', 'admins','categories'));
        $this->viewBuilder()->setLayout('backend');
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
       // allow unrestricted pages
     public function beforeFilter(Event $event)
        {
              $this->Auth->allow(['index','view','search','findcourse','listcourses']);
              $this->Security->setConfig('unlockedActions', ['newcourse','editcourse']);
        }
}
