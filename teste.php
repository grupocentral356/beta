<?php

$periodo = $_POST['periodo'];
$datas = explode(" AND ", $periodo);

var_dump($datas);

$data_inicio = $datas[0];
$data_fim = $datas[1];
$data_inicio_formatada = date('d/m/Y', strtotime($data_inicio));
$data_fim_formatada = date('d/m/Y', strtotime($data_fim));

var_dump($data_inicio);
var_dump($data_fim);
var_dump($data_inicio_formatada);
var_dump($data_fim_formatada);

$titulo_rel = 'Grupo Central de Indaiatuba - ' . $data_inicio_formatada . ' à ' .  $data_fim_formatada;

?>