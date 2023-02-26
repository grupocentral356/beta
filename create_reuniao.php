<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
        echo "<script>alert('Para acessar esta página é necessário fazer login.');
		window.location.href='index.php';</script>";
	exit();
}

header('Content-Type: text/html; charset=utf-8');

include 'conexao.php';
mysqli_set_charset($con, "utf8");


setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

$data = $_POST['data'];
$timestamp = strtotime($data);

$dia_mes = date('d-m-Y', strtotime($data));
$dia_sem = strftime('%a', $timestamp);

if (mb_strtolower(mb_convert_encoding($dia_sem, 'UTF-8', 'ISO-8859-1')) == 'sáb') {
    $dia_sem = 'sab';
}

$post_nome = $_POST["nome"];
$post_nivel_acesso = $_POST["nivel_acesso"];

//  IMPLEMENTAR IF NÍVEL DE ACESSO

$secretario = $_POST["nome"];
$membros = $_POST["membros"];
$ingressos = $_POST["ingressos"];
$trinta_dias = $_POST["trinta_dias"];
$sessenta_dias = $_POST["sessenta_dias"];
$noventa_dias = $_POST["noventa_dias"];
$seis_meses = $_POST["seis_meses"];
$nove_meses = $_POST["nove_meses"];
$um_ano = $_POST["um_ano"];
$dezoito_meses = $_POST["dezoito_meses"];
$mult_anos = $_POST["mult_anos"];
$setima_din = $_POST["setima_din"];
$setima_pix = $_POST["setima_pix"];

if ($stmt = $con->prepare('INSERT INTO reuniao (dia_mes, dia_sem, secretario, membros, ingressos, trinta_dias, 
                                sessenta_dias, noventa_dias, seis_meses, nove_meses, um_ano, dezoito_meses, 
                                mult_anos, setima_din, setima_pix ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)')) {	
        
        $stmt->bind_param('sssssssssssssss', $data, $dia_sem, $secretario, $membros, $ingressos, $trinta_dias, 
                                $sessenta_dias, $noventa_dias, $seis_meses, $nove_meses, $um_ano, $dezoito_meses, 
                                $mult_anos, $setima_din, $setima_pix);
        $stmt->execute();
                        
        echo "<script>alert('Dados registrados, obrigado pelo serviço!');
                window.location.href='relatorio.php';</script>";
                
} else {     // Something is wrong with the sql statement
        echo "<script>alert('Não foi possível cadastrar, verifique os dados inseridos.');
                window.location.href='index.php';</script>";
}

$stmt->close();
$con->close();
exit();
?>