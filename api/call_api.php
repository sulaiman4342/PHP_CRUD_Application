<?php

require_once __DIR__ . '/../src/controllers/CRUDController.php';

use App\Controllers\CRUDController;

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($_POST['id']) && isset($_POST['name'])) {
        // Update entry
        $id = $_POST['id'];
        $name = $_POST['name'];
        $response = CRUDController::update($id, ['name' => $name]);
    } elseif (isset($_POST['name'])) {
        // Create entry
        $name = $_POST['name'];
        $response = CRUDController::create(['name' => $name]);
    } elseif (isset($_POST['id'])) {
        // Delete entry
        $id = $_POST['id'];
        $response = CRUDController::delete($id);
    }

    echo json_encode($response);
}
?>
