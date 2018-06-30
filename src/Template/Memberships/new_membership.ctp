<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 */
?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css', array('block' => 'css')) ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css', array('block' => 'css')) ?>

<div class="container new_membership">

  <div class="row align-items-center">
    <div class="col" >
    <?= $this->Form->create($membership) ?>
    <fieldset>
        <legend><?= __('New membership') ?></legend>

        <div class="form-group">
          <label><?= __('Package') ?></label>
          <?= $this->Form->control('package_id', ['id'      => 'package_id',
                                                  'label'   => false,
                                                  'class'   => "form-control form-control-lg",
                                                  'options' => $packages,
                                                  'empty'   => __('Select package') ]) ?>
        </div>

        <div class="form-group">
          <label><?= __('Payment') ?></label>
          <?= $this->Form->control('payment_id', ['id'      => 'payment_id',
                                                  'label'   => false,
                                                  'class'   => "form-control form-control-lg",
                                                  'options' => $payments,
                                                  'empty'   => __('Select payment')])?>
        </div>

        <div class="form-group">
          <label><?= __('Price') ?></label>
          <div class="input-group">
            <?= $this->Form->control('price', ['id'    => 'price',
                                               'label' => false,
                                               'class' => "form-control form-control-lg"]) ?>
            <div class="input-group-prepend">
              <div class="input-group-text">THB</div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label><?= __('Balance') ?></label>
          <div class="input-group">
            <?= $this->Form->control('balance', ['id'    => 'balance',
                                                 'label' => false,
                                                 'class' => "form-control form-control-lg"]) ?>
            <div class="input-group-prepend">
              <div class="input-group-text">THB</div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label><?= __('Notes') ?></label>
          <?=  $this->Form->control('note', ['id'          => 'note',
                                             'label'       => false,
                                             'placeholder' => __('If you have comments about this membership...'),
                                             'class'       => "form-control form-control-lg",
                                             'type'        => 'textarea',
                                             'style'       => 'width:100%;']); ?>
        </div>

        <div class="form-group">
          <label><?= __('Customers using this membership') ?></label>
          <?= $this->Form->control('customers._ids', ['id'    => 'customers',
                                                      'label' => false,
                                                      'type'  => 'text',
                                                      'class' => "form-control form-control-lg"]) ?>
        </div>

        <div class="form-group">
          <label><?= __('Expiration date') ?></label>
          <?= $this->Form->control('expiration',  [
                                          'monthNames' => false,
                                          'hour' => true,
                                          'minute' => true,
                                          'second' => true,
                                          'meridian' => false,
                                          'label' =>  false,
                                          'year' => ['class' => 'form-control form-control-lg date-input-year'],
                                          'month' => ['class' => 'form-control form-control-lg date-input-month'],
                                          'day' => ['class' => 'form-control form-control-lg date-input-day'],
                                          'default' => date('Y') + 1 .'-'.date('m').'-'.date('d'),
                                          'minYear' => date('Y'),
                                          'maxYear' => date('Y') + 2,
                                           ]
                                           ) ?>
        </div>
    </fieldset>
    <?= $this->Form->button( __('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
  </div>
</div>
</div>

<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('block' => 'scriptBottom')) ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js', array('block' => 'scriptBottom')) ?>
<?= $this->Html->script('/js/memberships/new_membership', array('block' => 'scriptBottom')) ?>
