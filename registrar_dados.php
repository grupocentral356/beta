<?php
session_start();

echo "<script> console.log(' ');</script>";  ////////// TESTETESTETESTE
echo "<script> console.log(new Date());</script>";  ////////// TESTETESTETESTE
echo "<script> console.log('registrar_dados.php');</script>";  ////////// TESTETESTETESTE
echo '<script> console.log(' . json_encode($_SESSION) . ');</script>';
$nivel_acesso = $_SESSION["nivel_acesso"];
echo "<script> console.log('nivel_acesso: ','$nivel_acesso');</script>";  ////////// TESTETESTETESTE
$nivel_acesso = trim($nivel_acesso);
echo "<script> console.log('trim($nivel_acesso): ','$nivel_acesso');</script>";  ////////// TESTETESTETESTE
$eh_verd = ($nivel_acesso == "membro");
echo "<script> console.log('eh_verd?: ','$eh_verd');</script>";  ////////// TESTETESTETESTE



if (!isset($_SESSION['loggedin'])) {
        echo "<script>alert('Para acessar esta página é necessário fazer login.');
		window.location.href='index.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<?php include 'head.php'; ?>
<body>
	<?php include 'header_nav.php'; ?>        
        <div class="barra-titulo">Registrar Dados</div>
        <div class="info_p8">
                Nossos servidores de confiança são os líderes do grupo e sua presença regular nas reuniões 
                é extremamente importante.</br>
        </div>
        <br>
	<div class="barra-mapa">
                <b>INSERIR DADOS DA REUNIÃO</b>
                <br>
        </div>
        
        <div class="barra-mapa">  
        
                <form method="POST" action="/create_reuniao.php">
                
                        <input type="hidden" id="nome" name="nome" value="<?php echo $_SESSION['nome']; ?>">
                        <input type="hidden" id="nivel_acesso" name="nivel_acesso" value="<?php echo $_SESSION['nivel_acesso']; ?>">

                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data" required><br>

                        <label for="membros">Número de Membros: </label>
                        <input type="number" id="membros" name="membros" 
                                style="width: 80px; height: 25px;" min="0" required><br>

                        <label for="ingressos">Número de Ingressos:</label>
                        <select id="ingressos" name="ingressos">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select><br>
                        
                        <label for="trinta_dias">Troca de ficha 30 dias:</label>
                        <select id="trinta_dias" name="trinta_dias">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select><br>
                        
                        <label for="sessenta_dias">Troca de ficha 60 dias:</label>
                        <select id="sessenta_dias" name="sessenta_dias">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="4">4</option>
                        </select><br>
                        
                        <label for="noventa_dias">Troca de ficha 90 dias:</label>
                        <select id="noventa_dias" name="noventa_dias">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select><br>
                        
                        <label for="seis_meses">Troca de ficha 6 meses:</label>
                        <select id="seis_meses" name="seis_meses">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select><br>
                        
                        <label for="nove_meses">Troca de ficha 9 meses:</label>
                        <select id="nove_meses" name="nove_meses">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select><br>
                        
                        <label for="um_ano">Troca de ficha 1 ano:</label>
                        <select id="um_ano" name="um_ano">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select><br>
                        
                        <label for="dezoito_meses">Troca de ficha 18 meses:</label>
                        <select id="dezoito_meses" name="dezoito_meses">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select><br>
                        
                        <label for="mult_anos">Troca de ficha Múltiplos Anos:</label>
                        <select id="mult_anos" name="mult_anos">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select><br>
                                                
                        <label for="setima_din">7ª Tradição em dinheiro:</label>
                        <input type="text" id="setima_din" name="setima_din" onblur="formatarValor(this)"
                                style="width: 140px; height: 25px;"required><br>

                        <label for="setima_pix">7ª Tradição em pix:</label>
                        <input type="text" id="setima_pix" name="setima_pix" onblur="formatarValor(this)"
                                style="width: 140px; height: 25px;"required><br>
                                
                        <input type="submit" value="REGISTRAR DADOS REUNIÃO">
                        <br>
                </form>
        </div>
        <br>
	<div class="barra-mapa">
                <br>
                <b>INSERIR VENDA DE MATERIAL</b>
                <br>
        </div>
	<div class="barra-mapa">
                <form method="POST" action="/create_venda_material.php">
                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data" required><br>
                        
                        <label for="venda_mat_descr">Descrição:</label>
                        <input type="text" id="venda_mat_descr" placeholder="Descrição da venda" name="venda_mat_descr" 
                                style="width: 250px; height: 25px;"required><br>
                                
                        <label for="venda_mat_valor">Valor:</label>
                        <input type="text" id="venda_mat_valor" name="venda_mat_valor" onblur="formatarValor(this)"
                                style="width: 140px; height: 25px;"required><br>
                                
                        <input type="submit" value="REGISTRAR VENDA MATERIAL">
                        <br>
                </form>
        </div>        
        <br>
	<div class="barra-mapa">
                <br>
                <b>INSERIR DESPESA</b>
                <br>
        </div>
	<div class="barra-mapa">   
                <form method="POST" action="/create_despesa.php">
                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data" required><br>
                        
                        <label for="despesa_descr">Descrição:</label>
                        <input type="text" id="despesa_descr" placeholder="Descrição da despesa" name="despesa_descr" 
                                style="width: 250px; height: 25px;"required><br>      
                                
                        <label for="despesa_valor">Valor:</label>
                        <input type="text" id="despesa_valor" name="despesa_valor" onblur="formatarValor(this)"
                                style="width: 140px; height: 25px;"required><br>
                                
                        <input type="submit" value="REGISTRAR DESPESA">
                        <br>
                </form>
        </div>
        <br>
        <div class="info_p8">
		<div>	
                        Em nossa experiência, descobrimos que os servidores de confiança serão mais bem-sucedidos 
                        se tiverem:</br>
                        1. Boa vontade e o desejo de servir</br>
                        2. Um histórico de recuperação em NA</br>
                        3. Conhecimento, entendimento e prática dos Doze Passos e Doze Tradições de NA</br>
                        4. Participação ativa no grupo</br>
                </div>
	</div>
	<?php include 'footer.php'; ?>
	<script src="js/redirecionar.js"></script>
        <script src="js/formatar_valor.js"></script>
</body>
</html>