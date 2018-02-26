<?php
require_once 'handlers/print.php'; 
class GestView{
    
    public function addGest($groups){
       Print_out::addGestForm($groups); 
    }
    public function allGests($allGests){
        Print_out::allGests($allGests);
    }
    
   
}
?>