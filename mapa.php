
<?php
			require 'send_data.php';
			$coordenadas = send_data();
			$send_lat = $coordenadas[0]; //Define our PHP variable. You can of course get the value of this variable however you need.
			$send_lng = $coordenadas[1];
		?>	
<script>
			rec_lat = <?php echo $send_lat; ?>;
			rec_lng = <?php echo $send_lng; ?>;
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