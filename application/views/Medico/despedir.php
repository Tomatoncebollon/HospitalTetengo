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
              <h1>Despidos&nbsp;
                <small>Médicos</small>
              </h1>
            </div>
            <div class="jumbotron">
              <table class="table">
                <thead>
                  <tr>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Fecha Contratación</th>
                    <th>Especialidad</th>
                    <th>Valor de Consulta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($_SESSION['dataMedico'] as $value) {?>
                    <?php echo '<tr>'?>
                    <?php echo '<td>'.$value->rut.'</td>'?>
                    <?php echo '<td>'.$value->nombre_comp.'</td>'?>
                    <?php echo '<td>'.$value->fecha_contrata.'</td>'?>
                    <?php echo '<td>'.$value->especialidad.'</td>'?>
                    <?php echo '<td>'.$value->valor_consul.'</td>'?>
                    <?php echo '</tr>'?>
                  <?php }?>
                </tbody>
              </table>
              <form role="form" method="POST" action="<?php echo base_url('CI_Medico/despedirMedico') ?>">
                <div class="form-group">
                  <label class="control-label" for="exampleInputEmail1">Ingrese el rut del médico que desea despedir</label>
                  <input class="form-control"
                  id="exampleInputEmail1" type="text" required="" name="rut">
                </div>
                <button type="submit" class="btn btn-default">Despedir Médico</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>