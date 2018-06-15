<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Care $care
 */
 use Cake\Routing\Router;
   $session = $this->request->session();
?>
<div class="container">

  <div class="row align-items-center">
    <div class="col" >
      <h3><?= __("Your treatment").'<br />
                '.$session->read('treatment_title').' -
                '.$session->read('duration_title').' minutes'. ' -
                '.$session->read('payment_title')  ?></h3>
      <br />

      <?= $this->Form->create($care) ?>

      <div class="form-group">
      <?=  $this->Form->control('promotion_id', ['options' => $promotions,
                                'class' => 'form-control form-control-lg',
                                'empty' => __('Type of promotion'),
                                'label' => false]) ?>
      </div>

      <div class="form-group">
           <div class="input-group">
             <?= $this->Form->control('price_value',
                                     ['type' => 'text',
                                      'disabled' => true,
                                      'class' => 'form-control form-control-lg',
                                      'label' => false,
                                      //reset() give the fisrt value of array
                                      'value' => reset($price)]) ?>
            <div class="input-group-prepend">
              <div class="input-group-text">THB</div>
            </div>
          </div>
      </div>

       <?= $this->Form->control('customer_id',
                               ['type' => 'hidden',
                                'value' => $session->read('customer_id')]) ?>

       <?= $this->Form->control('treatment_id',
                               ['type' => 'hidden',
                                'value' => $session->read('treatment_id')]) ?>

       <?= $this->Form->control('duration_id',
                               ['type' => 'hidden',
                                'value' => $session->read('duration_id')]) ?>

       <?= $this->Form->control('treatment_id',
                               ['type' => 'hidden',
                                'value' => $session->read('treatment_id')]) ?>

       <?= $this->Form->control('price_id',
                               ['type' => 'hidden',
                                //array_keys() give the value of a key
                                'value' => array_keys($price)[0]]) ?>

       <?= $this->Form->control('payment_id',
                               ['type' => 'hidden',
                                'value' => $session->read('payment_id')]) ?>

       <?= $this->Form->control('membership_id',
                               ['type' => 'hidden',
                                'value' => $session->read('membership_id')]) ?>

      <br />
      <?= $this->Form->button( __('Save the treatment'), ['class' => 'btn btn-primary']) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>
