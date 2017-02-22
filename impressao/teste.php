<?php

include("exportarDados.php");

$image = new carteirinha;
$image->escola("teste");
$image->nome("pedro");
$image->imprime();