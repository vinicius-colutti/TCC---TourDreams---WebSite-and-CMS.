<?php

    //verificar qual view está requisitando o router e qual ação a view quer executar (inserir, editar, excluir, etc)
    //essa informação é criad no action de cada form na view
    $controller=$_GET['controller'];
    $modo=$_GET['modo'];

    //verificar qual controller devemos instanciar, essa informação e enviada na varíavel controller pela view
    switch($controller){
      case 'faleconosco':
      require_once('controllers/fale_controller.php');
      require_once('models/fale_class.php');
      switch($modo){
        case'buscar_fale':
        $controller_fale = new controllerFale;
        $controller_fale->buscar_fale();
        break;
        case 'deletar_fale':
        $controller_fale = new controllerFale;
        $controller_fale->deletar_fale();
        break;





      }
      case 'detalhes_cliente':
      require_once('controllers/clientes_controller.php');
      require_once('models/clientes_class.php');
      switch($modo){
        case'listar':
        $controller_cliente = new controllerClientes;
        $controller_cliente->listar_id();
        break;



      }

      case 'conheca':
      require_once('controllers/conheca_controller.php');
      require_once('models/conheca_class.php');
      switch($modo){
        case'ativar_conheca':
        $controller_conheca = new controllerConheca;
        $controller_conheca->ativar();
        break;

        case'desativar_conheca':
        $controller_conheca = new controllerConheca;
        $controller_conheca->desativar();
        break;

      }
      case 'detalhes_hotel':
      require_once('controllers/hoteleiros_controller.php');
      require_once('models/hotel_class.php');
      switch($modo){
        case'listar_hotel':
        $controller_hotel = new controllerHoteis;
        $controller_hotel->listar_id();
        break;
        case'aceitar_hotel':
        $controller_hotel = new controllerHoteis;
        $controller_hotel->aceitar_hotel();
        break;
        case'recusar_hotel':
        $controller_hotel = new controllerHoteis;
        $controller_hotel->recusar_hotel();
        break;



      }

      case 'reservas':
      require_once('controllers/reserva_controller.php');
      require_once('models/reserva_class.php');
      switch($modo){
        case'aprovar':
        $controller_reserva = new controllerReserva;
        $controller_reserva->aprovar();
        break;
        case'recusar':
        $controller_reserva = new controllerReserva;
        $controller_reserva->recusar();
        break;
        case 'busca_reserva':

        $controller_reserva = new controllerReserva();

        $controller_reserva->pesquisa();
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
                            $controller_contato = new controllerUsuarios();
                            //chamando o método novo();
                            $controller_contato->novo();
                            break;


                        case'editar':
                        $controller_contato = new controllerUsuarios;
                        $controller_contato->Buscar();
                        break;

                        case'editarfuncionario':
                        $controller_contato = new controllerUsuarios;
                        $controller_contato->atualizar();
                        break;



                        case'excluir':
                        $controller_contato = new controllerUsuarios();
                        //chamando o método excluir();
                        $controller_contato->apagar();
                        break;








                }

            case 'setores':
              require_once('controllers/setores_controller.php');
              require_once('models/setores_class.php');
              switch($modo){

                    case'novo':
                        //instancia da classe controllerContatos
                        $controller_setores = new controllerSetores();
                        //chamando o método novo();
                        $controller_setores->novo();
                        break;


                    case'editar_setor':
                    $controller_setores = new controllerSetores;
                    $controller_setores->buscar();
                    break;

                    case'editarsetor_id':
                    $controller_setores = new controllerSetores;
                    $controller_setores->atualizar();
                    break;



                    case'excluir_setor':
                    $controller_setores = new controllerSetores();
                    //chamando o método excluir();
                    $controller_setores->apagar();
                    break;

            }

            case 'promocoes':
              require_once('controllers/promocoes_controller.php');
              require_once('models/promocoes_class.php');
              switch($modo){

                    case'novo':
                        //instancia da classe controllerContatos
                        $controller_promocoes = new controllerPromocoes();
                        //chamando o método novo();
                        $controller_promocoes->novo();
                        break;


                    case'ativar_promocao':
                    $controller_promocoes = new controllerPromocoes;
                    $controller_promocoes->ativar();
                    break;

                    case'desativar_promocao':
                    $controller_promocoes = new controllerPromocoes;
                    $controller_promocoes->desativar();
                    break;

                    case'excluir_promocao':
                    $controller_promocoes = new controllerPromocoes;
                    $controller_promocoes->apagar();
                    break;

            }

            case 'sobre_empresa':
              require_once('controllers/sobre_controller.php');
              require_once('models/sobre_class.php');
              switch($modo){

                    case'novo_sobre':
                        //instancia da classe controllerContatos
                        $controller_sobre = new controllerSobre();
                        //chamando o método novo();
                        $controller_sobre->novo();
                        break;


                    case'editar_sobre':
                    $controller_sobre = new controllerSobre;
                    $controller_sobre->buscar();
                    break;
                    case'editar_sobre_id':
                    $controller_sobre = new controllerSobre;
                    $controller_sobre->atualizar();
                    break;

                    case'excluir_sobre':
                    $controller_sobre = new controllerSobre;
                    $controller_sobre->apagar();
                    break;

                    case'ativar_sobre':
                    $controller_sobre = new controllerSobre;
                    $controller_sobre->ativar();
                    break;

                    case'desativar_sobre':
                    $controller_sobre = new controllerSobre;
                    $controller_sobre->desativar();
                    break;
                    case'nova_foto_sobre':
                    $controller_sobre = new controllerSobre;
                    $controller_sobre->fotos();
                    break;
                    case'excluir_img':
                    $controller_sobre = new controllerSobre;
                    $controller_sobre->apagar_fotos();
                    break;

              }

            case 'aspectos_site':
              require_once('controllers/aspectos_controller.php');
              require_once('models/aspectos_class.php');
              switch($modo){

                  case'att_cor_preco':
                      //instancia da classe controllerContatos
                      $controller_cor_preco = new controllerAspectos();
                      //chamando o método novo();
                      $controller_cor_preco->att_cor_preco();
                      break;

                  case'att_cor_rodape':
                          //instancia da classe controllerContatos
                          $controller_cor_preco = new controllerAspectos();
                          //chamando o método novo();
                          $controller_cor_preco->att_cor_rodape();
                          break;

                  case'listar_cor_preco':
                  //instancia da classe controllerContatos
                  $controller_cor_preco = new controllerAspectos();
                  //chamando o método novo();
                  $controller_cor_preco->listar_cor_preco();
                  break;



                  case'listar_cor_rodape':
                  //instancia da classe controllerContatos
                  $controller_cor_preco = new controllerAspectos();
                  //chamando o método novo();
                  $controller_cor_preco->listar_cor_rodape();
                 break;

                case'att_img_template':
                //instancia da classe controllerContatos
                $controller_img_template = new controllerAspectos();
                //chamando o método novo();
                $controller_img_template->att_img_template();
                break;
                case'att_pnts_mtf':
                //instancia da classe controllerContatos
                $controller_img_template = new controllerAspectos();
                //chamando o método novo();
                $controller_img_template->att_pontos_mtf();
                break;
                case'listar_img_template':
                //instancia da classe controllerContatos
                $controller_cor_preco = new controllerAspectos();
                //chamando o método novo();
                $controller_cor_preco->listar_img_template();
                break;


               case'listar_ptns_reserva':
              //instancia da classe controllerContatos
              $controller_cor_preco = new controllerAspectos();
              //chamando o método novo();
              $controller_cor_preco->listar_ptns_reserva();
              break;
              case'listar_ptns_comentarios':
              //instancia da classe controllerContatos
              $controller_cor_preco = new controllerAspectos();
              //chamando o método novo();
              $controller_cor_preco->listar_ptns_comentarios();
              break;

            }
}

?>
