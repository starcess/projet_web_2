<?php
class Utilisateur
{

    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM utilisateur";
        $result = $this->db->query($sql);
        return $result->fetchAll();
    }

    public function getUserById($id)
    {
        $result = $this->db->query("SELECT * FROM utilisateur WHERE id=?");
        $result->execute([$id]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserByEmail($email)
    {
        $result = $this->db->query("SELECT * FROM utilisateur WHERE courriel=?");
        $result->execute([$email]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function createUser($data)
    {
        $sql = "INSERT INTO utilisateur (Nom, Courriel,MotDePasse,InscritInfolettre,accesUser) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['Nom'],
            $data['Courriel'],
            $data['MotDePasse'],
            $data['InscritInfolettre'],
            $data['accesUser']
        ]);
    }
    public function updateUser($id, $data)
    {
        $sql = "UPDATE utilisateur SET name = ?, email = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute(
            $data['Nom'],
            $data['Courriel'],
            $data['MotDePasse'],
            $data['InscritInfolettre'],
            $data['accesUser'],
            $id
        );
    }
    public function deleteUser($id)
    {
        $sql = "DELETE FROM utilisateur WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }
}