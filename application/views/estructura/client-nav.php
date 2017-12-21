<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.github.io/templates/blank/theme.css" type="text/css"> </head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-faded text-center">
    <div class="container">
      <a class="navbar-brand" href="#">Hospital Tetengo - Paciente
        <br> </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('CI_Login/index') ?>">Cerrar Sesion
              <br> </a>
          </li>
          <li class="nav-item">
            <div class="btn-group mx-1">
              <button class="btn dropdown-toggle btn-default" data-toggle="dropdown"> Consultar Información </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url('CI_Atencion/consultar') ?>">Atenciones</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <div class="btn-group mx-1">
              <button class="btn dropdown-toggle btn-default" data-toggle="dropdown"> Listar Datos </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url('CI_Atencion/listar')?>">Atenciones</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>

</html>