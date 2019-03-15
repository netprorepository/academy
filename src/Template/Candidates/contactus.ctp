<!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Candidate</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Candidate</a>
                            </li>
                            <li class="active">
                                Contact Us
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="p-20">
    <?= $this->Form->create(null) ?>
    <fieldset>
        <?php
        
            echo $this->Form->control('title',['label'=>'Message Title','class'=>'form-control','placeholder'=>'message title','required']);
         
                   
            echo $this->Form->control('message',['label'=>'Message','class'=>'summernote','required']);
       
        ?>
    </fieldset>
                        <br />  
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary waves-effect waves-light pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
                </div>
                

            </div>

        </div>

    </div> 

