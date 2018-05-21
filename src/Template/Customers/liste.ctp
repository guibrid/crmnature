<table  class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Last name</th>
        <th scope="col">First name</th>
        <th scope="col">Phone</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $customer):; ?>
        <tr>
            <td><?= $customer->last_name; ?></td>
            <td><?= $customer->first_name; ?></td>
            <td><?= $customer->phone; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
