<?php
/**
 * Database Connection Class
 */
class Database
{
    //Database Configuration
    private $db_host = "127.0.0.1"; // Database host
    private $db_user = "root"; // Database username
    private $db_pass = "root"; // Database password
    private $db_name = "test"; // Database name
    private $conn; // Connection object

    /**
     * Function For Connection To Database
     * 
     * @return mysqli|bool Returns a MySQLi object if the connection is successful, or false if there was an error
     */
    public function connect()
    {
        $this->conn = null; // Reset the connection object

        // Attempt to connect to the database
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        // Check for errors while connecting
        if ($this->conn->connect_error) {
            return false; // Return false if there was an error
        }

        return $this->conn; // Return the connection object
    }
}
?>
