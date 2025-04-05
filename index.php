<?php
session_start();
//Database
include 'app/Database/database.php';

//Models
include 'app/Models/Admin/ProductModelAdmin.php';
include 'app/Models/Admin/CategoryModel.php';
include 'app/Models/User/DashboardUser.php';
include 'app/Models/Admin/UserModel.php';
include 'app/Models/Admin/HomeModel.php';




//Controllers
include 'app/Controllers/User/HomeUserController.php';
include 'app/Controllers/Admin/HomeAdminController.php';
include 'app/Controllers/Admin/CategoryController.php';
include 'app/Controllers/Admin/UserAdminController.php';
include 'app/Controllers/Admin/OrderController.php';
include 'app/Controllers/Admin/LoginController.php';
include 'app/Controllers/Admin/ReviewAdminController.php';
require_once 'app/Controllers/Admin/RegisterController.php';



define('BASE_URL' , 'http://localhost/duan1hoclai/');

//Router
include 'router/routerMain.php';
?>