<?php
/*


Objetivo: Selecionar todos os quartos de um determinado hotél, escolhido na home ou até mesmo na página de parceiros e para a página de reserva.
data: 11/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:11/10/2017
observações: nd.
Arquivos relacionados: router.php, home_view.php, visualizar_quartos_class.php.



*/

    class controllerQuartos{

        public function listar_quartos(){
          $id_hotel = $_GET['id_hotel'];

            require_once('models/visualizar_quartos_class.php');


            $listQuartos_controller = new quartos();
            @$quartos_class->id_hotel = $id_hotel;

            return $listQuartos_controller->SelectALL( $quartos_class);
            require_once("verQuartos.php");

        }


        public function listar_quartos_reserva(){
          $id_quarto = $_GET['id_quarto'];

            require_once('models/visualizar_quartos_class.php');


            $listQuartosReserva_controller = new quartos();
            @$quartos_class_reserva->id_quarto = $id_quarto;

            return $listQuartosReserva_controller->SelectReserva( $quartos_class_reserva);
            require_once("areaReserva.php");

        }





    }

?>
