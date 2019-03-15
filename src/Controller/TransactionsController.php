<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 *
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
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
       // $admin = $adminController->isadmin();
        $this->set('admin', $adminController->isadmin());
        $this->paginate = [
            'contain' => ['Candidates','Courses','Centers']
        ];
        $transactions = $this->paginate($this->Transactions);

        $this->set(compact('transactions'));
        $this->viewBuilder()->setLayout('backend');
    }

    
    
     
    
      public function initializetransaction($mail,$name,$cost,$event_id,$phone,$attendee_id)
    {
       // debug(json_encode($request, JSON_PRETTY_PRINT)); exit;
       $transaction = $this->Transactions->newEntity();
       $transaction->event_id = $event_id;
			$transaction->tnxref = 'initialized';
		  $transaction->respcode = 'initialized';
			$transaction->amount = $cost;
			$transaction->payref = uniqid('barefoot');
			$transaction->status = 'awaiting';
			$transaction->attendee_id = $attendee_id;
			$transaction->payername = $name;
		  $transaction->payeremail  = $mail;
			$transaction->payerphone = $phone;
			$this->Transactions->save($transaction);
      return $transaction ;
     // $this->gotopaystack($mail, $phone, $name, $ref = $transaction->payref, $cost, $transaction->id);
    }

    
    //go to paystack for payment
    public function gotopaystack($mail, $phone, $name, $amount, $course_id,$candidate_id,$center_id) {
        //initialize the transaction before going to paystack
     
      $transaction = $this->Transactions->newEntity();
       $transaction->course_id = $course_id;
			$transaction->tnxref = 'initialized';
		  $transaction->response = 'initialized';
			$transaction->amount = $amount;
			$transaction->payref = uniqid('NetProacademy');
			$transaction->paystatus = 'awaiting';
      $transaction->center_id = $center_id;
			$transaction->candidate_id = $candidate_id;
		   // debug(json_encode($transaction, JSON_PRETTY_PRINT)); exit;
			$this->Transactions->save($transaction);

        $baseurl = "http://www.netproacademy.net/";
        
        $subacc = 'ACCT_qyal8r4kg6pc6jc'; // sub-account code, you get this when you set up a split account.
        $cancel_url = $baseurl . 'cancel/' . $transaction->payref . '/';
        //arrange and go to paystack

        /*         * *********************************** */
        /* initialize transaction */
        /*         * ********************************** */
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([ 
                'callback_url' => 'http://www.netproacademy.net/transactions/paymentverification/'.$transaction->payref,
                'amount' => $amount . '00',
                'email' => $mail,
                'name' => $name,
               // 'subaccount'=> $subacc,
				        'phone' => $phone,
               // 'last_name' => $lname,
                'reference' => $transaction->payref,
                'metadata' => json_encode([
                    'cancel_action' => $cancel_url,
                    'name' => $name,
                   // 'fname' => $fname,
                    'email' => $mail,
                    'phone' => $phone,
                   'transaction_id' => $transaction->id,
                    'candidate_id' => $candidate_id,
                    'course_id' => $course_id,
                    'center_id' => $center_id,
                ]),
            ]),
            CURLOPT_HTTPHEADER => [
                "authorization: Bearer sk_test_64a330a5cc8a08c43af1d3673961f083b96ed623",
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        // debug(json_encode( $response, JSON_PRETTY_PRINT));exit;

        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response);

        if (!$tranx->status) {
            // there was an error from the API
            die('API returned error: ' . $tranx->message);
        }

        // store transaction reference so we can query in case user never comes back
        // perhaps due to network issue
        //save_last_transaction_reference($tranx->data->reference);
       // $transaction = $this->Transactions->get($trans_id);
        //$transaction->tnxref = $tranx->data->reference;
        //$this->Transactions->save($transaction);
        // redirect to page so User can pay
        
       // debug($tranx); exit; 
       // return $this->redirect($tranx->data->authorization_url);
        return $tranx->data->authorization_url;
        //return $this->redirect($tranx->data->authorization_url);
       // header('Location: ' . $tranx->data->authorization_url);
    }

    
    //got to remita for rrr
    public function gotoremita($mail, $phone, $name, $amount, $transaction){
           //initialize the transaction before going to paystack
         $merchantID = '150932864353';
         $serviceTypeId = '0988675';
         $apiKey = "bXJ2aW5jZW50b3RpQGdtYWlsLmNvbXw0MTQ5MjYwOHw3NjhhZGNiZGJkMzM3MDY3OTE3NDU4YmE3YjZhYWFkM2RhYjg0MTJmZjQyYWRjZGVjOTEwNzgyNzg3YTU2MzZlYjdiN2UxYjY4ZGEyMmMwM2RkM2U1OTBjMDEyMDIwMjRiYzcyZDRiZWNhYmE1ZWRiNDMwODI3M2ZiYzFlYTNhMg==";
 
        /*         * *********************************** */
        /* initialize transaction */
        /*         * ********************************** */
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([ 
                'callback_url' => 'http://localhost/netproacademy/transactions/paymentverification/',
                'amount' => $amount,
                'payerEmail' => $mail,
                'payerName' => $name, 
                'serviceTypeId'=> "4430731",
				        'payerPhone' => $phone,
                'orderId' => $transaction,
                'description' => 'Fee payment',
                
            ]),
            CURLOPT_HTTPHEADER => [
                'Authorization : remitaConsumerKey' =>$merchantID,
                'remitaConsumerToken' => hash('sha512', $merchantID . $serviceTypeId.$transaction.$amount.$apiKey)
                
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        // debug(json_encode( $response, JSON_PRETTY_PRINT));exit;

        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response);

//        if (!$tranx->status) {
//            // there was an error from the API
//            die('API returned error: ' . $tranx->message);
//        }
        debug(json_encode( $tranx, JSON_PRETTY_PRINT));exit;
        return $tranx->data->authorization_url;
      
    }


    
    //test method for remita
    public function testremita(){
        $merchantID = '150932864353';
         $serviceTypeId = '0988675';
         $apiKey = "bXJ2aW5jZW50b3RpQGdtYWlsLmNvbXw0MTQ5MjYwOHw3NjhhZGNiZGJkMzM3MDY3OTE3NDU4YmE3YjZhYWFkM2RhYjg0MTJmZjQyYWRjZGVjOTEwNzgyNzg3YTU2MzZlYjdiN2UxYjY4ZGEyMmMwM2RkM2U1OTBjMDEyMDIwMjRiYzcyZDRiZWNhYmE1ZWRiNDMwODI3M2ZiYzFlYTNhMg==";
 
        //create array of data to be posted
$post_data['payerName'] = 'simdi kamso';
$post_data['amount'] = 56789;
$transaction = 669;
$amount = 57575657;

$post_data['payerEmail'] = 'mail@mail.com';
$post_data['payerPhone'] = 565746836392;

$post_data['serviceTypeId'] = 4430731;
$post_data['orderId'] = 889876;
$post_data['description'] = 'Fee payment';


//traverse array and prepare data for posting (key1=value1)
foreach ( $post_data as $key => $value) {
    $post_items[] = $key . '=' . $value;
}

//create the final string to be posted using implode()
$post_string = implode ('&', $post_items);

//create cURL connection
$curl_connection = 
  curl_init('https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit');

//set options
$headers = array('Authorization: remitaConsumerKey' =>$merchantID, 'remitaConsumerToken' => hash('sha512', $merchantID . $serviceTypeId.$transaction.$amount.$apiKey));
curl_setopt($curl_connection, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
//curl_setopt($curl_connection, CURLOPT_USERAGENT, 
 // "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

//set data to be posted
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);

//perform our request
$result = curl_exec($curl_connection);

$httpCode = curl_getinfo($curl_connection, CURLINFO_HTTP_CODE);

if ( $httpCode != 200 ){
    echo "Return code is {$httpCode} \n"
        .curl_error($curl_connection);
} else {
    echo "<pre>".htmlspecialchars($result)."</pre>";
}
// debug(json_encode( $result, JSON_PRETTY_PRINT));exit;
//show information regarding the request
//print_r(curl_getinfo($curl_connection));
echo curl_errno($curl_connection) . '-' . 
                curl_error($curl_connection);

//close the connection
curl_close($curl_connection);
    }



