    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">View All Courses</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Courses</a>
                            </li>
                            <li class="active">
                                View All Courses
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row"><div class="col-md-10"><?= $this->Flash->render() ?></div>
                <div class="col-sm-12">
                    <div class="card-box table-responsive"> 
                        <h4 class="m-t-0 m-b-30 header-title"><b>List of All Courses</b></h4>

                       
                        <table id="datatable" class="table table-striped table-hover">
                           <thead>
            <tr>
                <th width="20%"><?= $this->Paginator->sort('title') ?></th>
                <th width="5%"><?= $this->Paginator->sort('Weekend Class') ?></th>
               
               
                <th width="5%"><?= $this->Paginator->sort('Executive Class') ?></th>
                <th width="5%"><?= $this->Paginator->sort('Immersive Class') ?></th>
                <th>Centers</th>
                 <th>Classes</th>
                <th>Action</th>
              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
               <td width="20%">
               <?= $this->Html->link(' '.$course->title, ['controller'=>'Courses','action' => 'view', $course->id],['class'=>'fa fa-eye','target'=>'blank']) ?>
               </td>
               <td width="5%"><?= h(number_format($course->weekendclass,2)) ?></td>
               
                <td width="5%"><?= h(number_format($course->executiveclass,2)) ?></td>
               <td width="5%"><?= h(number_format($course->immersiveclass,2)) ?></td>
                <td class="col-md-2">
                <?= $this->Form->create(null,['url'=>['controller'=>'Courses','action'=>'register']]) ?>
                <?= $this->Form->control('center_id', 
                        ['label'=>false,'options' => $centers,'class'=>'form-control','required','empty'=>'Select Center']);?>
                 <?= $this->Form->control('course_id', ['type'=>'hidden','value' =>$course->id]) ?>
                </td>
                <?php $preferedclass = [$course->weekendclass => 'Weekend Class',$course->executiveclass => 'Executive class',
            $course->immersiveclass => 'Immersive Class'];  ?>
                <td><?= $this->Form->control('amount', ['label'=>false,'options' => $preferedclass,'class'=>'form-control'
                    ,'required','empty'=>'Select Class'])?> </td>
               <td>
                
                <?= $this->Form->button('Register',['class'=>'btn btn-success','title'=>'register for this course']) ?>
    <?= $this->Form->end() ?>
                     </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
                </div>
                
            </div>
        </div>
    </div> 
  </div>
   

