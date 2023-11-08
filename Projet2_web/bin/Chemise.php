<?php


class Chemise extends Produit
{

    //     Liste des produits disponibles (cravates, chemises).
// ☺ Chaque produit doit avoir une image, une description, et un prix.
// ☺ Les cravates ont une taille unique.
// ☺ Les chemises sont disponibles dans les tailles italiennes allant de 44 à 56, avec des incréments de 2.
// ☺ Possibilité de filtrer les produits par type, couleur, taille ou gamme de prix.


    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }
    public function getAllChemise()
    {
        $sql = "SELECT * FROM cravate c 
        inner join produit p on c.produit_id= p.id
        where p.type= chemise ";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllChemiseByPrix($prix)
    {
        $sql = "SELECT c.*, p.prix
        FROM chemise c
        INNER JOIN produit p ON c.produit_id = p.id
        WHERE p.prix <= $prix
        ORDER BY p.prix DESC";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getChemiseById($id){
        $sql = "SELECT * from chemise where id=$id ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }
    public function getAllChemiseByColor($color)
    {
        $sql = "SELECT c.*
        FROM chemise c
        where c.couleur= $color";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllChemisebytaille($taille)
    {
        $sql = "SELECT *
        FROM chemise 
        where c.taille= $taille";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createChemise($data)
    {
        $sql = "INSERT INTO chemise (taille, couleur) VALUES (?,?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data['taille'], $data['couleur']);
    }
    public function updateChemise($id, $data)
    {
        $sql = "UPDATE chemise SET taille = ?, couleur = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data['taille'], $data['couleur']);
    }
    public function deleteChemise($id)
    {
        $sql = "DELETE FROM chemise WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }

}