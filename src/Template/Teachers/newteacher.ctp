<!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">New Teacher</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Teacher</a>
                            </li>
                            <li class="active">
                                New Teacher
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="p-20">
    <?= $this->Form->create($teacher,['type'=>'file']) ?>
    <fieldset>
       
        <?php
         echo '<div class="col-md-4">';
            echo $this->Form->control('user_id', ['options' => $users,'class'=>'form-control','label'=>'Select Username']);
             echo '</div>';
             echo '<div class="col-md-4">';
            echo $this->Form->control('name',['label'=>'Name','class'=>'form-control']);
             echo '</div>';
            
            echo '<div class="col-md-4">';
            echo $this->Form->control('course',['label'=>'Course','class'=>'form-control']);
             echo '</div>';
            
            echo '<div class="col-md-4">';
            echo $this->Form->control('address',['label'=>'Address','class'=>'form-control']);
             echo '</div>';
            
            echo '<div class="col-md-4">';
            echo $this->Form->control('phone',['label'=>'Phone','class'=>'form-control']);
             echo '</div>';
            
            echo '<div class="col-md-4">';
            
            echo $this->Form->control('passport',['label'=>'Passport','type'=>'file','class'=>'form-control']);
             echo '</div>';
            
              echo '<div class="col-md-4">';
            echo $this->Form->control('facebookid',['label'=>'Facebook ID','class'=>'form-control']);
            
             echo '</div>';
            
              echo '<div class="col-md-4">';
            echo $this->Form->control('twitterid',['label'=>'Twitter ID','class'=>'form-control']);
             echo '</div>';
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
