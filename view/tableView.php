<?php
require_once 'handlers/print.php'; 
class TableView{
    
    public function allTables($Tables){
       Print_out::allTables($Tables); 
    }
    public function addTable(){
      Print_out::addTable();
    }
   
}
?>