<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?= h($transaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Candidate') ?></th>
            <td><?= $transaction->has('candidate') ? $this->Html->link($transaction->candidate->id, ['controller' => 'Candidates', 'action' => 'view', $transaction->candidate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($transaction->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paystatus') ?></th>
            <td><?= h($transaction->paystatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Response') ?></th>
            <td><?= h($transaction->response) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payref') ?></th>
            <td><?= h($transaction->payref) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course Id') ?></th>
            <td><?= $this->Number->format($transaction->course_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transdate') ?></th>
            <td><?= h($transaction->transdate) ?></td>
        </tr>
    </table>
</div>
