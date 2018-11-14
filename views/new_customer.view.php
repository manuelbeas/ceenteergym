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

  <link rel="stylesheet" href="css/jquerysctipttop.css">
  <link rel="stylesheet" href="css/sweetalert.css">
  <link rel="stylesheet" href="css/fileinput.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Sura" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery.datetimepicker.css">
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
                  <h3 class="Raleway how-we-are" style="color: #3AAB83;">Registrar nuevo cliente</h3>
                  <h5 class="Raleway how-we-are">Familia Center Gym</h5>
                  <form id="new_customer" action="create_customer.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-4">
                      <br />

                        <div class="form-group">
                          <h5 class="Raleway how-we-are text-16-blue">Nombre</h5>
                          <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                          <p id="name_message" style="color: red;"></p>
                        </div>
                        <div class="form-group">
                          <h5 class="Raleway how-we-are text-16-blue">Apellidos</h5>
                          <input type="text" class="form-control form-control-sm" id="apellidos" name="apellidos" placeholder="Ingrese sus apellidos">
                          <p id="lastname_message" style="color: red;"></p>
                        </div>
                        <div class="form-group">
                          <h5 class="Raleway how-we-are text-16-blue">Dirección</h5>
                          <textarea class="form-control form-control-sm" id="domicilio" name="domicilio" placeholder="Ingrese su dirección" rows="3"></textarea>
                          <p id="address_message" style="color: red;"></p>
                        </div>
                        <div class="form-group">
                          <h5 class="Raleway how-we-are text-16-blue">Fecha de nacimiento</h5>
                          <input type="text" class="form-control form-control-sm" id="datetimepicker1" name="fecha_nac"  style="width: 50%;">
                          <p id="birthday_message" style="color: red;"></p>
                        </div>
                        <div class="form-group">
                          <h5 class="Raleway how-we-are text-16-blue">Sexo</h5>
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="hombre"> Hombre
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="mujer" checked> Mujer
                            </label>
                          </div>
                          <p id="gender_message" style="color: red;"></p>
                        </div>
                        <div class="form-group">
                          <h5 class="Raleway how-we-are text-16-blue">Tipo de inscripcion</h5>
                          <select class="form-control form-control-sm" id="inscripcion" name="inscripcion" style="width: 50%;">
                            <?php
                            foreach($resultados as $suscripcion){
                              echo "<option value=" . $suscripcion['id_suscripciones'] . ">" . $suscripcion['suscripcion'] . "</option>";
                            }
                            ?>
                          </select>
                          <p id="suscribe_message" style="color: red;"></p>
                        </div>
                        <br />

                        <button type="submit" class="btn btn-success btn-sm btn-outline-success">Registrar</button>

                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <h5 class="Raleway how-we-are text-16-blue">Agregue una foto de perfil</h5>
                        <br />

                        <input type="file" class="btn btn-info" id="imagen" name="imagen" accept="image/*">
                      </div>
                    </div>
                  </div>
                  </form>
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

  <script type="text/javascript" src="./js/sweetalert.min.js"></script>
  <script type="text/javascript" src="./js/fileinput.min.js"></script>
  <script type="text/javascript" src="./js/jquery.datetimepicker.full.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <script type="text/javascript">

    $(".close").click(function(){
        $("#myAlert").alert("close");
    });

    $("#imagen").fileinput({
        uploadUrl: "localhost",
        showCaption: false,
        minFileCount: 1,
        maxFileCount: 1,
        showUpload: false,
        showRemove: true,
    });

    $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'd-m-Y',
          timepicker: false
        });

    });

    document.querySelector("#new_customer").addEventListener('submit', function(e){
      var customer = $('#nombre').val();
      e.preventDefault();

      var form = this;

      if(!checkFields())
      {
          sweetAlert("¡Un momento!", "Faltan algunos datos por añadir", "error");
      }
      else
      {
        swal({
            title: "Alerta de confirmación",
            text: "¿Desea añadir a "+ customer + " al registro?",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
        function(){
            swal("¡Muy bien!", "¡Un nuevo miembro se ha unido a la familia Center Gym!", "success")
            setTimeout(function(){
                form.submit();
            }, 2000);
        });
      }

    });

    function checkFields(){
      var imp1 = document.getElementById("nombre").value;
      var imp2 = document.getElementById("apellidos").value;
      var imp3 = document.getElementById("datetimepicker1").value;
      var result = true;

      if(imp1 == '')
      {
          sweetAlert("¡Un momento!", "Faltan algunos datos por añadir", "error");
          $('#name_message').text('Ingrese el nombre');
          result = false;
      }
      if(imp2 == '')
      {
          sweetAlert("¡Un momento!", "Faltan algunos datos por añadir", "error");
          $('#lastname_message').text('Ingrese apellidos');
          result = false;
      }
      if(imp3 == '')
      {
          sweetAlert("¡Un momento!", "Faltan algunos datos por añadir", "error");
          $('#birthday_message').text('Ingrese fecha de nacimiento');
          result = false;
      }

      return result;
      /*else if(imp5 == '')
      {
          sweetAlert("¡Un momento!", "Faltan algunos datos por añadir", "error");
          return false;
      }*/

    }

  </script>
  <script type="text/javascript" src="./js/qrcode.min.js"></script>
</body>
</html>
