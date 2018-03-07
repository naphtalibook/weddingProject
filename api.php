<?php
require_once 'session_start.php';

if(isset($_GET["action"]) && $_GET["action"] == 'logout'){
    $_SESSION['coupleId'] = null;
    header('Location: api.php?action=login');
}
if (isset($_GET["coupleId"])){
  require_once 'view/login_view.php';
  require_once 'controller/loginController.php';
  $_SESSION["coupleId"] = $_GET["coupleId"];
  $controller = new Login_controller();
  $coupleName = $controller->getNameById($_GET["coupleId"]);
  $_SESSION['coupleName'] = $coupleName;
  require_once 'top.php';
  $view = new login_view();

  $view->sucssesLogin();
}
require_once 'top.php';

$possible_url = array(
"login",
"tables",
"addgests",
"group",
"allgests",
"newcouple"
);

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)){

    switch ($_GET["action"]) 
    {
      case "login":{
        require_once 'controller/loginController.php';
        require_once 'view/login_view.php';
        $controller = new Login_controller();
        $allCouples = $controller->login();
        $view = new login_view();
        $view->printLogin($allCouples);
      break;
      }
      case "newcouple":{
        require_once 'controller/newCopleController.php';
        require_once 'view/newCopleview.php';
         $view = new NewCoupleView();
         $view->addCouple();
      break;
      }
      case "group":{
        require_once 'controller/gorupController.php';
        require_once 'view/groupView.php';
        $controller = new GroupController();
        $allGroups = $controller->getAllGroups();
        $view = new GroupViewiew();
        if($allGroups){
          $view->allGroups($allGroups);
        }
        
        $view->addGroup();
      break;
      }
      case "tables":{
        require_once 'controller/tableController.php';
        require_once 'view/tableView.php';
        $controller = new TableController();
        $allTables = $controller->getAllTables();
        $view = new TableView();
        if($allTables){
          $view->allTables($allTables);
        }
        $view->addTable();
      break;
      }
       case "addgests":{
        require_once 'controller/gestController.php';
        require_once 'view/gestView.php';
        $controller = new GestController();
        $groups = $controller->getGroupsForForm();
        $view = new GestView();
        $view->addGest($groups);
      break;
      }
       case "allgests":{
        require_once 'controller/gestController.php';
        require_once 'view/gestView.php';
        $controller = new GestController();
        $allGests = $controller->getAllGests();
        if($allGests){
          $view = new GestView();
          $view->allGests($allGests);
        }
        
      break;
      }
    }  
}

//////////////////////   POST   //////////////////
if(isset($_POST['addCouple'])){
    require_once 'controller/newCopleController.php';
    require_once 'view/newCopleview.php';
    $controller = new NewCoupleController();
    $controller->addNewCouple();
    $view = new NewCoupleView();
    $view->addCouple();
}
if(isset($_POST['addGroup'])){
    require_once 'controller/gorupController.php';
    require_once 'view/groupView.php';
    $controller = new GroupController();
    $controller->addGroup();
    $allGroups = $controller->getAllGroups();
    $view = new GroupViewiew();
    $view->allGroups($allGroups);
    $view->addGroup();
}
if(isset($_POST['addTable'])){
    require_once 'controller/tableController.php';
    require_once 'view/tableView.php';
    $controller = new TableController();
    $controller->addTable();
    $allTables = $controller->getAllTables();
    $view = new TableView();
    $view->allTables($allTables);
    $view->addTable();
}
if(isset($_POST['addGest'])){
    require_once 'controller/gestController.php';
    require_once 'view/gestView.php';
    $controller = new GestController();
    $controller->addGests();
    $groups = $controller->getGroupsForForm();
    $view = new GestView();
    $view->addGest($groups);
}
if(isset($_POST['getstArrive'])){
    require_once 'controller/gestController.php';
    require_once 'view/gestView.php';
    $controller = new GestController();
    $controller->gestArrive();
    $allGests = $controller->getAllGests();
    $view = new GestView();
    $view->allGests($allGests);
}
if(isset($_POST['deleteGest'])){
    require_once 'controller/gestController.php';
    require_once 'view/gestView.php';
    $controller = new GestController();
    $controller->deleteGest();
    $allGests = $controller->getAllGests();
    $view = new GestView();
    $view->allGests($allGests);
}
if(isset($_POST['deleteTable'])){
    require_once 'controller/tableController.php';
    require_once 'view/tableView.php';
    $controller = new TableController();
    $controller->deleteTable();
    $allTables = $controller->getAllTables();
    $view = new TableView();
    $view->allTables($allTables);
    $view->addTable();
}





require_once 'footer.php';

?>