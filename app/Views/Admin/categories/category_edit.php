<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <h2>Category's Edit</h2>
    <form action="" method="post">
        <label for="">Name:</label>
        <input type="text" id="name" name="name" value="<?= isset($category['name']) ? htmlspecialchars($category['name']) : '' ?>" required>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>