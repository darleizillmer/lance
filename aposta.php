<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Lance Web</title>
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- nav e o menu -->   
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <!-- Aqui e como ira aparece em um telefone -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <!-- Aqui no span, são os 3 pontos ao abrir em um telefone -->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php">Voltar</a>
    </div>

    <!-- Aqui se edita a parte do saldo -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class=""><a>Saldo&nbsp; R$<?php echo $linha['saldo']; ?><span class="sr-only">(current)</span></a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li class=""><a href="apostar.php">Apostar<span class="sr-only">(current)</span></a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li class=""><a href="">Histórico<span class="sr-only">(current)</span></a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li class=""><a href="ranking.php">Ranking<span class="sr-only">(current)</span></a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li class=""><a href="loja/loja.php">Loja<span class="sr-only">(current)</span></a></li>
        </ul>
            <!-- Aqui se edita a parte do sair -->  
             <ul class="nav navbar-nav navbar-right">
                 <li><a href="sair.php"><i class="glyphicon glyphicon-off"></i></a></li>
             </ul>

    </div><!-- fim da div collapse, ela faz com que abra um menu ao aumentar o site -->
  </div><!-- /.container-fluid -->
</nav>

<!------------------------------------------------------------------------------------------------------------------------>

        <?php
                include("conn.php");
                //ORDER BY serve para organizar os dados de acordo com o que voce quiser
                $buscar="SELECT * FROM tb_jogos ORDER BY id_jogo DESC";
                $exe= mysqli_query($con, $buscar) or die ("OCORREU UM ERRO AO MOSTRAR OS DADOS");
                //começo da tabela
                echo "<br><br><div class='container'>
                        <table class='table table-inverse'>
                          <thead>
                            <tr bgcolor='#222222' align='center'>
                              <th><font color='white'>Codigo Partida</font></th>
                              <th><font color='white'>Time Casa</font></th>
                              <th><font color='white'>Placar</font></th>
                              <th><font color='white'>Time Fora</font></th>
                              <th><font color='white'>Placar</font></th>
                              <th><font color='white'>Lance</font></th>
                              <th><font color='white'></font></th>
                            </tr>
                         </thead>
                      </div>";


                while($linha = mysqli_fetch_array($exe)){
                    echo "<form class='form-group' action='' method='post' id='formulario'>
                          <tbody>
                            <tr bgcolor='#222222'>
                              <td><font color='white'><input type='int' class='form-control' name='id_jogo' maxlength='1' value='".$linha['id_jogo']."' style='text-align: center;' readonly='readonly'></font></td>
							  <input type='hidden' name='method' value='aposta'>
                              <td><font color='white'>".$linha['casa']."</font></td>
                              <td><input type='int' class='form-control' name='apostacasa' maxlength='1' value='' style='text-align: center;'></td>
                              <td><font color='white'>".$linha['fora']."</font></td>
                              <td><input type='int' class='form-control' name='apostafora' maxlength='1' value='' style='text-align: center;'></td>
                              <td><input type='int' class='form-control' name='valor' maxlength='5' value='' style='text-align: center;'></td>
                              <td><input class='btn btn-success submit-botao' type='submit' value='Apostar' name='btnApostar'></td>
                            </tr>
                          </tbody>
                          </form>";

                }
        ?>


<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
<script>
$(document).ready(function() {
    $("#formulario").on("submit", function(e){
		e.preventDefault();
		$.ajax({
			method: "POST",
			url: "functions.php",
			data: $("#formulario").serialize()
		})
		.success(function(msg){
			alert(msg);
		})
		.done(function( msg ) {
		});
	});
});
</script>
</body>
</html>