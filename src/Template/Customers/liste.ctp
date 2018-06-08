<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/regular.css" integrity="sha384-EWu6DiBz01XlR6XGsVuabDMbDN6RT8cwNoY+3tIH+6pUCfaNldJYJQfQlbEIWLyA" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/fontawesome.css" integrity="sha384-GVa9GOgVQgOk+TNYXu7S/InPTfSDTtBalSgkgqQ7sCik56N9ztlkoTr2f/T44oKV" crossorigin="anonymous">
<table  class="table research" id="searchTable">
    <tbody>
    <?php foreach ($customers as $customer):; ?>
        <tr>
            <td><?= $customer->last_name; ?> <?= $customer->first_name; ?><br />
                <span class="phone-number"><i class="fas fa-phone"></i> <?= $customer->phone; ?></span>
            </td>
            <td class="align-middle" style="text-align:right"><?=  $this->Html->link(
                __('Choose'),
                ['controller' => 'Cares', 'action' => 'new-care', $customer->id],
                ['class' => 'btn btn-primary btn-sm']
            ); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
