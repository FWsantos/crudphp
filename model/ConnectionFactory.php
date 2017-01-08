<?php
function getConnection(){

	//variaveis que farão parte da conexão
	$dbname = "PDO";
	$user = "root";
	$password = "";

	try{
		//Estabelecendo conexão ao banco
		$con = new PDO("mysql:host=localhost;dbname=$dbname",$user,$password);

	}catch(PDOException $e){
		print "Deu errado".$e->getMessage();
	}
	return $con;
}
?>