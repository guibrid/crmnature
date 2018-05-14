<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Price $price
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $price->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $price->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Prices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Durations'), ['controller' => 'Durations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Duration'), ['controller' => 'Durations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prices form large-9 medium-8 columns content">
    <?= $this->Form->create($price) ?>
    <fieldset>
        <legend><?= __('Edit Price') ?></legend>
        <?php
            echo $this->Form->control('value');
            echo $this->Form->control('treatment_id', ['options' => $treatments]);
            echo $this->Form->control('duration_id', ['options' => $durations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
