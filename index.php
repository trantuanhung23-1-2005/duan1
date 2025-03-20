<?php
session_start();
//Database
include 'app/Database/database.php';

//Models
include 'app/Models/Admin/ProductModelAdmin.php';


//Controllers
include 'app/Controllers/User/HomeUserController.php';
include 'app/Controllers/Admin/HomeAdminController.php';



const BASE_URL = "http://localhost/duan1hoclai/";

//Router
include 'router/routerHung52525.php';
include 'router/routerHugn7125.php';
?>