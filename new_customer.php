<?php include 'pdo.php'; ?>
<?php
  $resultados = $conexion->query('SELECT * FROM suscripciones');
  $alerta = '';
?>
<?php  include 'views/new_customer.view.php'; ?>
