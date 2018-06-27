$(function () {

  $.ajax({
      url: baseUrl + 'Customers/GetAllCustomers',
      dataType: 'json',
      type: 'post'
  })
  .done(function(data) {

      var listCustomers = new Array();
      for(key in data.customers_list) {
        listCustomers.push(data.customers_list[key].id + '| ' +
                           data.customers_list[key].first_name + '   ' +
                           data.customers_list[key].last_name);
      }

      $('#customers').tokenfield({
       autocomplete:{
        source: listCustomers,
        delay:500
       },
       showAutocompleteOnFocus: true,
       delimiter: ['**', ','],
      });

  })
  .fail(function() {
    //alert( "error list" );
  });

});





$(function () {

    $("#package_id").bind('input', function () {
        $.ajax({
            //url: "<?php echo Router::url(array('controller' => 'Packages', 'action' => 'getPriceValueById')); ?>",
            url: baseUrl + 'Packages/getPriceValueById',
            data: {
                package_id: $("#package_id").val()
            },
            dataType: 'json',
            type: 'post'
        })
        .done(function(data) {
          console.log(data.package_value.price);
          $("#balance").val(data.package_value.real_value);
          $("#price").val(data.package_value.price);
        })
        .fail(function() {
          alert( "error" );
        });
    });


})
