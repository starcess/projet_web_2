<?php

class Cravatte extends Produit{

    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }
    public function getAllCravate()
    {
        $sql = "SELECT * FROM cravate c 
        inner join produit p on c.produit_id= p.id
        where p.type= cravatte
        ";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCravatteById($id){
        $sql = "SELECT * from cravatte where id=$id ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }
    public function getAllChemiseByPrix($prix)
    {
        $sql = "SELECT c.*, p.prix
        FROM cravatte c
        INNER JOIN produit p ON c.produit_id = p.id
        WHERE p.prix <= $prix
        ORDER BY p.prix DESC";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCravatteByColor($color)
    {
        $sql = "SELECT c.*
        FROM cravate c
        where c.couleur= $color";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCravattebytaille($taille)
    {
        $sql = "SELECT c.*
        FROM cravate c
        where c.taille= $taille";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createCravatte($data)
    {
        $sql = "INSERT INTO cravate (taille,couleur) VALUES (?,?)";
        $stmt = $this->db->prepare($sql);       
        return $stmt->execute($data['taille'],$data['couleur']);
    }
    public function updateCravatte($id, $data)
    {
        $sql = "UPDATE cravate SET taille = ?, couleur =? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data['taille'],$data['couleur'],$id);
    }
    public function deleteCravatte($id)
    {
        $sql = "DELETE FROM cravate WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

}

