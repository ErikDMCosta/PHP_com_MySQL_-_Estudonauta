<?php
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

  // cripto('1234');

  // -- ESTUDOS SOBRE HASH (PHP) --

  // Gerando uma HASH
  function gerarHash($senha) {
    $txt = cripto($senha);
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
  }

  // Testando uma HASH
  function testarHash($senha, $hash) {
    // $ok = password_verify($senha, $hash);
    $ok = password_verify(cripto($senha), $hash);
    return $ok;
  }

// echo gerarHash('12345');
// echo gerarHash('teste');

// echo '<br>'.gerarHash('estudonauta');

$original = 'estudonauta';
echo '<br> Original: ' . $original;
echo '<br> Criptografia: '.cripto($original);
echo '<br> Hash: '. gerarHash($original);

echo '<br><br>Teste de Senha e Hash: <br>';
echo testarHash($original, '$2y$10$SM6EmgdjltW030dVqIMYc.V3wU3YVMqLCHxPBwPMZQAPxZxgHWeXC') ? "SIM" : "NÃO";

echo '<br>';

echo testarHash('ftuvepobvub', '$2y$10$SM6EmgdjltW030dVqIMYc.V3wU3YVMqLCHxPBwPMZQAPxZxgHWeXC') ? "SIM" : "NÃO";

?>