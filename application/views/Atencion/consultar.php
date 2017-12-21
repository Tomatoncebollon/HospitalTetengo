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
  <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
<style>
#myInput {
    background-image: url('/css/searchicon.png'); 
    background-position: 10px 12px; 
    background-repeat: no-repeat; 
    width: 100%; 
    font-size: 16px; 
    padding: 12px 20px 12px 40px; 
    border: 1px solid #ddd; 
    margin-bottom: 12px; 
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
}

#myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd; 
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
}
</style>
  </head>

<body>
<div class="cover">
      <div class="cover-image" style="background-image: url(https://unsplash.imgix.net/photo-1418065460487-3e41a6c84dc5?q=25&amp;fm=jpg&amp;s=127f3a3ccf4356b7f79594e05f6c840e);"></div>
      <div class="container">
  <div class="py-5">
    
      <div class="row">
        <div class="col-md-12"> </div>
     
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Consulta Atencion</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="">
            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Ingrese Numero de Atención:
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Ingrese numero de atención..">
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="jumbotron">
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table" id="myTable">
            <thead>
                  <tr>
                    <th>Numero Atenci�n</th>
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
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>

</html>