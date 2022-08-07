<?php
	print "<p class='pequeno'>";
	if (empty($_SESSION['user'])) {
		print "<a href='user-login.php'>Entrar</a>";
	} else {
		print "Olá, <strong>" . $_SESSION['nome'] . "</strong> | ";
    echo "Meus Dados | ";
    if (is_admin()) {
      echo "Novo usuário | ";
      echo "Novo jogo | ";
    }
		echo "<a href='user-logout.php'>Sair</a>";
	}
	print "</p>";
?>