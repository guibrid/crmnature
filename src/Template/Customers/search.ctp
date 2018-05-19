<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cares'), ['controller' => 'Cares', 'action' => 'index']) ?></li>

        <li><?= $this->Html->link(__('New Care'), ['controller' => 'Cares', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers index large-9 medium-8 columns content">
    <h3>Search customer</h3>

<?= $this->Form->create()  ?>
  <?= $this->Form->control('last_name', ['id' => 'last_name', 'label' => 'Last name' ]) ?>
  <p>OR</p>
  <?= $this->Form->control('phone', ['id' => 'phone', 'label' => 'Phone number' ]) ?>
  <?= $this->Form->button('next >>', ['type' => 'submit']); ?>
<?= $this->Form->end(); ?>

</div>
