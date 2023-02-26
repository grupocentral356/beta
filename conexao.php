<?php
include 'dbConfig.php';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// If there is an error with the connection, stop the script and display the error.
if ( mysqli_connect_errno() ) {
	echo "<script>alert('Não foi possível conectar ao Banco de Dados.');
		window.location.href='index.php';</script>";
}
?>