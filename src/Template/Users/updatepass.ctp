<main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
         
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>Reset Your Password</small>
                </div>
                     
         <?= $this->Form->create('User'); ?>
     <br />
    <fieldset>

<br />
<?= $this->Flash->render() ?>
<?= $this->Form->input('password',['label'=>'NEW PASSWORD :','class'=>'form-control','required',
        'placeholder'=>'Your New Password']) ?>
<br />

<?= $this->Form->input('confirm_password',['label'=>'CONFIRM NEW PASSWORD :','class'=>'form-control','required',
        'type'=>'password','placeholder'=>'Confirm New Password']) ?>
<br />

</fieldset>
      <div class="text-center">
                      <?= $this->Form->button('Reset Password',['class'=>'btn btn-primary my-4']) ?>
                 
                  </div>
                <?= $this->Form->end() ?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </main>


