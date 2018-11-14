<?php
  include 'pdo.php';
  include 'functions.php';

  # $resultados = $conexion->query('SELECT * FROM suscripciones');

  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $fecha_nac = $_POST['fecha_nac'];
  $sexo = $_POST['sexo'];
  if($sexo == 'hombre'){
    $sexo = 1;
  }
  else{
    $sexo = 2;
  }
  $inscripcion = $_POST['inscripcion'];
  $domicilio = $_POST['domicilio'];

  # echo $nombre . " - " . $apellidos . " - " . $fecha_nac . " - " . $sexo . " - " . $inscripcion . " - " . $domicilio . " - " . $inscripcion . "<br />";

  $fecha_nac = convertStringToDate($fecha_nac);

  $imagen_subida = moveImage($_FILES["imagen"], $sexo);

  $query = $conexion->prepare('INSERT INTO datospersonales (id_datospersonales, nombres, apellidos, fecha_nac, sexo, domicilio, image, qr_code) VALUES (null, :nombres, :apellidos, :fecha_nac, :sexo, :domicilio, :image, null)');
  $query->execute(array(':nombres'=>$nombre, ':apellidos'=>$apellidos, ':fecha_nac'=>$fecha_nac, ':sexo'=>$sexo, ':domicilio'=>$domicilio, ':image'=>$imagen_subida));

  if($query->rowCount() == 0){
    # echo "No se pudo hacer el registro";
    # $resultados = $conexion->query('SELECT * FROM suscripciones');
    # $alerta = '<div class="alert alert-danger alert-dismissible" id="myAlert"><a href="#" class="close">&times;</a><strong>Oops!</strong> Hubo un error al momento de intentar realizar el registro. Intente de nuevo.</div>';
    # include 'views/new_customer.view.php';
    header('Location: views/errors/not-working.view.php');
    exit();
  }
  else{

    # echo "Datos personales registrados <br />";
    # echo $nombre . " - " . $apellidos . " - " . $fecha_nac . " - " . $sexo . " - " . $inscripcion . " - " . $domicilio . " - " . $imagen_subida . "<br />";
    $idpi = $conexion->lastInsertId();

    $query = $conexion->prepare('INSERT INTO clientes (id_cliente, datospersonales_id) VALUES (null, :datospersonales_id)');
    $query->execute(array(':datospersonales_id'=>$idpi));

    $idc = $conexion->lastInsertId();
    # echo "Cliente creado: " . $idc;

    $inicia = get_today();
    # echo $date->format('Y-m-d');
    # $date->add(new DateInterval('P30D'));
    $finaliza = get_today();
    sleep(1);
    $query = $conexion->prepare('INSERT INTO detallessuscripciones (id_detallessuscripciones, cliente, suscripcion, inicia, finaliza) VALUES (null, :cliente, :suscripcion, :inicia, :finaliza)');
    switch ($inscripcion) {
        case 1:
            # echo "<br />La suscripcion fue por visita<br />";
            $query->execute(array(':cliente'=>$idc, ':suscripcion'=>$inscripcion, ':inicia'=>null, ':finaliza'=>null));
            sleep(1);
            # $resultados = $conexion->query('SELECT nombres, apellidos, fecha_nac, sexo, image, suscripcion, inicia, finaliza FROM clientes INNER JOIN datospersonales ON clientes.datospersonales_id=datospersonales.id_datospersonales INNER JOIN detallessuscripciones ON detallessuscripciones.cliente=clientes.id_cliente;');
            # $alerta = '<div class="alert alert-success alert-dismissible" id="myAlert"><a href="#" class="close">&times;</a><strong>Excelente!</strong> Se ha añadido un integrante a la familia Center Gym.</div>';
            header('Location: views/new_customer_qr_code.view.php');
            break;
        case 2:
            # echo "<br />La suscripcion fue por semana<br />";
            $finaliza->add(new DateInterval('P07D'));
            $query->execute(array(':cliente'=>$idc, ':suscripcion'=>$inscripcion, ':inicia'=>$inicia->format('Y-m-d'), ':finaliza'=>$finaliza->format('Y-m-d')));
            sleep(1);
            # $resultados = $conexion->query('SELECT nombres, apellidos, fecha_nac, sexo, image, suscripcion, inicia, finaliza FROM clientes INNER JOIN datospersonales ON clientes.datospersonales_id=datospersonales.id_datospersonales INNER JOIN detallessuscripciones ON detallessuscripciones.cliente=clientes.id_cliente;');
            # $alerta = '<div class="alert alert-success alert-dismissible" id="myAlert"><a href="#" class="close">&times;</a><strong>Excelente!</strong> Se ha añadido un integrante a la familia Center Gym.</div>';
            header('Location: views/new_customer_qr_code.view.php');
            break;
        case 3:
            #  echo "<br />La suscripcion fue por mes<br />";
            $finaliza->add(new DateInterval('P30D'));
            $query->execute(array(':cliente'=>$idc, ':suscripcion'=>$inscripcion, ':inicia'=>$inicia->format('Y-m-d'), ':finaliza'=>$finaliza->format('Y-m-d')));
            sleep(1);
            # $resultados = $conexion->query('SELECT nombres, apellidos, fecha_nac, sexo, image, suscripcion, inicia, finaliza FROM clientes INNER JOIN datospersonales ON clientes.datospersonales_id=datospersonales.id_datospersonales INNER JOIN detallessuscripciones ON detallessuscripciones.cliente=clientes.id_cliente;');
            # $alerta = '<div class="alert alert-success alert-dismissible" id="myAlert"><a href="#" class="close">&times;</a><strong>Excelente!</strong> Se ha añadido un integrante a la familia Center Gym.</div>';
            header('Location: views/new_customer_qr_code.view.php');
            break;
        case 4:
            #  echo "<br />La suscripcion fue por año<br />";
            $finaliza->add(new DateInterval('P365D'));
            $query->execute(array(':cliente'=>$idc, ':suscripcion'=>$inscripcion, ':inicia'=>$inicia->format('Y-m-d'), ':finaliza'=>$finaliza->format('Y-m-d')));
            sleep(1);
            # $resultados = $conexion->query('SELECT nombres, apellidos, fecha_nac, sexo, image, suscripcion, inicia, finaliza FROM clientes INNER JOIN datospersonales ON clientes.datospersonales_id=datospersonales.id_datospersonales INNER JOIN detallessuscripciones ON detallessuscripciones.cliente=clientes.id_cliente;');
            # $alerta = '<div class="alert alert-success alert-dismissible" id="myAlert"><a href="#" class="close">&times;</a><strong>Excelente!</strong> Se ha añadido un integrante a la familia Center Gym.</div>';
            header('Location: views/new_customer_qr_code.view.php');
            break;
        default:
            # $resultados = $conexion->query('SELECT * FROM suscripciones');
            # $alerta = '<div class="alert alert-warning alert-dismissible" id="myAlert"><a href="#" class="close">&times;</a><strong>Un momento!</strong> Hubo algunos problemas al momento de realizar el registro.</div>';
            header('Location: views/errors/not-working.view.php');
            break;
    }

}

  #echo $nombre . " - " . $apellidos . " - " . $fecha_nac . " - " . $sexo . " - " . $inscripcion . " - " . $domicilio;
?>
