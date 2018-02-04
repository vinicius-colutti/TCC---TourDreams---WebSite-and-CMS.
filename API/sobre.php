<?php
//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

//$id_promocao = $_GET['id_promocao'];

$sql = "select * from dbtourdreams.tbl_sobre_a_empresa;";

$sobre = array();

$select=mysql_query($sql);

	while($rs=mysql_fetch_array($select)){

		$sobre= array(
			"txt_visao"=>$rs['txt_visao'],
			"txt_sobre"=>$rs['txt_sobre'],
			"txt_valores"=>$rs['txt_valores'],
      "txt_valores"=>$rs['txt_valores']
		);
}
	echo json_encode ($sobre);


//var_dump($listaPromo);

//echo json_encode(array( "imagens/bannerpromocao.jpg" , "imagens/bannerpromocao2.jpg" ,"imagens/bannerpromocao3.jpg","imagens/bannerpromocao4.jpg"));

 ?>
