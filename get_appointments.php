<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->user_id) && !empty($data->user_type)) {
  $user_id = $data->user_id;
  $user_type = $data->user_type;

  $sql = "";

  switch ($user_type) {
    case "client":
      $sql = "SELECT * FROM appointments WHERE client_id = '$user_id'";
      break;
    case "tattoo_artist":
      $sql = "SELECT * FROM appointments WHERE tattoo_artist_id = '$user_id'";
      break;
    case "studio_owner":
      $sql = "SELECT * FROM appointments INNER JOIN studios ON appointments.studio_id = studios.id WHERE studios.owner_id = '$user_id'";
      break;
    default:
      http_response_code(400);
      echo json_encode(["message" => "Invalid user type."]);
      exit();
  }

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $appointments = [];
    while ($row = $result->fetch_assoc()) {
      array_push($appointments, $row);
    }

    http_response_code(200);
    echo json_encode($appointments);
  } else {
    http_response_code(404);
    echo json_encode(["message" => "No appointments found."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["message" => "Unable to fetch appointments. Data is incomplete."]);
}

$conn->close();