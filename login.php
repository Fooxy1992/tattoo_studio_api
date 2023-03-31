<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->email) && !empty($data->password)) {
  $email = $data->email;
  $password = $data->password;

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
      http_response_code(200);
      echo json_encode(["message" => "Login successful.", "user" => $row]);
    } else {
      http_response_code(401);
      echo json_encode(["message" => "Invalid email or password."]);
    }
  } else {
    http_response_code(401);
    echo json_encode(["message" => "Invalid email or password."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to log in. Data is incomplete."]);
}

$conn->close();
