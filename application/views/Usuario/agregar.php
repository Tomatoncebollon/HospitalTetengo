<html>
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
    rel="stylesheet" type="text/css">
  </head>
  
  <body>
    <div class="cover">
      <div class="cover-image" style="background-image: url(https://unsplash.imgix.net/photo-1418065460487-3e41a6c84dc5?q=25&amp;fm=jpg&amp;s=127f3a3ccf4356b7f79594e05f6c840e);"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1>Registro de Datos &nbsp;
                <font color="#777777">
                  <span style="font-size: 40.95px; line-height: 40.95px;">Usuario</span>
                </font>
              </h1>
            </div>
            <div class="jumbotron">
              <form role="form" method="POST" action="<?php echo base_url('CI_Usuario/insertarUsuario') ?>">
                <div class="form-group">
                  <label class="control-label" for="exampleInputEmail1">Nombre Usuario</label>
                  <input class="form-control" type="text" required=""
                  name="user_Name">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Contraseña</label>
                  <input class="form-control" type="password" required=""
                  name="contraseña">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Perfil</label>
                  <select name="perfil" class="form-control" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Director">Director</option>
                    <option value="Secretaria">Secretaria</option>
                    <option value="Paciente">Paciente</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-default">Registrar Datos</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>