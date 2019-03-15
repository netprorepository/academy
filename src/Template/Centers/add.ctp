<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Center $center
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Centers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['controller' => 'Candidates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="centers form large-9 medium-8 columns content">
    <?= $this->Form->create($center) ?>
    <fieldset>
        <legend><?= __('Add Center') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
