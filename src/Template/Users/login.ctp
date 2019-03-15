   <div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(../img/news_background.jpg)"></div>
		</div>
		<div class="home_content">
        <h1 style="font-size: 35px;">User Login</h1>
		</div>
	</div>
            
            <div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8">
             <div class="leave_comment">
						<div class="leave_comment_title">Login
             
            </div>

						<div class="leave_comment_form_container"><?= $this->Flash->render() ?>
						<?= $this->Form->create(null) ?>
                   <?php
         echo $this->Form->control('username', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'username(email address)','type'=>'email']);
        
         
          echo $this->Form->control('password', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'password','type'=>'password']);
          
          
        ?>
         </fieldset>
    <?= $this->Form->button('Login',['class'=>'comment_send_btn trans_200','title'=>'register for this course',
        'id'=>'comment_send_btn']) ?>
    <?= $this->Form->end() ?>
						</div>
                 <?= $this->Html->link(__('Forgot Your Password?'), ['controller' => 'Users', 'action' => 'resetpassword'],
                      ['title'=>'forgot password']) ?>
					</div>
            	</div>
		</div>
	</div>
</div>
