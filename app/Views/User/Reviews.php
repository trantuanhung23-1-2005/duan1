<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận và đánh giá</title>
</head>
<body>
    <h2>Đánh giá trung bình: <?= number_format($averageRating, 1) ?>/5</h2>

    <h3>Danh sách bình luận</h3>
    <?php foreach ($reviews as $review): ?>
        <div>
            <p><strong><?= htmlspecialchars($review['user_name']) ?>:</strong> <?= htmlspecialchars($review['comment']) ?></p>
            <p><em>Ngày: <?= htmlspecialchars($review['created_at']) ?></em></p>
        </div>
    <?php endforeach; ?>

    <h3>Thêm bình luận và đánh giá</h3>
    <form action="?role=user&act=add-review" method="POST">
        <input type="hidden" name="product_id" value="<?= htmlspecialchars($_GET['product_id']) ?>">
        <textarea name="comment" placeholder="Nhập bình luận của bạn" required></textarea><br>
        <label for="rating">Đánh giá:</label>
        <select name="rating" id="rating" required>
            <option value="1">1 Sao</option>
            <option value="2">2 Sao</option>
            <option value="3">3 Sao</option>
            <option value="4">4 Sao</option>
            <option value="5">5 Sao</option>
        </select><br>
        <button type="submit">Gửi</button>
    </form>
</body>
</html>