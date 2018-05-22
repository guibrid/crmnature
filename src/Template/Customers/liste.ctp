<table  class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Last name</th>
        <th scope="col">First name</th>
        <th scope="col">Phone</th>
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
                'Choose',
                ['controller' => 'Cares', 'action' => 'new-care', $customer->id],
                ['class' => 'btn btn-primary']
            ); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p>
  <?=  $this->Html->link(
      'Add new customer',
      ['controller' => 'Customers', 'action' => 'new-customer'],
      ['class' => 'btn btn-primary']
  ); ?>
</p>
