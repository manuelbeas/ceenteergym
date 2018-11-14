<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/png" href="icons/center.png"/>
  <link rel="shortcut icon" type="image/png" href="icons/center.png"/>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Sura" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <title>Center Gym Admin</title>
</head>
<body>
  <div class="content-platform">
    <?php include 'views/menu-superior.view.php'; ?>
    <?php include 'views/menu-lateral-izquierda.view.php' ;?>
    <div class="contenedor-lateral-derecha">
      <div class="first-section">
        <div class="row">
          <div class="col-sm-12">
            <div class="white-square" style="padding: 30px;">
              <!-- Alerta -->
              <?php echo $alerta; ?>
              <div class="row">
                <div class="col-lg-12" id="estadisticas">
                  <a href="new_customer.php" class="btn btn-success btn-sm btn-outline-success" style="position: absolute; right: 10px;">Registrar nuevo cliente</a>
                  <h3 class="Raleway how-we-are" style="color: #3AAB83;">Clientes registrados</h3>
                  <h5 class="Raleway how-we-are">Familia Center Gym</h5>

                  <table id="customers" class="table table-responsive" style="display: inline-table;">
                    <thead style="background: #43AB85; color: #fff;">
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Cumpleaños</th>
                        <th>Sexo</th>
                        <th>Tipo de suscripcion</th>
                        <th>Días restantes</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($resultados != null)
                      {
                        foreach($resultados as $fila){
                          $fecha = date('Y-m-d H:i:s');
                          $revisar_fecha = check_in_range($fila['inicia'], $fila['finaliza'], $fecha);
                          if($fila['inicia'] != '' || $fila['inicia'] != null){
                            $inicia = get_today();
                            $dias_restantes = between_two_dates($inicia->format('Y-m-d'), $fila['finaliza']);
                          }
                          else {
                            $dias_restantes = '';
                          }
                        ?>
                          <tr>
                            <th scope="row"><img src="./<?php echo $fila['image']; ?>" class="fitness-img-list"/></th>
                            <td style="padding-top: 20px;"><?php echo $fila['nombres']; ?></td>
                            <td style="padding-top: 20px;"><?php echo $fila['apellidos']; ?></td>
                            <td style="padding-top: 20px;"><?php echo $fila['fecha_nac']; ?></td>
                            <td style="padding-top: 20px;"><?php
                              if($fila['sexo'] == 1){
                                echo "Masculino";
                              }
                              else {
                                echo "Femenino";
                              }
                              ?>
                            </td>
                            <td style="padding-top: 20px;">
                              <?php if (intval($fila['suscripcion']) == 1) { ?>
                                <p class="background-yellow etiqueta etiqueta-style">Visita</p>
                              <?php } elseif (intval($fila['suscripcion']) == 2) { ?>
                                <p class="background-blue etiqueta etiqueta-style">Semanal</p>
                              <?php } elseif (intval($fila['suscripcion']) == 3) { ?>
                                <p class="background-green_2 etiqueta etiqueta-style">Mensual</p>
                              <?php } else { ?>
                                <p class="background-red etiqueta etiqueta-style">Anual</p>
                              <?php }  ?>
                            </td>
                            <td style="padding-top: 20px;">
                              <p><?php echo $dias_restantes; ?></p>
                            </td>
                              <?php
                                if ($revisar_fecha){
                                  echo "
                                  <td class='status-fine'>
                                    Activa <i class='fa fa-check fa-fw' aria-hidden='true'></i>
                                  </td>
                                  ";
                                }
                                else {
                                  echo "
                                  <td class='status-expired'>
                                    Vencida <i class='fa fa-times fa-fw' aria-hidden='true'></i>
                                  </td>
                                  ";
                                }
                              ?>
                          </tr>
                        <?php
                        }

                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function(){
    $('#customers').DataTable();
    $(".close").click(function(){
        $("#myAlert").alert("close");
    });
  });
  </script>
  <script type="text/javascript" src="./js/table_custom.js"></script>
</body>
</html>
