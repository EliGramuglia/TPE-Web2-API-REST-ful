<?php

class ClubesModel{
    private $db;

    function __construct(){
        $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . NAME, USER, PASSWORD);
    }

    public function getClubes(){
        $query = $this->db->prepare('SELECT * FROM club');   
        $query->execute();

        $clubes = $query->fetchall(PDO::FETCH_OBJ);
        return $clubes;
    }


    public function getClub($id){
        $query = $this->db->prepare('SELECT * FROM club WHERE id_club=?;');  
        $query->execute([$id]);

        $club = $query->fetchAll(PDO::FETCH_OBJ);
        return $club;
    }

    public function insertClub($nombre, $fundacion, $titulosN, $titulosI){
        $query = $this->db->prepare('INSERT INTO club (Nombre_club, Fundacion, Titulos_nacionales, Titulos_internacionales) VALUES(?,?,?,?)');
        $query->execute([$nombre, $fundacion, $titulosN, $titulosI]);

        return $this->db->lastInsertId();
    }

    public function deleteClub($id){
        $query = $this->db->prepare('DELETE FROM jugadores WHERE jugadores.id_club=?');
        $query->execute([$id]);
        $query = $this->db->prepare('DELETE FROM club WHERE club.id_club=?');
        $query->execute([$id]);
    }



    public function updateClub($nombre, $fundacion, $titulosN, $titulosI, $id){
        $query = $this->db->prepare('UPDATE club SET Nombre_club=?, Fundacion=?, Titulos_nacionales=?, Titulos_Internacionales=? WHERE id_club=?');
        $response = $query->execute([$nombre, $fundacion, $titulosN, $titulosI, $id]);

        return $response;
    }

}

?>