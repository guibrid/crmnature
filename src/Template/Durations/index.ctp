<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Duration[]|\Cake\Collection\CollectionInterface $durations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Duration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="durations index large-9 medium-8 columns content">
    <h3><?= __('Durations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('treatment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($durations as $duration): ?>
            <tr>
                <td><?= $this->Number->format($duration->id) ?></td>
                <td><?= $this->Number->format($duration->value) ?></td>
                <td><?= $duration->has('treatment') ? $this->Html->link($duration->treatment->title, ['controller' => 'Treatments', 'action' => 'view', $duration->treatment->id]) : '' ?></td>
                <td><?= h($duration->created) ?></td>
                <td><?= h($duration->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $duration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $duration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $duration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $duration->id)]) ?>
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