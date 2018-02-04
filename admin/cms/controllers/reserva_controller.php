<?php
/*


Objetivo: CRUD de reservas.
data: 24/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:25/10/2017
observações: nd.
Arquivos relacionados: reserva_view.php, reserva_class.php.



*/

    class controllerReserva{



        public function aprovar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_reserva=$_GET['id_reserva'];


              $reserva_controller = new reserva();
              $reserva_controller->id_reserva = $id_reserva;


              $reserva_controller->Ativar($reserva_controller);


          }


        }

        public function recusar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_reserva=$_GET['id_reserva'];


              $reserva_controller = new reserva();
              $reserva_controller->id_reserva = $id_reserva;


              $reserva_controller->Desativar($reserva_controller);


          }


        }




        public function listar(){

            require_once('models/reserva_class.php');


            $listReserva_controller = new reserva();

            return $listReserva_controller->SelectALL();

        }

        public function pesquisa(){

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $buscar = $_POST['busca'];

            $pesquisa_controller = new reserva();

            $pesquisa_controller->buscar = $buscar;



            $lstPesquisada =  $pesquisa_controller->Pesquisa($pesquisa_controller);

            



            require_once('index.php');


          }

        }




    }

?>
