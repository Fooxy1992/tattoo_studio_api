<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->owner_id) && !empty($data->name) && !empty($data->nif) && !empty($data->address) && !empty($data->working_hours)) {
  $id = $data->id;
  $owner_id = $data->owner_id;
  $name = $data->name;
  $nif = $data->nif;
  $address = $data->address;
  $working_hours = $data->working_hours;

  $sql = "UPDATE studios SET owner_id = '$owner_id', name = '$name', nif = '$nif', address = '$address', working_hours = '$working_hours' WHERE id = '$id'";

  if ($conn->query($sql) === true) {
    http_response_code(200);
    echo json_encode(["message" => "Studio updated successfully."]);
  } else {
    http_response_code(503);
    echo json_encode(["message" => "Unable to update studio."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to update studio. Data is incomplete."]);
}

$conn->close();