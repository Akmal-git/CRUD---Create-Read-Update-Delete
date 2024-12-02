<?php
session_start();
require './database.php';

$statement = $pdo->prepare('SELECT * FROM crud WHERE 1');
$statement->execute();
$crud = $statement->fetchAll();

// Delete function code
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DELETE'])) {
    $post_id = $_POST['post_id'];

    // Inputni tekshirish
    if (is_numeric($post_id)) {
        $statement = $pdo->prepare('DELETE FROM crud WHERE id=?');
        $statement->execute([$post_id]);
        $_SESSION['post-ochirildi'] = 'Post muvoffaqiyatli o\'chirildi';
    } else {
        $_SESSION['xato'] = 'Post ID noto\'g\'ri qiymat!';
    }

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Create Read Update Delete</title>
    <link rel="icon" href="./images/crud.png" />
    <link rel="stylesheet" href="/styles/index.css">
</head>

<body>
    <h1>CRUD - Create Read Update Delete</h1>
    <a href="./create.php">Add New User </a>
    <div class="container">
        <table>
            <tr>
                <th>UserID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            <?php foreach ($crud as $data): ?>
                <tr>
                    <td><?= htmlspecialchars($data['id'], ENT_QUOTES) ?></td>
                    <td><?= htmlspecialchars($data['first_name'], ENT_QUOTES) ?></td>
                    <td><?= htmlspecialchars($data['last_name'], ENT_QUOTES) ?></td>
                    <td><?= htmlspecialchars($data['addres_s'], ENT_QUOTES) ?></td>
                    <td><?= htmlspecialchars($data['create_at'], ENT_QUOTES) ?></td>
                    <td>
                        <form method="POST" action="" onSubmit="return confirm('Rostan ham ochirilsinmi?')">
                            <input type="hidden" name="post_id" value="<?= htmlspecialchars($data['id'], ENT_QUOTES) ?>" /> <!-- To'g'ri yozilishi kerak -->
                            <input type="hidden" name="DELETE" />
                            <a href="./edit.php?id=<?= $data['id'] ?>" class="edit-btn">🖋 Edit</a>
                            <button class="delete-btn"> 🗑 Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

</body>

</html>