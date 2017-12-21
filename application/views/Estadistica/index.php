<html>
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Includes para la generación de Gráficos-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!--Includes para la generación de Gráficos-->

    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
    rel="stylesheet" type="text/css">
    <style>
      .filterable {
    	margin-top: 15px;
		}
        .filterable2 {
            margin-top: 15px;
        }
		.filterable .panel-heading .pull-right {
    		margin-top: -20px;
		}
        .filterable2 .panel-heading .pull-right {
            margin-top: -20px;
        }
        .filterable2 .filters2 input[disabled] {
            background-color: transparent;
    		border: none;
    		cursor: auto;
    		box-shadow: none;
    		padding: 0;
    		height: auto;
        }
		.filterable .filters input[disabled] {
    		background-color: transparent;
    		border: none;
    		cursor: auto;
    		box-shadow: none;
    		padding: 0;
    		height: auto;
		}
        .filterable2 .filters2 input[disabled]::-webkit-input-placeholder {
    		color: #333;
		}
		.filterable2 .filters2 input[disabled]::-moz-placeholder {
    		color: #333;
		}
		.filterable2 .filters2 input[disabled]:-ms-input-placeholder {
    		color: #333;
		}
		.filterable .filters input[disabled]::-webkit-input-placeholder {
    		color: #333;
		}
		.filterable .filters input[disabled]::-moz-placeholder {
    		color: #333;
		}
		.filterable .filters input[disabled]:-ms-input-placeholder {
    		color: #333;
		}
    </style>
    <script>
      $(document).ready(function(){
          $('.filterable .btn-filter').click(function(){
              var $panel = $(this).parents('.filterable'),
              $filters = $panel.find('.filters input'),
              $tbody = $panel.find('.table tbody');
              if ($filters.prop('disabled') == true) {
                  $filters.prop('disabled', false);
                  $filters.first().focus();
              } else {
                  $filters.val('').prop('disabled', true);
                  $tbody.find('.no-result').remove();
                  $tbody.find('tr').show();
              }
          });
      
          $('.filterable .filters input').keyup(function(e){
              /* Ignore tab key */
              var code = e.keyCode || e.which;
              if (code == '9') return;
              /* Useful DOM data and selectors */
              var $input = $(this),
              inputContent = $input.val().toLowerCase(),
              $panel = $input.parents('.filterable'),
              column = $panel.find('.filters th').index($input.parents('th')),
              $table = $panel.find('.table'),
              $rows = $table.find('tbody tr');
              /* Dirtiest filter function ever ;) */
              var $filteredRows = $rows.filter(function(){
                  var value = $(this).find('td').eq(column).text().toLowerCase();
                  return value.indexOf(inputContent) === -1;
              });
              /* Clean previous no-result if exist */
              $table.find('tbody .no-result').remove();
              /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
              $rows.show();
              $filteredRows.hide();
              /* Prepend no-result row if all rows are filtered */
              if ($filteredRows.length === $rows.length) {
                  $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
              }
          });
      });
    </script>
    <script>
      $(document).ready(function(){
          $('.filterable2 .btn-filter2').click(function(){
              var $panel = $(this).parents('.filterable2'),
              $filters = $panel.find('.filters2 input'),
              $tbody = $panel.find('.table tbody');
              if ($filters.prop('disabled') == true) {
                  $filters.prop('disabled', false);
                  $filters.first().focus();
              } else {
                  $filters.val('').prop('disabled', true);
                  $tbody.find('.no-result').remove();
                  $tbody.find('tr').show();
              }
          });
      
          $('.filterable2 .filters2 input').keyup(function(e){
              /* Ignore tab key */
              var code = e.keyCode || e.which;
              if (code == '9') return;
              /* Useful DOM data and selectors */
              var $input = $(this),
              inputContent = $input.val().toLowerCase(),
              $panel = $input.parents('.filterable2'),
              column = $panel.find('.filters2 th').index($input.parents('th')),
              $table = $panel.find('.table'),
              $rows = $table.find('tbody tr');
              /* Dirtiest filter function ever ;) */
              var $filteredRows = $rows.filter(function(){
                  var value = $(this).find('td').eq(column).text().toLowerCase();
                  return value.indexOf(inputContent) === -1;
              });
              /* Clean previous no-result if exist */
              $table.find('tbody .no-result').remove();
              /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
              $rows.show();
              $filteredRows.hide();
              /* Prepend no-result row if all rows are filtered */
              if ($filteredRows.length === $rows.length) {
                  $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters2 th').length +'">No result found</td></tr>'));
              }
          });
      });
    </script>
    <script>
    $(document).ready(function () {

            var data = $('table#pacientes tbody tr').map(function (index) {
                var cols = $(this).find('td');
                return {
                    nombre: cols[1].innerHTML,
                    edad: cols[2].innerHTML // parse int
                };
            }).get();
            //alert(JSON.stringify(data));
            var xyz = JSON.stringify(data);
            //alert(xyz);
            Morris.Bar({
                element: 'area-grafico',
                data: $.parseJSON(xyz),
                xkey: ['nombre'],
                ykeys: ['edad'],
                labels: ['Edad']
            });

        });
    </script>
    <script>
    $(document).ready(function () {

            var data = $('table#atenciones tbody tr').map(function (index) {
                var cols = $(this).find('td');
                return {
                    numero: cols[0].innerHTML,
                    estado: cols[4].innerHTML // parse int
                };
            }).get();
            //alert(JSON.stringify(data));
            var xyz = JSON.stringify(data);
            //alert(xyz);
            Morris.Bar({
                element: 'area-grafico2',
                data: $.parseJSON(xyz),
                xkey: ['numero'],
                ykeys: ['estado'],
                labels: ['Estado']
            });

        });
    </script>
  </head>
  
  <body>
    <div class="cover">
      <div class="cover-image" style="background-image: url(https://unsplash.imgix.net/photo-1418065460487-3e41a6c84dc5?q=25&amp;fm=jpg&amp;s=127f3a3ccf4356b7f79594e05f6c840e);"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1>Panel de Estadísticas&nbsp;
                <small>Tablas Dinámicas</small>
              </h1>
            </div>
            <div class="jumbotron">
              <div class="page-header">
                <h2>Estadísticas de Pacientes&nbsp;
                  <small>Tablas Filtradas</small>
                </h2>
              </div>
              <div class="panel panel-primary filterable">
                <div class="panel-heading">
                  <h3 class="panel-title">Pacientes</h3>
                  <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter">
                      <span class="glyphicon glyphicon-filter"></span>Filter</button>
                  </div>
                </div>
                <table class="table" id="pacientes">
                  <thead>
                    <tr class="filters">
                      <th><input type="text" class="form-control" placeholder="RUT" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Edad" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Sexo" disabled></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($_SESSION['dataEstadisticaPaciente'] as $value) {?>
                    <?php echo '<tr class="paciente">'?>
                    <?php echo '<td>'.$value->rut.'</td>'?>
                    <?php echo '<td>'.$value->nombre_comp.'</td>'?>
                    <?php $fecha = time() - strtotime($value->fecha_nacimiento);?>
                    <?php $edad = floor((($fecha / 3600) / 24) / 360);?>
                    <?php echo '<td>'.$edad.'</td>'?>
                    <?php echo '<td>'.$value->sexo.'</td>'?>
                    <?php echo '</tr>'?>
                  <?php }?>
                  </tbody>
                </table>
                <hr>
                <div class="page-header">
                <h2>Estadísticas de Pacientes&nbsp;
                  <small>Gráfico de Barras</small>
                </h2>
              </div>
                <div id="area-grafico" style="margin: auto;"></div>
                <hr>
                <div class="page-header">
                  <h2>Estadísticas de Atenciones&nbsp;
                    <small>Tablas Filtradas</small>
                  </h2>
                </div>
                <div class="panel panel-primary filterable2">
                  <div class="panel-heading">
                    <h3 class="panel-title">Atenciones</h3>
                    <div class="pull-right">
                      <button class="btn btn-default btn-xs btn-filter2">
                        <span class="glyphicon glyphicon-filter"></span>Filter</button>
                    </div>
                  </div>
                  <table class="table" id="atenciones">
                    <thead>
                      <tr class="filters2">
                        <th><input type="text" class="form-control" placeholder="Numero Atención" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Fecha" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Paciente" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Médico" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Estado" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Hora" disabled></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($_SESSION['dataEstadisticaAtencion'] as $value) {?>
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
                  <hr>
                    <div class="page-header">
                    <h2>Estadísticas de Atenciones&nbsp;
                    <small>Gráfico de Barras</small>
                    </h2>
                  </div>
                <div id="area-grafico2" style="margin: auto;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>