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
<div id="loading"><?= $this->Html->image('ajax-loader.gif',["alt" => "Loading..."]) ?></div>
      <div id="listeDiv"></div>

      <script>
      var $loading = $('#loading').hide();
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
