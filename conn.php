<?php 

$con = mysqli_connect("localhost","exemplo_user","exemplo_pass","exemplo_db");
if (mysqli_connect_errno()){
	echo "Falha na conexão MySQL: " . mysqli_connect_error();
}
// echo "Conectado. Host info: " . mysqli_get_host_info($con)."<br>";

?>