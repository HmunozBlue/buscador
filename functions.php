<?php

function bin_debug($var = ""){
    print "<pre style='text-align: left!important'>";
    print_r($var);
    print "</pre>";
}

function header_view($data=""){
    $viewHeader = "header.php";
    require_once ($viewHeader);
}

function wsRefreshTokenOauth(){
    
    $url = "https://ws.mibluemedical.com:8443/oauth/v2/token";

    $arrInfo = array();
    $arrInfo["client_id"] = "faf203eebc90778b";
    $arrInfo["client_secret"] = "2c9751637e5733774776bb74af0d55417e1511403bd2adc33efc55cdaeb57022";
    $arrInfo["grant_type"] = "refresh_token";
    $arrInfo["scope"] = "persona";
    $arrInfo["refresh_token"] = "cacdd6cd20ebe3e1b70804e2733e16e1";

    $request = json_encode($arrInfo);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $arrInfo = curl_exec($ch);
    curl_close($ch);
    return $arrInfo;
}

function get_patient($strTokenOauth, $intTel){
    $strToken = !empty($strTokenOauth) ? $strTokenOauth : "";
    $intTel = intval($intTel);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://ws.mibluemedical.com:8443/pacientes/persona/find?celular=".$intTel,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer {$strToken}",
        ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);

curl_close($curl);
//echo $response;
return $response;
}