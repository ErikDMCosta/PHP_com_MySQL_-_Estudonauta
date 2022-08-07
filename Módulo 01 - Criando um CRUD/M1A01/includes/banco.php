<pre>
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

	// Query de Busca Geral na tabela 'generos'
	$busca = $banco->query("SELECT * FROM generos;");

	// Verifica se obteve retorno da Query de 'busca'
	if (!$busca) {
		print "<p>Falha na busca! $banco->connect_error</p>";
	} else {
		// Listando os registro(s) encontrado(s)
		// $reg = $busca->fetch_object();
    // echo "<pre>";
    // print_r($reg);
    // echo "</pre>";

		// Jeito do Video --
		while ($reg = $busca->fetch_object()) {
			print_r($reg);
		}

		// Meu Jeito --
		// foreach ($busca as $b) {
		// 	print_r($b);
		// }
	}
?>
</pre>