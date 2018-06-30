$(function () {
  var intialPrice = $("#price_value").val();
  var intialbalance = $("#balance").val();
  // Calcul de la balance initial
  $("#balance").val( $("#old_balance").val() - $("#price_value").val() );

  $("#promotion_id").bind('input', function () { //Si on ajout une promotion

    if($("#promotion_id option:selected").attr("data-effect")) { //on detect une formule

      var $formula = $("#promotion_id option:selected").attr("data-effect"); // Save formule dans une var
      var promotion_value = eval($formula.replace(/\#.*\#/g, $("#price_value").val())); // On remplace le #price# par le prix du soin
      $("#price_value").val(Math.round($("#price_value").val()-promotion_value)); // On recalcul le prix du soin avec la formule
      $("#balance").val( $("#old_balance").val() - $("#price_value").val() ); // On recalcul la balance du soin avec la formule

    } else {
      // Si il n'y a pas de promotion selectionné
      $("#price_value").val(intialPrice); // On reinitialise le prix initial
      $("#balance").val( Math.round($("#old_balance").val() - $("#price_value").val()) ); // On reinitialise la balance initiale
    }
  });

});
