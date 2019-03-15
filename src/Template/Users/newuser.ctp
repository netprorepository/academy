
   <div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(../img/news_background.jpg)"></div>
		</div>
		<div class="home_content">
        <h1 style="font-size: 35px;">User Sign Up</h1>
		</div>
	</div>
            
            <div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8">
             <div class="leave_comment">
						<div class="leave_comment_title">Sign up
             
            </div>

						<div class="leave_comment_form_container"><?= $this->Flash->render() ?>
						<?= $this->Form->create($user) ?>
                   <?php
         echo $this->Form->control('username', ['label'=>'USERNAME','class'=>'input_field contact_form_name',
                             'required','placeholder'=>'username(email address)','type'=>'email']);
        
         
          echo $this->Form->control('password', ['label'=>'PASSWORD','class'=>'input_field contact_form_name',
                             'required','placeholder'=>'password','type'=>'password']);
          
          echo $this->Form->control('remember_pass', ['label'=>'CONFIRM PASSWORD :','class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Confirm Password','type'=>'Password']);
          
          
        ?>
         </fieldset>
    <?= $this->Form->button('Sign Up',['class'=>'comment_send_btn trans_200','title'=>'register',
        'id'=>'comment_send_btn']) ?>
    <?= $this->Form->end() ?>
						</div>
					</div>
            	</div>
		</div>
	</div>
</div>
