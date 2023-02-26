<!DOCTYPE html>
<?php include 'head.php'; ?>
<body>
        <div class="barra_topo"></div>
	<header class="barra_nav">
                <a href="index.php"><img src="img/na_pequeno_1.png"></img></a>
                <nav>
			<div class="barra_nav_menu">
                                <button class="botao_nav" onclick="redirecionar('cripto_acessar.php')">
					<i class="fas fa-user"></i></button>
				<button class="botao_nav" onclick="redirecionar('cripto_criar_usuario.php')">
					<i class="fas fa-user-plus"></i></button>
			</div>
		</nav>
	</header>
        <div class="barra_topo"></div>
	<div class="barra-degrade1"></div>
	<div>
		<div class="barra-titulo">Login</div>
	</div>
	<div class="barra-mapa">
		<form class="modal-content animate" action="./read_membro.php" method="post">
                        <div class="container">
                                <label for="email"><b>E-mail</b></label>
				<input type="text" id="email" placeholder="Insira o e-mail" name="email" required>
				<label for="password"><b>Senha</b></label>
				<input type="password" id="senha" placeholder="Insira a senha" name="password" required>
				<button class="botao-login btn" type="submit" onclick="criptografarSenha()">Acessar</button></br>
			</div>
		</form>
        </div>        
        <div class="info_p8">
		<div>
			Nosso programa é um conjunto de princípios escritos de uma maneira tão simples 
                        que podemos segui-los nas nossas vidas diárias. </br>
                        O mais importante é que eles funcionam.</br></br>
                        Endereço: Av. Itororó 356, Cidade Nova, Indaiatuba - SP</br>
                </div>
	</div>
        <?php include 'footer.php'; ?>
	<script src="js/cripto.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
        <script src="js/redirecionar.js"></script>
</body>
</html>