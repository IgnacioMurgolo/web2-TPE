<?php
require_once '../TPE/app/models/model.php';

class ModelosModel extends DB
{
    public function getModelos()
    {
        $query = $this->connect()->prepare('SELECT modelo FROM caracteristica');
        $query->execute();
        $modelos = $query->fetchAll(PDO::FETCH_OBJ);

        return $modelos;
    }

    public function getAllModelos()
    {
        $query = $this->connect()->prepare('SELECT * FROM caracteristica');
        $query->execute();
        $modelos = $query->fetchAll(PDO::FETCH_OBJ);

        return $modelos;
    }

    public function getProperties($modelo)
    {
        $query = $this->connect()->prepare('SELECT * FROM caracteristica JOIN moto ON caracteristica.modelo = moto.modelo WHERE caracteristica.modelo=? ');
        $query->execute([$modelo]);
        $prop = $query->fetchAll(PDO::FETCH_OBJ);

        return $prop;
    }
    public function verifyModeloMoto($modelo)
    {
        $query = $this->connect()->prepare('SELECT modelo FROM moto WHERE modelo=?');
        $query->execute([$modelo]);
        $existe = $query->fetchAll(PDO::FETCH_OBJ);
        return $existe;
    }

    public function deleteModelo($modelo)
    {
        $query = $this->connect()->prepare('DELETE FROM caracteristica WHERE modelo=?');
        $query->execute([$modelo]);
    }

    public function getModeloByModelo($modelo)
    {
        $query = $this->connect()->prepare('SELECT * FROM caracteristica WHERE modelo=?');
        $query->execute([$modelo]);

        $modelo = $query->fetchAll(PDO::FETCH_OBJ);
        return $modelo;
    }

    public function updateModelo($modelo, $velocidad, $cilindrada, $tipo_uso, $capacidad){
        $query = $this->connect()->prepare('UPDATE caracteristica SET velocidad_max=?, cilindrada=?, tipo_uso=?, capacidad_tanque=? WHERE modelo=?');
        $query->execute([$velocidad, $cilindrada, $tipo_uso, $capacidad, $modelo]);
    }

    public function addModelo($modelo, $velocidad, $cilindrada, $tipo_uso, $capacidad){
        $query = $this->connect()->prepare('INSERT INTO caracteristica (modelo, velocidad_max, cilindrada, tipo_uso, capacidad_tanque) VALUES (?,?,?,?,?)');
        $query->execute([$modelo, $velocidad, $cilindrada, $tipo_uso, $capacidad]);
    }
}


?>