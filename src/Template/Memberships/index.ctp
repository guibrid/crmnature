<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership[]|\Cake\Collection\CollectionInterface $memberships
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Membership'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Packages'), ['controller' => 'Packages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Package'), ['controller' => 'Packages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memberships index large-9 medium-8 columns content">
    <h3><?= __('Memberships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('package_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership): ?>
            <tr>
                <td><?= $this->Number->format($membership->id) ?></td>
                <td><?= h($membership->expiration) ?></td>
                <td><?= $this->Number->format($membership->price) ?></td>
                <td><?= $this->Number->format($membership->balance) ?></td>
                <td><?= h($membership->note) ?></td>
                <td><?= $membership->has('package') ? $this->Html->link($membership->package->name, ['controller' => 'Packages', 'action' => 'view', $membership->package->id]) : '' ?></td>
                <td><?= $membership->has('payment') ? $this->Html->link($membership->payment->title, ['controller' => 'Payments', 'action' => 'view', $membership->payment->id]) : '' ?></td>
                <td><?= h($membership->created) ?></td>
                <td><?= h($membership->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $membership->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $membership->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?>
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
