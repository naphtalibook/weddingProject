<?php
require_once 'handlers/db_handler.php';
require_once 'controller/tableController.php';
require_once 'controller/gorupController.php';
class GestController{
    
    public function getGroupsForForm(){
        $Group = new GroupController();
        return $Group->getAllGroups();
    }
    public function addGests(){
        $coupleId = $_SESSION['coupleId'];
        $firstName = $_POST['firstName'];
        $famelyName = $_POST['familyName'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $group1 = $_POST['group1'];
        $group2 = $_POST['group2'];
        $group3 = $_POST['group3'];
        $resault = Db_handler::addGest($coupleId,$firstName,$famelyName,$age,$gender,$phone,$group1,$group2,$group3);
        if ($resault){
            return true;
        }else{
            return false;
        }
    }
    public function getAllGests(){
        $allGests = Db_handler::getAllGests();
        if($allGests != false){
            return $allGests;
        }else{
            return false;
        }  
    }
     public function gestArrive(){
        $gestId = $_POST['getstArrive'];
        $allGests = Db_handler::gestArrive($gestId);
        if($allGests != false){
            return $allGests;
        }else{
            return false;
        }  
    }
     public function deleteGest(){
        $gestId = $_POST['deleteGest'];
        $resault = Db_handler::deleteGest($gestId);
        if($resault != false){
            return $resault;
        }else{
            return false;
        }  
    }
}

