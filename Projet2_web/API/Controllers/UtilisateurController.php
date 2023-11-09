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
  public function createUser($data)
  {
    $data['password'] = password_hash(
      $data['password'],
      PASSWORD_DEFAULT
    );
    return $this->model->createUser($data);
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
    print_r( $user);    
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

  public function login($email, $password)
  {
    $userIsInDatabase = $this->verifyUser($email, $password);
    print("UtlisateurContoller - RB_2973 " .$userIsInDatabase . "<br>");
    if ($userIsInDatabase) {
      $_SESSION['isAuthenticated'] = true;
       print("UtlisateurContoller - RB_2974 " . $_SESSION['isAuthenticated'] . "<br>");
    } else {
      $_SESSION['isAuthenticated'] = false;
      print("UtlisateurContoller - RB_2975 " . $_SESSION['isAuthenticated'] . "<br>");
    }
  }

}
?>