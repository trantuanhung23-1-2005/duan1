<?php
session_start();
//Database
include 'app/Database/database.php';

//Models
include 'app/Models/Admin/ProductModelAdmin.php';
include 'app/Models/Admin/CategoryModel.php';
include 'app/Models/User/DashboardUser.php';


//Controllers
include 'app/Controllers/User/HomeUserController.php';
include 'app/Controllers/Admin/HomeAdminController.php';
include 'app/Controllers/Admin/CategoryController.php';



const BASE_URL = "http://localhost/duan1hoclai/";

//Router
include 'router/routerMain.php';
?>