<?php

require __DIR__ . "/../Model/Utilisateur.php";

class UtilisateurController
{
  private $model;
  public function __construct($pdo)
  {
    $this->model = new Utilisateur($pdo);
  }
  public function getAllUsers()
  {
    return $this->model->getAllUsers();
  }

  public function getUserById($id)
  {
    return $this->model->getUserById($id);
  }

  public function getUserByEmail($email)
  {
    return $this->model->getUserByEmail($email);
  }

  public function createUser($data)
  {
    $userAlreadyExist = $this->checkUserAlreadyExist($data);
    echo 'userAlreadyExist : ' . $userAlreadyExist . '<br>';
    if ($userAlreadyExist) {
      echo 'DB_763 : no users were added <br>';
      return false;
    } else {

      $data['password'] = password_hash(
        $data['password'],
        PASSWORD_DEFAULT
      );
      return $this->model->createUser($data);
    }
  }

  public function checkUserAlreadyExist($data)
  {
    $email = $data['email'];
    $users = $this->getAllUsers();
    if (count($users) > 0) {
      for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]['Courriel'] == $email) {
          return true;
        }
      }
    }
    return false;
  }

  public function updateUser($id, $data)
  {
    return $this->model->updateUser($id, $data);
  }
  public function deleteUser($id)
  {
    return $this->model->deleteUser($id);
  }

  private function verifyUser($email, $password)
  {
    $user = $this->model->getUserByEmail($email);
    print_r($user);
    print("<br>");
    if ($user) {
      $isPassword = password_verify($password, $user['MotDePasse']);
      print("UtlisateurContoller - RB_2976 - isPassword : " . $isPassword . "<br>");
      if ($isPassword) {
        return true;
      }
    }
    return false;
  }


  public function login($email, $password)
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    $userIsInDatabase = $this->verifyUser($email, $password);
    print("UtlisateurContoller - RB_2973 " . $userIsInDatabase . "<br>");
    if ($userIsInDatabase) {
      $_SESSION['isAuthenticated'] = true;
      print("UtlisateurContoller - RB_2974 " . $_SESSION['isAuthenticated'] . "<br>");
    } else {
      $_SESSION['isAuthenticated'] = false;
      print("UtlisateurContoller - RB_2975 " . $_SESSION['isAuthenticated'] . "<br>");
    }
  }




  public function logout()
  {
    $_SESSION['isAuthenticated'] = false;
  }


}




// public function grantAdminAccess($email, $password)
// {
//   if ($this->verifyUser($email, $password)) {
//     // $user = $this->model->getUserByEmailAndPassword($email,$password);
//     // session_start();
//     // if ($user['role'] == 'admin') {
//     $_SESSION['isAuthenticated'] = true;
//     // $_SESSION['admin']['role'] = 'admin';
//   } else {
//     $_SESSION['isAuthenticated'] = false;
//   }
// }
?>