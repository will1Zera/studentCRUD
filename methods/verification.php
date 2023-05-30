<?php

// Manda para tela de login caso não tiver usuário
function verification($path){
    if(!$_SESSION['id']){
        header("location: ".$path);
        exit;
    }
}


?>