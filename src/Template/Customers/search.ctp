<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
use Cake\Routing\Router;
?>

<div class="container">

  <div class="row align-items-center">
    <div class="col">
      <h3>Search customer</h3>

      <?= $this->Form->create()  ?>
        <?= $this->Form->control('research', ['id' => 'research', 'placeholder' => 'Last name OR phone number' ]) ?>



        <?= $this->Form->button('next >>', ['type' => 'submit']); ?>
      <?= $this->Form->end(); ?>

      <?=  $this->Html->link(
          'New customer',
          ['controller' => 'Customers', 'action' => 'new-customer'],
          ['class' => 'button']
      ); ?>

      <div id="listeDiv"></div>

      <script>
      $(function () {
          $("#research").bind('input', function () {
              console.log($("#research").val());
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
