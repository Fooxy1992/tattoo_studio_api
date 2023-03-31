<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->client_id) && !empty($data->tattoo_artist_id) && !empty($data->studio_id) && !empty($data->date) && !empty($data->time)) {
  $id = $data->id;
  $client_id = $data->client_id;
  $tattoo_artist_id = $data->tattoo_artist_id;
  $studio_id = $data->studio_id;
  $date = $data->date;
  $time = $data->time;
  $description = !empty($data->description) ? $data->description : "";
  $size = !empty($data->size) ? $data->size : "";

  $sql = "UPDATE appointments SET client_id = '$client_id', tattoo_artist_id = '$tattoo_artist_id', studio_id = '$studio_id', date = '$date', time = '$time', description = '$description', size = '$size' WHERE id = '$id'";

  if ($conn->query($sql) === true) {
    http_response_code(200);
    echo json_encode(["message" => "Appointment updated successfully."]);
  } else {
    http_response_code(503);
    echo json_encode(["message" => "Unable to update appointment."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to update appointment. Data is incomplete."]);
}

$conn->close();