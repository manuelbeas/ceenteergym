<?php include 'pdo.php'; ?>
<?php include 'functions.php'; ?>
<?php
  $resultados = $conexion->query('SELECT nombres, apellidos, fecha_nac, sexo, image, suscripcion, inicia, finaliza FROM clientes INNER JOIN datospersonales ON clientes.datospersonales_id=datospersonales.id_datospersonales INNER JOIN detallessuscripciones ON detallessuscripciones.cliente=clientes.id_cliente;');
?>
<?php  include 'views/platform.view.php'; ?>
