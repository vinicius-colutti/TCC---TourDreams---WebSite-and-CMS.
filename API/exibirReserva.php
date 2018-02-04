<?php
//CONEXÃO
	require_once('../models/bd_class.php');
	$conexao_bd = new mysql_db();
	$conexao_bd->conectar();

$id_usuario = $_GET['$id_usuario'];
$sql = "select * from tbl_reserva where id_usuario='".$id_usuario."'";
$select = mysql_query($sql);
$reserva = array();

while($rs = mysql_fetch_array($select)){
	$reserva[] = array(
		"id_reserva"=>$rs['id_reserva'],
		"id_quarto"=>$rs['id_quarto'],
		"data_entrada"=>$rs['data_entrada'],
		"data_saida"=>$rs['data_saida'],
		"status_reserva"=>$rs['status_reserva'],
		"dias_totais"=>$rs['dias_totais'],
		"valor_total"=>$rs['valor_total'],
		"id_usuario"=>$rs['id_usuario']
	);
}
echo json_encode($reserva);


 ?>
