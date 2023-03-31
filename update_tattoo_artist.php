<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->name) && !empty($data->specialty)) {
  $id = $data->id;
  $name = $data->name;
  $specialty = $data->specialty;
  $photo_url = !empty($data->photo_url) ? $data->photo_url : "";

  $sql = "UPDATE tattoo_artists SET name = '$name', specialty = '$specialty', photo_url = '$photo_url' WHERE id = '$id'";

  if ($conn->query($sql) === true) {
    http_response_code(200);
    echo json_encode(["message" => "Tattoo artist updated successfully."]);
  } else {
    http_response_code(503);
    echo json_encode(["message" => "Unable to update tattoo artist."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to update tattoo artist. Data is incomplete."]);
}

$conn->close();