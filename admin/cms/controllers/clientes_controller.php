<?php
/*


Objetivo: Gerenciar os clientes cadastrados no site da TourDreams.
data: 05/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:05/10/2017
observações: nd.
Arquivos relacionados: router.php, clientes_view.php, clientes_class.php.



*/

    class controllerClientes{

        public function listar(){

            require_once('models/clientes_class.php');


            $listClientes_controller = new clientes();

            return $listClientes_controller->SelectALL();

        }

        public function listar_id(){
          //Coleta do parâmetro GET id_cadastro
            $id_cliente = $_GET['id_usuario'];


            //Instância da classe Contato e com o atributo de id_cadastro
            $listClientes_id_controller = new clientes();
            $listClientes_id_controller->id_cliente = $id_cliente;
            $result = $listClientes_id_controller->SelectById($listClientes_id_controller);

            require_once("views/detalhes_do_cliente.php");



        }


        public function ptns_mtf(){


        }



    }

?>
