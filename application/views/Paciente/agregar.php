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
                  <span style="font-size: 40.95px; line-height: 40.95px;">Paciente</span>
                </font>
              </h1>
            </div>
            <div class="jumbotron">
              <form role="form" method="POST" action="<?php echo base_url('CI_Paciente/insertarPaciente') ?>">
                <div class="form-group">
                  <label class="control-label" for="exampleInputEmail1">Rut Paciente</label>
                  <input class="form-control" type="text" required=""
                  name="rut">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Nombre Completo</label>
                  <input class="form-control" type="text" required=""
                  name="nombre">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Fecha de Nacimiento</label>
                  <input class="form-control" type="date" required=""
                  name="fecha_nac">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Sexo</label>
                  <select name="sexo" class="form-control" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Dirección</label>
                  <input class="form-control" type="text" required="" name="direccion">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Numero Celular</label>
                  <input class="form-control" type="number" required=""
                  name="celular">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Numero Red Fija</label>
                  <input class="form-control" type="number" required=""
                  name="fijo">
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