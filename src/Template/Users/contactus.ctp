   <div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(../img/contact_background.jpg)"></div>
		</div>
		<div class="home_content" style="background: none;">
        <h1 style="font-size: 35px;">Contact Us</h1>
		</div>
	</div>
            
            <div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8">
             <div class="leave_comment">
						<div class="leave_comment_title">Contact Us
             
            </div>
<br />
<b>Head Office : </b>
 <address>No.10, Wilfred Okereke Street,Off Owerri - Port Harcourt Road, Obinze Imo State </address><br />

<b> Branch Office :</b> <br />
No. 25 Umaru Dikko Street, Jabi Abuja Nigeria<br /><br />
 Email : academy@netpro.com.ng <br /> <br />Phone : +234(0)703 3826 004 / +234(0)816 3814 316
						
<div class="leave_comment_form_container"><?= $this->Flash->render() ?>
						<?= $this->Form->create(null) ?>
                   <fieldset>
        
        <?php
         echo $this->Form->control('name', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'your name']);
        
         
          echo $this->Form->control('emailaddress', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'email address','type'=>'email']);
          
          
            echo $this->Form->control('phone', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'phone']);
           
        
            echo $this->Form->control('message', ['label'=>false,'class'=>'input_field contact_form_name form-control',
                             'required','placeholder'=>'your message','type'=>'textarea','rows'=>6,'cols'=>8]);
         
        ?>
    </fieldset>
    <?= $this->Form->button('Send Message',['class'=>'comment_send_btn trans_200','title'=>'register for this course',
        'id'=>'comment_send_btn']) ?>
    <?= $this->Form->end() ?>
						</div>
                 
					</div>
            	</div>
		</div>
	</div>
</div>




