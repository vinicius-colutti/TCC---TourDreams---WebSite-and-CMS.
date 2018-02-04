<?php
/*


Objetivo: Reservas realizadas pelo usuário.
data: 25/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:25/10/2017
observações: nd.
Arquivos relacionados: reserva_view.php, reserva_class.php.



*/

    class controllerReservaUsuario{

        public function listar(){

            require_once('models/reserva_usuario_class.php');


            $listReserva_controller = new reserva_usuario();

            return $listReserva_controller->SelectALL();





        }


        public function listar_lugares_que_passou(){

            require_once('models/reserva_usuario_class.php');


            $listLugaresPassou_controller = new reserva_usuario();

            return $listLugaresPassou_controller->SelectALugares();





        }


        public function comentario(){

          $id_reserva = $_GET['id_reserva'];
          $id_usuario = $_GET['id_usuario'];
          $comentario = $_POST['comentario'];
          $reserva_controller = new reserva_usuario();
          $reserva_controller->id_reserva = $id_reserva;
          $reserva_controller->id_usuario = $id_usuario;
          $reserva_controller->comentario = $comentario;


          $reserva_controller->InsertComentario($reserva_controller);
        }

        public function cupom(){

          $id_usuario = $_GET['id_usuario'];
          $cupom = $_GET['cupom'];

          $reserva_controller = new reserva_usuario();
          $reserva_controller->id_usuario = $id_usuario;
          $reserva_controller->cupom = $cupom;



          $reserva_controller->InsertCupom($reserva_controller);
        }




    }

?>
