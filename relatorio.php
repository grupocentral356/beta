<!DOCTYPE html>
<?php include 'head.php'; ?>
<body>
	<?php include 'header_nav.php'; ?>        
        <div class="barra-titulo">Relatório do Grupo</div>
        <div class="info_p8">
                O grupo é o melhor veículo para levar a mensagem de esperança e a promessa da libertação da adicção ativa. </br>
                Qualquer adicto pode parar de usar, perder o desejo de usar e encontrar uma nova maneira de viver. </br>
        </div>
        <br>
        <div class="barra-mapa">
        
        <form method="post" action="relatorio_pdf.php">
        
                <label for="periodo">Escolha um período:</label><br>
                <select id="periodo" name="periodo">
                <option value="'2023-02-15' AND '2023-04-11'">15/fev à 11/abr/2023</option>
                <option value="'2023-04-12' AND '2023-06-13'">12/abr à 13/jun/2023</option>
                <option value="'2023-06-14' AND '2023-08-15'">14/jun à 15/ago/2023</option>
                <option value="'2023-08-16' AND '2023-10-10'">16/ago à 10/out/2023</option>
                <option value="'2023-10-11' AND '2023-12-12'">11/out à 12/dez/2023</option>
                <option value="'2022-08-17' AND '2022-10-11'">17/ago à 11/out/2022</option>
                </select>
        
                </div>        
                <br>
                <div class="barra-mapa"><br>
                        Obter relatório</br>
                </div>        
                <div class="barra-mapa">
                        <br></br>        
                        <div class="barra_nav_menu">
                                <button class="botao_nav p-2" type="submit"><i class="fas fa-file-export"></i></button>
                        </div>
                </div>
        </form>
        <br>
        <div class="info_p8">
		<div>	
                        7ª Tradição: Todo grupo de NA deverá ser totalmente autossustentado, recusando contribuições de fora.</br>
                </div>
	</div>
	<?php include 'footer.php'; ?>
	<script src="js/redirecionar.js"></script>
</body>
</html>