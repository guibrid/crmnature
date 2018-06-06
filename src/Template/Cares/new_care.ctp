<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Care $care
 */
?>
<div class="container">

  <div class="row align-items-center">
    <div class="col" >
    <?= $this->Form->create($care) ?>
    <div class="form-group">
        <legend><?= __('Choose your treatment') ?></legend>
        <?php
        $this->Form->setTemplates([
          'radio' => '<input type="radio" name="{{name}}" value="{{value}}" onclick="this.form.submit();" {{attrs}}>',
          'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}<br />{{text}}</label>',
          'radioWrapper' => '<div class="treatment">{{label}}</div>'
    ]);
        //Recuperer le parameter passé customer_id passé dans l'URL
        $customer_id =  $this->request->getParam('pass');
        echo $this->Form->control('customer_id', ['type' => 'hidden', 'value' => $customer_id[0]]);

         echo $this->Form->control('treatment_id',['type' => 'radio',
                                                  'options' => $treatments,
                                                  'label' => false]);
        ?>


      </div>
    <?= $this->Form->end() ?>
    </div>
  </div>
</div>
