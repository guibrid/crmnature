<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $membership->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Memberships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Packages'), ['controller' => 'Packages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Package'), ['controller' => 'Packages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memberships form large-9 medium-8 columns content">
    <?= $this->Form->create($membership) ?>
    <fieldset>
        <legend><?= __('Edit Membership') ?></legend>
        <?php
            echo $this->Form->control('expiration');
            echo $this->Form->control('balance');
            echo $this->Form->control('note');
            echo $this->Form->control('package_id', ['options' => $packages]);
            echo $this->Form->control('customers._ids', ['options' => $customers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
