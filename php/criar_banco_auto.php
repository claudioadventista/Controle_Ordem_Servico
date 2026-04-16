<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>formulário de login</title>
	<link rel="shortcut icon" href="favicon.ico" >
	<meta name="viewport" content="widhth=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10,  minimum-scale=1.0" />
	<meta name="referrer" content="default" id="meta_referrer" />
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />
	<link rel="stylesheet" type="text/css" href="../estilo/index.css" />
	<link rel="stylesheet" type="text/css" href="../estilo/tema_escuro.css" />	
	<link href="../fonts/fontawesome-free-5.11.2-web/css/fontawesome.css" rel="stylesheet">
	<link href="../fonts/fontawesome-free-5.11.2-web/css/brands.css" rel="stylesheet">
	<link href="../fonts/fontawesome-free-5.11.2-web/css/solid.css" rel="stylesheet">
	<style>
		.loga{
			position:absolute;
			font-size:12px;
			color:#fff;
			background:#464;
			bottom:10px;
			text-align: center;
			text-transform:uppercase;
			padding: 5px 0; 
			width:100%;
			height:12px;
			top:260px;
		}
		.times-x{
			position:relative;
			cursor:pointer;
			margin-left:6px;
			top:6px;
		}
		.container{
			background:#aaa;
		}
	</style> 
	</head>
