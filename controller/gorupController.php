<?php
require_once 'handlers/db_handler.php';
class GroupController{

    public function getAllGroups(){
        $allGroups = Db_handler::getAllGroups();
        if($allGroups != false){
            return $allGroups;
        }else{
            return false;
        }  
    }
    public function addGroup(){
        $name = $_POST['groupName'];
        $coupleId = $_SESSION['coupleId'];
        $resault = Db_handler::addGroup($coupleId,$name);
        if ($resault){
            return true;
        }else{
            return false;
        }
    }
}

?>