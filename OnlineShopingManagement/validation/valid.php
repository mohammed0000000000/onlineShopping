<?php

function validInput($name){
    return strlen($name) > 0;
}

function validFile($fileName){
    return !$_FILES[$fileName]['error'] == UPLOAD_ERR_OK;
}
?>