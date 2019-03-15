<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate[]|\Cake\Collection\CollectionInterface $candidates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Centers'), ['controller' => 'Centers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Center'), ['controller' => 'Centers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="candidates index large-9 medium-8 columns content">
    <h3><?= __('Candidates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('center_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registeredon') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate): ?>
            <tr>
                <td><?= $this->Number->format($candidate->id) ?></td>
                <td><?= h($candidate->surname) ?></td>
                <td><?= h($candidate->firstname) ?></td>
                <td><?= h($candidate->address) ?></td>
                <td><?= $candidate->has('center') ? $this->Html->link($candidate->center->name, ['controller' => 'Centers', 'action' => 'view', $candidate->center->id]) : '' ?></td>
                <td><?= $candidate->has('user') ? $this->Html->link($candidate->user->id, ['controller' => 'Users', 'action' => 'view', $candidate->user->id]) : '' ?></td>
                <td><?= $candidate->has('course') ? $this->Html->link($candidate->course->title, ['controller' => 'Courses', 'action' => 'view', $candidate->course->id]) : '' ?></td>
                <td><?= h($candidate->phone) ?></td>
                <td><?= h($candidate->registeredon) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $candidate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $candidate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?>
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
