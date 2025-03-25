<?php
session_start();

// 🔹 Kết nối Database
require_once __DIR__ . "/app/Controllers/Admin/Database/database.php";

// 🔹 Import Models (có thể thêm sau nếu cần)

// 🔹 Import Controllers (Kiểm tra file tồn tại trước khi include)
$controllers = [
    __DIR__ . "/app/Controllers/User/HomeUserController.php",
    __DIR__ . "/app/Controllers/Admin/HomeAdminController.php"
];

foreach ($controllers as $file) {
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Error: File {$file} not found!");
    }
}

// 🔹 Định nghĩa BASE_URL
const BASE_URL = "http://localhost/duan1/";

// 🔹 Import Router (kiểm tra file trước khi include)
$routerFile = __DIR__ . "/router/routerMain.php";
if (file_exists($routerFile)) {
    require_once $routerFile;
} else {
    die("Error: Router file not found!");
}
?>
