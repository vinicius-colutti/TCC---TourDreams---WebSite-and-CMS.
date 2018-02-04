<?php
/*


Objetivo: Gerenciar os hoteis cadastrados no site da TourDreams.
data: 09/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:09/10/2017
observações: nd.
Arquivos relacionados: router.php, hoteleiros_view.php, hotel_class.php.



*/

    class controllerHoteis{

        public function listar(){

            require_once('models/hotel_class.php');


            $listHoteis_controller = new hoteis();

            return $listHoteis_controller->SelectALL();

        }

        public function listar_id(){
          //Coleta do parâmetro GET id_cadastro
            $id_hotel = $_GET['id_hotel'];


            //Instância da classe Contato e com o atributo de id_cadastro
            $listHoteis_id_controller = new hoteis();
            $listHoteis_id_controller->id_hotel = $id_hotel;
            $result = $listHoteis_id_controller->SelectById($listHoteis_id_controller);

            require_once("views/detalhes_do_hotel.php");



        }

        public function aceitar_hotel(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){



              $id_hotel=$_GET['id_hotel'];


              $hotel_controller = new hoteis();
              $hotel_controller->id_hotel = $id_hotel;


              $hotel_controller->Ativar($hotel_controller);


          }


        }

        public function recusar_hotel(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){



              $id_hotel=$_GET['id_hotel'];


              $hotel_controller = new hoteis();
              $hotel_controller->id_hotel = $id_hotel;


              $hotel_controller->Recusar($hotel_controller);


          }


        }



    }

?>
