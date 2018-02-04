<?php
//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

$id_hotel = $_GET['id_hotel'];
//$id_quarto = $_GET['id_quarto'];

$sql = "select distinct q.id_quarto,q.id_hotel,q.nome_quarto,q.numero_quarto,q.camas_solteiro,q.camas_casal,q.preco_quarto,i.nome_imagem
from tbl_quarto as q inner join tbl_imagens_quarto as i on q.id_quarto = i.id_quarto
and i.id_imagem_quarto = (select id_imagem_quarto from tbl_imagens_quarto where id_quarto = q.id_quarto limit 1)
 where q.id_hotel ='".$id_hotel."'";

$select=mysql_query($sql);
$quarto = array();

	while($rs=mysql_fetch_array($select)){

		$quarto[]= array(
      "id_quarto"=>$rs['id_quarto'],
			"id_hotel"=>$rs['id_hotel'],
			"nome_quarto"=>$rs['nome_quarto'],
			"numero_quarto"=>$rs['numero_quarto'],
      "camas_solteiro"=>$rs['camas_solteiro'],
      "camas_casal"=>$rs['numero_quarto'],
      "preco_quarto"=>$rs['preco_quarto'],
			"nome_imagem"=>$rs['nome_imagem']
			);
	}

	echo json_encode($quarto);
//echo json_encode(array( "imagens/hotel1.jpg" , "imagens/hotel2.jpg" ,"imagens/hotel3.jpg"));

 ?>
