<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Courseregistration $courseregistration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Courseregistration'), ['action' => 'edit', $courseregistration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Courseregistration'), ['action' => 'delete', $courseregistration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseregistration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courseregistrations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courseregistration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Centers'), ['controller' => 'Centers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Center'), ['controller' => 'Centers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="courseregistrations view large-9 medium-8 columns content">
    <h3><?= h($courseregistration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $courseregistration->has('course') ? $this->Html->link($courseregistration->course->title, ['controller' => 'Courses', 'action' => 'view', $courseregistration->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate') ?></th>
            <td><?= $courseregistration->has('candidate') ? $this->Html->link($courseregistration->candidate->id, ['controller' => 'Candidates', 'action' => 'view', $courseregistration->candidate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Center') ?></th>
            <td><?= $courseregistration->has('center') ? $this->Html->link($courseregistration->center->name, ['controller' => 'Centers', 'action' => 'view', $courseregistration->center->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($courseregistration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Registeredon') ?></th>
            <td><?= h($courseregistration->registeredon) ?></td>
        </tr>
    </table>
</div>
