<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $course->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Candidate Courses'), ['controller' => 'CandidateCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Candidate Course'), ['controller' => 'CandidateCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courseregistrations'), ['controller' => 'Courseregistrations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Courseregistration'), ['controller' => 'Courseregistrations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="courses form large-9 medium-8 columns content">
    <?= $this->Form->create($course) ?>
    <fieldset>
        <legend><?= __('Edit Course') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('admin_id', ['options' => $admins]);
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('cost');
            echo $this->Form->control('viewcount');
            echo $this->Form->control('duration');
            echo $this->Form->control('weekendclass');
            echo $this->Form->control('executiveclass');
            echo $this->Form->control('immersiveclass');
            echo $this->Form->control('category_id', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
