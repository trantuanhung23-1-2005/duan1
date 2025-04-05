<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
</head>

<body>
    <h1>Chi tiết đơn hàng</h1>

    <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order['id']) ?></p>
    <p><strong>Tên người nhận:</strong> <?= htmlspecialchars($order['name']) ?></p>
    <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($order['address']) ?></p>
    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['phone']) ?></p>
    <p><strong>Ghi chú:</strong> <?= htmlspecialchars($order['notes'] ?? 'Không có') ?></p>
    <p><strong>Trạng thái:</strong> <?= htmlspecialchars(ucfirst($order['status'])) ?></p>
    <p><strong>Ngày tạo:</strong> <?= htmlspecialchars($order['created_at']) ?></p>
    <p><strong>Tổng tiền:</strong> <?= number_format($order['total'], 0, ',', '.') ?> VND</p>

    <h2>Danh sách sản phẩm</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $detail): ?>
                <tr>
                    <td><?= htmlspecialchars($detail['product_name']) ?></td>
                    <td><img src="<?= htmlspecialchars($detail['product_image']) ?>" alt="<?= htmlspecialchars($detail['product_name']) ?>" width="50"></td>
                    <td><?= htmlspecialchars($detail['quantity']) ?></td>
                    <td><?= number_format($detail['price'], 0, ',', '.') ?> VND</td>
                    <td><?= number_format($detail['price'] * $detail['quantity'], 0, ',', '.') ?> VND</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="actions">
        <a href="?role=admin&act=list-orders">Quay lại danh sách đơn hàng</a>
    </div>
</body>

</html>