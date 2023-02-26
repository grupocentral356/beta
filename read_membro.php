<?php

// We need to use sessions, so you should always start sessions using the below code.
session_start();

include 'conexao.php';

if ( !isset($_POST['email'], $_POST['password']) ) {
        echo "<script>alert('Preencha todos os campos do formulário.');
		window.location.href='index.html';</script>";
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, nivel_acesso, nome, password FROM membro WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $nivel_acesso, $nome, $password);   //$nivel_acesso
		$stmt->fetch();
		// Account exists, now we verify the password.
		// Note: remember to use password_hash in your registration file to store the hashed passwords.
		
		// Se você não quiser usar nenhum método de criptografia de senha, basta substituir o seguinte código:
		// if (password_verify($_POST['password'], $password)) {
		// por if ($_POST['password'] === $password) {
			
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has loggedin!
			// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $_POST['email'];
                        $_SESSION['nivel_acesso'] = $nivel_acesso;
                        $_SESSION['nome'] = $nome;

                        $stmt->close();
                        $con->close();
                        
                        header('Location: ./home.php');
                        
		} else {
                        echo "<script>alert('Senha incorreta.');
				window.location.href='index.php';</script>";
                        $stmt->close();
                        $con->close();
                        exit();
		}
	} else {
		echo "<script>alert('Email não encontrado.');
			window.location.href='index.php';</script>";
                $stmt->close();
                $con->close();
                exit();
	}
}
?>

