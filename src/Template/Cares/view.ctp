<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Care $care
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Care'), ['action' => 'edit', $care->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Care'), ['action' => 'delete', $care->id], ['confirm' => __('Are you sure you want to delete # {0}?', $care->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cares'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Care'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Durations'), ['controller' => 'Durations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Duration'), ['controller' => 'Durations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cares view large-9 medium-8 columns content">
    <h3><?= h($care->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $care->has('customer') ? $this->Html->link($care->customer->id, ['controller' => 'Customers', 'action' => 'view', $care->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Treatment') ?></th>
            <td><?= $care->has('treatment') ? $this->Html->link($care->treatment->title, ['controller' => 'Treatments', 'action' => 'view', $care->treatment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $care->has('duration') ? $this->Html->link($care->duration->id, ['controller' => 'Durations', 'action' => 'view', $care->duration->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $care->has('price') ? $this->Html->link($care->price->id, ['controller' => 'Prices', 'action' => 'view', $care->price->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment') ?></th>
            <td><?= $care->has('payment') ? $this->Html->link($care->payment->title, ['controller' => 'Payments', 'action' => 'view', $care->payment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($care->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($care->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($care->modified) ?></td>
        </tr>
    </table>
</div>
