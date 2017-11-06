<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <title>Lance Web</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php">Voltar</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class=""><a href="partidas.php">Cadastrar Partidas<span class="sr-only">(current)</span></a></li>
            <li class=""><a href="editarpartidas.php">Editar Partidas<span class="sr-only">(current)</span></a></li>
        </ul>

             <ul class="nav navbar-nav navbar-right">
                 <li><a href="sair.php"><i class="glyphicon glyphicon-off"></i></a></li>
             </ul>

    </div>
  </div>
</nav>

    <form class="form-group" action="" method="post" id="formulario">
	<input type="hidden" name="method" value="cadastro" />
        <div class="container" align="center" >
            <div class="col-md-4 col-md-offset-4"><br>
                <label id="font">Time Casa</label>
                    <select class="form-control" name="casa" required>
                         <option selected></option>
                         <option value="Atletico-go">Atlético-GO</option>
                         <option value="Atletico-mg">Atlético-MG</option>
                         <option value="Atletico-pr">Atlético-PR</option>
                         <option value="Avai">Avaí</option>
                         <option value="Bahia">Bahia</option>
                         <option value="Botafogo">Botafogo</option>
                         <option value="Corinthians">Corinthians</option>
                         <option value="Coritiba">Coritiba</option>
                         <option value="Cruzeiro">Cruzeiro</option>
                         <option value="Chapecoense">Chapecoense</option>
                    </select><br>

                <label id="font">Placar time Casa</label>   
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3 col-xs-3">
                            <input id="placar-c" class="form-control" type="text" name="placarcasa" maxlength="1" value="" style="text-align: center;" required /></div>
                        <div class="col-xs-4">
                            <input class="btn btn-success submit-botao" type="submit" value="Gerar" onclick="myFunction()">
                        </div>
                    </div><hr><br>

                <label id="font">Time Fora</label>
                    <select class="form-control" name="fora" required>
                        <option selected></option>
                        <option value="Flamengo">Flamengo</option>
                        <option value="Fluminense">Fluminense</option>
                        <option value="Gremio">Grêmio</option>
                        <option value="Palmeiras">Palmeiras</option>
                        <option value="Ponte preta">Ponte Preta</option>
                        <option value="Santos">Santos</option>
                        <option value="Sao paulo">São Paulo</option>
                        <option value="Sport">Sport</option>
                        <option value="Vasco">Vasco</option>
                        <option value="Vitoria">Vitória</option>
                </select><br>

                <label id="font">Placar time fora</label>   
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3 col-xs-3">
                            <input id="placar-f" class="form-control" type="text" name="placarfora" maxlength="1" value="" style="text-align: center;" required /></div>
                        <div class="col-xs-4">
                            <input class="btn btn-success submit-botao" type="submit" value="Gerar" onclick="myFunction2()">
                        </div>
                    </div><hr>

                    <label id="font">Codigo da partida</label>  
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-xs-3">
                            <input class="form-control" type="text" name="codigo" maxlength="5" style="text-align: center;" required></div>
                    </div><hr><br>

                    <div class="col-md-4 col-md-offset-1"> 
                        <a href="index.php"><input class="btn btn-danger btn-lg" type="button" value="Cancelar"></a>
                    </div>

                    <div class="col-md-5 col-md-offset-1">
                        <input class="btn btn-info btn-lg submit-botao" type="submit" value="Cadastrar" name="btnCadastrar">
                    </div>

            </div>

        </div>

    </form>

    </div>

    </div>
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