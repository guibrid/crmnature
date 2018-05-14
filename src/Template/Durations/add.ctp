<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Duration $duration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Durations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="durations form large-9 medium-8 columns content">
    <?= $this->Form->create($duration) ?>
    <fieldset>
        <legend><?= __('Add Duration') ?></legend>
        <?php
            echo $this->Form->control('value');
            echo $this->Form->control('treatment_id', ['options' => $treatments]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
