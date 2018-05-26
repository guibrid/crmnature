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
    <h1><?= __("Your treatment today") ?></h1>
    <?= $this->Form->create($care) ?>
    <fieldset>
        <legend><?= __('Choose duration') ?></legend>
        <?php
        //Recuperer le parameter passé customer_id passé dans l'URL
        //echo $session->read('customer_id');


        echo $this->Form->control('customer_id', ['type' => 'hidden', 'value' => $session->read('customer_id')]);
        echo $this->Form->control('treatment_id', ['type' => 'hidden', 'value' => $session->read('treatment_id')]);
        echo $this->Form->control('duration_id', ['empty'=>'Select', 'options' => $durations]);
        echo $this->Form->control('price_value', ['type' => 'text','disabled' => true]);
        echo $this->Form->control('price_id', ['type' => 'hidden']);
        echo $this->Form->control('payment_id', ['options' => $payments]);


        ?>
    </fieldset>
    <?= $this->Form->button(__('Select your duration')) ?>
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
