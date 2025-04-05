<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
</head>
<body>
    <h1>Chi tiết đơn hàng</h1>
    <p>Mã đơn hàng: <?= htmlspecialchars($order['id']) ?></p>
    <p>Ngày đặt hàng: <?= htmlspecialchars($order['created_at']) ?></p>
    <p>Tổng tiền: <?= number_format($order['total'], 0, ',', '.') ?> VND</p>

    <h2>Sản phẩm</h2>
    <table border="1" cellpadding="10" cellspacing="0">
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
            <?php foreach ($orderDetails as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['product_name']) ?></td>
                    <td><img src="<?= htmlspecialchars($item['product_image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" width="50"></td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                    <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VND</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>