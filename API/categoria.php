<?php

//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

$id_categoria = $_GET['id_categoria'];

  $sql = "select h.id_hotel, h.nome_hotel, c.cidade_descricao, h.imagem_hotel_1, q.preco_quarto from tbl_hotel
  as h inner join tbl_endereco_hotel
  as eh on h.id_hotel = eh.id_hotel inner join cidade
  as c on eh.cidade_codigo = c.cidade_codigo  inner join tbl_quarto
  as q on h.id_hotel = q.id_hotel
   where id_categora = '".$id_categoria."'and h.aprovar_hotel = 1 group by h.id_hotel;" ;
//echo($sql);
  $select = mysql_query($sql);
  $categoria = array();
  while($rs=mysql_fetch_array($select)){

    $categoria [] = array(
      'id_hotel'=>$rs['id_hotel'],
      'nome_hotel'=>$rs['nome_hotel'],
      'cidade_descricao'=>$rs['cidade_descricao'],
      'imagem_hotel_1'=>$rs['imagem_hotel_1'],
			'preco_quarto'=>$rs['preco_quarto']

    );
  }
echo json_encode($categoria);


 ?>
