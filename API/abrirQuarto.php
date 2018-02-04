<?php
//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

$id_quarto = $_GET['id_quarto'];
require_once("../models/dados_quarto.php");
require_once("../models/caracteristicas.php");

/*
  $dadosQuarto = array("nome" => "Quarto tal" ,
                        "preco" => 200.00 ,
                        "caracteristicas" => array( "spa" => true , "hidro" => true  ),
                        "imagens" => array( "imagens/hotel1.jpg" , "imagens/hotel2.jpg" ,"imagens/hotel3.jpg")
                      );
  $c = new caracteristicas();
  $c->descricao="spa";
  $c->possui = true;


    $c1 = new caracteristicas();
    $c1->descricao="hidro";
    $c1->possui = true;

  $dadosQuarto = new DadosQuarto();
  $dadosQuarto->nome =  "Quarto tal";
  $dadosQuarto->preco = 200.00 ;
  $dadosQuarto->caracteristicas = array( $c,  $c1 );
  $dadosQuarto->imagens = array( "imagens/hotel1.jpg" , "imagens/hotel2.jpg" ,"imagens/hotel3.jpg");

   echo json_encode($dadosQuarto);

*/

$sql = "select q.id_quarto,q.id_hotel,q.nome_quarto,q.numero_quarto,q.camas_solteiro,q.camas_casal,q.preco_quarto,i.nome_imagem
from tbl_quarto as q inner join tbl_imagens_quarto as i on q.id_quarto = i.id_quarto where q.id_quarto = '".$id_quarto."';";

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
 ?>
