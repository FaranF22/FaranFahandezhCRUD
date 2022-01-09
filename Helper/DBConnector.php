<?php

namespace CRUD\Helper;

class DBConnector
{

    /** @var mixed $db */
    private $db;
    private $conn;
    private string $servername;
    private string $username;
    private string $password;
    

    public function __construct($db, $servername, $username, $password)
    {
        $this -> db = $db;
        $this -> servername = $servername;
        $this -> username = $username;
        $this -> password = $password;
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {
            
        // Create connection
        $conn = new mysqli($this->db, $this->servername, $this->username, $this->password);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query) : bool
    {
        if ($this -> db -> query($query) === true) {
            echo "connect successfully";

            return true;
        }
        return false;
    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {
        echo "failed" . $message;
    }
}