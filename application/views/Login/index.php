<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.github.io/templates/blank/theme.css" type="text/css"> </head>

<body class="bg-inverse">
<?php $this->load->view('estructura/login-nav'); ?>
  <div class="py-5 bg-faded my-5">
    <div class="container">
      <div class="jumbotron">
        <div class="row">
          <div class="col-md-12">
            <form class="px-5" method="POST" action="<?php echo base_url('CI_Login/iniciarsesion') ?>">
              <div class="form-group"> <label>Nombre de Usuario</label>
                <input type="text" placeholder="Ingrese Nombre de Usuario" class="form-control" name="usuario" required> </div>
              <div class="form-group"> <label>Contraseña<br></label>
                <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="password" required> </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>

</html>