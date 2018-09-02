<html>
  	<head>
  		<title>Sistema de Telemetría</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<style>
      		/* Set the size of the div element that contains the map */
      		#map {
        		height: 75%;  /* The height is 500 pixels */
        		width: 51%;  /* The width is half of the width of the web page */
       		}
    	</style>
  	</head>

	<body>
		<h1><center>Coordenadas de ubicación SYRUS 3G Bluetooth</center></h1>
		<h2 style="float: left; width: 50%; text-align: center;">Coordenadas Geográficas</h2>
		<h2 style="float: right; width: 50%; text-align: center;">Ubicación en el mapa</h2>
		
		<!-- Map Synchronization -->
  		<div id="map" style="float: right; text-align: right;"></div>
		<!-- Pass PHP coordinates to javacript to show it into the map -->
		<?php
			require 'send_data.php';
			$coordenadas = send_data();
			$send_lat = $coordenadas[0]; //Define our PHP variable. You can of course get the value of this variable however you need.
			$send_lng = $coordenadas[1];
		?>			
		<script>
			var rec_lat = <?php echo $send_lat; ?>;
			var rec_lng = <?php echo $send_lng; ?>;
			// Initialize and add the map
			function initMap() {
				// The location of Villa Santos
				var coord = {lat: rec_lat, lng: rec_lng};
  				// The map, centered at Villa Santos
  				var map = new google.maps.Map(
      			document.getElementById('map'), {zoom: 16, center: coord});
  				// The marker, positioned at Villa Santos
  				var marker = new google.maps.Marker({position: coord, map: map});
			}
		</script> 
		<script async defer 
    		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTybCbEORm4Tl4la7JR6Z-yR4GjkXaeFI&callback=initMap">
		</script>

		<left><table border style="width:650px;float: left;text-align: center;">
			<tr>
				<th width="10%">ID</th>
				<th width="25%">Latitud </th>
				<th width="25%">Longitud</th>
				<th>Fecha</th>	
			</tr>
		</table></left>	
		<left><table border id = "t1" style="width:650px;float: left;text-align: center;">
				<script type="text/javascript" src="jquery-3.3.1.min.js" "></script>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#t1').load('charge_data.php');
						refresh();
					});
					function refresh (){
						setTimeout( function(){
							$('#t1').load('charge_data.php');
							$('#map').load('map.php');
							refresh();
						}, 4900);
					}	
				</script>
		</left></table>	
	</body>
</html>



