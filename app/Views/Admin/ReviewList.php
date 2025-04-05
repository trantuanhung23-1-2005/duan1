<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bình luận</title>
</head>
<body>
    <h1>Danh sách bình luận</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Bình luận</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= htmlspecialchars($review['id']) ?></td>
                    <td><?= htmlspecialchars($review['user_name']) ?></td>
                    <td><?= htmlspecialchars($review['product_name']) ?></td>
                    <td><?= htmlspecialchars($review['comment']) ?></td>
                    <td><?= htmlspecialchars($review['created_at']) ?></td>
                    <td>
                        <a href="?role=admin&act=delete-review&review_id=<?= $review['id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>