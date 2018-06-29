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

      <h3><?= __("Your treatment").'<br />'.$session->read('treatment_title').' - '.$session->read('duration_title').' minutes'  ?></h3>
      <br />
      <?= $this->Form->create($care) ?>
      <div class="form-group">
          <?=  $this->Form->control('payment_id', [ 'id'      => 'payment_id',
                                                    'options' => $payments,
                                                    'class'   => 'form-control form-control-lg',
                                                    'empty'   => __('Type of payment'),
                                                    'label'   => false]) ?>
      </div>

      <div class="form-group" id="membership_list">
          <?php //TODO Remplacer les checkbox par des boutton radio et mettre en forme les blocs membership ?>
          <?=  $this->Form->select('membership_id', $memberships, ['id' => 'membership_id',
                                                      'multiple' => 'checkbox',
                                                      'class' => 'form-control form-control-lg']) ?>
      </div>

      <div class="form-group">
          <?= $this->Form->button( __('Next >>'), ['class' => 'btn btn-primary']) ?>
      </div>

      <?= $this->Form->end() ?>

    </div>
  </div>

</div>

<?= $this->Html->script('/js/cares/care_payment', array('block' => 'scriptBottom')) ?>
