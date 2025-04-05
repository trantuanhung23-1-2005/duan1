<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <td><?= htmlspecialchars($order['status']) ?></td>
                <td><?= htmlspecialchars($order['created_at']) ?></td>
                <td>
                    <a href="?act=view-order-details&order_id=<?= $order['id'] ?>">Xem chi tiết</a>
                    <?php if ($order['status'] === 'pending'): ?>
                        <form action="?act=cancel-order" method="POST" style="display:inline;">
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này?')">Hủy</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>