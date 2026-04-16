<?php	
@session_start();
// só entra nessa página se estiver logado 
 if(empty($_SESSION['logado'])) {
 	$_SESSION["informacao"]="Operação não premitida";
 	header('Location:../html/home.php');
 exit;
}
require_once '../php/funcoes_php.php';
require_once '../php/consulta.php';
$codigo = $_POST['codigoRetorno'];
$nulo = '';
date_default_timezone_set('America/Fortaleza');
/***************************************************************************************

                           CADASTRA E ALTERA O RETORNO 

****************************************************************************************/
if((isset($codigo))AND($codigo<>"")){	
	if(empty($_POST['dataEntradaRetorno'])){
		$dtEntradaRet = date("Y-m-d");		
	}else{
		$dtEntradaRet = $_POST['dataEntradaRetorno'];
	}
	if((empty($_POST['dataProntoRetorno']))AND(($_POST['estadoRetorno']=='SERVICO PRONTO')OR($_POST['estadoRetorno']=='APARELHO SAIU'))){	
		$dtProntoRet = date("Y-m-d");	
	}else{
		$dtProntoRet = $_POST['dataProntoRetorno'];
	} 
	if((empty($_POST['dataSaidaRetorno']))AND($_POST['estadoRetorno']=='APARELHO SAIU')){
		$dtSaidaRet = date("Y-m-d");		
	}else{
		$dtSaidaRet = $_POST['dataSaidaRetorno'];
	} 
	if($_SESSION['maiuscula']=="sim"){
	$defRet    = maiusculo($_POST['defeitoRetorno']);
	$acessRet  = maiusculo($_POST['acessorioRetorno']);
	$obsRet    = maiusculo($_POST['obsRetorno']);
	$matRet    = maiusculo($_POST['materialRetorno']);
	}else if($resultado['sem_acento']<>0){
	$defRet    = eliminaAcentos($_POST['defeitoRetorno']);
	$acessRet  = eliminaAcentos($_POST['acessorioRetorno']);
	$obsRet    = eliminaAcentos($_POST['obsRetorno']);
	$matRet    = eliminaAcentos($_POST['materialRetorno']);
	}else{
	$defRet    = $_POST['defeitoRetorno'];
	$acessRet  = $_POST['acessorioRetorno'];
	$obsRet    = $_POST['obsRetorno'];
	$matRet    = $_POST['materialRetorno'];
	}
	$defRet = ucfirst(retiraEspaco($defRet)); 
	$acessRet = ucfirst(retiraEspaco($acessRet));  
	$obsRet = ucfirst(retiraEspaco($obsRet));  
	$matRet = ucfirst(retiraEspaco($matRet));    
	$novaOS         = $_POST['novaOSRetorno'];
	$estadoRet  = $_POST['estadoRetorno'];
	$pecaRet        = limpaValor($_POST['pecaRetorno']);	 
	
	//  CADASTRA E ALTERA O RETORNO 1
	if(($_POST['controleRetorno']=="retorno1Alt")OR($_POST['controleRetorno']=="retorno1")){
	
		$sqlAlteracaoRet1 = $conexao->prepare("SELECT * FROM cliente WHERE codigo = ? AND excluiu = ?  ");
		$sqlAlteracaoRet1->execute([$codigo, $nulo]);
		$verificaAlteraaoRet1 = $sqlAlteracaoRet1->fetch();

		if(empty($dtProntoRet)){
			$dtProntoRet = '0000-00-00';
		};

		if(empty($dtSaidaRet)){
			$dtSaidaRet = '0000-00-00';
		}

		if(($novaOS == $verificaAlteraaoRet1['novaOS1']) AND ($estadoRet ==  $verificaAlteraaoRet1['estadoRetorno1'] ) AND ($defRet ==  $verificaAlteraaoRet1['defRet1'] ) AND
			($acessRet ==  $verificaAlteraaoRet1['acessRet1'] ) AND ($obsRet ==  $verificaAlteraaoRet1['obsRet1'] ) AND ($dtEntradaRet ==  $verificaAlteraaoRet1['dataRetorno1'] ) AND
			($matRet ==  $verificaAlteraaoRet1['matRet1'] ) AND ($pecaRet ==  $verificaAlteraaoRet1['pecaRet1'] ) AND ($dtProntoRet ==  $verificaAlteraaoRet1['dtProntoRet1'] ) AND 
			($dtSaidaRet ==  $verificaAlteraaoRet1['saidaRetorno1'] )) {

			$_SESSION["informacao"]="<span style='color:red'>Nada foi alteradono retorno 1!";
			header('Location:../html/home.php');
			exit;
		}

		require_once 'verifica_alteracaoRetorno.php';
		
		$sql = "UPDATE cliente SET novaOS1 = ?, estadoRetorno1 = ?, defRet1 = ?, acessRet1 = ?, obsRet1 = ?, dataRetorno1 = ?, matRet1 = ?, pecaRet1 = ?, dtProntoRet1 = ?, saidaRetorno1 = ? WHERE codigo = ? "; 
		$stmt = $conexao->prepare($sql);
		$stmt->execute([$novaOS, $estadoRet, $defRet, $acessRet, $obsRet, $dtEntradaRet, $matRet, $pecaRet, $dtProntoRet, $dtSaidaRet, $codigo]);
		
		$_SESSION["informacao"]="Primeiro retorno alterado";
		header('Location:backup.php');
		exit;
	};
	//  CADASTRA E ALTERA O RETORNO 2
	if(($_POST['controleRetorno']=="retorno2Alt")OR($_POST['controleRetorno']=="retorno2")){
		
		$sqlAlteracaoRet2 = $conexao->prepare("SELECT * FROM cliente WHERE codigo = ? AND excluiu = ?  ");
		$sqlAlteracaoRet2->execute([$codigo, $nulo]);
		$verificaAlteraaoRet2 = $sqlAlteracaoRet2->fetch();

		if(empty($dtProntoRet)){
			$dtProntoRet = '0000-00-00';
		};

		if(empty($dtSaidaRet)){
			$dtSaidaRet = '0000-00-00';
		}

		if(($novaOS == $verificaAlteraaoRet2['novaOS2']) AND ($estadoRet ==  $verificaAlteraaoRet2['estadoRetorno2'] ) AND ($defRet ==  $verificaAlteraaoRet2['defRet2'] ) AND
			($acessRet ==  $verificaAlteraaoRet2['acessRet2'] ) AND ($obsRet ==  $verificaAlteraaoRet2['obsRet2'] ) AND ($dtEntradaRet ==  $verificaAlteraaoRet2['dataRetorno2'] ) AND
			($matRet ==  $verificaAlteraaoRet2['matRet2'] ) AND ($pecaRet ==  $verificaAlteraaoRet2['pecaRet2'] ) AND ($dtProntoRet ==  $verificaAlteraaoRet2['dtProntoRet2'] ) AND 
			($dtSaidaRet ==  $verificaAlteraaoRet2['saidaRetorno2'] )) {

			$_SESSION["informacao"]="<span style='color:red'>Nada foi alteradono retorno 2!";
			header('Location:../html/home.php');
			exit;
		}

		require_once 'verifica_alteracaoRetorno.php';
		
		$sql = "UPDATE cliente SET novaOS2 = ?, estadoRetorno2 = ?, defRet2 = ?, acessRet2 = ?, obsRet2 = ?, dataRetorno2 = ?, matRet2 = ?, pecaRet2 = ?, dtProntoRet2 = ?, saidaRetorno2 = ? WHERE codigo = ? "; 
		$stmt = $conexao->prepare($sql);
		$stmt->execute([$novaOS, $estadoRet, $defRet, $acessRet, $obsRet, $dtEntradaRet, $matRet, $pecaRet, $dtProntoRet, $dtSaidaRet, $codigo]);
		
		$_SESSION["informacao"]="Segundo retorno alterado";
		header('Location:backup.php');
		exit;
	};
	// CADASTRA E ALTERA O RETORNO 
	if(($_POST['controleRetorno']=="retorno3Alt")OR($_POST['controleRetorno']=="retorno3")){
		
		$sqlAlteracaoRet3 = $conexao->prepare("SELECT * FROM cliente WHERE codigo = ? AND excluiu = ?  ");
		$sqlAlteracaoRet3->execute([$codigo, $nulo]);
		$verificaAlteraaoRet3 = $sqlAlteracaoRet3->fetch();

		if(empty($dtProntoRet)){
			$dtProntoRet = '0000-00-00';
		};

		if(empty($dtSaidaRet)){
			$dtSaidaRet = '0000-00-00';
		}

		if(($novaOS == $verificaAlteraaoRet3['novaOS3']) AND ($estadoRet ==  $verificaAlteraaoRet3['estadoRetorno3'] ) AND ($defRet ==  $verificaAlteraaoRet3['defRet3'] ) AND
			($acessRet ==  $verificaAlteraaoRet3['acessRet3'] ) AND ($obsRet ==  $verificaAlteraaoRet3['obsRet3'] ) AND ($dtEntradaRet ==  $verificaAlteraaoRet3['dataRetorno3'] ) AND
			($matRet ==  $verificaAlteraaoRet3['matRet3'] ) AND ($pecaRet ==  $verificaAlteraaoRet3['pecaRet3'] ) AND ($dtProntoRet ==  $verificaAlteraaoRet3['dtProntoRet3'] ) AND 
			($dtSaidaRet ==  $verificaAlteraaoRet3['saidaRetorno3'] )) {

			$_SESSION["informacao"]="<span style='color:red'>Nada foi alteradono retorno 3!";
			header('Location:../html/home.php');
			exit;
		}

		require_once 'verifica_alteracaoRetorno.php';
		
		$sql = "UPDATE cliente SET novaOS3 = ?, estadoRetorno3 = ?, defRet3 = ?, acessRet3 = ?, obsRet3 = ?, dataRetorno3 = ?, matRet3 = ?, pecaRet3 = ?, dtProntoRet3 = ?, saidaRetorno3 = ? WHERE codigo = ? "; 
		$stmt = $conexao->prepare($sql);
		$stmt->execute([$novaOS, $estadoRet, $defRet, $acessRet, $obsRet, $dtEntradaRet, $matRet, $pecaRet, $dtProntoRet, $dtSaidaRet, $codigo]);
		

		$_SESSION["informacao"]="Terceiro retorno alterado";
		header('Location:backup.php');
		exit;
	};
};

