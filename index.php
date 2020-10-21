<?php
require_once 'funciones/functions.php';
header_view();
?>

<body class="container">
  <!-- BUSQUEDA-->
  <br>
  <div class="tab-content">
          <div id="busqueda" class="tab-pane active" role="tabpanel">
              <form action="formulario.php" name="formulario" method="post">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <button type="submit"  class="btn btn-primary"><i class="fas fa-mobile-alt"></i></button>
                  </div>
                  <input type="number" id="telefono" name="telefono" class="form-control" placeholder="Busqueda por Número de Teléfono" required>
              </div>
              </form>
          </div>
  </body>
  </html>