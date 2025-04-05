<?php
class OrderController
{
    public function createOrder()
    {
        if (!isset($_SESSION['users']['id'])) {
            header("Location: ?role=user&act=login");
            exit;
        }

        $user_id = $_SESSION['users']['id'];
        $dashboardUser = new DashboardUser();

        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $notes = $_POST['notes'];

        $cart = $dashboardUser->getCartByUserId($user_id);
        if (!$cart) {
            die("Giỏ hàng trống. Không thể tạo đơn hàng.");
        }

        $cartDetails = $dashboardUser->getCartDetails($cart['id']);
        if (empty($cartDetails)) {
            die("Giỏ hàng trống. Không thể tạo đơn hàng.");
        }

        $total = array_reduce($cartDetails, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $orderId = $dashboardUser->createOrder($user_id, $name, $address, $phone, $notes, $cartDetails, $total);

        header("Location: ?act=order-success&order_id=$orderId");
        exit;
    }

    public function listOrders()
    {
        if (!isset($_SESSION['users']['id'])) {
            header("Location: ?role=user&act=login");
            exit;
        }

        $user_id = $_SESSION['users']['id'];
        $dashboardUser = new DashboardUser();
        $orders = $dashboardUser->getOrdersByUserId($user_id);
        include 'app/Views/User/OrderList.php';
    }

    public function viewOrderDetails()
    {
        if (!isset($_SESSION['users']['id'])) {
            header("Location: ?role=user&act=login");
            exit;
        }

        $user_id = $_SESSION['users']['id'];
        $role = $_SESSION['users']['role'] ?? '2';
        $order_id = $_GET['order_id'];

        $dashboardUser = new DashboardUser();

        $order = $dashboardUser->getOrderById($order_id);
        $orderDetails = $dashboardUser->getOrderDetails($order_id);

        if ($role === '1') {
            include 'app/Views/Admin/OrderDetailsAdmin.php';
        } elseif ($role === '2') {
            if ($order['user_id'] != $user_id) {
                die("Bạn không có quyền truy cập vào đơn hàng này.");
            }
            include 'app/Views/User/OrderDetailsUser.php';
        } else {
            die("Vai trò không hợp lệ.");
        }
    }

    public function cancelOrder()
    {
        if (!isset($_SESSION['users']['id'])) {
            header("Location: ?role=user&act=login");
            exit;
        }

        $order_id = $_POST['order_id'];
        $user_id = $_SESSION['users']['id'];
        $dashboardUser = new DashboardUser();
        $dashboardUser->cancelOrder($order_id, $user_id);
        header("Location: ?act=list-orders");
        exit;
    }

    public function listOrdersAdmin()
    {
        $dashboardUser = new DashboardUser();
        $orders = $dashboardUser->getAllOrders();
        include 'app/Views/Admin/OrderListAdmin.php';
    }

    public function updateOrderStatus()
    {
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];

        $dashboardUser = new DashboardUser();
        $result = $dashboardUser->updateOrderStatus($order_id, $status);

        if ($result) {
            header("Location: ?role=admin&act=list-orders&success=1");
        } else {
            header("Location: ?role=admin&act=list-orders&error=1");
        }
        exit;
    }

    public function checkOut()
    {
        $users_id = $_SESSION['users']['id'] ?? null;
        if (!$users_id) {
            die("Bạn chưa đăng nhập!");
        }

        $cartModel = new DashboardUser();

        $cart = $cartModel->getCartByUserId($users_id);
        if (!$cart) {
            die("Giỏ hàng của bạn đang trống.");
        }

        $cartDetails = $cartModel->getCartDetails($cart['id']);
        if (empty($cartDetails)) {
            die("Giỏ hàng của bạn đang trống.");
        }

        include 'app/Views/User/CheckOut.php';
    }
}
