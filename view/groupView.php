<?php
require_once 'handlers/print.php'; 
class GroupViewiew{
    
    public function allGroups($allGroups){
       Print_out::allGroups($allGroups); 
    }
    public function addGroup(){
      Print_out::addGroup();
    }
   
}
?>