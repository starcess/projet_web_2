<?php
require_once 'Model/Chemise.php';
class chemiseController {
  private $model;
  public function __construct($pdo) {
  $this->model = new Chemise($pdo);
  }
  public function getAllChemise() {
  return $this->model->getAllChemise();
  }
  public function getcravatteById($id) {
  return $this->model->getChemiseById($id);
  }
  public function createcravatte($data) {
  
  
  return $this->model->createChemise($data);
  }
  public function updateChemise($id, $data) {
  return $this->model->updateChemise($id, $data);
  }
  public function deleteCravatte($id) {
  return $this->model->deleteChemise($id);
  }

  
   

}
?>