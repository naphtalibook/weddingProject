<?php
require_once 'handlers/print.php'; 
class Login_view{
    
    public function printLogin($allCouples){
       Print_out::login($allCouples); //print is a class with static function that prints HTML
    }
    public function sucssesLogin(){
         Print_out::welcome();
    }
}
?>