<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<div class="container">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <p><?= $this->Form->control('first_name', ['id' => 'first_name',
                                                      'placeholder' => __('First name'),
                                                      'label' => false,
                                                      'class' => "form-control form-control-lg" ]); ?></p>
        <p><?= $this->Form->control('last_name', ['id' => 'last_name',
                                                      'placeholder' => __('Last name'),
                                                      'label' => false,
                                                      'class' => "form-control form-control-lg" ]); ?></p>
        <p><?= $this->Form->control('email', ['id' => 'email',
                                                      'placeholder' => _('Email'),
                                                      'label' => false,
                                                      'class' => "form-control form-control-lg" ]); ?></p>
        <p><?= $this->Form->control('phone', ['id' => 'phone',
                                                      'placeholder' => __('Phone'),
                                                      'label' => false,
                                                      'class' => "form-control form-control-lg" ]); ?></p>
        <p><label><?= __('Date of birth') ?></label><br />
          <?= $this->Form->control('date_of_birth',  [
                                            'monthNames' => false,
                                            'hour' => false,
                                            'minute' => false,
                                            'second' => false,
                                            'meridian' => false,
                                            'label' => false,
                                            'year' => ['class' => 'form-control form-control-lg date-input-year'],
                                            'month' => ['class' => 'form-control form-control-lg date-input-month'],
                                            'day' => ['class' => 'form-control form-control-lg date-input-day'],
                                            'empty'  => [
                                                  'year' => __('Year'),
                                                  'month' => __('Month'),
                                                  'day' => __('Day')
                                                ],
                                            'minYear' => date('Y') - 100,
                                            'maxYear' => 2017,
                                             ]); ?></p>

    </fieldset>
    <p><?= $this->Form->button(__('Submit'), ['id' => 'submit',
                                              'class' => "btn btn-primary" ]) ?></p>
    <?= $this->Form->end() ?>
</div>
