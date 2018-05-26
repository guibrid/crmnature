<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Care $care
 */
?>
<div class="container">

  <div class="row align-items-center">
    <div class="col" >
    <h1><?= __("Your treatment today") ?></h1>
    <?= $this->Form->create($care) ?>
    <fieldset>
        <legend><?= __('Choose your treatment') ?></legend>
        <?php
        //Recuperer le parameter passé customer_id passé dans l'URL
        $customer_id =  $this->request->getParam('pass');
        echo $this->Form->control('customer_id', ['type' => 'hidden', 'value' => $customer_id[0]]);
        echo $this->Form->radio('treatment_id',  $treatments);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Select your duration')) ?>
    <?= $this->Form->end() ?>
    </div>
  </div>
</div>
