<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Admin $admin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $admin->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="admins form large-9 medium-8 columns content">
    <?= $this->Form->create($admin) ?>
    <fieldset>
        <legend><?= __('Edit Admin') ?></legend>
        <?php
            echo $this->Form->control('fname');
            echo $this->Form->control('jname');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('status');
            echo $this->Form->control('phone');
            echo $this->Form->control('last_active_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
