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
                  url: baseUrl + 'Customers/liste',
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
