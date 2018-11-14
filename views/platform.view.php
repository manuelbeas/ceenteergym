<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/png" href="./icons/center.png"/>
  <link rel="shortcut icon" type="image/png" href="./icons/center.png"/>
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <link rel="stylesheet" href="./css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="./css/custom.css">
  <link rel="stylesheet" href="./css/animate.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Sura" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <title>Center Gym Admin</title>
</head>
<body>
  <div class="content-platform">
    <?php include 'views/menu-superior.view.php' ;?>
    <?php include 'views/menu-lateral-izquierda.view.php' ;?>
    <div class="contenedor-lateral-derecha">
      <div class="first-section">
        <div class="row">
          <div class="col-sm-12">
            <div class="white-square" style="padding: 30px;">
              <div class="row">
                <div class="col-lg-5" id="estadisticas">
                  <h3 class="Raleway how-we-are" style="color: #3AAB83;">Estad&iacute;sticas hasta el momento</h3>
                  <h5 class="Raleway how-we-are">Para los &uacute;ltimos 30 días.</h5>
                  <p><i class="fa fa-circle-o" aria-hidden="true" style="color: #1FAB9E; font-size: 15px;"></i><b>17</b> Personas se han inscrito</p>
                  <p><i class="fa fa-circle-o" aria-hidden="true" style="color: #B1D781; font-size: 15px;"></i><b>584</b> Visitas hasta el momento</p>
                  <p><i class="fa fa-circle-o" aria-hidden="true" style="color: #F0433A; font-size: 15px;"></i><b>6</b> Polizas mensuales se han vencido</p>
                </div>
                <div class="col-lg-7">
                  <canvas id="canvas" style="height: 300px; width:100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-8">
            <div class="white-square">
              <h5 class="Raleway how-we-are">Clientes con suscripción</h5>
              <br />
              <table id="customers" class="table table-responsive" style="display: inline-table; height: 500px;">
                <thead style="background: #43AB85; color: #fff;">
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Cumpleaños</th>
                    <th>Sexo</th>
                    <th>Tipo de suscripcion</th>
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
          <div class="col-sm-4">
            <div class="white-square">
              <h5 class="Raleway how-we-are">Ingresos del día</h5>
              <h5 style="color: #1FAB9E; font-size: 18px;">$ 578.00</h5>
              <h5 class="Raleway how-we-are">Ingresos de los últimos 7 días</h5>
              <h5 style="color: #B1D781; font-size: 18px;">$ 8978.00</h5>
              <h5 class="Raleway how-we-are">Ingresos de los últimos 30 días</h5>
              <h5 style="color: #FAD02F; font-size: 18px;">$ 15678.00</h5>
            </div>
            <br />
            <div class="white-square">
              <h5 class="Raleway how-we-are">Contador de suscripciones al 21 Nov 2017</h5>
              <canvas id="canvas2" style="height: 200px; width:100%;"></canvas>
            </div>
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="./js/Chart.bundle.js"></script>
  <script type="text/javascript" src="./js/utils.js"></script>
  <script type="text/javascript" src="./js/moment.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#customers').DataTable();
    });

    var color = Chart.helpers.color;

    var config = {
      type: 'line',
      data: {
        labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
        datasets: [{
          label: "Visitas",
          backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
          borderColor: window.chartColors.blue,
          data: [
            22,
            26,
            31,
            27,
            33,
            37,
            0
          ],
        }]
      },
      options: {
        responsive: true,
        title:{
          display:true,
          text:'Visitas en la ultima semana'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Dia'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: '# Visitas'
            }
          }]
        }
      }
    };


    var config2 = {
      type: 'line',
      data: {
        labels: ["Visita", "Semanal", "Mensual", "Anual"],
        datasets: [{
          label: "Visitas",
          backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
          borderColor: window.chartColors.red,
          data: [
            45,
            5,
            14,
            3
          ],
          fill: 'start'
        }]
      },
      options: {
        elements: {
          line: {
            tension: 0
          }
        },
        responsive: true,
        title:{
          display:true,
          text:'Suscripciones'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Suscripcion'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: '# Suscriptores'
            }
          }]
        }
      }
    };

    window.onload = function() {
      var ctx = document.getElementById("canvas").getContext("2d");
      var ctx2 = document.getElementById("canvas2").getContext("2d");
      window.myLine = new Chart(ctx, config);
      window.myLine = new Chart(ctx2, config2);

    };
  </script>
  <script type="text/javascript" src="./js/table_custom.js"></script>
</body>
</html>
