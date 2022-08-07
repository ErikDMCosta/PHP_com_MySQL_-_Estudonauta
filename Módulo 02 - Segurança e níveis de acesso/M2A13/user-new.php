<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Cadastrar Novo Usuário</title>
</head>
<body>
	<?php
		require_once "includes/banco.php";
		require_once "includes/login.php";
		require_once "includes/funcoes.php";
	?>
	<div id="corpo">
	<?php
		if(!is_admin()) {
			echo msg_erro('Área Restrita! Você não é adiministrado!');
		} else {
			if (!isset($_POST['usuario'])) {
				require "user-new-form.php";
			} else {
				$usuario = $_POST['usuario'] ?? null;
				$nome = $_POST['nome'] ?? null;
				$senha1 = $_POST['senha1'] ?? null;
				$senha2 = $_POST['senha2'] ?? null;
				$tipo = $_POST['tipo'] ?? null;

				// echo "Pronto para salvar dados";
				if ($senha1 === $senha2) {
					// echo msg_sucesso("Tudo certo para gravar");
					if (empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)) {
						echo msg_erro("Todos os dados são obrigatórios!");
					} else {
						// echo msg_sucesso("Tudo ok!");
						$senha = gerarHash($senha1);
						$q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario','$nome','$senha','$tipo');";
						if ($banco->query($q)) {
							echo msg_sucesso("Usuário $nome cadastrado com sucesso!");
						} else {
							echo msg_erro("Não foi possível criar o $usuario. Talvez o login já esteja sendo usado.");
						}
					}
				} else {
					echo msg_erro("Senha não conferem. repita o procedimento.");
				}
			}
		}
		echo voltar();
	?>
  </div>
</body>
</html>