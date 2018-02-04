<?php
/*


Objetivo: Selecionar todos os htoéis automáticos e por pesquisa na página home.
data: 09/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:09/10/2017
observações: nd.
Arquivos relacionados: router.php, home_view.php, home_class.php.



*/

    class controllerConheca{

        public function listar(){

            require_once('models/conheca_class.php');


            $listConheca_controller = new conheca();

            return $listConheca_controller->SelectALL();

        }

        public function pesquisa(){

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $buscar = $_POST['busca'];

            $pesquisa_controller = new conheca();

            $pesquisa_controller->buscar = $buscar;



            $lstPesquisada =  $pesquisa_controller->Pesquisa($pesquisa_controller);



            require_once('conhecaDestino.php');


          }

        }





    }

?>
