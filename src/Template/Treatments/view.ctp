<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treatment $treatment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment'), ['action' => 'edit', $treatment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment'), ['action' => 'delete', $treatment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Durations'), ['controller' => 'Durations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Duration'), ['controller' => 'Durations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatments view large-9 medium-8 columns content">
    <h3><?= h($treatment->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($treatment->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($treatment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($treatment->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cares') ?></h4>
        <?php if (!empty($treatment->cares)): ?>
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
            <?php foreach ($treatment->cares as $cares): ?>
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
        <h4><?= __('Related Durations') ?></h4>
        <?php if (!empty($treatment->durations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Treatment Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($treatment->durations as $durations): ?>
            <tr>
                <td><?= h($durations->id) ?></td>
                <td><?= h($durations->value) ?></td>
                <td><?= h($durations->treatment_id) ?></td>
                <td><?= h($durations->created) ?></td>
                <td><?= h($durations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Durations', 'action' => 'view', $durations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Durations', 'action' => 'edit', $durations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Durations', 'action' => 'delete', $durations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $durations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Prices') ?></h4>
        <?php if (!empty($treatment->prices)): ?>
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
            <?php foreach ($treatment->prices as $prices): ?>
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
