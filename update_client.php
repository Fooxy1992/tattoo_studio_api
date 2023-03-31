<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->first_name) && !empty($data->last_name) && !empty($data->birthdate)) {
  $id = $data->id;
  $first_name = $data->first_name;
  $last_name = $data->last_name;
  $birthdate = $data->birthdate;
  $about_me = !empty($data->about_me) ? $data->about_me : "";

  $sql = "UPDATE clients SET first_name = '$first_name', last_name = '$last_name', birthdate = '$birthdate', about_me = '$about_me' WHERE id = '$id'";

  if ($conn->query($sql) === true) {
    http_response_code(200);
    echo json_encode(["message" => "Client updated successfully."]);
  } else {
    http_response_code(503);
    echo json_encode(["message" => "Unable to update client."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to update client. Data is incomplete."]);
}

$conn->close();
