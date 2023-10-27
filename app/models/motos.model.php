<?php
require_once 'app/models/model.php';

class MotosModel extends DB
{
    public function getMotos()
    {
        $query = $this->connect()->prepare('SELECT * FROM moto');
        $query->execute();
        $motos = $query->fetchAll(PDO::FETCH_OBJ);

        return $motos;
    }

    public function getPropertiesById($id)
    {
        $query = $this->connect()->prepare('SELECT * FROM moto JOIN caracteristica ON moto.modelo = caracteristica.modelo WHERE moto.id=? ');
        $query->execute([$id]);
        $moto = $query->fetchAll(PDO::FETCH_OBJ);

        return $moto;
    }

    public function getMotoById($id)
    {
        $query = $this->connect()->prepare('SELECT * FROM moto WHERE id=?');
        $query->execute([$id]);
        $moto = $query->fetchAll(PDO::FETCH_OBJ);

        return $moto;
    }

    public function updateMoto($id, $marca, $modelo, $anio, $precio)
    {
        $query = $this->connect()->prepare('UPDATE moto SET marca=?, modelo=?, anio=?, precio=? WHERE id=?');
        $query->execute([$marca, $modelo, $anio, $precio, $id]);
    }

    public function deleteMoto($id){
        $query = $this->connect()->prepare('DELETE FROM moto WHERE id=? ');
        $query->execute([$id]);
    }

    public function addMoto($marca, $modelo, $anio, $precio){
        $query = $this->connect()->prepare('INSERT INTO moto (marca,modelo,anio,precio) VALUES (?,?,?,?)');
        $query->execute([$marca, $modelo, $anio, $precio]);
    }

}

?>