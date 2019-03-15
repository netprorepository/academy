<!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title"> Candidate</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Candidate </a>
                            </li>
                            <li class="active">
                                Candidate Profile
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="p-20">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($candidate->surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($candidate->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($candidate->address) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $candidate->has('user') ? $candidate->user->username : '' ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td> <?= h($candidate->phone) ?></td>
        </tr>
      
        <tr>
            <th scope="row"><?= __('Registered On') ?></th>
            <td> <?= h($candidate->registeredon) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('My Transactions') ?></h4>
        <?php if (!empty($candidate->transactions)): ?>
        <table cellpadding="5" cellspacing="5">
            <tr>
                
               
                <th scope="col" style="margin: 10px; padding: 10px;"><?= __('Transaction Date') ?></th>
                <th scope="col" style="margin: 10px; padding: 10px;"><?= __('Amount') ?></th>
                <th scope="col" style="margin: 10px; padding: 10px;"><?= __('Pay Status') ?></th>
                <th scope="col" style="margin: 10px; padding: 10px;"><?= __('Response') ?></th>
                <th>Course</th>
                <th>Center</th>
               
            </tr>
            <?php foreach ($candidate->transactions as $transactions): ?>
            <tr>
                
              
                <td style="margin: 10px; padding: 10px;"><?= h($transactions->transdate) ?></td>
                <td style="margin: 10px; padding: 10px;"><?= h($transactions->amount) ?></td>
                <td style="margin: 10px; padding: 10px;"><?= h($transactions->paystatus) ?></td>
                <td style="margin: 10px; padding: 10px;"><?= h($transactions->response) ?></td>
                <td><?=$transactions->course->title?> </td>
               <td><?=$transactions->center->name?> </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
                </div>
                

            </div>

        </div>

    </div> 

