<?php
class DbConnect
{
  private $db_servername = "localhost";
  private $db_username = "root";
  private $db_password = "";
  private $db_name = "farm";

  private $conn = "";


  function ExecuteData($query)
  {
    $this->conn = new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);

    // die("$query");

    if ($this->conn->connect_error) 
    {
      die("Connection failed: " . $this->conn->connect_error);
    } 
    else 
    {
      $res = $this->conn->query($query);
      $this->conn->close();
      if ($res === false) {
        return false;
      }
      else
      {
        return true;
      }
    }
  }

  function GetData($query)
  {
    $this->conn = new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);

    if ($this->conn->connect_error) 
    {
      die("Connection failed: " . $this->conn->connect_error);
    } 
    else 
    {
      $res = $this->conn->query($query);
      $this->conn->close();
      $rows = [];
      if ($res === false) {
        return false;
      }
      else
      {
        if ($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) 
          {
            array_push($rows, $row);
          }
          return $rows;
        }
        else
        {
          return false;
        }
      }
    }
  }
}
