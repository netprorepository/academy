    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">View All Admins</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Admins</a>
                            </li>
                            <li class="active">
                                View All Admins
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row"><div class="col-md-10"><?= $this->Flash->render() ?></div>
                <div class="col-sm-12">
                    <div class="card-box table-responsive"> 
                        <h4 class="m-t-0 m-b-30 header-title"><b>List of All Admins</b></h4>

                       
                        <table id="datatable" class="table table-striped table-hover" style="overflow: scroll; width: 98%;">
                          <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('fname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_active_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr>
                
                <td><?= h($admin->fname) ?></td>
                <td><?= h($admin->lname) ?></td>
                <td><?= ($admin->user->username) ?></td>
                <td><?= h($admin->status) ?></td>
                <td><?= h($admin->phone) ?></td>
                <td><?= h($admin->last_active_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'view', $admin->id],['class'=>'fa fa-eye']) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'edit', $admin->id],['class'=>'fa fa-edit']) ?>
                    <?php if($admin->status=="active"){ echo $this->Html->link(__(' '), ['action' => 'deactivateadmin', $admin->id],['confirm' => __('Are you sure you want to deactivate admin # {0}?', $admin->fname),
                    'class'=>'fa fa-key btn btn-warning','title'=>'deactivate']);}
                    else{
                    echo $this->Html->link(__(' '), ['action' => 'activateadmin', $admin->id],['confirm' => __('Are you sure you want to activate admin # {0}?', $admin->fname),
                    'class'=>'fa fa-key btn btn-success','title'=>'deactivate']);
                    
                    }
                    ?>
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $admin->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id),'class'=>'fa fa-times btn btn-danger']) ?>
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