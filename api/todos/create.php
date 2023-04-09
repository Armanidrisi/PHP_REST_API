<?php
require_once "../../models/Todo.php"; // Import the Todo model
require_once "../../config/Database.php"; // Import the Database configuration

// Set headers for the response
header('Access-Control-Allow-Origin: *'); // Allow cross-origin resource sharing (CORS)
header('Content-Type: application/json'); // Set the response content type to JSON
header('Access-Control-Allow-Methods: POST'); // Set the allowed HTTP method to POST
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With'); // Set the allowed headers for the request

// Create a new Database object and connect to the database
$database = new Database();
$db = $database->connect();

// Create a new Todo object and set its properties using data from the request body
$todo = new Todo($db);
$data = json_decode(file_get_contents("php://input"));
$todo->title = $data->title;
$todo->description = $data->description;

// INSERT the todo item in the database using the create() method
if ($todo->create()) {
  // Return a JSON response indicating success
  echo json_encode(["status" => true, "msg" => "Data Inserted Successfully"]);
} else {
  // Return a JSON response indicating error
  http_response_code(400);
  echo json_encode(["status" => false, "msg" => "Error While Creating Data"]);
}