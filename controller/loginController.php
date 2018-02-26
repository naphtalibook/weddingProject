
<?php
require_once 'handlers/db_handler.php';
class Login_controller{

    public function login(){
        $allCouples = Db_handler::get_all_couples();
        if($allCouples != false){
            return $allCouples;
        }else{
            return false;
        }  
    }
    
     public function getNameById($id){
        $name = Db_handler::getNameById($id);
        if($name != false){
            return $name;
        }else{
            return false;
        }  
    }
}

?>