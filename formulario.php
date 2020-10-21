<?php
require_once 'funciones/functions.php';

//Celular
$celular = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$intTel = $celular; //50974983 59783316 32717730

//Refresca el TOKEN oAuth
$arrTokenOauth = wsRefreshTokenOauth();
$arrTokenOauth = json_decode($arrTokenOauth, true);
$strTokenOauth = (isset($arrTokenOauth["data"]["accessToken"])) ? $arrTokenOauth["data"]["accessToken"] : '';

//trae paciente
$arrPatient = get_patient($strTokenOauth, $intTel);

//Generador de pass
$arrPass = passGenerator();

header_view();
?>
<body class="container">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <h5 class="modal-title text-center"><strong>Crear Usuario</strong></h5>
      </div>
      <form action="UserCreado.php" name="formulario" method="post">
            <div class="modal-body">
                <!--Nombres-->
                <label for="message-text" class="col-form-label">Nombres:</label></br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="primerNombre" placeholder="Primer nombre.." required>
                        <input type="text" class="form-control" name="segundoNombre" placeholder="Segundo nombre..">
                    </div>
                <!--Apellidos-->
                <label for="message-text" class="col-form-label">Apellidos:</label></br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="primerApellido" placeholder="Primer apellido.." required>
                        <input type="text" class="form-control" name="segundoApellido" placeholder="Segundo apellido..">
                    </div></br>
                <!--Apellido Casada Y Fecha de nacimiento -->
                <label for="message-text" class="col-form-label">Apellido de Casada:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <label for="message-text" class="col-form-label">Fecha de Nacimiento:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="apellidoCasada" placeholder="Apellido Casada..">

                        <div class="input-group-prepend">
                            <span class="input-group-text" id=""><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="fecha">
                    </div></br>
                <!--tipo sangre Medio de información y Género-->
                <label for="message-text" class="col-form-label">Tipo de sangre:</label>&emsp;
                <label for="message-text" class="col-form-label">Medio de información:</label>&emsp;&emsp;
                <label for="message-text" class="col-form-label">Género:</label>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-tint"></i></span>
                                    <select style="width:120px" class="form-control" id="blood" name="sangre">
                                        <option value="1" selected>O+</option>
                                        <option value="2">O-</option>
                                        <option value="3">A+</option>
                                        <option value="4">A-</option>
                                        <option value="5">B+</option>
                                        <option value="6">B-</option>
                                        <option value="5">AB+</option>
                                        <option value="6">AB-</option>
                                    </select>
                                    &emsp;<span class="input-group-text" ><i class="fas fa-info-circle"></i></span>
                                    <select style="width:120px" class="form-control" id="information" name="informacion">
                                        <option value="1" selected>Web</option>
                                        <option value="2">Call Center</option>
                                        <option value="3">Familiar</option>
                                        <option value="4">Redes Sociales</option>
                                        <option value="5">Otros</option>
                                    </select>
                                    &emsp;<span class="input-group-text" ><i class="fas fa-venus-mars"></i></span>
                                    <select style="width:105px" class="form-control" id="genere" name="genero">
                                        <option value="M" selected>Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PAIS Y DPI-->
                    <label for="message-text" class="col-form-label">País:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                    <label for="message-text" class="col-form-label">DPI:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                        </div>
                        <select class="form-control" id="country" name="pais">
                                <option value="1" selected>Guatemala</option>
                                <option value="15">Costa Rica</option>
                        </select>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                        </div>
                        <input type="number" class="form-control" name="dpi" placeholder="Sin espacios ni guiónes" required>
                    </div>
                    <!--CORREO ELECTRONICO-->
                    <label for="message-text" class="col-form-label">Correo electrónico:</label></br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="email" class="form-control" name="mail">
                    </div>
                    <!--CELULAR-->
                    <label for="message-text" class="col-form-label">Celular:</label></br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <input type="number" class="form-control" name="celular" required>
                    </div>
                    <!--TEMPLATE Y PASSWORD-->
                        <div class="input-group">
                            <input type="hidden" class="form-control" name="template" value="SG" readonly required>

                            <input type="hidden" class="form-control" name="password" value="<?=$arrPass?>" readonly required>
                        </div>
            </div><!--MODAL BODY -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
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
                        <a href="index.php"><i class="fas fa-arrow-left"></i> Regresar</a></br></br>
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
