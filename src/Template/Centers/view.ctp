<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Center $center
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Center'), ['action' => 'edit', $center->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Center'), ['action' => 'delete', $center->id], ['confirm' => __('Are you sure you want to delete # {0}?', $center->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Centers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Center'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="centers view large-9 medium-8 columns content">
    <h3><?= h($center->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($center->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($center->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Candidates') ?></h4>
        <?php if (!empty($center->candidates)): ?>
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
            <?php foreach ($center->candidates as $candidates): ?>
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
