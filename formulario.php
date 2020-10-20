<?php
require_once 'funciones/functions.php';

$celular = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
//Refresca el TOKEN oAuth
$arrTokenOauth = wsRefreshTokenOauth();
$arrTokenOauth = json_decode($arrTokenOauth, true);
$strTokenOauth = (isset($arrTokenOauth["data"]["accessToken"])) ? $arrTokenOauth["data"]["accessToken"] : '';
$intTel = $celular; //50974983 59783316 32717730

//trae paciente
$arrPatient = get_patient($strTokenOauth, $intTel);

//debug($arrTokenOauth);
//debug($strTokenOauth);

//debug($arrPatient);

header_view();
?>

<body class="container">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <h5 class="modal-title text-center"><strong>Crear Usuario</strong></h5>
      </div>
      <form id="CrearUsuario" action="">
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>

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
        <div id="tblPaciente">
            <?php
            if (is_array($arrPatient)) {
                if ($arrPatient > 0) {
                    ?>
                        <table id="tblPacienteEncontrado" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>nombres</th>
                                    <th>apellidos</th>
                                    <th>Género</th>
                                    <th>fecha de nacimiento</th>
                                    <th>DPI</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach ($arrPatient["data"] as $keyPatient => $Paciente) {
                                            //debug($Paciente);
                                    ?>
                                        <tr>
                                            <td><?=$Paciente["primerNombre"]?>&nbsp;<?=$Paciente["segundoNombre"]?></td>
                                            <td><?=$Paciente["primerApellido"]?>&nbsp;<?=$Paciente["segundoApellido"]?></td>
                                            <td><?=strtoupper($Paciente["sexo"])?></td>
                                            <td><?=$Paciente["fechaNacimiento"]?></td>
                                            <td><?=$Paciente["numeroDocIdentificacion"]?></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php
                }
            } else {
                ?>
                <p><strong>No existen valores</strong></p></t>
                <p>¿Desea agregar paciente?</p> </n> 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear</button> &nbsp;
                <a class="btn btn-secondary"  href="javascript:history.back()"><i class="fa fa-arrow-left"></i>&nbsp; Regresar</a>
                <!-- modal para ingresar nuevo paciente-->
                <?php
            }
            ?>
        </div><!--IDtbl Paciente-->
</div><!--tabcontent-->
</body>
</html>
