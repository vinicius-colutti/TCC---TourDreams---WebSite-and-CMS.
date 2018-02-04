<?php
//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

//$id_promocao = $_GET['id_promocao'];

$sql = "select * from tbl_promocoes;";

$lista_promocao = array();

$select=mysql_query($sql);

	while($rs=mysql_fetch_array($select)){

		$lista_promocao[]= array(
			"id_promocao"=>$rs['id_promocao'],
			"banner_promocao"=>$rs['banner_promocao'],
			"status_promocao"=>$rs['status_promocao']
		);
}
	echo json_encode ($lista_promocao);


//var_dump($listaPromo);

//echo json_encode(array( "imagens/bannerpromocao.jpg" , "imagens/bannerpromocao2.jpg" ,"imagens/bannerpromocao3.jpg","imagens/bannerpromocao4.jpg"));

 ?>
