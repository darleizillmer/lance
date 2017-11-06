<?php 

$con = mysqli_connect("localhost","thasalco_jogo","99879800","thasalco_jogo");
if (mysqli_connect_errno()){
	echo "Falha na conexão MySQL: " . mysqli_connect_error();
}
// echo "Conectado. Host info: " . mysqli_get_host_info($con)."<br>";

?>