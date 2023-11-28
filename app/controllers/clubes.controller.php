<?php
require_once './app/models/clubes.model.php';
require_once './app/controllers/api.controller.php';
require_once './app/helpers/auth.api.helper.php';


class ClubesController extends ApiController{
    private $model;
    private $authHelper;

    public function __construct(){
        parent::__construct();
        $this->model = new ClubesModel();
        $this->authHelper = new AuthHelper();
    }

    public function get($params = []){
        if(empty($params)){
            $clubes = $this->model->getClubes();
            $this->view->response($clubes, 200);
        }else{
            $club = $this->model->getClub($params[':ID']); 
            if(!empty($club)){
                $this->view->response($club, 200);
            }else{
                $this->view->response(['msg' => 'No existe un Club con el ID = '.$params[':ID']. ' '], 404);
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
        $jugador = $this->model->getClub($id);

        if($jugador) {
            $this->model->deleteClub($id); 
            $this->view->response('Se eliminó con éxito el Club con id='.$id.' ', 200);
        } else {
            $this->view->response('El Club con id='.$id.' no existe.', 404);
        }
    }

    public function create($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user){
            $this->view->response('Usuario no autorizado', 401);
            return;
        }

        $body = $this->getData();

        $nombre = $body->Nombre_club;
        $fundacion = $body->Fundacion;
        $titulosN = $body->Titulos_nacionales;
        $titulosI = $body->Titulos_internacionales;

        if (empty($nombre) || empty($fundacion)) { 
            $this->view->response("Complete todos los datos", 400);
        } else{
            $id = $this->model->insertClub($nombre, $fundacion, $titulosN, $titulosI);

            if($id){
                $club = $this->model->getClub($id);
                $this->view->response($club, 201);
            } else{
                $this->view->response(['msg' => 'Error al insertar Club!'],404);
            }  
        }
    }


    public function update($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user){
            $this->view->response('Usuario no autorizado', 401);
            return;
        }

        $id = $params[':ID'];
        $club = $this->model->getClub($id);

        if ($club) {
            $body = $this->getData();

            $nombre = $body->Nombre_club;
            $fundacion = $body->Fundacion;
            $titulosN = $body->Titulos_nacionales;
            $titulosI = $body->Titulos_internacionales;

            if (empty($nombre) || empty($fundacion)) { 
                $this->view->response("Complete todos los datos", 400);
            }else{
                $this->model->updateClub($nombre, $fundacion, $titulosN, $titulosI, $id);
                $this->view->response("El Club con id= $id ha sido modificado", 200);
            }
        } else {
            $this->view->response("El Club con id=$id no existe", 404);
        }
    }

}

?>