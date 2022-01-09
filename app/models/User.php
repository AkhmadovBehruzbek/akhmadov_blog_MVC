<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class User
{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUsers() {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }

    public function getPosts() {
        $this->db->query("SELECT * FROM posts ORDER BY `created_at` ASC ");
        return $this->db->resultSet();
    }

    public function register($data) {
        $this->db->query("INSERT INTO users (`username`, `email`, `password`) VALUES (:username, :email, :password)");

        // Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // execute function
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function login($username, $password) {
        $this->db->query("SELECT * FROM users WHERE username = :username");

        // Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (($row->role === 'user') && (password_verify($password, $hashedPassword))) {
            return $row;
        }
        return false;
    }

    // Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        // prepared statement
        $this->db->query("SELECT COUNT(*) AS count FROM users where `email` = :email");

        // Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        // Check if email is already registered
        $row = $this->db->single();

        $email_count = $row->count;

        return $email_count;
    }
}