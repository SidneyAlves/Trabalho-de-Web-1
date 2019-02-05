<?php

ini_set("display_errors",true);

 $url;
 
function getUrl() {
    $url = "http://localhost/ProjetaoTop"; //Altere o nome da pasta se necessário
    return $url;
}

//tratamento de datas
function dateToBR($dataAmericana){
 $d = explode('-',$dataAmericana);
 $dOK = $d[2].'/'.$d[1].'/'.$d[0];
 return $dOK;        
}

function dateToUS($dataBrasil){
 $d = explode('/',$dataBrasil);
 $dOK = $d[2].'-'.$d[1].'-'.$d[0];
 return $dOK;        
}    

function dateTimeToBR($data_americana_his){
    $d = explode(' ',$data_americana_his);
    $ok = dateToBR($d[0]).' '.$d[1];
    return $ok;        
}

function dateTimeToUS($data_br_his){
    $d = explode(' ',$data_br_his);
    $ok = dateToUS($d[0]).' '.$d[1];
    return $ok;        
}

function debug($e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
}
?>