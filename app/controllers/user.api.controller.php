<?php
require_once './app/models/user.model.php';
require_once './app/controllers/api.controller.php';
require_once 'app/helpers/auth.api.helper.php';

class UserApiController extends ApiController{
    private $model;

    public function __construct(){
        parent::__construct();
        $this->model = new UserModel();
    }

    public function getToken($params = []){
        $basic = $this->authHelper->getAuhtHeaders();

        if(empty($basic)){
            $this->view->response('No envió encabezados de autenticación',401);
            return;
        }

        $basic = explode(' ', $basic);

        if($basic[0]!="Basic"){
            $this->view->response('Encabezados de autenticación incorrectos!',401);
            return;
        }

        $userpass = base64_decode($basic[1]); 
        $userpass = explode(":", $userpass); 

        $email = $userpass[0];
        $password = $userpass[1];

        $user = $this->model->getByEmail($email);

        $userdata = [ "name" => $user, "id" => 123, "role" => 'ADMIN' ]; // Llamar a la DB

            if($user && password_verify($password, $user->password)) {
                
                $token = $this->authHelper->createToken($userdata);
                $this->view->response($token, 200);
            } else {
                $this->view->response('El usuario o contraseña son incorrectos.', 401);
            }
        }


 
}

?>