<?php
require_once 'config.php';

class JugadoresModel{
    private $db;

    function __construct(){
        $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . NAME, USER, PASSWORD);
    }

    public function getJugadores(){
        $query = $this->db->prepare('SELECT jugadores. *, club.Nombre_club FROM jugadores JOIN club ON jugadores.id_club = club.id_club;');   
        $query->execute();

        $jugadores = $query->fetchall(PDO::FETCH_OBJ);
        return $jugadores;
    }

    public function getJugador($id){
        $query = $this->db->prepare('SELECT jugadores.*, club.Nombre_club
         FROM jugadores JOIN club ON jugadores.id_club = club.id_club WHERE jugadores.id= ?;');
        $query->execute([$id]);

        $jugador = $query->fetch(PDO::FETCH_OBJ);
        return $jugador;
    }

    public function insertJugador($nombre, $edad, $posicion, $goles, $id_club){
        $query = $this->db->prepare('INSERT INTO jugadores (Nombre, Edad, Posicion, Cantidad_de_goles, id_club) VALUES(?,?,?,?,?)');
        $query->execute([$nombre, $edad, $posicion, $goles, $id_club]);

        return $this->db->lastInsertId();
    }

    public function deleteJugador($id){
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id=?');
        $query->execute([$id]);
    }

    public function updateJugador($nombre, $edad, $posicion, $goles, $id_club, $id){
        $query = $this->db->prepare('UPDATE jugadores SET Nombre=?, Edad=?, Posicion=?, Cantidad_de_goles=?, id_club=? WHERE id=?');
        $response = $query->execute([$nombre, $edad, $posicion, $goles, $id_club, $id]);

        return $response;
    }
}