453<?php

namespace CRUD\Helper;

class PersonHelper
{
  private $db;

  public function __construct()
  {
      $this->db = new DBConnector( "db", "localhost", "username", "password");
      $this->db->connect();
  }
    public function insert()
    {
        $sql = "INSERT INTO Test (firstname, lastname, username)
        VALUES ('$$_POST['firstName']', '$_POST['lastName']', '$_POST['userName']')";

        $this->db->execQuery($sql);
    }

    public function fetch(int $id)
    {
      $sql = "SELECT firstname, lastname, username
              FROM Test
              WHERE id=$id";
      $result = $db->execQuery($sql);
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "Full Name: " . $row["firstName"] . " " . $row["lastName"] . "UserName: " . $row["username"] . "<br>";
        }
      } else {
        echo "0 results";
      }
    }

    public function fetchAll()
    {
      $sql = "SELECT *
              FROM Test
              WHERE id=$id";
      $result = $db->execQuery($sql);
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "Full Name: " . $row["firstName"] . " " . $row["lastName"] . "UserName: " . $row["username"] . "<br>";
        }
      } else {
        echo "0 results";
      }
    }

    public function update()
    {
        if ($this->db->execQuery("UPDATE Test
                                  SET firstName='$_POST['firstName']' lastName='$_POST['lastName']' username='$_POST['username']'
                                  WHERE id = $person->getId()")) {
          echo "Record updated successfully";
        }else{
          echo "Error updating record: ";
        }
    }

    public function deletedelete(int $id)
    {
        if ($this->db->execQuery("DELETE
                                  FROM Test 
                                  WHERE username='$_POST['username']'")) {
          echo "Record deleted successfully";
        }else {
          echo "Error deleting record: ";
        }
    }

}