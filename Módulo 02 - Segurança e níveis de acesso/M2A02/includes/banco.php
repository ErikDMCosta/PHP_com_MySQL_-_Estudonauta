<?php
	// $banco = new mysqli(host, usuario, senha, banco);
	// $banco = new mysqli("127.0.0.1", "root", "", "bd_games");
	$banco = new mysqli("localhost", "root", "", "bd_games");

	// Verifica conexão e caso retorna o erro
	if ($banco->connect_errno) {
		print "<p>Encontrei um erro $banco->connect_errno $banco->connect_error</p>";
		die();
	}

	// Configurações de Padrão com Acentuação
	$banco->query("SET NAMES 'utf8'");
	$banco->query("SET character_set_connection=utf8");
	$banco->query("SET character_set_client=utf8");
	$banco->query("SET character_set_results=utf8");
?>