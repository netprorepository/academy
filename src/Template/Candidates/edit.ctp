<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $candidate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?></li>
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
<div class="candidates form large-9 medium-8 columns content">
    <?= $this->Form->create($candidate) ?>
    <fieldset>
        <legend><?= __('Edit Candidate') ?></legend>
        <?php
            echo $this->Form->control('surname');
            echo $this->Form->control('firstname');
            echo $this->Form->control('address');
            echo $this->Form->control('center_id', ['options' => $centers]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('course_id', ['options' => $courses]);
            echo $this->Form->control('phone');
            echo $this->Form->control('registeredon');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
