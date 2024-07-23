<?php

require_once '../src/controllers/CRUDController.php';

use App\Controllers\CRUDController;

$id = $_GET['id'];

$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    CRUDController::delete($id);
    $successMessage = 'Successfully deleted';
    header('Location: ../index.php'); // Redirect immediately
    exit(); // Ensure no further code is executed after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Entry</title>
    <link rel="stylesheet" href="../public/assets/css/styles.css">
</head>
<body>
    <h1>Delete Entry</h1>
    <form method="POST">
        <p>Are you sure you want to delete this entry?</p>
        <input type="submit" value="Delete">
        <a href="../index.php">Cancel</a>
    </form>
    
    <?php if ($successMessage): ?>
        <script>
            alert('<?php echo addslashes($successMessage); ?>');
        </script>
    <?php endif; ?>
</body>
</html>
