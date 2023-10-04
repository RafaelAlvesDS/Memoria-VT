<?php
	// DB Config

	// Locaweb
	$conf_banco_usuario = "epiz_23779316";
	$conf_banco_senha = "MKWOyCyl";
	$conf_banco_servidor = "sql105.epizy.com";
	$conf_banco_nome = "epiz_23779316_memoriavt";
	$conf_banco_tipo = "MySQL";
	$conf_raiz = "";

	//------
	// App
		$app_valums = 'valums-file-uploader-b3b20b1';
		$app_amcharts = 'amcharts';
		$app_amcharts_js = 'amcharts_v26';
		$app_jgauge ='jgauge';
		$app_jit ='jit';
	//------

	require_once($_SERVER['DOCUMENT_ROOT'].'/adodb5/adodb.inc.php');
	$ADODB_CACHE_DIR = $_SERVER['DOCUMENT_ROOT'].'/ADODB_cache/';
	
$C_BD = ADONewConnection('mysqli');

	
	$C_BD->Connect($conf_banco_servidor, $conf_banco_usuario, $conf_banco_senha, $conf_banco_nome);
	$C_BD->EXECUTE("set names 'utf8'");
	$C_BD->SetFetchMode(ADODB_FETCH_BOTH);
	$cacheHours = 24;
?>