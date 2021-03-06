<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->beginTransaction();
        $this->db->query('INSERT INTO users (username, email, account, password) VALUES (:username, :email, :account, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':account', $data['account']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        return $this->db->execute();
    }

    public function login($username, $password) {
        $this->db->beginTransaction();
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();
        
        if(!empty($row)) {
            $hashedPassword = $row->password;
            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        $this->db->beginTransaction();
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        $this->db->execute();
        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
