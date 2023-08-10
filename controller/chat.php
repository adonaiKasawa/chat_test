<?php

class Chat extends Controller
{

  function __construct()
  {
    parent::__construct();
    Session::init();
    $this->view->js = array("chat/js/chat.js");
    if (!isset($this->user["id"])) {
      header("location:" . LOGIN);
    }
  }

  function index()
  {
    $this->view->render('chat/index');
  }

  function getAllUsers()
  {
    $users = $this->model->getAll("users");

    if (!empty($users)) {
      $output = '';
      foreach ($users as $key) {

        if ($key['id'] !== $this->user["id"]) {
          $checkInvitation = $this->model->checkInvitation($this->user["id"], $key['id']);
          if (empty($checkInvitation)) {
            $output .= '
          <li>
            <a class="dropdown-item" href="#">
            ' . $key['username'] . '
            <button class="btn btn-info sendInvitation" id="' . $key['id'] . '">
              inviter
            </button>
            </a>
          </li>
          ';
          }
        }
      }
      echo $output;
    }
  }

  function getAllInvitation()
  {
    $users = $this->model->getAll("users");

    if (!empty($users)) {
      $output = '';
      foreach ($users as $key) {
        if ($key['id'] !== $this->user["id"]) {
          $checkInvitation = $this->model->checkInvitation($this->user["id"], $key['id']);
          if ($checkInvitation) {
            if ($checkInvitation[0]["to_user_id"] == $this->user["id"] && $checkInvitation[0]['status_invitation'] == false) {
              $output .= '<li> <a class="dropdown-item" href="#">' . $key['username'] . '
                <button class="btn btn-info acceptInvitation" id="' . $key['id'] . '">
                  accepter
                </button>
                <button class="btn btn-danger refuseInvitation" id="' . $key['id'] . '">
                refuser
              </button>
                </a>
            </li> ';
            }
           
          }
        }
      }
      echo $output;
    }
  }

  function sendInvitation()
  {
    if (isset($_POST["user_id"])) {
      $id = htmlspecialchars($_POST['user_id']);
      if ($id != $this->user['id']) {
        $checkInvitation = $this->model->checkInvitation($this->user["id"], $id);
        if (empty($checkInvitation)) {
          $saveInvitation = $this->model->saveInvitation(
            array(
              "from_user_id" => $this->user['id'],
              "to_user_id" => $id,
              "status_invitation" => 0,
              "create_time" => $this->date_time()
            )
          );
          if ($saveInvitation) {
            echo "success";
          } else {
            echo "Une erreur se produit lors de la demande d'amis";
          }
        } else {
          echo "L'utilisateur n'est pas valide";
        }
      } else {
        echo "L'utilisateur n'est pas valide";
      }
    } else {
      echo "L'utilisateur n'est pas valide";
    }
  }

  function acceptInvitationOrrefuseInvitation() {
    if (isset($_POST["user_id"])) {
      $id = htmlspecialchars($_POST['user_id']);
      $type = htmlspecialchars($_POST["type"]);
      if ($id != $this->user['id']) {
        $checkInvitation = $this->model->checkInvitation($this->user["id"], $id);
        if (!empty($checkInvitation)) {
          $acceptInvitation = $type == "accepte" ? $this->model->acceptInvitation($this->user["id"]) : $this->model->refuseInvitation($this->user["id"]);; 
          if ($acceptInvitation) {
            echo "success";
          } else {
            echo "Une erreur se produit lors de la demande d'amis";
          }
        } else {
          echo "L'utilisateur n'est pas valide1";
        }
      } else {
        echo "L'utilisateur n'est pas valide3";
      }
    } else {
      echo "L'utilisateur n'est pas valide4";
    }
  }

  function getAllFriends()
  {
    $users = $this->model->getAll("users");

    if (!empty($users)) {
      $output = '';
      foreach ($users as $key) {
        if ($key['id'] !== $this->user["id"]) {
          $checkInvitation = $this->model->checkInvitation($this->user["id"], $key['id']);
          if ($checkInvitation) {
            if ($checkInvitation[0]["status_invitation"]) {
              $output .= '<li class="list-group-item getChat" id="'.$key['id'].'">' . $key['username'] . '</li> ';
            }
          }
        }
      }
      echo $output;
    }
  }

  function getChat() {
    if (isset($_POST["user_id"])) {
      $user = htmlspecialchars($_POST['user_id']);
      $getChat = $this->model->getChat($user, $this->user["id"]);
      if (!empty($getChat)) {
        $output = "";
        foreach($getChat as $key){
          if ($key['from_user_id'] == $this->user["id"]) {
            $output .= '<div class="col-12 bg-danger">
            '.$key['messages'].'
            </div>';
          }else{
            $output .= '<div class="col-12 bg-info">
            '.$key['messages'].'
            </div>';
          }
          
        }
        echo $output;
      }
    }else{
      echo "Pas d'utilisateur";
    }
  }

  function sendMessage() {
    // print_r($_POST);
    // die;
    if (isset($_POST["user_id"])) {
      $user = htmlspecialchars($_POST['user_id']);
      $msg = htmlspecialchars(trim($_POST['msg']));
      if ($user !== 0 && !empty($msg)) {
        $save = $this->model->saveMessage(
          array(
            "from_user_id" => $this->user['id'],
            "to_user_id" => $user,
            "messages" => $msg,
            "vibilite" => 0,
          )
        );
        if ($save) {
          echo "success";
        }else{
          echo "erreur d'envoie de message";
        }
      }else{
        echo "Message vide";
      }
    }
  }
}
