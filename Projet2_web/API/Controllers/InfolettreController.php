<?php

require __DIR__ . "/../Model/Infolettre.php";

class InfolettreController
{
    private $model;
    public function __construct($pdo)
    {
        $this->model = new Infolettre($pdo);
    }
    public function getAllInfolettres()
    {
        return $this->model->getAllInfolettres();
    }

    public function getInfolettreByEmail($email)
    {
        return $this->model->getInfolettreByEmail($email);
    }

    public function createInfolettre($data)
    {
        $infolettreAlreadyExist = $this->checkInfolettreAlreadyExist($data);
        echo 'infolettreAlreadyExist : ' . $infolettreAlreadyExist . '<br>';
        if ($infolettreAlreadyExist) {
            echo 'DB_763 : you are already suscribed <br>';
            return false;
        } else {
            return $this->model->createInfolettre($data);
        }
    }

    public function checkInfolettreAlreadyExist($data)
    {
        $email = $data['email'];
        $users = $this->model->getAllInfolettre();
        if (count($users) > 0) {
            for ($i = 0; $i < count($users); $i++) {
                if ($users[$i]['Courriel'] == $email) {
                    return true;
                }
            }
        }
        return false;
    }

    public function deleteInfolettre($id)
    {
        return $this->model->deleteInfolettre($id);
    }



}

