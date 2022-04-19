<?php

include("config.php");
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="folha_de_estilo.css">


  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">




  <title>calculo de frete</title>
</head>

<body>

  <form name="dados" id="dadoX" action="engine.php" method="post">
    <div id="locationField">
      <fieldset>
        <i>Endereço de saída do veículo</i>
        <input name="saidaCasa" id="saidaCasa" placeholder="Digite o endereço de saída" onFocus="geolocate()" type="text" value="Rua Três Marias, 264 - Eucaliptos, Fazenda Rio Grande - PR, Brasil" autocomplete="0"></input><br><br />

        <i> Digite endereço de coleta </i>
        <input name="coleta" id="coleta" placeholder="Digite o endereço de coleta" onFocus="geolocate()" type="text" autocomplete="0"></input><br /><br />

        <i>Digite endereço de entrega</i>
        <input name="entrega" id="entrega" placeholder="Digite o endereço de entrega" onFocus="geolocate()" type="text" autocomplete="0"></input><br /><br />
        <i>Endereço de retono do veículo</i>
        <input name="voltaCasa" id="voltaCasa" placeholder="Digite o endereço de retorno" onFocus="geolocate()" type="text" value="Rua Três Marias, 264 - Eucaliptos, Fazenda Rio Grande - PR, Brasil" autocomplete="0"></input><br /><br />
        <input type="submit" name="calcular" id="sub" value="Calcular">
      </fieldset>
    </div>

  </form>


  <script>
    function initAutocomplete() {
      autocomplete1 = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */
        (document.getElementById('saidaCasa')), {
          types: ['geocode']
        });

      autocomplete2 = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */
        (document.getElementById('coleta')), {
          types: ['geocode']
        });

      autocomplete3 = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */
        (document.getElementById('entrega')), {
          types: ['geocode']
        });

      autocomplete4 = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */
        (document.getElementById('voltaCasa')), {
          types: ['geocode']
        });
    }

    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          var countryRestrict = {
            'country': 'br-br'
          };
          var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });
          autocomplete1.setBounds(circle.getBounds());
          autocomplete2.setBounds(circle.getBounds());
          autocomplete3.setBounds(circle.getBounds());
          autocomplete4.setBounds(circle.getBounds());
        });
      }
    }
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key= <?php echo $chave; ?> + +&libraries=places&callback=initAutocomplete" async defer></script>

</body>

</html>