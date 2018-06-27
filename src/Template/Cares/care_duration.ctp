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
      <h3><?= __("Your treatment").'<br />'.$session->read('treatment_title') ?></h3>
      <br />
    <?= $this->Form->create($care) ?>

        <?php
        //On récupère les valeurs de durée en lien avec le traitement choisi
        $durations = [];
        foreach($prices as $price){
          $durations[$price->duration->id] = $price->duration->value;
        }
        ?>
        <?= $this->Form->control('customer_id', ['type' => 'hidden', 'value' => $session->read('customer_id')]) ?>
        <?= $this->Form->control('treatment_id', ['type' => 'hidden', 'value' => $session->read('treatment_id')]) ?>
        <div class="form-group">
              <?= $this->Form->control('duration_id', ['empty'=> __('Select duration'),
                                                       'options' => $durations,
                                                       'class' => 'form-control form-control-lg',
                                                       'label' => false]) ?>
       </div>

<br />
    <?= $this->Form->button( __('Next >>'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
    </div>
  </div>
</div>

<script>
  // Varibale à passer dans l'ajax Call
  var treatment_id = <?php echo $session->read('treatment_id'); ?>;
</script>
<?= $this->Html->script('/js/cares/care_duration', array('block' => 'scriptBottom')) ?>
