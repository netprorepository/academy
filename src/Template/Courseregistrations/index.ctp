<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Courseregistration[]|\Cake\Collection\CollectionInterface $courseregistrations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Courseregistration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Centers'), ['controller' => 'Centers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Center'), ['controller' => 'Centers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="courseregistrations index large-9 medium-8 columns content">
    <h3><?= __('Courseregistrations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('center_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registeredon') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courseregistrations as $courseregistration): ?>
            <tr>
                <td><?= $this->Number->format($courseregistration->id) ?></td>
                <td><?= $courseregistration->has('course') ? $this->Html->link($courseregistration->course->title, ['controller' => 'Courses', 'action' => 'view', $courseregistration->course->id]) : '' ?></td>
                <td><?= $courseregistration->has('candidate') ? $this->Html->link($courseregistration->candidate->id, ['controller' => 'Candidates', 'action' => 'view', $courseregistration->candidate->id]) : '' ?></td>
                <td><?= $courseregistration->has('center') ? $this->Html->link($courseregistration->center->name, ['controller' => 'Centers', 'action' => 'view', $courseregistration->center->id]) : '' ?></td>
                <td><?= h($courseregistration->registeredon) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $courseregistration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $courseregistration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $courseregistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseregistration->id)]) ?>
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
