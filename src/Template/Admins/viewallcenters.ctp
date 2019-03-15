    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">View All Centers</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Centers</a>
                            </li>
                            <li class="active">
                                View All Centers
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row"><div class="col-md-10"><?= $this->Flash->render() ?></div>
                <div class="col-sm-12">
                    <div class="card-box table-responsive"> 
                        <h4 class="m-t-0 m-b-30 header-title"><b>List of All Centers</b></h4>

                       
                        <table id="datatable" class="table table-striped table-hover">
                           <thead>
            <tr>
                <th>Name</th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($centers as $center): ?>
            <tr>
               <td><?= h($center->name) ?></td>
               
                <td class="actions">
                   
                    <?= $this->Html->link(' Edit', ['action' => 'editcenter', $center->id],['class'=>'btn btn-primary waves-effect waves-light fa fa-edit']) ?>
                    <?= $this->Form->postLink(' ', ['action' => 'deletecenter', $center->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $center->name),'class'=>'btn btn-danger waves-effect waves-light fa fa-times']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<!--    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>-->
                </div>
                
            </div>
        </div>
    </div> 
  </div>
   

