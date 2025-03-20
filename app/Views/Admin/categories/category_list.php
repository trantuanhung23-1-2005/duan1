<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Category</title>
</head>
<body>
    <h2>Category's List</h2>
    <a href="?role=admin&act=addCategory">Add Category</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category["id"] ?></td>
                <td><?= $category["name"] ?></td>
                <td>
                    <a href="?role=admin&act=editCategory&id=<?= $category['id'] ?>">Edit</a>
                    <a href="?role=admin&act=deleteCategory&id=<?= $category['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>