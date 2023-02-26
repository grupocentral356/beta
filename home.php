<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<?php include 'head.php'; ?>
<body>
	<?php include 'header_nav.php'; ?>        
        <div class="barra-titulo">Tmj <?php echo $_SESSION['nome']; ?> !</div>
        <div class="info_p8">
                Estamos contentes que conseguiu chegar aqui, e esperamos que decida ficar.</br>
        </div>
	<div class="barra-mapa">
		<img src="img/bacis_gray.png" style="width:100%">
	</div>
        <div class="info_p8">
		<div>	
                        Precisamos lembrar que somos impotentes perante nossa adicção, e não diante do nosso 
                        comportamento pessoal. </br>
                        Um conhecimento profundo de nós mesmos e maior boa vontade para aceitar responsabilidades 
                        nos dão liberdade para mudar, fazer escolhas e crescer.</br>
                </div>
	</div>
	<?php include 'footer.php'; ?>
	<script src="js/redirecionar.js"></script>
</body>
</html>