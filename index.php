<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Require necessary files
require_once __DIR__ . '/src/models/DataModel.php';
require_once __DIR__ . '/src/controllers/CRUDController.php';

use App\Controllers\CRUDController;

// Retrieve data
$data = CRUDController::readAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entries</title>
    <link rel="stylesheet" href="public/assets/css/styles.css">
</head>
<body>
    <h1>Entry List</h1>
    <a href="views/create.php">Create New Entry</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($data) && !empty($data)): ?>
                <?php foreach ($data as $entry): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($entry['id']); ?></td>
                        <td><?php echo htmlspecialchars($entry['name']); ?></td>
                        <td><?php echo htmlspecialchars($entry['username']); ?></td>
                        <td><?php echo htmlspecialchars($entry['email']); ?></td>
                        <td>
                            <a href="views/edit.php?id=<?php echo $entry['id']; ?>">Edit</a>
                            <a href="views/delete.php?id=<?php echo $entry['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Currently No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
