<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Thông tin thanh toán</h1>
    <form action="?role=user&act=create-order" method="POST">
        <label for="name">Tên người nhận:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="notes">Ghi chú:</label>
        <textarea id="notes" name="notes"></textarea><br><br>

        <h2>Chi tiết giỏ hàng</h2>
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
                <?php if (!empty($cartDetails)): ?>
                    <?php foreach ($cartDetails as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" width="50"></td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                            <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VND</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Giỏ hàng của bạn đang trống.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <br>
        <button type="submit">Đặt hàng</button>
    </form>
</body>
</html>