//verify payment and assign value
    public function paymentverification($ref) {
        // echo $ref; exit;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer sk_test_64a330a5cc8a08c43af1d3673961f083b96ed623",
                "cache-control: no-cache"
            ],
        ));

        //sk_test_7d5d515418c31cf203abbe3f753b1487b7d2a5e2

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response);
        // debug( $tranx);
        if (!$tranx->status) {
            // there was an error from the API
            die('API returned error: ' . $tranx->message);
        }

        // debug($tranx); exit;
        $trans_id = $tranx->data->metadata->transaction_id;
        //update transaction record
        $transaction = $this->Transactions->get($trans_id);
        $transaction->status = $tranx->status;
        $transaction->amount = $tranx->data->amount / 100;
        $transaction->paystatus = 'completed';
        $transaction->response = $tranx->data->status;
        $this->Transactions->save($transaction);
        //create an entry in the course registration
         $courseregistrations_table = TableRegistry::get('Courseregistrations');
           $courseregistration = $courseregistrations_table->newEntity();
           $courseregistration->course_id = $tranx->data->metadata->course_id;
         $courseregistration->center_id = $tranx->data->metadata->center_id;
          $courseregistration->candidate_id = $tranx->data->metadata->candidate_id;
         $courseregistrations_table->save($courseregistration);
        
        $this->courseregistrationconfirmationmail($transaction->course_id,$transaction->candidate_id,$transaction->amount);
        //return the course details
        $courses_table = TableRegistry::get('Courses');
        $course = $courses_table->get($transaction->course_id);
        $this->Flash->success('Your Course Registeration and Payment for '.$course->title. ' Was Successful. Please check your email for further details');
        // debug($tranx); exit;
         $this->set('course', $course);
        $this->set('transaction', $transaction);
         $this->viewBuilder()->setLayout('plain');
    }
    
    
    
    
     //methodthat sends a mail to the student confirming his payment for the transcript
    public function courseregistrationconfirmationmail($course_id,$candidate_id,$amount) {
        // $students_table = TableRegistry::get('Students');
        $courses_table = TableRegistry::get('Courses');
         $candidates_table = TableRegistry::get('Candidates');
         $course = $courses_table->get($course_id);
         $candidate = $candidates_table->get($candidate_id,['contain'=>['Users']]);
        // debug(json_encode($request , JSON_PRETTY_PRINT)); exit;
        
        $message = " Hello " . $candidate->surname .' '.$candidate->firstname. ',<br />Congratulations on your successful registration for ' 
                .$course->title .' training class.<br /><br /> Please find details below : <br />';
        
            $message .= '<br />Course : ' . $course->title;
           // $message .= '<br /> Duration : ' . $course->duration;
            $message .= '<br /> Start Date : ' . $course->start_date;
            $message .= '<br /> End Date : ' . $course->end_date;
            $message .= '<br /> Cost : ₦' . number_format($amount);
            $message .= '<br /><br /> Further instructions would be sent to you via your email and phone number';
          //  $message .= '<br /> Cost(Immersive Class) : ₦' . number_format($course->immersiveclass);
            $message .= '<br /><br />'
                    . 'Kind Regards,<br />'
                    . 'NetPro Academy. <br />';

        
       // $statusmsg = "";
        $email = new Email('default');
        $email->setFrom(['no-reply@netproacademy.com' => 'NetPro Int\'l Ltd']);
        $email->setTo($candidate->user->username);
        $email->setBcc(['chukwudi@netpro.com.ng','academy@netpro.com.ng']);
        $email->setEmailFormat('html');
        $email->setSubject('Course Registration @ NetPro Academy');
        if ($email->send($message)) {
            $this->Flash->success('Congratulations on your successful registration. An email has been sent to you (' . $candidate->user->username . ') with your registration details.'
                    . ' Please print and come along with this email on the resumption date that will be communicated to you shortly.');
        } else {
            $this->Flash->error('Oh!, sorry, We are unable to send mail.');
        }
        return;
    }

    
    
    
    
    
    
    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Candidates']
        ]);

        $this->set('transaction', $transaction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transaction = $this->Transactions->newEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $candidates = $this->Transactions->Candidates->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'candidates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $candidates = $this->Transactions->Candidates->find('list', ['limit' => 200]);
        $this->set(compact('transaction', 'candidates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    
      // allow unrestricted pages
     public function beforeFilter(Event $event)
        {
              $this->Auth->allow(['paymentverification','courseregistrationconfirmationmail']);
        }
}
