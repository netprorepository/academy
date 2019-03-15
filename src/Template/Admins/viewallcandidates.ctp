    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">View All Candidates</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Candidates</a>
                            </li>
                            <li class="active">
                                View All Candidates
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row"><div class="col-md-10"><?= $this->Flash->render() ?></div>
                <div class="col-sm-12">
                    <div class="card-box table-responsive"> 
                        <h4 class="m-t-0 m-b-30 header-title"><b>List of All Candidates</b></h4>

                       
                        <table id="datatable" class="table table-striped table-hover" style="overflow: scroll; width: 98%;">
                          <thead>
            <tr>
               
                
                <th ><?= $this->Paginator->sort('Name') ?></th>
                <th ><?= $this->Paginator->sort('address') ?></th>
              
                <th ><?= $this->Paginator->sort('username') ?></th>
               
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('registeredon') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate): ?>
            <tr>
               
               
                <td><?= h($candidate->surname.' '.$candidate->firstname) ?></td>
                <td><?= h($candidate->address) ?></td>
               
                <td><?= $candidate->has('user') ? $this->Html->link($candidate->user->username, ['controller' => 'Users', 'action' => 'view', $candidate->user->id]) : '' ?></td>
                
                <td><?= h($candidate->phone) ?></td>
                <td><?= h(date('Y-m-d', strtotime($candidate->registeredon))) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'viewcandidate', $candidate->id],['class'=>'fa fa-eye']) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'editcandidate', $candidate->id],['class'=>'fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(' '), ['action' => 'deletecandidate', $candidate->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->fname),
                                'class'=>'fa fa-times btn btn-danger']) ?>
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
   


