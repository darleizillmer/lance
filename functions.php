<?php
include_once ("conn.php");

if($_POST['method'] == "cadastro"){
	$nome=(isset($_SESSION['nome']))?$_SESSION['nome']:"Indefinido";
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$jogos = "INSERT INTO tb_jogos(casa, placarcasa, fora, placarfora)VALUES(
		'".$dados['casa']."',
		".$dados['placarcasa'].",
		'".$dados['fora']."',
		".$dados['placarfora']."
		)";
	echo $jogos;
	$mensagem = "Codigo de partida ja cadastrado";
	$resultado_jogos = mysqli_query($con, $jogos) or die ($mensagem);
	if($resultado_jogos)
		echo "Jogo cadastrado com sucesso"; 
	else
		echo "Ocorreu um erro ao cadastrar o jogo";
}
elseif($_POST['method'] == "aposta"){
	$nome=(isset($_SESSION['nome']))?$_SESSION['nome']:"Indefinido";
	$email=(isset($_SESSION['email']))?$_SESSION['email']:"Indefinido";
	$saldo="SELECT * FROM tb_usuario WHERE email= '$email'";
	$exe= mysqli_query($con, $saldo);
	// $linha = mysqli_fetch_array($exe);
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$aposta = "INSERT INTO tb_aposta(id_jogo, apostacasa, apostafora, valor, data, usuario)VALUES(
		'".$dados['id_jogo']."',
		'".$dados['apostacasa']."',
		'".$dados['apostafora']."',
		'".$dados['valor']."',
		'".date('Y-m-d')."',
		'".$_SESSION['nome']."'
		)";
	$r_aposta = mysqli_query($con, $aposta) or die (mysqli_error($con));
	$verificacao = "SELECT * FROM  tb_jogos WHERE id_jogo=".$dados['id_jogo'];
	$exe= mysqli_fetch_array(mysqli_query($con, $verificacao));
	// var_dump($exe);
	if(($dados['apostacasa'] == $exe['placarcasa']) && ($dados['apostafora'] == $exe['placarfora']))
		echo "Aposta Correta\n";
	else
		echo "Aposta Incorreta\n";
	if($r_aposta)
		echo "Apostado com sucesso\nRegistro Gravado"; 
	else
		echo "Ocorreu um erro ao apostar no jogo\n";
}
?>
