<?php use Cake\Routing\Router; ?>

<div class="container">

  <div class="row align-items-center">
    <div class="col" >
      <h4><?= __("Search customer") ?></h4>
        <p>
        <?= $this->Form->control('research', ['id' => 'research',
                                              'placeholder' => __('Name, surname or phone'),
                                              'label' => false,
                                              'class' => "form-control form-control-lg" ]) ?>
      </p>
<div id="loading" style="height:30px;"><?= $this->Html->image('ajax-loader.gif',["alt" => "Loading...", "id" => "loading-spinning"]) ?></div>
      <div id="listeDiv"></div>

      <p>
        <?=  $this->Html->link(
            __('Register customer'),
            ['controller' => 'Customers', 'action' => 'new-customer'],
            ['class' => 'btn btn-primary']
        ); ?>
      </p>
      <p>
        <?=  $this->Html->link(
            __('Non registered customer'),
            ['controller' => 'Cares', 'action' => 'new-care', '1'],
            ['class' => 'btn btn-primary']
        ); ?>
      </p>

      <script>
      var $loading = $('#loading-spinning').hide();
      $(document)
         .ajaxStart(function () {
            //ajax request went so show the loading image
             $loading.show();
         })
       .ajaxStop(function () {
           //got response so hide the loading image
            $loading.hide();
        });

            $(function () {

                $("#research").bind('input', function () {
                    $.ajax({
                        url: "<?php echo Router::url(array('controller' => 'Customers', 'action' => 'liste')); ?>",
                        data: {
                            research: $("#research").val()
                        },
                        dataType: 'html',
                        type: 'post'
                    })
                    .done(function(html) {
                      $("#listeDiv").html(html);
                    })
                    .fail(function() {
                      alert( "error" );
                    });
                });
            })

      </script>

    </div>
  </div>
</div>
