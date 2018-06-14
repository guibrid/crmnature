<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Package $package
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Package'), ['action' => 'edit', $package->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Package'), ['action' => 'delete', $package->id], ['confirm' => __('Are you sure you want to delete # {0}?', $package->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Packages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Package'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Memberships'), ['controller' => 'Memberships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership'), ['controller' => 'Memberships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="packages view large-9 medium-8 columns content">
    <h3><?= h($package->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($package->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($package->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($package->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Real Value') ?></th>
            <td><?= $this->Number->format($package->real_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($package->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($package->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Memberships') ?></h4>
        <?php if (!empty($package->memberships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Expiration') ?></th>
                <th scope="col"><?= __('Balance') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Package Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($package->memberships as $memberships): ?>
            <tr>
                <td><?= h($memberships->id) ?></td>
                <td><?= h($memberships->expiration) ?></td>
                <td><?= h($memberships->balance) ?></td>
                <td><?= h($memberships->note) ?></td>
                <td><?= h($memberships->package_id) ?></td>
                <td><?= h($memberships->created) ?></td>
                <td><?= h($memberships->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Memberships', 'action' => 'view', $memberships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Memberships', 'action' => 'edit', $memberships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Memberships', 'action' => 'delete', $memberships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
