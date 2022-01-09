<?php

class Post
{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findAllPosts() {
        $this->db->query("SELECT * FROM posts ORDER BY created_at ASC");
        return $this->db->resultSet();
    }

    public function postBody($id) {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}