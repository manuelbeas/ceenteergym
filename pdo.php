<?php
  try {
    $conexion = new PDO('mysql:host=localhost;dbname=gimnasio', 'root', '');
    # echo "Todo bien, al cien";
    date_default_timezone_set('America/Mazatlan');
  }
  catch(PDOException $e) {
    // Mostrar Error
    echo "Error: " . $e->getMessage();
  }
?>
