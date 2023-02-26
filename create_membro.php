<?php

include 'conexao.php';

if (!isset($_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['password'])) {
	echo "<script>alert('Preencha todos os campos do formulário.');
		window.location.href='index.php';</script>";
}

if ($stmt = $con->prepare('SELECT id, password FROM membro WHERE cpf = ?')) {
	$stmt->bind_param('s', $_POST['cpf']);
	$stmt->execute();
	$stmt->store_result();
        
	if ($stmt->num_rows > 0) {
                echo "<script>alert('CPF já existe no sistema. Faça login.');
			window.location.href='index.php';</script>";
                $stmt->close();
                $con->close();
                exit();
	}        
}

if ($stmt = $con->prepare('SELECT id, password FROM membro WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();        
        
	if ($stmt->num_rows > 0) {
                echo "<script>alert('E-Mail já existe no sistema. Faça login.');
			window.location.href='index.php';</script>";
                $stmt->close();
                $con->close();
                exit();
	}
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('O E-mail não é válido.');
                window.location.href='index.php';</script>";
        $stmt->close();
        $con->close();
        exit();                        
}

if ($stmt = $con->prepare('INSERT INTO membro (nome, cpf, password, email, activation_code, nivel_acesso) VALUES (?,?,?,?,?,?)')) {			
        //We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nivel_acesso = 'membro';
        $uniqid = uniqid(); // activation_code
        $stmt->bind_param('ssssss', $_POST['nome'], $_POST['cpf'], $password, $_POST['email'], $uniqid, $nivel_acesso);
        $stmt->execute();
        
        /* CRIAR ATIVAÇÃO POR EMAIL //////////////////////////
        $from    = 'noreply@yourdomain.com';
        $subject = 'Account Activation Required';
        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
        $activate_link = 'http://yourdomain.com/phplogin/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
        $message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
        mail($_POST['email'], $subject, $message, $headers);
        echo 'Please check your email to activate your account!';
        */
                        
        echo "<script>alert('Registro criado com sucesso, agora você pode logar!');
                window.location.href='index.php';</script>";
                
} else {     // Something is wrong with the sql statement
        echo "<script>alert('Não foi possível cadastrar, verifique os dados inseridos.');
                window.location.href='index.php';</script>";
}

$stmt->close();
$con->close();
exit();
?>