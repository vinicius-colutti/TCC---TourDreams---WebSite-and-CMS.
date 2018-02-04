<?php

	class parceiro{

			public $id_hotel;
			public $nome_hotel;
			public $telefone_hotel;
			public $id_categoria;
			public $cnpj_hotel;
			public $imagem_hotel_1;
			public $imagem_hotel_2;
			public $btnAvancar;
			public $email_hotel;
			public $pais_hotel;
			public $estado_hotel;
			public $cidade_hotel;
			public $wi_fi;
			public $aceita_animais;
			public $estacionamento;
			public $spa;
			public $pscina;
			public $academia;
			public $cafe_da_manha;
			public $almoco;
			public $cafe_da_tarde;
			public $jantar;
			public $endereco_hotel;
			public $CEP;
			public $numero_hotel;
			public $bairro_hotel;
			public $restaurante;

			/*public $nome_quarto;
			public $numero_quarto;*/
			//metodo construtor
	  public function __construct(){

		  //incluir o arquivo de conexao
		  require_once('models/bd_class.php');
		  //cria uma instancia da classe mysql_db
		  $conexao_bd = new mysql_db();
		  //estabelece a conexao com BD
		  $conexao_bd->conectar();



	  }


		public function SelectCategoria(){
			$sql =" select * from tbl_categoria ";
			$select = mysql_query($sql);
			$cont = 0;

			while($rs=mysql_fetch_array($select)){

				$listCategoria[] = new parceiro();

				$listCategoria[$cont]->idCategoria=$rs['id_categoria'];
				$listCategoria[$cont]->nome_categoria=$rs['nome_categoria'];


				$cont+=1;
			}

			return $listCategoria;
		}

		/*public function SelectCaracteristicasHotel(){
			$sql_carac =" select h.id_hotel,
										ch.wifi,
										ch.estacionamento,
										ch.spa,
										ch.piscina,
										ch.academia,
										ch.aceita_animais,
										ch.restaurante,
										ch.cafe_da_manha,
										ch.almoco,
										ch.cafe_da_tarde,
										ch.jantar
										from tbl_caracteristicas_hotel as ch
										inner join
										tbl_hotel as h
										on h.id_hotel = ch.id_hotel
										where h.id_hotel=$id_hotel->id_hotel
										";
			$select = mysql_query($sql_carac);

			while($rs=mysql_fetch_array($select)){

				$ListarCaracteristicaHotel = new parceiro();

				$ListarCaracteristicaHotel->id_caracteristica=$rs['id_caracteristica_hotel'];
				$ListarCaracteristicaHotel->wifi=$rs['wifi'];
				$ListarCaracteristicaHotel->estacionamento=$rs['estacionamento'];
				$ListarCaracteristicaHotel->spa=$rs['spa'];
				$ListarCaracteristicaHotel->piscina=$rs['piscina'];
				$ListarCaracteristicaHotel->academia=$rs['academia'];
				$ListarCaracteristicaHotel->aceita_animais=$rs['aceita_animais'];
				$ListarCaracteristicaHotel->restaurante=$rs['restaurante'];
				$ListarCaracteristicaHotel->cafe_da_manha=$rs['cafe_da_manha'];
				$ListarCaracteristicaHotel->almoco=$rs['almoco'];
				$ListarCaracteristicaHotel->cafe_da_tarde=$rs['cafe_da_tarde'];
				$ListarCaracteristicaHotel->jantar=$rs['jantar'];

			}

			return $ListarCaracteristicaHotel;
		}*/

	  //metodo para inserir no banco
	   public function Insert($parceiro){
			  //Fazendo o select para verificar o email
		 $sql_verificaEmail = mysql_query("select * from tbl_hotel where email_hotel = '$parceiro->email_hotel'");

		 //Vendo se o email inserido já existe no BD
		 if(@mysql_num_rows($sql_verificaEmail) > 0){

			echo "<script> alert('E-mail já cadastrado!'); </script>";

		 }else {

				$sql ="insert into tbl_hotel(comentarios,nome_hotel,telefone_hotel,id_categora,cnpj,qtds_reserva_hotel,imagem_hotel_1,situacao_hotel,avaliação,email_hotel,senha_hotel)
											values('nada','".$parceiro->nome_hotel."','".$parceiro->telefone_hotel."','".$parceiro->categoria_hotel."','".$parceiro->cnpj_hotel."',0,'".$parceiro->foto."','nada','nada','".$parceiro->email_hotel."','".$parceiro->senha."')";



				//echo($sql);
				mysql_query($sql);


				//Pegando o ID do insert anterior
				$id_hotel = mysql_insert_id();

				$sql1="insert into tbl_caracteristicas_hotel(wifi,estacionamento,spa,piscina,academia,aceita_animais,restaurante,cafe_da_manha,almoco,cafe_da_tarde,jantar,id_hotel)
															values('".$parceiro->wi_fi_hotel."','".$parceiro->estacionamento_hotel."','".$parceiro->spa_hotel."','".$parceiro->pscina."',
															'".$parceiro->academia."','".$parceiro->aceita_animais."','".$parceiro->restaurante."','".$parceiro->cafe_da_manha."',
															'".$parceiro->almoco."','".$parceiro->cafe_da_tarde."','".$parceiro->jantar."','".$id_hotel."')";

				//echo($sql1);
				mysql_query($sql1);




			$sql2="insert into tbl_endereco_hotel(id_hotel,cidade_codigo,rua_hotel,bairro_hotel,numero_hotel)values('".$id_hotel."','".$parceiro->cidade_hotel."','".$parceiro->endereco_hotel."','".$parceiro
			->bairro_hotel."','".$parceiro->numero_hotel."')";

			$email = "";
			//echo($sql2);
			mysql_query($sql2);


			header('location:cadastroParceiro2.php?id_hotel='.$id_hotel.'');





		}
	}


	public function BuscarInfoHotel($id_hotel){

		$sql_buscarHotel = "select h.id_hotel,
												h.nome_hotel,
												h.email_hotel,
												h.telefone_hotel,
												eh.bairro_hotel,
												eh.numero_hotel,
												h.cnpj,
												eh.rua_hotel,
												h.senha_hotel,
												c.nome_categoria,
												ch.wifi,
												ch.estacionamento,
												ch.spa,
												ch.piscina,
												ch.academia,
												ch.aceita_animais,
												ch.restaurante,
												ch.cafe_da_manha,
												ch.almoco,
												ch.cafe_da_tarde,
												ch.jantar,
												h.imagem_hotel_1
												from tbl_hotel as h
												inner join
												tbl_endereco_hotel as eh
												on h.id_hotel = eh.id_hotel
												inner join
												tbl_caracteristicas_hotel as ch
												on ch.id_hotel = h.id_hotel
												inner join
												tbl_categoria as c
												on h.id_categora = c.id_categoria
												where h.id_hotel=$id_hotel->id_hotel";

		$select = mysql_query($sql_buscarHotel);

		//echo($sql_buscarHotel);

		if($rs=mysql_fetch_array($select)){

			$listHotel_id = new parceiro();

			$listHotel_id->id_hotel=$rs['id_hotel'];

			$listHotel_id->nome_hotel=$rs['nome_hotel'];
			$listHotel_id->email_hotel=$rs['email_hotel'];
			$listHotel_id->telefone_hotel=$rs['telefone_hotel'];
			$listHotel_id->bairro_hotel=$rs['bairro_hotel'];
			$listHotel_id->numero_hotel=$rs['numero_hotel'];
			$listHotel_id->cnpj_hotel=$rs['cnpj'];
			$listHotel_id->rua_hotel=$rs['rua_hotel'];
			$listHotel_id->senha_hotel=$rs['senha_hotel'];

			$listHotel_id->categoria_hotel=$rs['nome_categoria'];

			$listHotel_id->wifi=$rs['wifi'];
			$listHotel_id->estacionamento=$rs['estacionamento'];
			$listHotel_id->spa=$rs['spa'];
			$listHotel_id->piscina=$rs['piscina'];
			$listHotel_id->academia=$rs['academia'];
			$listHotel_id->aceita_animais=$rs['aceita_animais'];
			$listHotel_id->restaurante=$rs['restaurante'];
			$listHotel_id->cafe_da_manha=$rs['cafe_da_manha'];
			$listHotel_id->almoco=$rs['almoco'];
			$listHotel_id->cafe_da_tarde=$rs['cafe_da_tarde'];
			$listHotel_id->jantar=$rs['jantar'];

			$listHotel_id->foto=$rs['imagem_hotel_1'];

			return $listHotel_id;

		}

	}

	public function Update_hotel($id_hotel){

		$sql_updateHotel = "update tbl_hotel as h inner join tbl_endereco_hotel as eh on h.id_hotel = eh.id_hotel
												inner join tbl_caracteristicas_hotel as ch on h.id_hotel = ch.id_hotel
												inner join tbl_categoria as c on h.id_categora = c.id_categoria
												set nome_hotel='".$id_hotel->nome_hotel."', email_hotel='".$id_hotel->email_hotel."', telefone_hotel='".$id_hotel->telefone_hotel."',
												bairro_hotel='".$id_hotel->bairro_hotel."', numero_hotel='".$id_hotel->numero_hotel."', cnpj='".$id_hotel->cnpj_hotel."',
												rua_hotel='".$id_hotel->rua_hotel."', senha_hotel='".$id_hotel->senha_hotel."', h.id_categora='".$id_hotel->categoria_hotel."',
												wifi='1', estacionamento='1', spa='1',
												piscina='0', academia='0', aceita_animais='0',
												restaurante='1', cafe_da_manha='1', almoco='0',
												cafe_da_tarde='0', jantar='0', imagem_hotel_1='".$id_hotel->foto."'
												where h.id_hotel=$id_hotel->id_hotel";

		mysql_query($sql_updateHotel);

		//echo "<script> alert('Informações atualizadas com sucesso!'); </script>";

		header("location:perfilParceiro.php?id_hotel=".$id_hotel->id_hotel);

		//echo($sql_updateHotel);


	}

}
?>
