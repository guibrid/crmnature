<?php use Cake\Routing\Router; ?>

<div class="container">

  <div class="row align-items-center">
    <div class="col" >
      <h4><?= __("Search customer") ?></h4>
        <p>
        <?= $this->Form->control('research', ['id' => 'research',
                                              'placeholder' => __('Name, surname or phone'),
                                              'label' => false,
                                              'class' => "form-control form-control-lg" ]) ?>
      </p>
<div id="loading" style="height:30px;"><?= $this->Html->image('ajax-loader.gif',["alt" => "Loading...", "id" => "loading-spinning"]) ?></div>
      <div id="listeDiv"></div>

      <p>
        <?=  $this->Html->link(
            __('Register customer'),
            ['controller' => 'Customers', 'action' => 'new-customer'],
            ['class' => 'btn btn-primary']
        ); ?>
      </p>
      <p>
        <?=  $this->Html->link(
            __('Non registered customer'),
            ['controller' => 'Cares', 'action' => 'new-care', '1'],
            ['class' => 'btn btn-primary']
        ); ?>
      </p>

    </div>
  </div>
</div>

<?= $this->Html->script('/js/customers/search', array('block' => 'scriptBottom')) ?>
