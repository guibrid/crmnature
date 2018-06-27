$(function () {
    $("#duration-id").bind('input', function () {
        $.ajax({
            url:  baseUrl + 'Prices/liste',
            data: {
                treatment_id: treatment_id,
                duration_id: $("#duration-id").val()
            },
            dataType: 'json',
            type: 'post',
            success: function (json) {
                $("#price-id").empty(); // nous vidons le SELECT
                //$("#price-id").append('<option value="0">Select</option>'); // Nous rajoutons une option "vide" qu SELECT qui indique à l'utilisateur de choisir un livre
                $.each(json.price, function (clef, valeur) { // pour chaque élément du tableau JSON, on récupère la clef et la valeur
                    // on ajoute l'option dans la liste
                    //$("#price-id").append('<option value="' + clef + '">' + valeur + '</option>');
                    $('input[name=price_value]').val(valeur);
                    $('input[name=price_id]').val(clef);
                });
            }
        })
    });
})
