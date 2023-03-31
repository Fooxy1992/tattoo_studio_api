<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'config.php';

$sql = "SELECT * FROM studios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $studios = [];
  while ($row = $result->fetch_assoc()) {
    array_push($studios, $row);
  }

  http_response_code(200);
  echo json_encode($studios);
} else {
  http_response_code(404);
  echo json_encode(["message" => "No studios found."]);
}

$conn->close();