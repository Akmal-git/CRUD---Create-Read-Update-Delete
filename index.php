<?php
// require './database.php';
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
    <a>Add New User </a>
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
            <tr>
                <td>1</td>
                <td>Akmal</td>
                <td>Egamberdiyev</td>
                <td>Surxondaryo</td>
                <td>2023-10-12</td>
                <td>
                    <button class="edit-btn"> 🖋 Edit</button>
                    <button class="delete-btn"> 🗑 Delete</button>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>