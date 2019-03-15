<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacher $teacher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Teacher'), ['action' => 'edit', $teacher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Teacher'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teachers view large-9 medium-8 columns content">
    <h3><?= h($teacher->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $teacher->has('user') ? $this->Html->link($teacher->user->username, ['controller' => 'Users', 'action' => 'view', $teacher->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($teacher->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= h($teacher->course) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($teacher->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($teacher->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facebookid') ?></th>
            <td><?= h($teacher->facebookid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Twitterid') ?></th>
            <td><?= h($teacher->twitterid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($teacher->id) ?></td>
        </tr>
    </table>
</div>
