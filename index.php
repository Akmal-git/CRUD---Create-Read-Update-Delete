<?php
session_start();
require './database.php';

$statement = $pdo->prepare('SELECT * FROM crud WHERE 1');
$statement->execute();
$crud = $statement->fetchAll();
// var_dump($crud);

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
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['first_name'] ?></td>
                    <td><?= $data['last_name'] ?></td>
                    <td><?= $data['addres_s'] ?></td>
                    <td><?= $data['create_at'] ?></td>
                    <td>
                        <button class="edit-btn"> 🖋 Edit</button>
                        <button class="delete-btn"> 🗑 Delete</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

</body>

</html>