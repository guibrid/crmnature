<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotion'), ['action' => 'edit', $promotion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotion'), ['action' => 'delete', $promotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotions view large-9 medium-8 columns content">
    <h3><?= h($promotion->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($promotion->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Effect') ?></th>
            <td><?= h($promotion->effect) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($promotion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($promotion->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($promotion->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cares') ?></h4>
        <?php if (!empty($promotion->cares)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Treatment Id') ?></th>
                <th scope="col"><?= __('Duration Id') ?></th>
                <th scope="col"><?= __('Price Id') ?></th>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Membership Id') ?></th>
                <th scope="col"><?= __('Promotion Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($promotion->cares as $cares): ?>
            <tr>
                <td><?= h($cares->id) ?></td>
                <td><?= h($cares->customer_id) ?></td>
                <td><?= h($cares->treatment_id) ?></td>
                <td><?= h($cares->duration_id) ?></td>
                <td><?= h($cares->price_id) ?></td>
                <td><?= h($cares->payment_id) ?></td>
                <td><?= h($cares->membership_id) ?></td>
                <td><?= h($cares->promotion_id) ?></td>
                <td><?= h($cares->created) ?></td>
                <td><?= h($cares->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cares', 'action' => 'view', $cares->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cares', 'action' => 'edit', $cares->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cares', 'action' => 'delete', $cares->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cares->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
