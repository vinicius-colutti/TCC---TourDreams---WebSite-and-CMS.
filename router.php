<?php
$controller = '';
$modo = '';
    //verificar qual view está requisitando o router e qual ação a view quer executar (inserir, editar, excluir, etc)
    //essa informação é criad no action de cada form na view
$controller=$_GET['controller'];
$modo=$_GET['modo'];

//verificar qual controller devemos instanciar, essa informação e enviada na varíavel controller pela view
switch($controller){



      case'visualizar_quartos_hotel':
      require_once('controllers/visualizar_quartos_controller.php');
      require_once('models/visualizar_quartos_class.php');
      echo "string";
          switch ($modo) {
            case 'listar_quartos':
            echo "string2";
            $controller_quartos = new controllerQuartos();

            $controller_quartos->listar_quartos();
              # code...
              break;


          }
          case'reservas':
          require_once('controllers/reservas_controller.php');
          require_once('models/reserva_class.php');

              switch ($modo) {
                case 'nova_reserva':

                $controller_reservas = new controllerReservas();

                $controller_reservas->Novo();
                  # code...
                  break;

                  case 'verifica_cupom':

                  $controller_reservas = new controllerReservas();

                  $controller_reservas->verifica_cupom();
                    # code...
                    break;


              }

              case'conheca':
              require_once('controllers/conheca_controller.php');
              require_once('models/conheca_class.php');

                  switch ($modo) {
                    case 'busca_conheca':

                    $controller_conheca = new controllerConheca();

                    $controller_conheca->pesquisa();
                      # code...
                      break;


                  }
              case'reserva_usuario':
              require_once('controllers/reserva_usuario_controller.php');
              require_once('models/reserva_usuario_class.php');

                  switch ($modo) {
                    case 'inserir_comentario':

                    $controller_reservas = new controllerReservaUsuario();

                    $controller_reservas->comentario();
                      # code...
                      break;

                      case 'pegar_cupom':

                      $controller_reservas = new controllerReservaUsuario();

                      $controller_reservas->cupom();
                        # code...
                        break;


                  }
          case'busca':
          require_once('controllers/busca_avancada_controller.php');
          require_once('models/busca_avancada_class.php');

              switch ($modo) {
                case 'busca_avancada':

                $controller_busca = new controllerBuscaAvancada();

                $controller_busca->pesquisa();

                 header('location:areaReserva.php');
                  # code...
                  break;


              }


              case'home':
              require_once('controllers/home_controller.php');
              require_once('models/home_class.php');

                  switch ($modo) {
                    case 'busca_home':

                    $controller_busca = new controllerHome();

                    $controller_busca->pesquisa_home();
                      # code...
                      break;


                  }




      case'usuarios':
          //incluindo todos os arquivos necessários para a programação, no caso a controller e a model
          require_once('controllers/usuarios_controller.php');
          require_once('models/usuario_class.php');

          switch($modo){

              case'novo':
                  //instancia da classe controllerContatos
                  $controller_usuario = new controllerUsuarios();
                  //chamando o método novo();
                  $controller_usuario->novo();

                  break;


              /*case'editar':

                $controller_usuario = new controllerUsuarios();
                //chamando o metodo para selecionar um determinado usuario
                $controller_usuario->buscarAJAX();
                break;*/

              case'buscarAJAX':

                  $controller_usuario = new controllerUsuarios();
                  //chamando o metodo para selecionar um determinado usuario
                  $controller_usuario-> buscarAJAX();
                  break;


              case'excluir':

                $controller_usuario = new controllerUsuarios();
                //chamando o método excluir();
                $controller_usuario->apagar();
                break;


              case 'alterar_dados':

                $controller_usuario = new controllerUsuarios();
                //chamando o método atualizar();
                $controller_usuario->atualizar();
                break;
      }
	  case'hotel':
		 //incluindo todos os arquivos necessários para a programação, no caso a controller e a model
          require_once('controllers/hotel_controller.php');
          require_once('models/parceiro_class.php');
		 // echo 'estou no hotel';

        switch($modo){

		  case'Novo':
		 // echo 'estou no novo hotel';
                  //instancia da classe controllerContatos
                  $ControllerHotel = new ControllerHotel();
                  //chamando o método novo();
                  $ControllerHotel->Novo();
				  //echo 'estou no novo hotel PAPA';

                  break;

  	     case 'SelectCategoria':
  				$ControllerHotel = new ControllerHotel();
                    //chamando o método novo();
          $ControllerHotel->ListarCategoria();

  				break;



        case'BuscarInfoHotel':

            $controller_usuario = new ControllerHotel();
            //chamando o metodo para selecionar um determinado usuario
            $controller_usuario-> buscarInfoHotel();
            break;

        case 'alterar_dados':

          $controller_usuario = new ControllerHotel();
          //chamando o método atualizar();
          $controller_usuario->atualizar();
          break;

		}

	case 'quarto':
		  require_once('controllers/quarto_controller.php');
          require_once('models/quarto_class.php');


		switch ($modo) {

		  case 'SelectCategoriaQuarto':
			$ControllerQuarto = new ControllerQuarto();
			$ControllerQuarto->ListarCategoriaQuarto();
			break;

		  case'NovoQuarto':
			$ControllerQuarto = new ControllerQuarto();
			$ControllerQuarto->NovoQuarto();
			break;

		  case 'NovoQuartoHotel':
			$ControllerQuarto = new ControllerQuarto();
			$ControllerQuarto->NovoQuartoHotel();
			break;
		  case'EditarQuarto':
			//echo("odeio essa merda");
			$ControllerQuarto = new ControllerQuarto();
			$ControllerQuarto->EditarQuarto();

			break;
		  case 'DelImgQuarto':
			  	$ControllerQuarto = new ControllerQuarto();
				$ControllerQuarto->DelImgQuarto();
				break;

		  case 'excluirQuarto':
				$ControllerQuarto = new ControllerQuarto();
				$ControllerQuarto->excluirQuarto();
			break;

		}
    case 'fale_conosco':
    require_once('controllers/fale_conosco_controller.php');
      require_once('models/fale_class.php');

      switch($modo){

      case 'inserir_fale_conosco':
      $ControllerFale = new controllerFaleConosco();
      $ControllerFale->novofale();

      break;
    }




}

?>
