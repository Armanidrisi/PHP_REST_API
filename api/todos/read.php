<?php
// Require necessary files
require_once "../../models/Todo.php";
require_once "../../config/Database.php";

// Set headers for cross-origin resource sharing(CORS)
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Instantiate a new Database object and establish a connection to the database
$database = new Database();
$db = $database->connect();

// Instantiate a new Todo object using the database connection
$todo = new Todo($db);

// Call the Todo object's get_all() method to retrieve all todo items from the database
$todos = $todo->get_all();

// Get the number of rows returned from the database
$rows = $todos->num_rows;

// Check if there are any rows returned
if ($rows > 0) {
  // If there are, create an empty array to hold the todo items
  $arr = array();
  $arr["status"] = true;
  $arr["data"] = array();

  // Loop through each row returned and extract the data into a new array
  while ($res = $todos->fetch_assoc()) {
    extract($res);
    $todo_item = array(
      "id" => $id,
      "title" => $title,
      "description" => $description,
      "created_at" => $created_at
    );

    // Push the extracted todo item into the array of todo items
    array_push($arr["data"], $todo_item);
  }

  // Encode the array of todo items as JSON and return it to the client
  echo json_encode($arr);
} else {
  // If no rows were returned, set the HTTP response code to 400 and return an error message
  http_response_code(400);
  echo json_encode(["status" => false, "msg" => "No Data Found"]);
}