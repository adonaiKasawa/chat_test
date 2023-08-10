<?php

class Login_model extends Model{

    function __construct() {
        parent:: __construct();
    }

    function getUserByEmail(string $email) {
        return $this->db->select("SELECT * FROM users where email =:email", array("email" => $email));
    }

    function saveUser(array $data) {
        return $this->db->insert("users", $data);
    }
}