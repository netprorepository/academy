<!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">New Admin</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Add New Admin
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="p-20">
    <?= $this->Form->create($admin) ?>
    <fieldset>
       
        <?php
         echo '<div class="col-md-6">';
            echo $this->Form->control('fname',['label'=>'First Name','class'=>'form-control',
                'placeholder'=>'first name']);
              echo '</div>';
              echo '<div class="col-md-6">';
            echo $this->Form->control('lname',['label'=>'Last Name','class'=>'form-control',
                'placeholder'=>'last name']);
              echo '</div>';
           // echo $this->Form->control('user_id', ['options' => $users]);
           // echo $this->Form->control('status');
             echo   '<div class="col-md-6">';
            echo $this->Form->control('phone',['label'=>'Phone','class'=>'form-control',
                'placeholder'=>'phone']);
              echo '</div>';
               echo   '<div class="col-md-6">';
             echo $this->Form->control('username',['label'=>'User Name :','class'=>'form-control','required',
        'type'=>'email','placeholder'=>' username']);
              echo '</div>';
              
                echo   '<div class="col-md-6">';
               echo $this->Form->control('password', ['label'=>'Password :','class'=>'form-control',
                             'required','placeholder'=>'Your Password','type'=>'Password']);
               echo '</div>';
            //echo $this->Form->control('last_active_date', ['empty' => true]);
        ?>
    </fieldset>
     <br />  <br />  <br />
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary waves-effect waves-light pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
                </div>
                

            </div>

        </div>

    </div> 

