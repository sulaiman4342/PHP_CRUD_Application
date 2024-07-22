<?php

require_once '../src/controllers/CRUDController.php';

use App\Controllers\CRUDController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'email' => $_POST['email']
    ];
    CRUDController::create($data);
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Entry</title>
    <link rel="stylesheet" href="../public/assets/css/styles.css">
</head>
<body>
    <h1>Create Entry</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
