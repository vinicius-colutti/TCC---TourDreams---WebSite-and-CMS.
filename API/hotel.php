<?php
//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

//$id_hotel = $_GET['id_hotel'];
//$id_quarto = $_GET['id_quarto'];

$sql = "select * from tbl_hotel where aprovar_hotel = 1;";
$lista_hotel = array();
$select=mysql_query($sql);

	while ($rs=mysql_fetch_array($select)){

		$lista_hotel [] = array(
      "id_quarto"=>$rs['id_quarto'],
			"id_hotel"=>$rs['id_hotel'],
			"nome_quarto"=>$rs['nome_quarto'],
			"numero_quarto"=>$rs['numero_quarto'],
      "camas_solteiro"=>$rs['numero_quarto'],
      "camas_casal"=>$rs['numero_quarto'],
      "preco_quarto"=>$rs['preco_quarto']
			);

		$quartoJSON = json_encode($quarto);

		echo($quartoJSON);
	}


//echo json_encode(array( "imagens/hotel1.jpg" , "imagens/hotel2.jpg" ,"imagens/hotel3.jpg"));

 ?>
