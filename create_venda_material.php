<?php
session_start();

echo "<script> console.log(' ');</script>";  ////////// TESTETESTETESTE
echo "<script> console.log(new Date());</script>";  ////////// TESTETESTETESTE
echo "<script> console.log('create_venda_material.php');</script>";  ////////// TESTETESTETESTE
echo '<script> console.log(' . json_encode($_SESSION) . ');</script>';
$nivel_acesso = $_SESSION["nivel_acesso"];
echo "<script> console.log('nivel_acesso: ','$nivel_acesso');</script>";  ////////// TESTETESTETESTE
$nivel_acesso = trim($nivel_acesso);
echo "<script> console.log('trim($nivel_acesso): ','$nivel_acesso');</script>";  ////////// TESTETESTETESTE
$eh_verd = ($nivel_acesso == "membro");
echo "<script> console.log('nivel_acesso==membro eh_verd?: ','$eh_verd');</script>";  ////////// TESTETESTETESTE

if (!isset($_SESSION['loggedin'])) {
        echo "<script>alert('Para acessar esta página é necessário fazer login.');
		window.location.href='index.php';</script>";
	exit();
}

include 'conexao.php';


$nivel_acesso = $_SESSION["nivel_acesso"];


if ($nivel_acesso == "membro") {

        echo "<script> console.log('entrou no if nivel_acesso==membrooooooooooo');</script>";  ////////// TESTETESTETESTE
        
        echo "<script>alert('Somente servidores podem registrar dados no sistema.');
		window.location.href='home.php';</script>";
              
} else {

        $date = $_POST['data'];
        $responsavel = $_SESSION["nome"];
        $valor = $_POST["venda_mat_valor"];
        $descricao = $_POST["venda_mat_descr"];
        echo "<script> console.log('passando no else');</script>";  ////////// TESTETESTETESTE
        echo "<script> console.log('$date');</script>";  ////////// TESTETESTETESTE
        echo "<script> console.log('$responsavel');</script>";  ////////// TESTETESTETESTE
        echo "<script> console.log('$valor');</script>";  ////////// TESTETESTETESTE
        echo "<script> console.log('$descricao');</script>";  ////////// TESTETESTETESTE

        if ($stmt = $con->prepare('INSERT INTO venda_material (date, responsavel, valor, descricao) VALUES (?,?,?,?)')) {	
        
                $stmt->bind_param('ssss', $date, $responsavel, $valor, $descricao);
                $stmt->execute();
                
                echo "<script> console.log('passando no if depois do else');</script>";  ////////// TESTETESTETESTE
                
                echo "<script>alert('Dados registrados, obrigado pelo serviço!');
                        window.location.href='relatorio.php';</script>";
                
                $stmt->close();
                $con->close();

        } else {     // Something is wrong with the sql statement
                echo "<script>alert('Não foi possível cadastrar, verifique os dados inseridos.');
                        window.location.href='index.php';</script>";
                $stmt->close();
                $con->close();
        }

}
?>