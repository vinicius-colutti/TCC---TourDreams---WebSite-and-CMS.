<?php
/*


Objetivo: Selecionar todos os htoéis automáticos e por pesquisa na página home.
data: 09/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:09/10/2017
observações: nd.
Arquivos relacionados: router.php, home_view.php, home_class.php.



*/

    class controllerHome{

        public function listar(){

            require_once('models/home_class.php');


            $listHome_controller = new home();

            return $listHome_controller->SelectALL();

        }





    }

?>
