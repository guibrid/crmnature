<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Care[]|\Cake\Collection\CollectionInterface $cares
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Care'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Durations'), ['controller' => 'Durations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Duration'), ['controller' => 'Durations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cares index large-9 medium-8 columns content">
    <h3><?= __('Cares') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cares as $care): ?>
            <tr>
                <td><?= $this->Number->format($care->id) ?></td>
                <td><?= $care->has('customer') ? $this->Html->link($care->customer->id, ['controller' => 'Customers', 'action' => 'view', $care->customer->id]) : '' ?></td>
                <td><?= $care->has('treatment') ? $this->Html->link($care->treatment->title, ['controller' => 'Treatments', 'action' => 'view', $care->treatment->id]) : '' ?></td>
                <td><?= $care->has('duration') ? $this->Html->link($care->duration->id, ['controller' => 'Durations', 'action' => 'view', $care->duration->id]) : '' ?></td>
                <td><?= $care->has('price') ? $this->Html->link($care->price->id, ['controller' => 'Prices', 'action' => 'view', $care->price->id]) : '' ?></td>
                <td><?= $care->has('payment') ? $this->Html->link($care->payment->title, ['controller' => 'Payments', 'action' => 'view', $care->payment->id]) : '' ?></td>
                <td><?= h($care->created) ?></td>
                <td><?= h($care->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $care->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $care->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $care->id], ['confirm' => __('Are you sure you want to delete # {0}?', $care->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
