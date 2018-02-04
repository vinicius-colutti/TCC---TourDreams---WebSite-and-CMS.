<?php

//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

	$id_quarto=$_GET['id_quarto'];
	$checkIn=$_GET['data_entrada'];
	$checkOut=$_GET['data_saida'];
	$status_reserva=$_GET['status_reserva'];
	$id_usuario=$_GET['id_usuario'];

	$insert = "insert into tbl_reserva (id_quarto,data_entrada,data_saida,status_reserva,id_usuario,lugar_reserva)
	values (".$id_quarto.",'".$checkIn."','".$checkOut."','".$status_reserva."',".$id_usuario.",'app');";

	mysql_query($insert);

	echo $insert;

	if(mysql_affected_rows() != 0){

					$calcular_dias = "update dbtourdreams.tbl_reserva set dias_totais = (
						select PERIOD_DIFF(data_saida,data_entrada)+1 as dias_totais
						) where id_quarto =$id_quarto";

echo $calcular_dias;

mysql_query($calcular_dias);

if(mysql_affected_rows() != 0 ){

	$calcular_preco = "update tbl_reserva as r
		inner join tbl_quarto as q on r.id_quarto = q.id_quarto
		set r.valor_total = (q.preco_quarto * r.dias_totais)
 		where r.id_quarto = $id_quarto;";

 echo $calcular_preco;

 mysql_query($calcular_preco);

}

}
 ?>
