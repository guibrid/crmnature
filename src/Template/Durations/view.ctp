<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Duration $duration
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Duration'), ['action' => 'edit', $duration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Duration'), ['action' => 'delete', $duration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $duration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Durations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Duration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="durations view large-9 medium-8 columns content">
    <h3><?= h($duration->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Treatment') ?></th>
            <td><?= $duration->has('treatment') ? $this->Html->link($duration->treatment->title, ['controller' => 'Treatments', 'action' => 'view', $duration->treatment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($duration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= $this->Number->format($duration->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($duration->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($duration->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cares') ?></h4>
        <?php if (!empty($duration->cares)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Treatment Id') ?></th>
                <th scope="col"><?= __('Duration Id') ?></th>
                <th scope="col"><?= __('Price Id') ?></th>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($duration->cares as $cares): ?>
            <tr>
                <td><?= h($cares->id) ?></td>
                <td><?= h($cares->customer_id) ?></td>
                <td><?= h($cares->treatment_id) ?></td>
                <td><?= h($cares->duration_id) ?></td>
                <td><?= h($cares->price_id) ?></td>
                <td><?= h($cares->payment_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Prices') ?></h4>
        <?php if (!empty($duration->prices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Treatment Id') ?></th>
                <th scope="col"><?= __('Duration Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($duration->prices as $prices): ?>
            <tr>
                <td><?= h($prices->id) ?></td>
                <td><?= h($prices->value) ?></td>
                <td><?= h($prices->treatment_id) ?></td>
                <td><?= h($prices->duration_id) ?></td>
                <td><?= h($prices->created) ?></td>
                <td><?= h($prices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Prices', 'action' => 'view', $prices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Prices', 'action' => 'edit', $prices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Prices', 'action' => 'delete', $prices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
