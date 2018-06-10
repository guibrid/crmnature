<div class="container">
<h3><?= __("Login") ?></h3>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
<fieldset>

<div class="form-group">
  <?= $this->Form->control('email', ['id' => 'email',
                                            'placeholder' => __('Email'),
                                            'class' => "form-control form-control-lg" ]) ?>
</div>
<div class="form-group">
  <?= $this->Form->control('password', ['id' => 'password',
                                            'placeholder' => __('Password'),
                                            'class' => "form-control form-control-lg" ]) ?>
</div>

<?= $this->Form->button(__('Login'), ['id' => 'submit',
                                          'class' => "btn btn-primary" ]); ?>


    </fieldset>

<?= $this->Form->end() ?>
</div>
