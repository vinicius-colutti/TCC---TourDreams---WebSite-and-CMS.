<?php

//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

$email = $_GET['email'];
$senha = $_GET['senha'];

$sql = "select * from tbl_usuario where email_usuario='".$email."' and senha_usuario=".$senha;

$lista_user = array("id"=> -1,"email"=>"","senha"=>"");

$select =mysql_query($sql);
while ($rs = mysql_fetch_array($select)){
	$lista_user = array(
		"id"=>$rs['id_usuario'],
		"email"=>$rs['email_usuario'],
		"senha"=>$rs['senha_usuario']

	);
}
echo json_encode($lista_user);

/*
if($usuario = "teste" && $senha == "teste"){
  echo json_encode ("ok");
}else{
  echo json_encode ("erro");
}*/
//echo json_encode(array("email"=>$email,"senha"=>$senha));

 ?>
