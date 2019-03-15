    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">View All Teachers</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Teachers</a>
                            </li>
                            <li class="active">
                                View All Teachers
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row"><div class="col-md-10"><?= $this->Flash->render() ?></div>
                <div class="col-sm-12">
                    <div class="card-box table-responsive"> 
                        <h4 class="m-t-0 m-b-30 header-title"><b>List of Our Teachers</b></h4>
            <table id="datatable" class="table table-striped table-hover">
                           <thead>
            <tr>
               
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facebookid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('twitterid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teachers as $teacher): ?>
            <tr>
               
                <td><?= $teacher->has('user') ? $this->Html->link($teacher->user->username, ['controller' => 'Users', 'action' => 'view', $teacher->user->id]) : '' ?></td>
                <td><?= h($teacher->name) ?></td>
                <td><?= h($teacher->course) ?></td>
                <td><?= h($teacher->address) ?></td>
                <td><?= h($teacher->phone) ?></td>
                <td><?= h($teacher->facebookid) ?></td>
                <td><?= h($teacher->twitterid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teacher->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'editteacher', $teacher->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?>
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
   