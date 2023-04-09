<?php

/**
* Todos Model Class
*/
class Todo
{
  //DB Stuff
  private $conn;
  private $table = "todo";

  // Properties
  public $id;
  public $title;
  public $description;
  /**
  * Constructor function to set database connection
  *
  * @param object $db The database connection object
  */
  public function __construct($db) {
    $this->conn = $db;
  }

  /**
  * Function to insert new data into the table
  *
  * @return boolean Returns true if the query was successful, false otherwise
  */
  public function create() {
    //Create Query
    $sql = 'INSERT INTO ' . $this->table . ' SET title = ?, description = ?';

    //Prepare The Query
    $stmt = $this->conn->prepare($sql);

    //Bind Query
    $stmt->bind_param("ss", $this->title, $this->description);

    //Execute Query
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

  }
  /**
  * Function to get a single todo item by ID
  *
  * @param integer $id The ID of the item to retrieve
  * @return object Returns a single row as an object if found, null otherwise
  */
  public function getbyid($id) {
    //Create Query
    $sql = "SELECT * FROM ".$this->table." WHERE id = ?";

    //Prepare The Query
    $stmt = $this->conn->prepare($sql);

    //Bind Query
    $stmt->bind_param("i", $id);

    //Execute Query
    $stmt->execute();

    //Get Result
    $result = $stmt->get_result();

    return $result;
  }

  /**
  * Function to get all todo items
  *
  * @return object Returns all rows as an object if found, null otherwise
  */
  public function get_all() {
    /*create Query*/
    $sql = 'SELECT * FROM '. $this->table.' ORDER BY created_at DESC';
    //execute Query
    $query = $this->conn->query($sql);
    return $query;
  }
  /**
  * Function to delete a todo item by ID
  *
  * @param integer $id The ID of the item to delete
  * @return boolean Returns true if the query was successful, false otherwise
  */
  public function delete($id) {
    //Create Query
    $sql = "DELETE FROM ".$this->table." WHERE id = ?";

    //Prepare The Query
    $stmt = $this->conn->prepare($sql);

    //Bind query
    $stmt->bind_param
    ("i", $id);

    //Execute Query
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

  }
  /**
   * Function to update a todo item by ID
   *
   * @return boolean Returns true if the query was successful, false otherwise
   */
  public function update() {
    //Create Query
    $sql = "UPDATE ".$this->table." SET title= ?,description= ? WHERE id = ?";

    //Prepare The Query
    $stmt = $this->conn->prepare($sql);

    //Bind query
    $stmt->bind_param("ssi", $this->title, $this->description, $this->id);

    //Execute Query
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

}