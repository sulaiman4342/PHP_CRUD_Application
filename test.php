<?php

  // Absolute path to DataModel.php
  require_once 'C:/xampp/htdocs/crud_application/src/models/DataModel.php';

  // Test if DataModel is included successfully
  if (function_exists('getAll')) {
    echo "DataModel.php included successfully!";
  } else {
    echo "Error: Failed to include DataModel.php";
  }

?>
