<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (
  !empty($data->user_type) &&
  !empty($data->first_name) &&
  !empty($data->last_name) &&
  !empty($data->email) &&
  !empty($data->password)
) {
  $user_type = $data->user_type;
  $first_name = $data->first_name;
  $last_name = $data->last_name;
  $email = $data->email;
  $password = password_hash($data->password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (user_type, first_name, last_name, email, password) VALUES ('$user_type', '$first_name', '$last_name', '$email', '$password')";

  if ($conn->query($sql) === true) {
    http_response_code(201);
    echo json_encode(["message" => "User created successfully."]);
  } else {
    http_response_code(503);
    echo json_encode(["message" => "Unable to create user."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to create user. Data is incomplete."]);
}

$conn->close();