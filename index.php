<!DOCTYPE html>
<?php include 'head.php'; ?>
<body>
        <div class="barra_topo"></div>
	<header class="barra_nav">
                <a target="_blank" href="https://www.na.org.br/"><img src="img/logo_na.png"></img></a>
                <nav>
			<div class="barra_nav_menu">
                                <button class="botao_nav p-2" onclick="redirecionar('relatorio.php')">
                                        <i class="fas fa-file-alt"></i></button>
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
		<div class="barra-titulo">Grupo Central de Indaiatuba</div>
	</div>
        <div class="info_p8">
                Bem vindo ao Sistema de Informações do Grupo Central de Indaiatuba.</br>                
                Os servidores lançam os dados da secretaria e tesouraria à cada reunião, e todos podem acessar 
                o Relatório do Grupo on-line e atualizado!</br>
        </div>
	<div class="barra-mapa">
		<img src="img/bacis_gray.png" style="width:100%">
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