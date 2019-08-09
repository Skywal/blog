<?php
//службові функції

function debug ($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function beautifyText($arr, $start = 0, $txtLength = 255, $endStr = ' ...'){
    foreach ($arr as $elem){
        $elem->text = substr($elem->text, $start, $txtLength) . $endStr;
    }
}