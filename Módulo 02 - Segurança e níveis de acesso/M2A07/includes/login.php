<?php

session_start();

if (!isset($_SESSION['user'])) {
  // $_SESSION['user'] = "erik";
	// $_SESSION['nome'] = "Erik DM Costa";
	$_SESSION['user'] = "";
	$_SESSION['nome'] = "";
	$_SESSION['tipo'] = "";
}

// Criptografia Simples
function cripto($senha) {
	$c = '';
	for ($pos = 0; $pos < strlen($senha); $pos++) {
		$letra = ord($senha[$pos]) + 1;
		// echo chr($letra);
		$c .= chr($letra);
	}
	echo '<br>';
	return $c;
}

// -- ESTUDOS SOBRE HASH (PHP) --

// Gerando uma HASH
function gerarHash($senha)
{
	$txt = cripto($senha);
	$hash = password_hash($txt, PASSWORD_DEFAULT);
	return $hash;
}

// Testando uma HASH
function testarHash($senha, $hash)
{
  // $ok = password_verify($senha, $hash);
  $ok = password_verify(cripto($senha), $hash);
	return $ok;
}

?>