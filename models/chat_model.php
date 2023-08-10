<?php

class Chat_model extends Model
{

  function __construct()
  {
    parent::__construct();
  }

  function getUserByEmail(string $email)
  {
    return $this->db->select("SELECT * FROM users where email =:email", array("email" => $email));
  }

  function checkInvitation($from, $to)
  {
    return $this->db->select("SELECT * FROM invitation WHERE ( (from_user_id =:from_user and to_user_id = :to_user) || (from_user_id =:to_user and to_user_id = :from_user) )", array("from_user" => $from, "to_user" => $to));
  }

  function saveInvitation(array $data)
  {
    return $this->db->insert("invitation", $data);
  }

  function acceptInvitation($id)
  {
    return $this->db->update("invitation", array("status_invitation" => 1), "to_user_id = $id");
  }

  function refuseInvitation($id)
  {
    return $this->db->delete("invitation", "to_user_id = $id");
  }
  
  function getChat($from, $to)  {
    return $this->db->select("SELECT * FROM messages WHERE ( (from_user_id =:from_user and to_user_id = :to_user) || (from_user_id =:to_user and to_user_id = :from_user) )", array("from_user" => $from, "to_user" => $to));
  }

  function saveMessage(array $data) {
    return $this->db->insert("messages", $data);
  }

}
