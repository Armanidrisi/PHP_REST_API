<?php
require_once "../../models/Todo.php"; // Import the Todo model
require_once "../../config/Database.php"; // Import the Database configuration

// Set headers for the response
header('Access-Control-Allow-Origin: *'); // Allow cross-origin resource sharing (CORS)
header('Content-Type: application/json'); // Set the response content type to JSON
header('Access-Control-Allow-Methods:PUT'); // Set the allowed HTTP method to PUT
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With'); // Set the allowed headers for the request

// Create a new Database object and connect to the database
$database = new Database();
$db = $database->connect();

// Create a new Todo object and set its properties using data from the request body and query string
$todo = new Todo($db);
$data = json_decode(file_get_contents("php://input"));
$todo->id = isset($_GET['id']) ? $_GET['id'] : die();
$todo->title = $data->title;
$todo->description = $data->description;

// Update the todo item in the database using the update() method
if ($todo->update()) {
  // Return a JSON response indicating success
  echo json_encode(["status" => true, "msg" => "Data Updated Successfully"]);
} else {
  // Return a JSON response indicating an error
  http_response_code(400);
  echo json_encode(["status" => false, "msg" => "Error While Updating Data"]);
}
?>