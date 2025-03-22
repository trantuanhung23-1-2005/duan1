<?php
class HomeUserController{
  public function homeUser(){
    $usercontroller = new DashboardUser();
    $list = $usercontroller -> getAllProductByUser();
    include 'app/Views/User/HomeUserView.php';
  }
}

?>