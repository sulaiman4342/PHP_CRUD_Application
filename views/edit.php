<?php

require_once '../src/controllers/CRUDController.php';

use App\Controllers\CRUDController;

$id = $_GET['id'];
$data = CRUDController::readAll();
$entry = array_values(array_filter($data, fn($e) => $e['id'] == $id))[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updatedData = [
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'email' => $_POST['email']
    ];
    CRUDController::update($id, $updatedData);
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <link rel="stylesheet" href="../public/assets/css/styles.css">
</head>
<body>
    <h1>Edit Entry</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($entry['name']); ?>" required><br>
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($entry['username']); ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($entry['email']); ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
