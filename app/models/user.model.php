<?php
require_once '../TPE/app/models/model.php';

class UserModel extends DB
{
    public function getByUsername($usuario)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE usuario = ?');
        $query->execute([$usuario]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}


?>