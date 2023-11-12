<?php
require_once './app/models/jugadores.model.php';
require_once './app/controllers/api.controller.php';
require_once './app/helpers/auth.api.helper.php';

class JugadoresController extends ApiController{
    private $model;
    private $authHelper;

    public function __construct(){
        parent::__construct();
        $this->model = new JugadoresModel();
        $this->authHelper = new AuthHelper();
    }

    public function get($params = []){
        if(empty($params)){
            $jugadores = $this->model->getJugadores();
            $this->view->response($jugadores, 200);
        }else{
            $jugador = $this->model->getJugador($params[':ID']);
            if(!empty($jugador)){
                $this->view->response($jugador, 200);
            }else{
                $this->view->response(['msg' => 'No existe un jugador con el ID = '.$params[':ID']. ' '], 404);
            }
        }
    }

    public function delete($params = []) {
        $user = $this->authHelper->currentUser();
        if(!$user){
            $this->view->response('Usuario no autorizado', 401);
            return;
        } 

        $id = $params[':ID'];
        $jugador = $this->model->getJugador($id);

        if($jugador) {
            $this->model->deleteJugador($id);
            $this->view->response('Se eliminó con éxito el jugador con id='.$id.' ', 200);
        } else {
            $this->view->response('El jugador con id='.$id.' no existe.', 404);
        }
    }


    
    public function create($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user){
            $this->view->response('Usuario no autorizado', 401);
            return;
        }

        $body = $this->getData();

        $nombre = $body->Nombre;
        $edad = $body->Edad;
        $posicion = $body->Posicion;
        $goles = $body->Cantidad_de_goles;
        $id_club = $body->id_club;

        if (empty($nombre) || empty($edad) || empty($posicion) || empty($id_club)) { 
            $this->view->response("Complete todos los datos", 400);
        } else{
            $id = $this->model->insertJugador($nombre, $edad, $posicion, $goles, $id_club);

            if($id){
                $jugador = $this->model->getJugador($id);
                $this->view->response($jugador, 201);
            } else{
                $this->view->response(['msg' => 'Error al insertar jugador!'],404);
            }  
        }
    }


    public function update($params = []) {
        $user = $this->authHelper->currentUser();
        if(!$user){
            $this->view->response('Usuario no autorizado', 401);
            return;
        }

        $id = $params[':ID'];
        $jugador = $this->model->getJugador($id);

        if ($jugador) {
            $body = $this->getData();
            $nombre = $body->Nombre;
            $edad = $body->Edad;
            $posicion = $body->Posicion;
            $goles = $body->Cantidad_de_goles;
            $id_club = $body->id_club;

            $this->model->updateJugador($nombre, $edad, $posicion, $goles, $id_club, $id);
            $this->view->response("El jugador con id= $id ha sido modificado", 200);
        } else {
            $this->view->response("El jugador con id=$id no existe", 404);
        }
    }

}

?>