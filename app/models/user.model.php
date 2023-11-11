<?php 
class UserModel{
    private $db;

    function __construct(){
        $this->db = new PDO("mysql:host=" . HOST . ";dbname=" . NAME, USER, PASSWORD);
    }

    public function getByEmail($email){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}


?>
