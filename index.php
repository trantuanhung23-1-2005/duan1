<?php
session_start();
//Database

//Models


//Controllers
include 'app/Controllers/User/HomeUserController.php';
include 'app/Controllers/Admin/HomeAdminController.php';



const BASE_URL = "http://localhost/duan1hoclai/";

//Router
include 'router/routerMain.php';
?>