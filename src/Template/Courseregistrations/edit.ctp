<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Courseregistration $courseregistration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $courseregistration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $courseregistration->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Courseregistrations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Centers'), ['controller' => 'Centers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Center'), ['controller' => 'Centers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="courseregistrations form large-9 medium-8 columns content">
    <?= $this->Form->create($courseregistration) ?>
    <fieldset>
        <legend><?= __('Edit Courseregistration') ?></legend>
        <?php
            echo $this->Form->control('course_id', ['options' => $courses]);
            echo $this->Form->control('candidate_id', ['options' => $candidates]);
            echo $this->Form->control('center_id', ['options' => $centers]);
            echo $this->Form->control('registeredon');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
