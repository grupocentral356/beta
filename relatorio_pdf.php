<?php

// Inicie o buffer de saída
ob_start();

// Código para gerar o PDF usando o TCPDF
require_once('tcpdf/tcpdf.php');

// Conecte-se ao banco de dados MySQL
$mysqli = new mysqli('fdb25.awardspace.net', '3453558_projeto8', 'ZlTNmTKN1TQL5cWnv6)y', '3453558_projeto8');

// Verifique se houve algum erro de conexão
if ($mysqli->connect_error) {
    die('Erro de conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


$periodo = $_POST['periodo'];

$result_reuniao = $mysqli->query("SELECT * FROM reuniao WHERE reuniao.dia_mes BETWEEN $periodo ORDER BY reuniao.dia_mes");

$reunioes = 0;
$membros = 0;
$ingressos = 0;
$trinta_dias = 0;
$sessenta_dias = 0;
$noventa_dias = 0;
$seis_meses = 0;
$nove_meses = 0;
$um_ano = 0;
$dezoito_meses = 0;
$mult_anos = 0;

$setima_din = 0;
$setima_pix = 0;


$data_eua = '1976-01-01';

while ($row = mysqli_fetch_assoc($result_reuniao)) {

        $data_eua = $row['dia_mes'];        

        $reunioes++;
        
        $membros_row = $row['membros'];
        $membros_row = floatval($membros_row);
        $membros += $membros_row;
        
        $ingressos_row = $row['ingressos'];
        $ingressos_row = floatval($ingressos_row);
        $ingressos += $ingressos_row;
        
        $trinta_dias_row = $row['trinta_dias'];
        $trinta_dias_row = floatval($trinta_dias_row);
        $trinta_dias += $trinta_dias_row;
        
        $sessenta_dias_row = $row['sessenta_dias'];
        $sessenta_dias_row = floatval($sessenta_dias_row);
        $sessenta_dias += $sessenta_dias_row;
        
        $noventa_dias_row = $row['noventa_dias'];
        $noventa_dias_row = floatval($noventa_dias_row);
        $noventa_dias += $noventa_dias_row;
        
        $seis_meses_row = $row['seis_meses'];
        $seis_meses_row = floatval($seis_meses_row);
        $seis_meses += $seis_meses_row;
        
        $nove_meses_row = $row['nove_meses'];
        $nove_meses_row = floatval($nove_meses_row);
        $nove_meses += $nove_meses_row;
        
        $um_ano_row = $row['um_ano'];
        $um_ano_row = floatval($um_ano_row);
        $um_ano += $um_ano_row;
        
        $dezoito_meses_row = $row['dezoito_meses'];
        $dezoito_meses_row = floatval($dezoito_meses_row);
        $dezoito_meses += $dezoito_meses_row;
        
        $mult_anos_row = $row['mult_anos'];
        $mult_anos_row = floatval($mult_anos_row);
        $mult_anos += $mult_anos_row;
        
        $setima_din_row = floatval(str_replace(',', '.', str_replace('.', '', $row['setima_din'])));
        $setima_din += $setima_din_row;
        
        $setima_pix_row = floatval(str_replace(',', '.', str_replace('.', '', $row['setima_pix'])));
        $setima_din += $setima_pix_row;
        
}

$media_membros = $membros / $reunioes;
$media_membros_rel = number_format($media_membros, 0, ',', '.');

$total_setima = $setima_din + $setima_pix;
$total_setima_rel = number_format($total_setima, 2, ',', '.');

$media_reuniao = $total_setima / $reunioes;
$media_reuniao_rel = number_format($media_reuniao, 2, ',', '.');

$media_setima_membro = $total_setima / $media_membros;
$media_setima_membro_rel = number_format($media_setima_membro, 2, ',', '.');

//$sdo_anterior = 0;/////////////////////////////////////////////////Q///////////////////PENDENCIAS
//$sdo_anterior_rel = number_format($sdo_anterior, 2, ',', '.');
$sdo_anterior_rel = 'em desenv.';

//$venda_material = 106.00;//////////////////////////////////////////////////////////////PENDENCIAS
//$venda_material_rel = number_format($venda_material, 2, ',', '.');
$venda_material_rel = 'em desenv.';

//$total_entradas = 1204.13;/////////////////////////////////////////////////////////////PENDENCIAS
//$total_entradas_rel = number_format($total_entradas, 2, ',', '.');
$total_entradas_rel = 'em desenv.';

//$despesas = 487.73;////////////////////////////////////////////////////////////////////PENDENCIAS
//$despesas_rel = number_format($despesas, 2, ',', '.');
$despesas_rel = 'em desenv.';

//$saldo_em_caixa = $total_entradas - $despesas;/////////////////////////////////////////PENDENCIAS
//$saldo_em_caixa_rel = number_format($saldo_em_caixa, 2, ',', '.');
$saldo_em_caixa_rel = 'em desenv.';

//$compra_material = 286.40;/////////////////////////////////////////////////////////////PENDENCIAS
//$compra_material_rel = number_format($compra_material, 2, ',', '.');
$compra_material_rel = 'em desenv.';

//$repasse_area = 430.00;////////////////////////////////////////////////////////////////PENDENCIAS
//$repasse_area_rel = number_format($repasse_area, 2, ',', '.');
$repasse_area_rel = 'em desenv.';

//$saldo_prox_periodo = 0;///////////////////////////////////////////////////////////////PENDENCIAS
//$saldo_prox_periodo_rel = number_format($saldo_prox_periodo, 2, ',', '.');
$saldo_prox_periodo_rel = 'em desenv.';


// Inicialize um novo objeto TCPDF
$pdf = new TCPDF();

// Adicione uma página ao documento PDF
$pdf->AddPage();


$periodo = $_POST['periodo'];
$datas = explode(" AND ", $periodo);
$data_inicio = DateTime::createFromFormat('Y-m-d', trim($datas[0], "'"));
$data_fim = DateTime::createFromFormat('Y-m-d', trim($datas[1], "'"));

$timestamp = strtotime($data_eua);
$data_br = date('d-m', $timestamp);
$data_atualizacao = str_replace("-", "/", $data_br);

$info_periodo = 'Período: de ' . $data_inicio->format('d/m') . ' à ' .  $data_fim->format('d/m/Y') 
                . ' (Atualização ' . $data_atualizacao . ')';


$pdf->SetFont('helvetica', '', 13);
$pdf->Cell(190, 9, 'Grupo Central de Indaiatuba - CSA Unidade', 1, 0, 'C');
$pdf->Ln();
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(190, 7, $info_periodo, 1, 0, 'C');
$pdf->Ln();
$pdf->Cell(190, 6, 'Relatório disponível em:  http://grupocentral356.atwebpages.com', 1, 0, 'C');
$pdf->Ln();


/// SECRETARIA ///

$pdf->Ln();
$pdf->SetFont('helvetica', '', 13);
$pdf->Cell(190, 9, 'Secretaria', 1, 0, 'C');
$pdf->Ln();

$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(31, 6, 'Reuniões', 1, 0, 'C');
$pdf->Cell(31, 6, 'Média membros', 1, 0, 'C');
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(32, 6, 'Ingressos', 1, 0, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(12, 6, '30d', 1, 0, 'C');
$pdf->Cell(12, 6, '60d', 1, 0, 'C');
$pdf->Cell(12, 6, '90d', 1, 0, 'C');
$pdf->Cell(12, 6, '6m', 1, 0, 'C');
$pdf->Cell(12, 6, '9m', 1, 0, 'C');
$pdf->Cell(12, 6, '1a', 1, 0, 'C');
$pdf->Cell(12, 6, '18m', 1, 0, 'C');
$pdf->Cell(12, 6, 'Mult', 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(31, 6, $reunioes, 1, 0, 'C');
$pdf->Cell(31, 6, $media_membros_rel, 1, 0, 'C');
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(32, 6, $ingressos, 1, 0, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(12, 6, $trinta_dias, 1, 0, 'C');
$pdf->Cell(12, 6, $sessenta_dias, 1, 0, 'C');
$pdf->Cell(12, 6, $noventa_dias, 1, 0, 'C');
$pdf->Cell(12, 6, $seis_meses, 1, 0, 'C');
$pdf->Cell(12, 6, $nove_meses, 1, 0, 'C');
$pdf->Cell(12, 6, $um_ano, 1, 0, 'C');
$pdf->Cell(12, 6, $dezoito_meses, 1, 0, 'C');
$pdf->Cell(12, 6, $mult_anos, 1, 0, 'C');
$pdf->Ln();


/// TESOURARIA ///

$pdf->Ln();
$pdf->SetFont('helvetica', '', 13);
$pdf->Cell(190, 9, 'Tesouraria', 1, 0, 'C');
$pdf->Ln();

$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(33, 6, '7a Tradição', 1, 0, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(31, 6, 'Média/reunião', 1, 0, 'C');
$pdf->Cell(31, 6, 'Média/membro', 1, 0, 'C');
$pdf->Cell(31, 6, 'Sdo anterior', 1, 0, 'C');
$pdf->Cell(31, 6, 'Venda material', 1, 0, 'C');
$pdf->Cell(33, 6, 'Total entradas', 1, 0, 'C');
$pdf->Ln();
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(33, 6, $total_setima_rel, 1, 0, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(31, 6, $media_reuniao_rel, 1, 0, 'C');
$pdf->Cell(31, 6, $media_setima_membro_rel, 1, 0, 'C');
$pdf->Cell(31, 6, $sdo_anterior_rel, 1, 0, 'C');
$pdf->Cell(31, 6, $venda_material_rel, 1, 0, 'C');
$pdf->Cell(33, 6, $total_entradas_rel, 1, 0, 'C');
$pdf->Ln();
$pdf->Cell(38, 6, 'Despesas', 1, 0, 'C');
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(38, 6, 'Saldo em Caixa', 1, 0, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(38, 6, 'Compra Material', 1, 0, 'C');
$pdf->Cell(38, 6, 'Repasse p/Área', 1, 0, 'C');
$pdf->Cell(38, 6, 'Sdo próx.período', 1, 0, 'C');
$pdf->Ln();
$pdf->Cell(38, 6, $despesas_rel, 1, 0, 'C');
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(38, 6, $saldo_em_caixa_rel, 1, 0, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(38, 6, $compra_material_rel, 1, 0, 'C');
$pdf->Cell(38, 6, $repasse_area_rel, 1, 0, 'C');
$pdf->Cell(38, 6, $saldo_prox_periodo_rel, 1, 0, 'C');
$pdf->Ln();


/// REUNIÕES ///

$pdf->Ln();
$pdf->SetFont('helvetica', '', 13);
$pdf->Cell(190, 9, 'Reuniões', 1, 0, 'C');
$pdf->Ln();

$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(30, 6, 'Data', 1, 0, 'C');
$pdf->Cell(24, 6, 'Responsável', 1, 0, 'C');
$pdf->Cell(17, 6, 'Membros', 1, 0, 'C');
$pdf->Cell(17, 6, 'Ingressos', 1, 0, 'C');
$pdf->Cell(9, 6, '30d', 1, 0, 'C');
$pdf->Cell(9, 6, '60d', 1, 0, 'C');
$pdf->Cell(9, 6, '90d', 1, 0, 'C');
$pdf->Cell(9, 6, '6m', 1, 0, 'C');
$pdf->Cell(9, 6, '9m', 1, 0, 'C');
$pdf->Cell(9, 6, '1a', 1, 0, 'C');
$pdf->Cell(10, 6, '18m', 1, 0, 'C');
$pdf->Cell(10, 6, 'Mult', 1, 0, 'C');
$pdf->Cell(14, 6, '7a din', 1, 0, 'C');
$pdf->Cell(14, 6, '7a pix', 1, 0, 'C');
$pdf->Ln();



$result_reuniao2 = $mysqli->query("SELECT * FROM reuniao WHERE reuniao.dia_mes BETWEEN $periodo ORDER BY reuniao.dia_mes");

while ($row = $result_reuniao2->fetch_assoc()) {
        
        $data_eua = $row['dia_mes'];        
        $timestamp = strtotime($data_eua);
        $data_br = date('d-m-Y', $timestamp);
        
        $pdf->Cell(21, 6, $data_br, 1, 0, 'C');
        $pdf->Cell(9, 6, $row['dia_sem'], 1, 0, 'C');
        $pdf->Cell(24, 6, $row['secretario'], 1, 0, 'C');
        $pdf->Cell(17, 6, $row['membros'], 1, 0, 'C');
        $pdf->Cell(17, 6, $row['ingressos'], 1, 0, 'C');
        $pdf->Cell(9, 6, $row['trinta_dias'], 1, 0, 'C');
        $pdf->Cell(9, 6, $row['sessenta_dias'], 1, 0, 'C');
        $pdf->Cell(9, 6, $row['noventa_dias'], 1, 0, 'C');
        $pdf->Cell(9, 6, $row['seis_meses'], 1, 0, 'C');
        $pdf->Cell(9, 6, $row['nove_meses'], 1, 0, 'C');
        $pdf->Cell(9, 6, $row['um_ano'], 1, 0, 'C');
        $pdf->Cell(10, 6, $row['dezoito_meses'], 1, 0, 'C');
        $pdf->Cell(10, 6, $row['mult_anos'], 1, 0, 'C');
        $pdf->Cell(14, 6, $row['setima_din'], 1, 0, 'C');
        $pdf->Cell(14, 6, $row['setima_pix'], 1, 0, 'C');
        $pdf->Ln();
}


/// USUÁRIOS CADASTRADOS ///

/*
$result_membro = $mysqli->query("SELECT * FROM membro");

$pdf->Ln();
$pdf->SetFont('helvetica', '', 13);
$pdf->Cell(190, 9, 'Usuários cadastrados', 1);
$pdf->Ln();
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(10, 8, 'id', 1);
$pdf->Cell(75, 8, 'nome', 1);
$pdf->Cell(75, 8, 'email', 1);
$pdf->Cell(30, 8, 'cpf', 1);
$pdf->Ln();

// Crie uma tabela com os resultados da consulta
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 8, $row['id'], 1);
    $pdf->Cell(75, 8, $row['nome'], 1);
    $pdf->Cell(75, 8, $row['email'], 1);
    $pdf->Cell(30, 8, $row['cpf'], 1);
    $pdf->Ln();
}
*/

// Saída do documento PDF para uma variável
$pdfData = $pdf->Output('', 'S');


// Salvar o PDF no servidor
$file = 'relatório_central.pdf';
file_put_contents($file, $pdfData);


// Limpa o buffer de saída
ob_clean();

// Define o cabeçalho do PDF
//header('Content-Type: application/pdf');
//header('Content-Disposition: attachment; filename="consulta.pdf"');

// Redirecionar para outra página que contém a div com o elemento <embed>
header('Location: relatorio_resultado.php');


// Envie o conteúdo do PDF para o navegador
echo $pdfData;

// Encerre o script
exit;

?>