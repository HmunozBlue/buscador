<?php
require_once 'funciones/functions.php';

$celular = $_POST['telefono'];
//Refresca el TOKEN oAuth
$arrTokenOauth = wsRefreshTokenOauth();
$arrTokenOauth = json_decode($arrTokenOauth, true);
$strTokenOauth = $arrTokenOauth["data"]["accessToken"];
$intTel = $celular; //50974983 59783316 32717730

//trae paciente
$arrPatient = get_patient($strTokenOauth, $intTel);

//debug($arrTokenOauth);
//debug($strTokenOauth);

//debug($arrPatient);

header_view();
?>

<body class="container">
    <div>
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
                    if ($arrPatient > 1) {
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
                    <p><strong>No existen valores</strong></p>
                    <?php
                }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>
