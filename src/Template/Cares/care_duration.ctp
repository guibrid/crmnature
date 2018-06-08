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

       <div class="form-group">
            <div class="input-group">

        <?= $this->Form->control('price_value', ['type' => 'text',
                                                 'disabled' => true,
                                                 'class' => 'form-control form-control-lg',
                                                 'placeholder' => __('Price'),
                                                 'label' => false]) ?>
           <div class="input-group-prepend">
             <div class="input-group-text">THB</div>
           </div>
         </div>
       </div>

        <hr />

        <?=  $this->Form->control('price_id', ['type' => 'hidden']) ?>
        <div class="form-group">
        <?=  $this->Form->control('payment_id', ['options' => $payments,
                                  'class' => 'form-control form-control-lg',
                                  'empty' => __('Type of payment'),
                                  'label' => false]) ?>
      </div>



<br />
    <?= $this->Form->button( __('Save the treatment'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
    </div>
  </div>
</div>

<script>
    $(function () {
        $("#duration-id").bind('input', function () {
            $.ajax({
                url: "<?php echo Router::url(array('controller' => 'Prices', 'action' => 'liste')); ?>",
                data: {
                    treatment_id: "<?php echo $session->read('treatment_id'); ?>",
                    duration_id: $("#duration-id").val()
                },
                dataType: 'json',
                type: 'post',
                success: function (json) {
                    $("#price-id").empty(); // nous vidons le SELECT
                    //$("#price-id").append('<option value="0">Select</option>'); // Nous rajoutons une option "vide" qu SELECT qui indique à l'utilisateur de choisir un livre
                    $.each(json.price, function (clef, valeur) { // pour chaque élément du tableau JSON, on récupère la clef et la valeur
                        // on ajoute l'option dans la liste
                        //$("#price-id").append('<option value="' + clef + '">' + valeur + '</option>');
                        $('input[name=price_value]').val(valeur);
                        $('input[name=price_id]').val(clef);
                    });
                }
            })
        });
    })
</script>
