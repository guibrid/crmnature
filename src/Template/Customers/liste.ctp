<table  class="table research" id="searchTable">
    <thead class="thead-dark">
    <tr>
        <th scope="col"><?= __('Last name') ?></th>
        <th scope="col"><?= __('First name') ?></th>
        <th scope="col"><?= __('Phone') ?></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer):; ?>
        <tr>
            <td><?= $customer->last_name; ?></td>
            <td><?= $customer->first_name; ?></td>
            <td><?= $customer->phone; ?></td>
            <td class="valid"><?=  $this->Html->link(
                __('Choose'),
                ['controller' => 'Cares', 'action' => 'new-care', $customer->id],
                ['class' => 'btn btn-primary']
            ); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p>
  <?=  $this->Html->link(
      __('Add new customer'),
      ['controller' => 'Customers', 'action' => 'new-customer'],
      ['class' => 'btn btn-primary']
  ); ?>
</p>
