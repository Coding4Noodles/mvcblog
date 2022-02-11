<?php
  class Contact {
    //method to register 
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    function submit() {
      $this->db->query('INSERT INTO contact (fname, email) VALUES(:fname, :email)');

      //Bind values
      $this->db->bind(':fname', $_POST['fname']);
      $this->db->bind(':email', $_POST['email']);

      //Execute function
      if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
    }
  }