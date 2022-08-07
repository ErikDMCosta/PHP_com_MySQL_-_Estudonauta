<?php
print "<p class='pequeno'>";
if (empty($_SESSION['user'])) {
	print "<a href='user-login.php'>Entrar</a>";
} else {
	print "Olá, " . $_SESSION['nome'];
}
print "</p>";

?>