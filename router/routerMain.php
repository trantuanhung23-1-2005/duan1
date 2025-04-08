<?php

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";
if ($role == "user") {
    $loginController = new LoginController();
    switch ($act) {
        case '':
            // $loginController->restrictUserAccess(); // Restrict access to user
            $homeUserController = new HomeUserController();
            $homeUserController->homeUser();
            break;
            case 'product-detail': {
                $homeUserController = new HomeUserController();
                $homeUserController->productDetail();
                break;
            }
              case 'product-list-user':{
                $homeUserController = new HomeUserController();
                $homeUserController->productListUser();
                break;
              }
              case 'category_list':{
                $homeUserController = new HomeUserController();
                $homeUserController->categoryList();
                break;
              }
              case 'cart':{
                $homeUserController = new HomeUserController();
                $homeUserController->cartDetail();
                break;
              }
              case 'cart-delete':{
                $homeUserController = new HomeUserController();
                $homeUserController->removeCartItem();
                break;
              }
              case 'check-out':{
                $homeUserController = new HomeUserController();
                $homeUserController->checkOut();
                break;
              }
              case 'add-review': {
                $homeUserController = new HomeUserController();
                $homeUserController->addReview();
                break;
            }
            case 'create-order': {
                $orderController = new OrderController();
                $orderController->createOrder();
                break;
            }
    
            case 'list-orders': {
                $orderController = new OrderController();
                $orderController->listOrders();
                break;
            }
    
            case 'view-order-details': {
                $orderController = new OrderController();
                $orderController->viewOrderDetails();
                break;
            }
    
            case 'cancel-order': {
                $orderController = new OrderController();
                $orderController->cancelOrder();
                break;
            }
        default:
            // $loginController->restrictUserAccess(); // Restrict access to user
            $homeUserController = new HomeUserController();
            $homeUserController->homeUser();
            break;
    }
} else {
    $loginController = new LoginController();
    switch ($act) {
        case 'home': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $homeAdminController = new HomeAdminController();
            $homeAdminController->homeAdmin();
            break;
        }

        case 'login': {
            $loginController->login();
            break;
        }
        case 'logout': {
            $loginController->logout();
            break;
        }
        case 'adminaccessadminaccess': {
            $loginController->restrictAdminAccess();
            $loginController->restrictAdminAccess();
            break;
        }

        case 'post-login': {
            $loginController->postLogin();
            break;
        }

        case 'list-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $homeAdminController = new HomeAdminController();
            $homeAdminController->productAdmin();
            break;
        }

        case 'delete-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $homeAdminController = new HomeAdminController();
            $homeAdminController->deleteProduct();
            break;
        }

        case 'add-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $addProduct = new HomeAdminController();
            $addProduct->addProduct();
            break;
        }

        case 'add-post-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $addProduct = new HomeAdminController();
            $addProduct->addPostProduct();
            break;
        }

        case 'edit-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $addProduct = new HomeAdminController();
            $addProduct->editProduct();
            break;
        }

        case 'edit-post-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $addProduct = new HomeAdminController();
            $addProduct->editPostProduct();
            break;
        }

        case 'listCategories': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $categoryController = new CategoryController();
            $categoryController->listCategory();
            break;
        }

        case 'addCategory': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $categoryController = new CategoryController();
            $categoryController->addCategory();
            break;
        }

        case 'editCategory': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $categoryController = new CategoryController();
            $categoryController->editCategory();
            break;
        }

        case 'deleteCategory': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $categoryController = new CategoryController();
            $categoryController->deleteCategory();
            break;
        }

        case 'list-user': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->userList();
            break;
        }

        case 'list-add': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->addUser();
            break;
        }

        case 'list-post-add': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->addPostUser();
            break;
        }

        case 'list-edit': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->editUser();
            break;
        }

        case 'list-post-edit': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->editPostUser();
            break;
        }

        case 'list-delete': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->deleteUser();
            break;
        }

        case 'register': {
            $registerController = new RegisterController();
            $registerController->register();
            break;
        }

        case 'postRegister': {
            $registerController = new RegisterController();
            $registerController->postRegister();
            break;
        }
        case 'list-reviews': {
            $loginController->restrictAdminAccess(); // Đảm bảo chỉ admin có quyền truy cập
            $reviewAdminController = new ReviewAdminController();
            $reviewAdminController->listReviews();
            break;
        }
        
        case 'delete-review': {
            $loginController->restrictAdminAccess(); // Đảm bảo chỉ admin có quyền truy cập
            $reviewAdminController = new ReviewAdminController();
            $reviewAdminController->deleteReview();
            break;
        }
        case 'list-orders': {
            $loginController->restrictAdminAccess();
            $orderController = new OrderController();
            $orderController->listOrdersAdmin();
            break;
        }

        case 'view-order_details': {
            $loginController->restrictAdminAccess();
            $orderController = new OrderController();
            $orderController->viewOrderDetails();
            break;
        }

        case 'cancel-order': {
            $loginController->restrictAdminAccess();
            $orderController = new OrderController();
            $orderController->cancelOrder();
            break;
        }
        case 'update-order-status': {
            $loginController->restrictAdminAccess();
            $orderController = new OrderController();
            $orderController->updateOrderStatus();
            break;
        }
        default:
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $homeAdminController = new HomeAdminController();
            $homeAdminController->homeAdmin();
            break;
    }
}

?>