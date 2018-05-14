<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treatment[]|\Cake\Collection\CollectionInterface $treatments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Durations'), ['controller' => 'Durations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Duration'), ['controller' => 'Durations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prices'), ['controller' => 'Prices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Price'), ['controller' => 'Prices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatments index large-9 medium-8 columns content">
    <h3><?= __('Treatments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatments as $treatment): ?>
            <tr>
                <td><?= $this->Number->format($treatment->id) ?></td>
                <td><?= h($treatment->title) ?></td>
                <td><?= h($treatment->created) ?></td>
                <td><?= h($treatment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatment->id)]) ?>
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
