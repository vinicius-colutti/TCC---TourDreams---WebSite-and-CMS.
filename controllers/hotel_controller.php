<?php

    class ControllerHotel{

        //Metodo Inserir Novo Registro
        public function Novo(){
            if($_SERVER['REQUEST_METHOD']=='POST')
            {


				$nome_hotel=$_POST['txtNomeHotel'];
				$email_hotel=$_POST['txtEmail'];

				$CEP = $_POST['txtCEP'];
				$estado_hotel= $_POST['cb_estado'];
				$cidade_hotel = $_POST['cb_cidade'];
				$cnpj_hotel = $_POST['txtCNPJ'];
				$endereco_hotel= $_POST['txtEndereco'];
				$id_categoria=$_POST['opt'];
				$wi_fi=$_POST['opt2'];
				$aceita_animais=$_POST['opt3'];
				$estacionamento=$_POST['opt4'];
				$spa=$_POST['opt5'];
				$pscina=$_POST['opt6'];
				$academia=$_POST['opt7'];
				$restaurante=$_POST['opt71'];
				$senha_hotel=$_POST['txtSenha'];
				$cafe_da_manha=$_POST['opt8'];
				$almoco=$_POST['opt9'];
				$cafe_da_tarde=$_POST['opt10'];
				$jantar=$_POST['opt11'];
				$telefone_hotel=$_POST['txtTelefone'];
				$bairro_hotel=$_POST['txtBairro'];
				$numero_hotel=$_POST['txtNumeroHotel'];

				$i = 0;

				foreach ($_FILES["arquivos"]["error"] as $key => $error) {

				 $destino = "arquivos_parceiro/".$_FILES["arquivos"]["name"]
				[$i];

				 move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i],

				 $destino);

					$hotel_controller = new parceiro();

					 $hotel_controller->nome_hotel=$nome_hotel;
					 $hotel_controller->email_hotel=$email_hotel;
					 /*$hotel_controller->pais_hotel=$pais_hotel;*/
					 $hotel_controller->cep_hotel=$CEP;
					 $hotel_controller->estado_hotel=$estado_hotel;
					 $hotel_controller->cidade_hotel=$cidade_hotel;
					 $hotel_controller->cnpj_hotel=$cnpj_hotel;
					 $hotel_controller->endereco_hotel=$endereco_hotel;

					 $hotel_controller->categoria_hotel=$id_categoria;

					 $hotel_controller->wi_fi_hotel=$wi_fi;
					 $hotel_controller->aceita_animais=$aceita_animais;
					 $hotel_controller->estacionamento_hotel=$estacionamento;
					 $hotel_controller->spa_hotel=$spa;
					 $hotel_controller->pscina=$pscina;
					 $hotel_controller->academia=$academia;
					 $hotel_controller->cafe_da_manha=$cafe_da_manha;
					 $hotel_controller->almoco=$almoco;
					 $hotel_controller->cafe_da_tarde=$cafe_da_tarde;
					 $hotel_controller->jantar=$jantar;
					 $hotel_controller->telefone_hotel=$telefone_hotel;
					 $hotel_controller->bairro_hotel=$bairro_hotel;
					 $hotel_controller->numero_hotel=$numero_hotel;
					 $hotel_controller->restaurante=$restaurante;
					 $hotel_controller->foto=$destino;
					$hotel_controller->senha=$senha_hotel;

					 $id_hotel= $hotel_controller->Insert($hotel_controller);


					$i++;

				}





			}
		}


		public function ListarCategoria(){

			require_once('models/parceiro_class.php');
			$listCategoria = new parceiro();

			return $listCategoria -> SelectCategoria();



        }


  /*public function ListarCaracteristicaHotel(){

		require_once('models/parceiro_class.php');
		$listCategoria = new parceiro();

		return $listCategoria -> SelectCaracteristicasHotel();

  }*/


    public function buscarInfoHotel(){

      if($_SERVER['REQUEST_METHOD'] == 'GET'){

        //require_once('models/parceiro_class.php');

        $id_hotel=$_GET['id_hotel'];

        $hotel_controller = new parceiro();
        $hotel_controller->id_hotel=$id_hotel;

        $list=$hotel_controller->BuscarInfoHotel($hotel_controller);

        require_once('cadastroParceiro.php');

        //header('location:editarHotel.php');

      }

    }


    public function atualizar(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_hotel=$_GET['id_hotel'];

        $nome_hotel=$_POST['txtNomeHotel'];
        $email_hotel=$_POST['txtEmail'];
        $telefone_hotel=$_POST['txtTelefone'];
        $bairro_hotel=$_POST['txtBairro'];
        $numero_hotel=$_POST['txtNumeroHotel'];
        $cnpj_hotel=$_POST['txtCNPJ'];
        $rua_hotel=$_POST['txtEndereco'];
        $senha_hotel=$_POST['txtSenha'];

        $id_categoria=$_POST['opt'];

        $wifi=$_POST['opt2'];
        $estacionamento=$_POST['opt4'];
        $spa=$_POST['opt5'];
        $piscina=$_POST['opt6'];
        $academia=$_POST['opt7'];
        $aceita_animais=$_POST['opt3'];
        $restaurante=$_POST['opt71'];
        $cafe_da_manha=$_POST['opt8'];
        $almoco=$_POST['opt9'];
        $cafe_da_tarde=$_POST['opt10'];
        $jantar=$_POST['opt11'];

        $i = 0;

				foreach ($_FILES["arquivos"]["error"] as $key => $error) {

				 $destino = "arquivos_parceiro/".$_FILES["arquivos"]["name"]
				[$i];

				 move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i],

				 $destino);

        $hotel_controller = new parceiro();

        $hotel_controller->id_hotel = $id_hotel;

        $hotel_controller->nome_hotel = $nome_hotel;
        $hotel_controller->email_hotel = $email_hotel;
        $hotel_controller->telefone_hotel = $telefone_hotel;
        $hotel_controller->bairro_hotel = $bairro_hotel;
        $hotel_controller->numero_hotel = $numero_hotel;
        $hotel_controller->cnpj_hotel = $cnpj_hotel;
        $hotel_controller->rua_hotel = $rua_hotel;
        $hotel_controller->senha_hotel = $senha_hotel;

        $hotel_controller->categoria_hotel = $id_categoria;

        $hotel_controller->wifi = $wifi;
        $hotel_controller->estacionamento = $estacionamento;
        $hotel_controller->spa = $spa;
        $hotel_controller->piscina = $piscina;
        $hotel_controller->academia = $academia;
        $hotel_controller->aceita_animais = $aceita_animais;
        $hotel_controller->restaurante = $restaurante;
        $hotel_controller->cafe_da_manha = $cafe_da_manha;
        $hotel_controller->almoco = $almoco;
        $hotel_controller->cafe_da_tarde = $cafe_da_tarde;
        $hotel_controller->jantar= $jantar;

        $hotel_controller->foto=$destino;

        $hotel_controller->Update_hotel($hotel_controller);

        $i++;

      }

      }

    }


	}





 ?>
