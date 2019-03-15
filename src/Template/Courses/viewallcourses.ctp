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
                <th scope="col" width="20%"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weekend/Online') ?></th>
               <th scope="col"><?= $this->Paginator->sort('Executive') ?></th>
               <th scope="col"><?= $this->Paginator->sort('Immersive') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Admin') ?></th>
               
<!--                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
               <td width="20%"><?= h($course->title) ?></td>
               <td><?= h(number_format($course->weekendclass,2)) ?></td>
                <td><?= h(number_format($course->executiveclass,2)) ?></td>
                 <td><?= h(number_format($course->immersiveclass,2)) ?></td>
                  <td><?= h($course->duration) ?></td>
               <td><?= h($course->admin->fname) ?></td>
<!--                <td><?= h($course->start_date) ?></td>
                <td><?= h($course->end_date) ?></td>-->
                <td class="actions">
                   <?php  
                   if($course->status=='live'){
                       echo $this->Html->link(' Put Offline', ['action' => 'changestatus', $course->id,'offline'],['class'=>'btn btn-info waves-effect waves-light fa fa-edit']);
                   }
                   else{
                        echo $this->Html->link(' Put Online', ['action' => 'changestatus', $course->id,'live'],['class'=>'btn btn-success waves-effect waves-light fa fa-edit']);
                  
                   }
                   
                   ?>
                    <?= $this->Html->link(' Edit', ['action' => 'editcourse', $course->id],['class'=>'btn btn-primary waves-effect waves-light fa fa-edit']) ?>
                    <?= $this->Form->postLink(' ', ['action' => 'delete', $course->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $course->title),'class'=>'btn btn-danger waves-effect waves-light fa fa-times']) ?>
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
   
