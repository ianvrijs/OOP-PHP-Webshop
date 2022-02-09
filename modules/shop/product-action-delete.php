<?php
//verwijder
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    }
    
    $sql1 = "DELETE FROM producten WHERE id=$id";
    
    if (database::$oConnection->query($sql1) === TRUE) {
      echo "Product deleted successfully";
    } else {
      echo "Error deleting record: " . database::$oConnection->error;
    }
    
    database::$oConnection->close();