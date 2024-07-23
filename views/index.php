<?php

require_once __DIR__ . '/src/models/DataModel.php';
require_once __DIR__ . '/src/controllers/CRUDController.php';

use App\Controllers\CRUDController;

$data = CRUDController::readAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entries</title>
</head>
<body>
    <h1>Entry List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $entry): ?>
                <tr>
                    <td><?php echo htmlspecialchars($entry['id']); ?></td>
                    <td><?php echo htmlspecialchars($entry['employee_name']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
