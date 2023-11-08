

<?php

require __DIR__ . "/../Model/Produit.php";

class ProduitController
{
  private $model;
  public function __construct($pdo)
  {
    $this->model = new Produit($pdo);
  }
  public function getAllProduit()
  {
    return $this->model->getAllProduit();
  }
  public function getProduitById($id)
  {
    return $this->model->getProduitById($id);
  }
  public function createProduit($data)
  {


    return $this->model->createProduit($data);
  }
  public function updateProduit($id, $data)
  {
    return $this->model->updateProduit($id, $data);
  }
  public function deleteProduit($id)
  {
    return $this->model->deleteProduit($id);
  }




}
?>