<body> 
	<?php
	if(isset($_POST['usuario'])){; 
		// atribui os valores dos posts as variaveis
		$user = $_POST['usuario'];
		$pass = $_POST['senha'];

		// cria o arquivo texto com usuário e senha do banco
		$arquivo = fopen('loginesenhadobanco.txt','w');
		//verificamos se foi criado
		if ($arquivo == false) die('Não foi possível criar o arquivo.');
		//escrevemos no arquivo
		fwrite($arquivo, $user." ".$pass);
		//Fechamos o arquivo após escrever nele
		fclose($arquivo);

		// inicia a verificação para ver se o banco ja foi criado
		$conn = mysql_connect("localhost",$user,$pass);
		
		// se conectar, faz o procedimento abaixo
		if($conn){
			for($i = 1; $i<=2; $i++){
			$db=mysql_select_db("ordem_servico");
			// Se não existir...
			if(empty($db))
			{
				// Cria a database
				$dbcr="create database ordem_servico character set utf8mb4 collate utf8mb4_general_ci";
				//Checa se a database foi criada
				$check=mysql_query($dbcr);
				// Se não existir...
				if(!$check){
				}else {
					//echo "O banco foi criado<br/>";
				}
			}else{
				//echo"O banco já existe<br/>";
			}
			// Agora com a tabela
			$table2="select * from marca";
			//Checa se a tabela existe no banco criado
			$checktable2=mysql_query($table2);
			// Se não exixtir...
			if(!$checktable2)
			{
				//echo"A tabela não existe, por favor crie uma</br>";
				$create2="create table marca(
				codigo int(6) NOT NULL AUTO_INCREMENT,
				marca varchar (50) NOT NULL,
				PRIMARY KEY (codigo)
				)";
				$ok2=mysql_query($create2);
				if(!$ok2){
				//echo"Erro ao criar a tabela";
				}else {
					//echo"A tabela foi criada";
				}
			}else {//echo"A tabela já existe";
			}
			$table3="select * from aparelho";
			//Checa se a tabela existe no banco criado
			$checktable3=mysql_query($table3);
			// Se não exixtir...
			if(!$checktable3)
			{
				//echo"A tabela não existe, por favor crie uma</br>";	
				$create3="create table aparelho(
				codigo int(6) NOT NULL AUTO_INCREMENT,
				aparelho varchar (50) NOT NULL,
				PRIMARY KEY (codigo)
				)";	
				$ok3=mysql_query($create3);
				if(!$ok3){
				//echo"Erro ao criar a tabela";
				}else {
					//echo"A tabela foi criada";
				}
			}else {//echo"A tabela já existe";
			}

			$table33="select * from modelo";
			//Checa se a tabela existe no banco criado
			$checktable33=mysql_query($table33);
			// Se não exixtir...
			if(!$checktable33)
			{
				//echo"A tabela não existe, por favor crie uma</br>";	
				$create33="create table modelo(
				codigo int(6) NOT NULL AUTO_INCREMENT,
				modelo varchar (50) NOT NULL,
				PRIMARY KEY (codigo)
				)";	
				$ok33=mysql_query($create33);
				if(!$ok33){
				//echo"Erro ao criar a tabela";
				}else {
					//echo"A tabela foi criada";
				}
			}else {//echo"A tabela já existe";
			}
			$table333="select * from excluidos";
			//Checa se a tabela existe no banco criado
			$checktable333=mysql_query($table333);
			// Se não exixtir...
			if(!$checktable333)
			{
				//echo"A tabela não existe, por favor crie uma</br>";	
				$create333="create table excluidos(
				codigo int(6) NOT NULL AUTO_INCREMENT,
				cadastro text NOT NULL,
				PRIMARY KEY (codigo)
				)";	
				$ok333=mysql_query($create333);
				if(!$ok333){
				//echo"Erro ao criar a tabela";
				}else {
					//echo"A tabela foi criada";
				}
			}else {//echo"A tabela já existe";
			}
			/*
			$table334="select * from funcionarios";
			//Checa se a tabela existe no banco criado
			$checktable334=mysql_query($table334);
			// Se não exixtir...
			if(!$checktable334)
			{
				//echo"A tabela não existe, por favor crie uma</br>";	
				$create334="create table funcionarios(
				codigo int(6) NOT NULL AUTO_INCREMENT,
				cadastro text NOT NULL,
				PRIMARY KEY (codigo)
				)";	
				$ok334=mysql_query($create334);
				if(!$ok334){
				//echo"Erro ao criar a tabela";
				}else {
					//echo"A tabela foi criada";
				}
			}else {//echo"A tabela já existe";
			}
			*/
			$table4="select * from funcionario";
			//Checa se a tabela existe no banco criado
			$checktable4=mysql_query($table4);
			// Se não exixtir...
			if(!$checktable4)
			{
				//echo"A tabela não existe, por favor crie uma</br>";	
				$create4="create table funcionario(
				codigo int(6) NOT NULL AUTO_INCREMENT,
				nome varchar (50) NOT NULL,
				usuario varchar (15) NOT NULL,
				senha varchar (255) NOT NULL,
				endereco varchar (50) NOT NULL,
				bairro varchar (50) NOT NULL,
				numero varchar (6) NOT NULL,
				cidade varchar (50) NOT NULL,
				telefone varchar (15) NOT NULL,
				telefone2 varchar (15) NOT NULL,
				email varchar (50) NOT NULL,
				acesso int(6) NOT NULL,
				data_nascimento date,
				tentativa int(1) NOT NULL,
				ultimo_acesso varchar (3) NOT NULL,
				controle_ultimo_acesso datetime NOT NULL,
				nivel_acesso varchar (9) NOT NULL,
				data_cadastro date NOT NULL,
				mensagem date NOT NULL,
				cpf varchar (11) NOT NULL,
				obs varchar (255) NOT NULL,
				excluiu varchar (3) NOT NULL,
				foto_funcionario varchar (37) NOT NULL,
				foto_funcionario2 varchar (37) NOT NULL,
				barra_funcionario varchar (10) NOT NULL,
				pagina int (2) NOT NULL,
				tema varchar (6) NOT NULL,  
				semCronometro varchar (3) NOT NULL,
				letra varchar (20) NOT NULL,
				ordenacao varchar (13) NOT NULL,
				ordem varchar (5) NOT NULL,
				protegido varchar (3) NOT NULL,
				PRIMARY KEY (codigo)
				)";	
				$ok4=mysql_query($create4);
				if(!$ok4){
				//echo"Erro ao criar a tabela";
				}else {
					//echo"A tabela foi criada";
				}
			}else {//echo"A tabela já existe";
			}
			$table5="select * from config";
			//Checa se a tabela existe no banco criado
			$checktable5=mysql_query($table5);
			// Se não exixtir...
			if(!$checktable5)
			{
				//echo"A tabela não existe, por favor crie uma</br>";
				$create5="create table config(
				codigo int(1) NOT NULL AUTO_INCREMENT,
				pagina int(1) NOT NULL,
				letra varchar (20) NOT NULL,
				ordenacao varchar (20) NOT NULL,
				ordem varchar (4) NOT NULL,
				os_auto varchar (3) NOT NULL,
				cont_os varchar (7) NOT NULL,
				usuario varchar (15) NOT NULL,
				escolha varchar (3) NOT NULL,
				oficina varchar (50) NOT NULL,
				endereco varchar (80) NOT NULL,
				telefone varchar (15) NOT NULL,
				telefone2 varchar (15) NOT NULL,
				rodape varchar (255) NOT NULL,
				zeros varchar (3) NOT NULL,
				logomarca varchar (3) NOT NULL,
				tema varchar(6) NOT NULL,
				checkMensagem varchar (4) NOT NULL,
				tentativa int(1) NOT NULL,
				mensagem date NOT NULL,
				coluna varchar (4),
				sem_acento int (1) NOT NULL,
				sem_tecnico int (1) NOT NULL,
				sem_atendente int (1) NOT NULL,
				maiuscula varchar (3),
				semCronometro varchar(4),
				idadeMinima int(2) NOT NULL,
				idadeMaxima int(2) NOT NULL,
				img_logo varchar(20),
				PRIMARY KEY (codigo)
				)";	
				$ok5=mysql_query($create5);
				if(!$ok5){
					echo"Erro ao criar a tabela";
					//goto form;
				}else {
					echo"A tabela foi criada";
				}
			}else {echo"A tabela já existe";
			}
			$table6="select * from cliente";
			//Checa se a tabela existe no banco criado
			$checktable6=mysql_query($table6);
			// Se não exixtir...
			if(!$checktable6)
			{
				//echo"A tabela não existe, por favor crie uma</br>";	
				$create6="create table cliente(
				codigo int(8) NOT NULL AUTO_INCREMENT,
				nome varchar (50) NOT NULL,
				dtNascimentoAlt date NOT NULL,
				cpf varchar (11) NOT NULL,
				endereco varchar (70) NOT NULL,
				telefone varchar (15) NOT NULL,
				telefone2 varchar (15) NOT NULL,
				ordemServico int(8) NOT NULL,
				dataEntrada date NOT NULL,
				controle_entrada datetime NOT NULL,
				aparelho varchar (50) NOT NULL,
				marca varchar (50) NOT NULL,
				modelo varchar (50) NOT NULL,
				numeroSerie varchar (80) NOT NULL,
				chassi varchar (80) NOT NULL,
				imei varchar (15) NOT NULL,
				placa varchar (8) NOT NULL,
				renavam varchar (11) NOT NULL,
				acessorio varchar (200) NOT NULL,
				observacao varchar (255) NOT NULL,
				defeitoReclamado varchar (200) NOT NULL,
				tecnico varchar (20) NOT NULL,
				estado varchar (20) NOT NULL,
				material varchar (255) NOT NULL,
				orcamento decimal (10,2) NOT NULL,
				valorPeca decimal (10,2) NOT NULL,
				desconto decimal (10,2) NOT NULL,
				transporte decimal (10,2) NOT NULL,
				materialAuxiliar decimal (10,2) NOT NULL,
				dataPronto date NOT NULL,
				dataSaida date NOT NULL,
				controle_saida datetime NOT NULL,
				infoCliente decimal (10,2) NOT NULL,
				aPrazo varchar (3) NOT NULL,
				inicial decimal (10,2) NOT NULL,
				restante decimal (10,2) NOT NULL,
				dataPagamento date NOT NULL,
				pagou varchar (3) NOT NULL,
				dataPagou date NOT NULL,
				recebeu varchar (3) NOT NULL,
				valorRecebido decimal (10,2) NOT NULL,
				jurosCartao decimal (10,2) NOT NULL,
				cartao varchar (3) NOT NULL,
				tipoCartao varchar (10) NOT NULL,
				bandeira_cartao varchar (50) NOT NULL,
				parcelasCartao int(3) NOT NULL,
				excluiu varchar (3) NOT NULL,
				alteracao text NOT NULL,
				novaOS1 varchar (6) NOT NULL,
				novaOS2 varchar (6) NOT NULL,
				novaOS3 varchar (6) NOT NULL,
				defRet1 varchar (200) NOT NULL,
				defRet2 varchar (200) NOT NULL,
				defRet3 varchar (200) NOT NULL,
				acessRet1 varchar (200) NOT NULL,
				acessRet2 varchar (200) NOT NULL,
				acessRet3 varchar (200) NOT NULL,
				obsRet1 varchar (255) NOT NULL,
				obsRet2 varchar (255) NOT NULL,
				obsRet3 varchar (255) NOT NULL,
				matRet1 varchar (255) NOT NULL,
				matRet2 varchar (255) NOT NULL,
				matRet3 varchar (255) NOT NULL,
				orcRet1 decimal (10,2) NOT NULL,
				orcRet2 decimal (10,2) NOT NULL,
				orcRet3 decimal (10,2) NOT NULL,
				tecRet1 varchar (20) NOT NULL,
				tecRet2 varchar (20) NOT NULL,
				tecRet3 varchar (20) NOT NULL,
				dataRetorno1 date NOT NULL,
				dataRetorno2 date NOT NULL,
				dataRetorno3 date NOT NULL,			
				estadoRetorno1 varchar (20) NOT NULL,
				estadoRetorno2 varchar (20) NOT NULL,
				estadoRetorno3 varchar (20) NOT NULL,
				saidaRetorno1 date NOT NULL,
				saidaRetorno2 date NOT NULL,
				saidaRetorno3 date NOT NULL,		
				imprimiu varchar (20) NOT NULL,			
				pecaRet1 decimal (10,2) NOT NULL,
				pecaRet2 decimal (10,2) NOT NULL,
				pecaRet3 decimal (10,2) NOT NULL,
				dtProntoRet1 date NOT NULL,
				dtProntoRet2 date NOT NULL,
				dtProntoRet3 date NOT NULL,
				email varchar (80) NOT NULL,
				controle_entradaRet1 datetime NOT NULL,
				controle_entradaRet2 datetime NOT NULL,
				controle_entradaRet3 datetime NOT NULL,
				controle_saidaRet1 datetime NOT NULL,
				controle_saidaRet2 datetime NOT NULL,
				controle_saidaRet3 datetime NOT NULL,
				foto1 varchar (36) NOT NULL,
				foto2 varchar (36) NOT NULL,
				foto3 varchar (36) NOT NULL,
				barra_cliente varchar (10) NOT NULL,
				quem_ligou1 varchar (20) NOT NULL,
				quem_ligou2 varchar (20) NOT NULL,
				quem_ligou3 varchar (20) NOT NULL,
				quem_ligou4 varchar (20) NOT NULL,
				quem_ligou5 varchar (20) NOT NULL,
				quem_atendeu1 varchar (20) NOT NULL,
				quem_atendeu2 varchar (20) NOT NULL,
				quem_atendeu3 varchar (20) NOT NULL,
				quem_atendeu4 varchar (20) NOT NULL,
				quem_atendeu5 varchar (20) NOT NULL,
				atendeu1 varchar (12) NOT NULL,
				atendeu2 varchar (12) NOT NULL,
				atendeu3 varchar (12) NOT NULL,
				atendeu4 varchar (12) NOT NULL,
				atendeu5 varchar (12) NOT NULL,
				data_ligacao1 date NOT NULL,
				data_ligacao2 date NOT NULL,
				data_ligacao3 date NOT NULL,
				data_ligacao4 date NOT NULL,
				data_ligacao5 date NOT NULL,
				hora_ligacao1 time NOT NULL,
				hora_ligacao2 time NOT NULL,
				hora_ligacao3 time NOT NULL,
				hora_ligacao4 time NOT NULL,
				hora_ligacao5 time NOT NULL,
				telefone_ligado1 varchar (15) NOT NULL,
				telefone_ligado2 varchar (15) NOT NULL,
				telefone_ligado3 varchar (15) NOT NULL,
				telefone_ligado4 varchar (15) NOT NULL,
				telefone_ligado5 varchar (15) NOT NULL,	
				PRIMARY KEY (codigo)
				)";	
				$ok6=mysql_query($create6);
				if(!$ok6){
				//echo"Erro ao criar a tabela";
				}else {
					//echo"A tabela foi criada";
				}
			}else {//echo"A tabela já existe";
			}
			$table7="select * from estado";
			//Checa se a tabela existe no banco criado
			$checktable7=mysql_query($table7);
			// Se não exixtir...
				if(!$checktable7)
				{
					$create7="create table estado(
					codigo int(2) NOT NULL AUTO_INCREMENT,
					controle varchar (3) NOT NULL,
					estado varchar (50) NOT NULL,
					PRIMARY KEY (codigo)
					)";	
					$ok7=mysql_query($create7);
					if(!$ok7){
					}else {
					
					}		
				}
			}
			$link = mysqli_connect("localhost",$user,$pass,"ordem_servico");
			if($link){
				$sqlinsert="INSERT INTO config (zeros, pagina, letra, ordenacao, ordem, os_auto, checkMensagem, mensagem, cont_os, coluna, idadeMinima, idadeMaxima, tema, sem_acento, img_logo, rodape) VALUES ('sim', '10', 'LISTA GERAL', 'nome', 'ASC', 'sim', 'sim', '2019-07-10', '1', 'nome', '14', '85', 'escuro', '1', 'logomarca.jpg','O aparelho ficará até no máximo 90 dias na oficina, após informado o orçamento, depois disso, ele será vendido para custear despesas com o mesmo. agradecemos a compreensão.')";
				mysqli_query($link, "SET NAMES 'utf8';");
				$sqlinsertEstadoPO="INSERT INTO estado (controle, estado)
										VALUES ('PO', 'PARA ORCAMENTO')"; 
				$sqlinsertEstadoAG="INSERT INTO estado (controle, estado)
										VALUES ('AG', 'AGUARDANDO')"; 
				$sqlinsertEstadoOP="INSERT INTO estado (controle, estado)
										VALUES ('OP', 'ORCAMENTO PRONTO')"; 
				$sqlinsertEstadoSP="INSERT INTO estado (controle, estado)
										VALUES ('SP', 'SERVICO PRONTO')"; 
				$sqlinsertEstadoAS="INSERT INTO estado (controle, estado)
										VALUES ('AS', 'APARELHO SAIU')";
				$sqlinsertEstadoRE="INSERT INTO estado (controle, estado)
										VALUES ('RE', 'RETORNOU')"; 
				$sqlinsertEstadoDE="INSERT INTO estado (controle, estado)
										VALUES ('DE', 'DEVOLVEU')"; 
				$sqlinsertEstadoCO="INSERT INTO estado (controle, estado)
										VALUES ('CO', 'COMPROU')"; 
				$sqlinsertEstadoVE="INSERT INTO estado (controle, estado)
										VALUES ('VE', 'VENDEU')"; 
				$sqlinsertEstadoDO="INSERT INTO estado (controle, estado)
										VALUES ('DO', 'DOOU')"; 
				$sqlinsertEstadoAB="INSERT INTO estado (controle, estado)
										VALUES ('AB', 'ABANDONOU')";
				$sqlinsertEstadoSU="INSERT INTO estado (controle, estado)
										VALUES ('SU', 'SUMIU')";  
				$sqlinsertEstadoEE="INSERT INTO estado (controle, estado)
										VALUES ('EE', 'ENTREGOU ERRADO')"; 
				$sqlinsertEstadoRO="INSERT INTO estado (controle, estado)
										VALUES ('RO', 'ROUBADO')"; 
				$sqlinsertEstadoDI="INSERT INTO estado (controle, estado)
										VALUES ('DI', 'DICA')";  																
				if(isset($check)){
				}
				if(isset($ok2)){
				}
				if(isset($ok3)){
				}
				if(isset($ok33)){
				}
				if(isset($ok333)){
				}
				//if(isset($ok334)){
				//}
				if(isset($ok4)){
				}
				if(isset($ok41)){
				}
				if(isset($ok42)){
				}
				if(isset($ok5)){
				}
				if(isset($ok6)){
				}
				if(isset($ok7)){
				}
				if(mysqli_query($link, $sqlinsert)){
				}
				if(mysqli_query($link, $sqlinsertEstadoPO)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoAG)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoOP)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoSP)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoAS)){
				}
				if(mysqli_query($link, $sqlinsertEstadoRE)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoDE)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoCO)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoVE)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoDO)){
				}
				if(mysqli_query($link, $sqlinsertEstadoAB)){
				}
				if(mysqli_query($link, $sqlinsertEstadoSU)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoEE)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoRO)){	
				}
				if(mysqli_query($link, $sqlinsertEstadoDI)){	
				}
				session_start();
				$_SESSION['logado'] = "";
				$_SESSION['nivel'] = "";
				header('location: ../html/cadastro_funcionario2.php'); 
			}else{
				//$info ="Não conectou ao banco";
				echo "<script>
						document.getElementById('formulario').reset();
						window.location.reload(true);
					  </script>";	
			}
		}else{
			
		}
	};
	?>
	<div class="container">	
		<div class="cabecario_padrao"> 
			<span class="texto" >Formulário para Criar o Banco MySQL</span>
			<span class="atualizar_pagina" title="clique para atualizar a página" onclick="document.location.reload(true);" >&#8635</span>
		</div> 
		<div class="formLogar">	
			<form id="formulario" action="criar_banco_auto.php" method="post" >
				<div class="linha">
					<div class="col col-10" ><br></div>
				</div>	
				<div class="linha">
					<div class="col col-10" >
						<div class="col col-1" >
						</div>		
						<div class="col col-1" >		
							<i class="usuario fas fa-user" ></i>
						</div>
					</div>
				</div>	
				<div class="linha">
					<div class="col col-10" ><br></div>
				</div>
				<div class="linha">
					<div class="col col-10" >
						<div class="col col-1" >
						</div>
						<div class="col col-8" >
							<input class="input_usuario" id="loginBanco" name="usuario" type="text" placeholder="Digite o usuário do banco" autocomplete="off" maxlength="30" title="Preencha esse campo com o usuário do banco" required autofocus />
						</div>
						<div class="col col-1" >
							<span class="times-x"  title="Clique para limpar o campo Usuário" onclick="document.getElementById('loginBanco').value='';">&times</span>
						</div>
					</div>
				</div>
				<div class="linha">
					<div class="col col-10" ></div>
				</div>
				<div class="linha">
					<div class="col col-10" >
						<div class="col col-1" >
						</div>	
						<div class="col col-1" >				
							<i class="senha fas fa-unlock"></i>
						</div>
					</div>
				</div>
				<div class="linha">
					<div class="col col-10" ><br><br></div>
					<div class="col col-1" >
					</div>
					<div class="col col-8">
						<input class="input_usuario" type="password" id="senha" name="senha" placeholder="Digite a senha do banco"  maxlength="30" />
					</div>
					<div class="col col-1" >
						<span class="times-x"  title="Clique para limpar o campo Usuário" onclick="document.getElementById('senha').value='';">&times</span>
					</div>
				</div>
				<div class="linha">
						<div class="col col-10" style="margin-top:26px"></div>
					</div>
				<div class="linha" >
					<div class="col col-10 rodape_alterar_aparelho" >
						<div class="col col-1" >
						</div>
						<div class="col col-9" >
							<button type="button" class="botao" title="Clique para mostra ou oculta a senha"  onclick="mostraOcultar()"><i class="fas fa-eye"></i><span class="espaco">VER</span></button>				
							<button class="botao" title="Clique para fazer criar o banco" onclick="document.getElementById('enviar').click();" ><i class="fas fa-sign-in-alt"></i><span class="espaco">CRIAR</span></button>
							<input type="submit" class="sumido" id="enviar" />	
						</div>
					</div>	
				</div>		
			</form>	
			<?php
			//form:
			//	echo "<script>alert('erro')</script>";
			
			if(isset($info)){; 
				?>
				<div class="loga" >
					<?php echo $info; 
					?>
					</div>
			<?php };?>
		</div>
		<br>
		<script>
		var senha = document.getElementById("senha");
			function mostraSenha() {
					senha.type = "text";
			};
			function ocultaSenha() {
					senha.type = "password";
			}
			function mostraOcultar() {
				if (senha.type === "password"){
					senha.type = "text";
				}else{
					senha.type = "password";
				}		
			};
		</script>
	</div>
</body>
</html>
			
