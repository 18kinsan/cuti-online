<?php

function a($a){
    $date = new DateTime($a);
    $date->add(new DateInterval('P1D'));
    return $date->format("Y-m-d");
}

?>