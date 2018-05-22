<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
use Cake\Routing\Router;
?>
<style>
#research {
  width: 100%;
}
body {
  text-align: center;
}
table {
  text-align: left;
}
td.valid {
  text-align: right;
}
</style>

<div class="container">

  <div class="row align-items-center">
    <div class="col" >
      <h4>Search customer</h4>
        <p>
        <?= $this->Form->control('research', ['id' => 'research',
                                              'placeholder' => 'Name, surname or phone',
                                              'label' => false,
                                              'class' => "form-control form-control-lg" ]) ?>
      </p>
      <div id="listeDiv"></div>



<script>
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
