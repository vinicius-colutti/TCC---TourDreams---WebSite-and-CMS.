<?php

//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

$email = $_GET['email'];
$senha = $_GET['senha'];

$sql = "select * from tbl_hotel where email_hotel='".$email."' and senha_hotel=".$senha;
echo $sql;
$lista_parc = array("id"=> -1,"email"=>"","senha"=>"");

$select =mysql_query($sql);
while ($rs = mysql_fetch_array($select)){
	$lista_user = array(
		"id"=>$rs['id_hotel'],
		"email"=>$rs['email_hotel'],
		"senha"=>$rs['senha_hotel']

	);
}
echo json_encode($lista_parc);

/*
if($usuario = "teste" && $senha == "teste"){
  echo json_encode ("ok");
}else{
  echo json_encode ("erro");
}*/
//echo json_encode(array("email"=>$email,"senha"=>$senha));

 ?>
