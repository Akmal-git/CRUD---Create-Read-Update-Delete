<?php
// session_start();

require './database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['ism'];
    $lastname = $_POST['familiya'];
    $address = $_POST['manzil'];

    // SQL so'rov va parametr nomlarini to'g'rilash
    $statement = $pdo->prepare("INSERT INTO 
    crud (first_name, last_name, addres_s,create_at) 
    VALUES (:first_name, :last_name, :addres_s, NOW())");
    $statement->execute([
        'first_name' => $firstname,
        'last_name' => $lastname,
        'addres_s' => $address
    ]);

    $_SESSION['post-yaratildi'] = 'Post muvaffaqiyatli qo\'shildi';
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/create.css" />
    <link rel="icon" href="./images/crud.png"/>
    <title>Add New User</title>
</head>

<body>
    <form action="" method="POST">
        <a href="./index.php">Go back</a>
        <label>Ism:</label>
        <input type="text" name="ism" required />
        <label>Familiya:</label>
        <input type="text" name="familiya" required />
        <label>Manzil:</label>
        <textarea name="manzil" rows="5" cols="1" required></textarea>
        <button type="submit">Create</button>
    </form>
</body>

</html>