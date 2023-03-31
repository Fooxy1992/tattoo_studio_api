<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
  $id = $data->id;

  $sql = "DELETE FROM tattoo_artists WHERE id = '$id'";

  if ($conn->query($sql) === true) {
    http_response_code(200);
    echo json_encode(["message" => "Tattoo artist deleted successfully."]);
  } else {
    http_response_code(503);
    echo json_encode(["message" => "Unable to delete tattoo artist."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to delete tattoo artist. Data is incomplete."]);
}

$conn->close();
