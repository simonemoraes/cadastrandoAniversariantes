<?php

function dataMysqlParaPtBr($dataMysql) {
    $data = new DateTime($dataMysql);
    return $data->format("d/m/Y");    
}
