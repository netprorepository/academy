   <div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(../img/news_background.jpg)"></div>
		</div>
		<div class="home_content">
        <h1 style="font-size: 35px;">Change Password</h1>
		</div>
	</div>
            
            <div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8">
             <div class="leave_comment">
						<div class="leave_comment_title">Change Password
             
            </div>

						<div class="leave_comment_form_container"><?= $this->Flash->render() ?>
						<?= $this->Form->create(null) ?>
                <fieldset>
                   <?= $this->Form->control('username',['label'=>'Username','class'=>'form-control','required',
        'type'=>'email','placeholder'=>'your username']) ?>
         </fieldset>
                <br />
    <?= $this->Form->button('Reset',['class'=>'comment_send_btn trans_200','title'=>'register for this course',
        'id'=>'comment_send_btn']) ?>
    <?= $this->Form->end() ?>
						</div>
                 
					</div>
            	</div>
		</div>
	</div>
</div>

