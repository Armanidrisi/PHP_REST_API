<?php

require_once "../../models/Todo.php";
require_once "../../config/Database.php";

// Set headers for response
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

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

//Delete The Data
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
  if ($todos = $todo->delete($id)) {
    ///display success message
    echo json_encode(["status" => true, "msg" => "Deleted success"]);
  } else {
    //display errro message
    http_response_code(400);
    echo json_encode(["status" => false, "msg" => "there was a problem while deleting"]);
  }

}