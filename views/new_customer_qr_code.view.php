<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/png" href="icons/center.png"/>
  <link rel="shortcut icon" type="image/png" href="icons/center.png"/>
  <link rel="stylesheet" href="../css/bootstrap.css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/custom.css">
  <link rel="stylesheet" href="../css/animate.css">

  <link rel="stylesheet" href="../css/jquerysctipttop.css">
  <link rel="stylesheet" href="../css/sweetalert.css">
  <link rel="stylesheet" href="../css/fileinput.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Sura" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <link rel="stylesheet" href="../css/jquery.datetimepicker.css">
  <title>Center Gym Admin</title>
</head>
<body>
  <div class="content-platform">
    <?php include './menu-superior.view.php'; ?>
    <?php include './menu-lateral-izquierda.view.php' ;?>
    <div class="contenedor-lateral-derecha">
      <div class="first-section">
        <div class="row">
          <div class="col-sm-12">
            <div class="white-square" style="padding: 30px;">
              <!-- Alerta -->
              <div class="row">
                <div class="col-lg-12" id="estadisticas">
                  <h3 class="Raleway how-we-are" style="color: #3AAB83;">Cliente registrado! :)</h3>
                  <h5 class="Raleway how-we-are">Familia Center Gym</h5>
                  <div id="qr_code">

                  </div>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/qrcode.min.js"></script>
</body>
</html>
