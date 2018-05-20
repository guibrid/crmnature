<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<style>
  .row {
    background-color: blue;
    height: 100%;
  }
  .col {
    background-color: #21e7b6;
  }
</style>
<div class="container">

  <div class="row align-items-center">
    <div class="col">
      <h3>Search customer</h3>

      <?= $this->Form->create()  ?>
        <?= $this->Form->control('last_name', ['id' => 'last_name', 'label' => 'Last name' ]) ?>
        <p>OR</p>
        <?= $this->Form->control('phone', ['id' => 'phone', 'label' => 'Phone number' ]) ?>
        <?= $this->Form->button('next >>', ['type' => 'submit']); ?>
      <?= $this->Form->end(); ?>

      <?=  $this->Html->link(
          'New costomer',
          ['controller' => 'Customers', 'action' => 'new-customer'],
          ['class' => 'button']
      ); ?>
    </div>

  </div>

</div>
