<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
</head>

<body>
    <h1>Danh sách đơn hàng</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người nhận</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['id']) ?></td>
                    <td><?= htmlspecialchars($order['name']) ?></td>
                    <td><?= number_format($order['total'], 0, ',', '.') ?> VND</td>
                    <td>
                        <?php if ($order['status'] === 'completed' || $order['status'] === 'cancelled'): ?>
                            <?= ucfirst(htmlspecialchars($order['status'])) ?>
                        <?php else: ?>
                            <form action="?role=admin&act=update-order-status" method="POST">
                                <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                <select name="status" onchange="this.form.submit()">
                                    <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                                    <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                </select>
                            </form>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                    <td>
                        <a href="?role=admin&act=view-order_details&order_id=<?= $order['id'] ?>">Xem chi tiết</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>