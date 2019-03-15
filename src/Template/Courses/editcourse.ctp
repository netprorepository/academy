<!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Course</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Courses</a>
                            </li>
                            <li class="active">
                                Edit Course
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="p-20">
    <?= $this->Form->create($course,['type'=>'file']) ?>
    <fieldset>
<!--        <legend><?= __('Add Course') ?></legend>-->
        <?php
         echo '<div class="col-md-8">';
            echo $this->Form->control('title',['label'=>'Course Title','class'=>'form-control','placeholder'=>'course title','required']);
           echo '</div>';
           
            echo '<div class="col-md-4">';
            echo $this->Form->control('category_id',['label'=>'Category','class'=>'form-control','options' => $categories,'required']);
           echo '</div>';
           
        
                    echo '<div class="col-md-3">';
            echo $this->Form->control('weekendclass', ['label' => 'Weekend Class','class'=>'form-control','required','placeholder'=>'weekend class charges']);
             echo '</div>';
             
               echo '<div class="col-md-3">';
            echo $this->Form->control('executiveclass', ['label' => 'Executive Class','class'=>'form-control','required','placeholder'=>'executive class charges']);
             echo '</div>';
             
               echo '<div class="col-md-3">';
            echo $this->Form->control('immersiveclass', ['label' => 'Immersive Class','class'=>'form-control','required','placeholder'=>'immersive class charges']);
             echo '</div>';
             
               echo '<div class="col-md-3">';
            echo $this->Form->control('duration', ['label' => 'Duration','class'=>'form-control','required','placeholder'=>'course duration']);
             echo '</div>';
             
            echo $this->Form->control('description',['label'=>'Description','class'=>'ckeditor','required']);
            
              echo '<div class="col-md-4">';
            echo $this->Form->control('courseimage', ['label' => 'Photo','class'=>'form-control',
                'placeholder'=>'course image','type'=>'file']);
             echo '</div>';
           
            echo '<div class="col-md-4">';
            echo $this->Form->control('start_date',['label'=>'Start Date','id'=>'registration-start','class'=>'form-control'
                ,'placeholder'=>'course start date']);
           echo '</div>';
            
            echo '<div class="col-md-4">';
            echo $this->Form->control('end_date',['label'=>'End Date','id'=>'registration-end','class'=>'form-control',
                'placeholder'=>'course end date']);
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
