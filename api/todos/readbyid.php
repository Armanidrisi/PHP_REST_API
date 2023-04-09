<?php
require_once "../../models/Todo.php";
require_once "../../config/Database.php";

// Set headers for response
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Get the ID from the URL parameter
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  echo json_encode(["status" => false, "msg" => "No Parameters Found"]);
  die();
}

// Create a new instance of the database connection
$database = new Database();
$db = $database->connect();

// Create a new instance of the Todo model
$todo = new Todo($db);

// Get the Todo item with the specified ID
$todos = $todo->getbyid($id);

if ($todos->num_rows > 0) {
  // If data exists, fetch it and send as response
  $data = $todos->fetch_assoc();
  echo json_encode($data);
} else {
  // If no data is found, return error message
 http_response_code(400);
  echo json_encode(["status" => false, "msg" => "No Data Found"]);
}