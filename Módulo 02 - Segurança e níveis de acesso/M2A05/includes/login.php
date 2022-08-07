<?php
	// -- ESTUDOS SOBRE HASH (PHP) --

  // Gerando uma HASH
  function gerarHash($senha) {
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
  }

  // Testando uma HASH
  function testarHash($senha, $hash) {
      $ok = password_verify($senha, $hash);
    return $ok;
  }

// echo gerarHash('12345');
// echo gerarHash('teste');

// echo testarHash('teste', '$2y$10$jYLBH2O.xFMoodWYqj7WIeCl8tgL5nNYMUnOB8Wcv8JmQChT6eIme'); // Retornou [ 1 ] / Vazio

// echo testarHash('teste', 'H@4h3r@$jYLBH2O.xFMoodWYqj7WIeCl8tgL5nNYMUnOB8Wcv8JmQChT6eIme'); // Retornou [   ] / Vazio


// Teste de Senha - Confere
if (testarHash('teste', '$2y$10$jYLBH2O.xFMoodWYqj7WIeCl8tgL5nNYMUnOB8Wcv8JmQChT6eIme')) {
  echo "Senha Confere.";
} else {
  echo "Senha Incorreta!";
}

echo "<br><br><br>";

// Teste de Senha - Incorreta
if (testarHash('Test', '$2y$10$jYLBH2O.xFMoodWYqj7WIeCl8tgL5nNYMUnOB8Wcv8JmQChT6eIme')) {
  echo "Senha Confere.";
} else {
  echo "Senha Incorreta!";
}

// echo "<br>" .gerarHash('teste') . "<br>";
// echo gerarHash('admin') . "<br>";
// echo gerarHash('1234') . "<br>";
// echo gerarHash('erikdmcosta') . "<br>";

/*
  teste = $2y$10$ocnY8TicXrAP0px/eoxWLOO3l2ily.2scGC..K1PggG7.5SD.Q7Vy
  admin = $2y$10$zB8YWN/3LSwdcn4hsZ0BQuNUOG4r45hWrGbql0WX6mdHMRygnG8nu
  1234 = $2y$10$pR5/iumd0rlXYcAgF0JRzuBur2o9pSU0wITu/pveseuVCRM5cL0Yq
  erikdmcosta = $2y$10$Mt5cQw9owGZE/oQ3DBy50uO1Aywj1uIXuVT17.sl.sKECTGw3HCjK
*/

// HASH certas abaixo
echo "<br>" . testarHash('teste','$2y$10$ocnY8TicXrAP0px/eoxWLOO3l2ily.2scGC..K1PggG7.5SD.Q7Vy') . "<br>";
echo testarHash('admin','$2y$10$zB8YWN/3LSwdcn4hsZ0BQuNUOG4r45hWrGbql0WX6mdHMRygnG8nu') . "<br>";
echo testarHash('1234','$2y$10$pR5/iumd0rlXYcAgF0JRzuBur2o9pSU0wITu/pveseuVCRM5cL0Yq') . "<br>";
echo testarHash('erikdmcosta','$2y$10$Mt5cQw9owGZE/oQ3DBy50uO1Aywj1uIXuVT17.sl.sKECTGw3HCjK') . "<br>";
// HASH errada abaixo
echo testarHash('erikdmcosta','H@$hErr@d@cQw9owGZE/oQ3DBy50uO1Aywj1uIXuVT17.sl.sKECTGw3HCjK') . "<br>";

?>