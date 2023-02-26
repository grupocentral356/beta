<?php
session_start();

echo "<script> console.log(new Date());</script>";
echo "<script> console.log('create_despesa.php');</script>";
$nivel_acesso = $_SESSION["nivel_acesso"];
echo "<script> console.log('session_nivel_acesso: ','$_SESSION['nivel_acesso']');</script>";  ////////// TESTETESTETESTE
$eh_verd = ($_SESSION["nivel_acesso"] == "membro");
echo "<script> console.log('nivel_acesso==membro eh_verd?: ','$eh_verd');</script>";  ////////// TESTETESTETESTE

if (!isset($_SESSION['loggedin'])) {
        echo "<script>alert('Para acessar esta página é necessário fazer login.');
		window.location.href='index.php';</script>";
	exit();
}

include 'conexao.php';


if ($_SESSION["nivel_acesso"] == "membro") {

        echo "<script> console.log('entrou no if nivel_acesso==membrooooooooooo');</script>";  ////////// TESTETESTETESTE
        
        echo "<script>alert('Somente servidores podem registrar dados no sistema.');
		window.location.href='home.php';</script>";
              
} else {

        $date = $_POST['data'];
        $responsavel = $_SESSION["nome"];
        $valor = $_POST["despesa_valor"];
        $descricao = $_POST["despesa_descr"];
        echo "<script> console.log('passando no else');</script>";  ////////// TESTETESTETESTE
        echo "<script> console.log('$date');</script>";  ////////// TESTETESTETESTE
        echo "<script> console.log('$responsavel');</script>";  ////////// TESTETESTETESTE
        echo "<script> console.log('$valor');</script>";  ////////// TESTETESTETESTE
        echo "<script> console.log('$descricao');</script>";  ////////// TESTETESTETESTE

        if ($stmt = $con->prepare('INSERT INTO despesa (date, responsavel, valor, descricao) VALUES (?,?,?,?)')) {	
        
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