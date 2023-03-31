<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->client_id) && !empty($data->tattoo_artist_id) && !empty($data->studio_id) && !empty($data->date) && !empty($data->time)) {
  $client_id = $data->client_id;
  $tattoo_artist_id = $data->tattoo_artist_id;
  $studio_id = $data->studio_id;
  $date = $data->date;
  $time = $data->time;
  $description = !empty($data->description) ? $data->description : "";
  $size = !empty($data->size) ? $data->size : "";

  $sql = "INSERT INTO appointments (client_id, tattoo_artist_id, studio_id, date, time, description, size) VALUES ('$client_id', '$tattoo_artist_id', '$studio_id', '$date', '$time', '$description', '$size')";

  if ($conn->query($sql) === true) {
    http_response_code(201);
    echo json_encode(["message" => "Appointment created successfully."]);
  } else {
    http_response_code(503);
    echo json_encode(["message" => "Unable to create appointment."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to create appointment. Data is incomplete."]);
}

$conn->close();