<?php

	class reservas{


			//metodo construtor
	  public function __construct(){

		  //incluir o arquivo de conexao
		  require_once('models/bd_class.php');
		  //cria uma instancia da classe mysql_db
		  $conexao_bd = new mysql_db();
		  //estabelece a conexao com BD
		  $conexao_bd->conectar();



	  }



	  //metodo para inserir no banco
	   public function Insert($reserva){
			  //Fazendo o select para verificar o email
		 $sql_verificaReserva = mysql_query("SELECT * FROM tbl_reserva WHERE id_quarto = $reserva->id_quarto and status_reserva != 'recusada' and (('$reserva->data_entrada' BETWEEN data_entrada AND data_saida) OR ('$reserva->data_saida' BETWEEN data_entrada AND data_saida));");

		 //Vendo se o email inserido já existe no BD
		 if(@mysql_num_rows($sql_verificaReserva) > 0){


      header('location:areaReserva.php?data_invalida&id_quarto='.$reserva->id_quarto.'&id_usuario='.$reserva->id_usuario);
      echo "Data inválida, por favor, tente outra";




		 }else {

				$sql =" insert into tbl_reserva(id_quarto, data_entrada, data_saida, status_reserva, dias_totais, valor_total, id_usuario, lugar_reserva)values($reserva->id_quarto, '".$reserva->data_entrada."', '".$reserva->data_saida."', 'pendente', '$reserva->total_dias', '$reserva->valor_total', '$reserva->id_usuario', 'website');";



				//echo($sql);
				mysql_query($sql);




			     header('location:finalizar_reserva.php?id_quarto='.$reserva->id_quarto.'&data_entrada='.$reserva->data_entrada.'&data_saida='.$reserva->data_saida.'&total_dias='.$reserva->total_dias.'&valor_total='.$reserva->valor_total.'&id_usuario='.$reserva->id_usuario);
		}
	}

	public function Cupom($cupom){

			$sql_verificar_cupom = mysql_query("select * from tbl_cupons where id_usuario = $cupom->id_usuario and descricao_cupons = '$cupom->cupom' ");
			//echo($sql_verificar_cupom);
			//mysql_query($sql_verificar_cupom);
			if(mysql_num_rows($sql_verificar_cupom) != 0){
						header('location:areaReserva.php?cupom_ok&id_quarto='.$cupom->id_quarto.'&id_usuario='.$cupom->id_usuario);


			}else{

				//echo "asdasd";

				echo($sql_verificar_cupom);

					header('location:areaReserva.php?cupom_erro&id_quarto='.$cupom->id_quarto.'&id_usuario='.$cupom->id_usuario);


			}


	}


}
?>
