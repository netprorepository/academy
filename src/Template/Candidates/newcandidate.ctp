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
          <div class="col-lg-8">
            <div class="card bg-secondary shadow border-0">
         
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>New Candidate Registration</small>
                </div>
    <?= $this->Form->create($candidate) ?>
    <fieldset>
       
        <?php
         echo $this->Form->control('username', ['label'=>'USERNAME :','class'=>'form-control',
                             'required','placeholder'=>'username']);
         
          echo $this->Form->control('password', ['label'=>'PASSWORD :','class'=>'form-control',
                             'required','placeholder'=>'password','type'=>'password']);
          
            echo $this->Form->control('remember_pass', ['label'=>'PASSWORD :','class'=>'form-control',
                             'required','placeholder'=>'password','type'=>'password']);
        
            echo $this->Form->control('surname', ['label'=>'SURNAME :','class'=>'form-control',
                             'required','placeholder'=>'surname']);
            echo $this->Form->control('firstname', ['label'=>'FIRST NAME :','class'=>'form-control',
                             'required','placeholder'=>'first name']);
            echo $this->Form->control('address', ['label'=>'ADDRESS :','class'=>'form-control',
                             'required','placeholder'=>'address']);
            echo $this->Form->control('center_id', ['label'=>'SELECT YOUR CENTER :','options' => $centers,'class'=>'form-control','required']);
           // echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('course_id', ['label'=>'SELECT COURSE :','options' => $courses,'class'=>'form-control','required']);
            echo $this->Form->control('phone',['label'=>'PHONE :','class'=>'form-control',
                             'required','placeholder'=>'phone']);
           
        ?>
    </fieldset>
    <?= $this->Form->button('Register',['class'=>'btn btn-primary my-4']) ?>
    <?= $this->Form->end() ?>
 </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </main>

