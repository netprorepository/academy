<!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Candidate</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Candidates</a>
                            </li>
                            <li class="active">
                                Edit Candidate
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="p-20">
<?= $this->Form->create($user) ?>
    <fieldset>

        <?php
         echo '<div class="col-md-6">';
            echo $this->Form->control('password',['label'=>'Password','class'=>'form-control',
                'placeholder'=>'surname']);
             echo '</div>';
        
             echo '<div class="col-md-6">';
            echo $this->Form->control('remember_pass',['label'=>'Phone','class'=>'form-control']);
              echo '</div>';
            
           // echo $this->Form->control('registeredon');
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


