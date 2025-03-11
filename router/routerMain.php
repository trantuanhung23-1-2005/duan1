<?php

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";
if($role == "user"){
  switch ($act) {
    case '':{
      $homeUserController = new HomeUserController();
      $homeUserController->homeUser();
      break;
    }
    
    default:
      $homeUserController = new HomeUserController();
      $homeUserController->homeUser();
      break;
  }
}else{
  switch ($act) {
    case '':{
      $homeAdminController = new HomeAdminController();
      $homeAdminController->homeAdmin();
      break;
    }
    default:
    $homeAdminController = new HomeAdminController();
    $homeAdminController->homeAdmin();
      break;
  }
}


?>