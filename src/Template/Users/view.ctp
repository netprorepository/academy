<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signupdate') ?></th>
            <td><?= h($user->signupdate) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Admins') ?></h4>
        <?php if (!empty($user->admins)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fname') ?></th>
                <th scope="col"><?= __('Jname') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Last Active Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->admins as $admins): ?>
            <tr>
                <td><?= h($admins->id) ?></td>
                <td><?= h($admins->fname) ?></td>
                <td><?= h($admins->jname) ?></td>
                <td><?= h($admins->user_id) ?></td>
                <td><?= h($admins->status) ?></td>
                <td><?= h($admins->phone) ?></td>
                <td><?= h($admins->last_active_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Admins', 'action' => 'view', $admins->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Admins', 'action' => 'edit', $admins->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Admins', 'action' => 'delete', $admins->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admins->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Candidates') ?></h4>
        <?php if (!empty($user->candidates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Surname') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Center Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Registeredon') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->candidates as $candidates): ?>
            <tr>
                <td><?= h($candidates->id) ?></td>
                <td><?= h($candidates->surname) ?></td>
                <td><?= h($candidates->firstname) ?></td>
                <td><?= h($candidates->address) ?></td>
                <td><?= h($candidates->center_id) ?></td>
                <td><?= h($candidates->user_id) ?></td>
                <td><?= h($candidates->course_id) ?></td>
                <td><?= h($candidates->phone) ?></td>
                <td><?= h($candidates->registeredon) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Candidates', 'action' => 'view', $candidates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Candidates', 'action' => 'edit', $candidates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Candidates', 'action' => 'delete', $candidates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
