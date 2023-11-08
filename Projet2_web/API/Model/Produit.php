<?php

class Produit
{

    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }
    public function getAllProduit()
    {
        $sql = "SELECT * FROM produit";
        $result = $this->db->query($sql);
        return $result->fetchAll();
    }
    public function getProduitById($id){
        $sql = "SELECT * from produit where id=$id ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    public function getProduitByType($type){
        $sql = "SELECT * from produit where type=$type ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    // 
    public function getProduitByCouleur($couleur){
        $sql = "SELECT * from produit where coul$couleur in couleur ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    public function getProduitByPrix($prix){
        $sql = "SELECT * from produit where prix=$prix ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    public function getProduitByTaille($taille){
        $sql = "SELECT * from produit where type=$taille ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    // 

    public function createProduit($data)
    {
        $sql = "INSERT INTO produit (prix,description,image,type ) VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$data['prix'], $data['description'], $data['image'], $data['type']]);
    }
    public function updateProduit($id, $data)
    {
        $sql = "UPDATE produit SET prix = ?, description = ?, image = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data['prix'], $data['description'], $data['image'], $id);
    }
    public function deleteProduit($id)
    {
        $sql = "DELETE FROM produit WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }

}