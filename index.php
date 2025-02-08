<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='../../../style.css'>
    <title>Caixa Eletronico</title>
</head>
<style>
img {
  width: 100px;
  margin-right: 25px;
  margin-top: 20px;
}
span.nota-legenda {
  position: relative;
  top: -16px;
}

</style>
<body>
	<main>
	<?php 
	  $saque = $_GET['valor_saque'] ?? 0;
	  $saldo_atual = 1000;
	  if ($saque <= $saldo_atual and $saque > -1) {
		$resto = (int) $saque;
		// notas de 100
		$saque100 = intdiv($resto,100);
		$resto %= 100;
		
		// notas de 50
		$saque50 = intdiv($resto,50);
		$resto %= 50;
		
		// notas de 10
		$saque10 = intdiv($resto,10);
		$resto %= 10;
		
		// notas de 5
		$saque5 = intdiv($resto,5);
		$resto %= 5;
		
		// fim
		$saldo_atual -= (int) $saque;
		}
	?>
	<h1>Caixa Eletrônico</h1>
	<form action='<?php $_SERVER["PHP_SELF"]?>' method='GET'>
		<h3>Saldo atual:<?=" R$".number_format($saldo_atual,2,',','.')?></h3>
		<label for='valor_saque'>Insira o valor que deseja sacar</label>
		<input type='number' name='valor_saque' step=0.01 value=<?=$saque?>>
		<button type='submit'>Efetuar saque</button>
	</form>
	<section id='secao-saida-saque'>
	<h2>SAÍDA DE CAIXA</h2>
	<?php
	if ($saque >= 5) {
	echo "<ul style='list-style: none;'>
	  <li><img src='cedulas/cedula-100.jpg'><span class='nota-legenda'>$saque100 nota(s)</span></li>
	  <li><img src='cedulas/cedula-50.jpg'><span class='nota-legenda'>$saque50 nota(s)</span></li>
	  <li><img src='cedulas/cedula-10.jpg'><span class='nota-legenda'>$saque10 nota(s)</span></li>
	  <li><img src='cedulas/cedula-5.jpg'><span class='nota-legenda'>$saque5 nota(s)</span></li>
	  </ul>";
	  }else if ($saque > $saldo_atual or $saque <= -1) {
	     echo "<p><strong>Saldo insuficiente</strong></p>";
	}
	?>
	</section>
	</main>
</body>
</html>