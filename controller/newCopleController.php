<?php
require_once 'handlers/db_handler.php';

class NewCoupleController{

    public function addNewCouple(){
        $name = $_POST['newCouple'];
        Db_handler::newCouple($name);
    }

}