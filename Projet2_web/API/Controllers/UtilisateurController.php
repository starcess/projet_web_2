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
    $data['mot_de_passe'] = password_hash(
      $data['mot_de_passe'],
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
    if ($user) {
      if (password_verify($password, $user['password'])) {
        return true;
      }
    }
    return false;
  }
  public function grantAdminAccess($email, $password)
  {
    if ($this->verifyUser($email, $password)) {
      $user = $this->model->getUserByEmailAndPassword($email,$password);
      session_start();
      if ($user['role'] == 'admin') {
        $_SESSION['admin']['isAuth'] = true;
        $_SESSION['admin']['role'] = 'admin';
      } else {
        $_SESSION['admin']['isAuth'] = false;
      }
    }
  }
  public function login($email, $password)
  {
    if ($this->verifyUser($email, $password)) {

      $_SESSION['authentifie'] = true;
      $this->grantAdminAccess($email, $password);
    }
  }
}
?>