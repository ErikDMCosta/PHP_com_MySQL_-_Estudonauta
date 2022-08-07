<?php
	print "<p class='pequeno'>";
	if (empty($_SESSION['user'])) {
		print "<a href='user-login.php'>Entrar</a>";
	} else {
		print "Olá, <strong>" . $_SESSION['nome'] . "</strong> | ";
		echo "<a href='user-logout.php'>Sair</a>";
		echo " ( usuário do tipo " . $_SESSION['tipo'] . ")";
	}
	print "</p>";
?>