<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="container">
      <h1><?= __('Welcome to Nature') ?></h1>
      <?= $this->Form->create($customer) ?>
      <fieldset>
          <p><?= $this->Form->control('first_name', ['id' => 'first_name',
                                                    'placeholder' => __('First name'),
                                                    'label' => false,
                                                    'class' => "form-control form-control-lg" ]) ?></p>
          <p><?= $this->Form->control('last_name', ['id' => 'last_name',
                                                    'placeholder' => __('Last name'),
                                                    'label' => false,
                                                    'class' => "form-control form-control-lg" ]) ?></p>
          <p><?= $this->Form->control('email', ['id' => 'email',
                                                    'placeholder' => _('Email'),
                                                    'label' => false,
                                                    'class' => "form-control form-control-lg" ]) ?></p>
          <p><?= $this->Form->control('phone', ['id' => 'phone',
                                                    'placeholder' => __('Phone'),
                                                    'label' => false,
                                                    'class' => "form-control form-control-lg" ]) ?>
                                                  <small id="emailHelp" class="form-text text-muted"><?= __('If more than one phone number write them like this 0951101333/0983456222/09123334455') ?></small></p>
          <p><label><?= __('Date of birth') ?></label><br />
            <?= $this->Form->dateTime('date_of_birth',  [
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
                                             ]) ?></p>

      </fieldset>
      <?= $this->Form->button(__('Submit'), ['id' => 'submit',
                                                'class' => "btn btn-primary" ]) ?>
      <?= $this->Form->end() ?>
</div>
