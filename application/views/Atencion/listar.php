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
              <h1>Lista de Datos&nbsp;
                <small>Atenciones</small>
              </h1>
            </div>
            <div class="jumbotron">
              <table class="table">
                <thead>
                  <tr>
                    <th>Numero Atención</th>
                    <th>Fecha</th>
                    <th>RUT Paciente</th>
                    <th>RUT Medico</th>
                    <th>Estado</th>
                    <th>Hora</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($_SESSION['dataAtencion'] as $value) {?>
                    <?php echo '<tr>'?>
                    <?php echo '<td>'.$value->numero.'</td>'?>
                    <?php echo '<td>'.$value->fecha.'</td>'?>
                    <?php echo '<td>'.$value->rut_paciente.'</td>'?>
                    <?php echo '<td>'.$value->rut_medico.'</td>'?>
                    <?php echo '<td>'.$value->estado.'</td>'?>
                    <?php echo '<td>'.$value->hora.'</td>'?>
                    <?php echo '</tr>'?>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>