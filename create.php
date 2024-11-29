<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/create.css" />
    <title>Add New User</title>
</head>

<body>
    <form action="./index.php" method="POST">
        <a href="./index.php">Go back</a>
        <label>Ism:</label>
        <input type="text" name="ism" required  />
        <label>Familiya:</label>
        <input type="text" name="familiya" required />
        <label>Manzil:</label>
        <textarea name="manzil" rows="5" cols="1" required></textarea>
        <button type="submit">Create</button>
    </form>
</body>

</html>