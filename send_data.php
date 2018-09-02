<?php 
	require_once 'select_data.php';
	function send_data(){
		$sql = "SELECT ID,Latitud,Longitud,Fecha FROM coordenadas ORDER BY ID DESC LIMIT 1"; 	# Esta es la consulta que voy a generar
		$result = selectdata($sql);
		if($result != "zero"){			# Coloco los datos obtenidos si la consulta fue exitosa
			$row = $result->fetch_assoc();
			$comp = "00.00000";
			if($row['Latitud'] == $comp){
				$lat = 11.0071664;
				$long = -74.833156;
				$coordenadas =  array($lat,$long);
			}else{
				$lat = $row['Latitud'];
				$long = $row['Longitud'];
				$coordenadas =  array($lat,$long);
			}
		}else{							# De lo contrario, cargo coordenadas por defecto
			$lat = 11.0071664;
			$long = -74.833156;
			$coordenadas =  array($lat,$long);
		}
		return $coordenadas;			# En ambos casos tengo que retornar coordenadas
	}
?>