<?php

class Infolettre
{

    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }
    public function getAllInfolettre()
    {
        $sql = "SELECT * FROM infolettre";
        $result = $this->db->query($sql);
        return $result->fetchAll();
    }

    public function createInfolettre($data)
    {
        $sql = "INSERT INTO infolettre (Prenom, Nom, Courriel) VALUES (?,?,?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['prenom'],
            $data['nom'],
            $data['email']
        ]);
    }

    public function deleteInfolettre($email)
    {
        $sql = "DELETE FROM infolettre WHERE Courriel = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$email]);
    }
}


// public function getInfolettreById($id){
//     $sql = "SELECT * from infolettre where id=$id ";
//     $result = $this->db->query($sql);
//     return $result->fetch();
// }



// public function updateInfolettre($id, $data)
// {
//     $sql = "UPDATE infolettre SET prix = ?, description = ?, image = ? WHERE id = ?";
//     $stmt = $this->db->prepare($sql);

//     return $stmt->execute($data['prix'], $data['description'], $data['image'], $id);
// }

