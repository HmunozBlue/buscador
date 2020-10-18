<?php
require_once 'functions.php';
//Refresca el TOKEN oAuth
$arrTokenOauth = wsRefreshTokenOauth();
$arrTokenOauth = json_decode($arrTokenOauth, true);
$strTokenOauth = $arrTokenOauth["data"]["accessToken"];
$intTel = 32717730; //50974983 59783316 32717730

//trae paciente
$arrPatient = get_patient($strTokenOauth, $intTel);

//bin_debug($arrTokenOauth);
//bin_debug($strTokenOauth);

//bin_debug($arrPatient);

header_view();
?>

<body class="container">
    <div>
        <br>
        <div class="tab-content">
            <div id="busqueda" class="tab-pane active" role="tabpanel">
                <form action="" name="formulario" method="get">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <button type="submit"  class="btn btn-primary"><i class="fas fa-mobile-alt"></i></button>
                    </div>
                    <input type="search" id="telefono" class="form-control" placeholder="Busqueda por Número de Telefono">
                </div>
                </form>
            </div>
            <div id="tblPaciente">
                <?php
                if (is_array($arrPatient)) {
                    if ($arrPatient > 1) {
                        foreach ($arrPatient["data"] as $keyPatient => $Paciente) {
                            bin_debug($Paciente);
                        }
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
