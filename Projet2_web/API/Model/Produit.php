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
    public function getProduitById($id)
    {
        $sql = "SELECT * from produit where id=$id ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    public function getProduitByType($type)
    {
        $sql = "SELECT * from produit where type=$type ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    public function getProduitByName($name)
    {
        $sql = "SELECT * from produit where image = ? ";
        $result = $this->db->prepare($sql);
        $result->execute([$name]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    // public function filtrerProduits($type, $couleur, $minPrice, $maxPrice)
    // {
    //     $sql = "SELECT * FROM produit WHERE (:type IS NULL OR type = :type) AND 
    //                                       (:couleur IS NULL OR FIND_IN_SET(:couleur, couleur) > 0) AND 
    //                                       (:minPrice IS NULL OR prix >= :minPrice) AND 
    //                                       (:maxPrice IS NULL OR prix <= :maxPrice)";

    //     $result = $this->db->prepare($sql);

    //     $result->bindParam(':type', $type, $type === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
    //     $result->bindParam(':couleur', $couleur, $couleur === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
    //     $result->bindParam(':minPrice', $minPrice, $minPrice === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
    //     $result->bindParam(':maxPrice', $maxPrice, $maxPrice === null ? PDO::PARAM_NULL : PDO::PARAM_STR);

    //     $result->execute();

    //     return $result->fetchAll(PDO::FETCH_ASSOC);
    // }


    public function filtrerProduits($type, $couleur, $minPrice, $maxPrice)
    {

        // echo "Type: " . $type . "<br>" . "Couleur: " .
        //  $couleur . "<br>" . "Minimum Price: " .
        // $minPrice . "<br>"
        // . "Maximum Price: " . $maxPrice . "<br>";

        $typePart = $type ? "type = '$type'" : '1'; // '1' is always true, so it acts like ignoring this condition
        $couleurPart = $couleur ? "FIND_IN_SET('$couleur', couleur) > 0" : '1';
        $minPricePart = $minPrice ? "prix >= $minPrice" : '1';
        $maxPricePart = $maxPrice ? "prix <= $maxPrice" : '1';

        $sql = "SELECT * FROM produit WHERE $typePart AND $couleurPart AND $minPricePart AND $maxPricePart";

        $result = $this->db->prepare($sql);
        $result->execute();
        // print_r($result);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduitByCouleur($couleur)
    {
        $sql = "SELECT * from produit where $couleur in couleur ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    public function getProduitByPrix($prix)
    {
        $sql = "SELECT * from produit where prix=$prix ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }

    public function getProduitByTaille($taille)
    {
        $sql = "SELECT * from produit where type=$taille ";
        $result = $this->db->query($sql);
        return $result->fetch();
    }


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