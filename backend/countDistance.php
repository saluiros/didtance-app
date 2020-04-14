<?php
header("Access-Control-Allow-Origin: *");

  $content = trim(file_get_contents("php://input"));

  $decoded = json_decode($content, true);

  if(is_array($decoded)) {
    $earth_radius = 6371000;

        $dLat = deg2rad($decoded['pointB']['lat'] - $decoded['pointA']['lat']);
        $dLon = deg2rad($decoded['pointB']['lng'] - $decoded['pointA']['lng']);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($decoded['pointA']['lat'])) * cos(deg2rad($decoded['pointB']['lat'])) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

    echo json_encode(array("distance_m" => $d));

  } else {

    echo json_encode(array("status_id" => -1, "message" => "Błąd"));
  }



?>