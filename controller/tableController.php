<?php
require_once 'handlers/db_handler.php';
class TableController{

    public function getAllTables(){
        $allTables = Db_handler::getAllTables();
        if($allTables != false){
            return $allTables;
        }else{
            return false;
        }  
    }
    public function addTable(){
        $tableNumber = $_POST['tableNumber'];
        $seats = $_POST['seats'];
        $coupleId = $_SESSION['coupleId'];
        $resault = Db_handler::addTable($coupleId,$tableNumber,$seats);
        if ($resault){
            return true;
        }else{
            return false;
        }
    }
    public function deleteTable(){
        $tabletId = $_POST['deleteTable'];
        $resault = Db_handler::deleteTable($tabletId);
        if($resault != false){
            return $resault;
        }else{
            return false;
        }  
    }
}

?>