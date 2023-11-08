<?php
require_once 'Model/Cravatte.php';
class cravatteController {
  private $model;
  public function __construct($pdo) {
  $this->model = new cravatte($pdo);
  }
  public function getAllcravatte() {
  return $this->model->getAllCravate();
  }
  public function getcravatteById($id) {
  return $this->model->getCravatteById($id);
  }
  public function createcravatte($data) {
  
  
  return $this->model->createCravatte($data);
  }
  public function updateCravatte($id, $data) {
  return $this->model->updateCravatte($id, $data);
  }
  public function deleteCravatte($id) {
  return $this->model->deleteCravatte($id);
  }

  
   

}
?>