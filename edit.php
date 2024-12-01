<?php
require './database.php';
session_start();

// if (!isset($_GET['id'])) {
//     header('Location: index.php');
//     exit;
// }

$post_id = $_GET['id'];
$statement = $pdo->prepare('SELECT * FROM crud WHERE id=?');
$statement->execute([$post_id]);
$post = $statement->fetch();

// Agar post topilmasa, foydalanuvchini index.php ga yo'naltirasiz
// if (!$post) {
//     header('Location: index.php');
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PUT'])) {
    $id = $_POST['post_id'];
    $firstname = $_POST['ism'];
    $lastname = $_POST['familiya'];
    $address = $_POST['manzil'];

    // SQL Tahrirlangan so'rovni ingr qilish
    $statement = $pdo->prepare('UPDATE crud SET first_name=?, last_name=?, addres_s=?, create_at=NOW() WHERE id=?');
    $statement->execute([$firstname, $lastname, $address, $id]);

    $_SESSION['post-ozgartirildi'] = 'Post muaffiyaqatli o\'zgartirildi';
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/create.css">
    <title>Edit page</title>
</head>
<body>
    <form method="POST" action="">
        <input type="hidden" name="post_id" value="<?= $post['id'] ?>" />
        <a href="./index.php">Go back</a>
        <label>Ism:</label>
        <input type="text" name="ism" value="<?= $post['first_name'] ?>" required />
        <label>Familiya:</label>
        <input type="text" name="familiya" value="<?= $post['last_name'] ?>" required />
        <label>Manzil:</label>
        <textarea name="manzil" rows="5" required><?= $post['addres_s'] ?></textarea>
        <button type="submit" name="PUT">Edit</button>
    </form>
</body>
</html>
