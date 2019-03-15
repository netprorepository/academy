    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">View All Transactions</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Transactions</a>
                            </li>
                            <li class="active">
                                View All Transactions
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row"><div class="col-md-10"><?= $this->Flash->render() ?></div>
                <div class="col-sm-12">
                    <div class="card-box table-responsive"> 
                        <h4 class="m-t-0 m-b-30 header-title"><b>List of All Transactions</b></h4>

                       
                        <table id="datatable" class="table table-striped table-hover">
                          <thead>
            <tr>
              
                <th scope="col"><?= $this->Paginator->sort('candidate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Transaction Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pay Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Response') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course') ?></th>
                <th>Center</th>
                <th scope="col"><?= $this->Paginator->sort('Payref') ?></th>
<!--                <th scope="col" class="actions"><?= __('Actions') ?></th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                
                <td><?= $transaction->has('candidate') ? $this->Html->link($transaction->candidate->surname.' '.$transaction->candidate->firstname, 
                        ['controller' => 'Candidates', 'action' => 'view', $transaction->candidate->id]) : '' ?></td>
                <td><?= h($transaction->transdate) ?></td>
                <td><?= h(number_format($transaction->amount,2))?></td>
                <td><?= h($transaction->paystatus) ?></td>
                <td><?= h($transaction->response) ?></td>
                <td><?= $transaction->course->title ?></td>
                <td><?= $transaction->center->name ?></td>
                <td><?= h($transaction->payref) ?></td>
<!--                <td class="actions">
                    <?= $this->Html->link(__(' '), ['action' => 'viewprofile', $transaction->id],['class'=>'fa fa-eye']) ?>
                    <?= $this->Html->link(__(' '), ['action' => 'edit', $transaction->id],['class'=>'fa fa-edit']) ?>
                    <?= $this->Form->postLink(__(' '), ['action' => 'delete', $transaction->id], 
                            ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id),'class'=>'fa fa-times btn btn-danger']) ?>
                </td>-->
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
   
