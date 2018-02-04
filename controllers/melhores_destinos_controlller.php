<?php
/*


Objetivo: Selecionar todos os melhores destinos na página de melhores destinos.
data: 16/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:16/10/2017
observações: nd.
Arquivos relacionados: router.php, melhoresDestinos.php, melhores_class.php.



*/

    class controllerMelhores{

        public function listar_praias(){

            require_once('models/melhores_class.php');


            $listPraias_controller = new melhores();

            return $listPraias_controller->SelectALLPraias();

        }
        public function listar_inverno(){

            require_once('models/melhores_class.php');


            $listInverno_controller = new melhores();

            return $listInverno_controller->SelectALLInverno();

        }

        public function listar_campo(){

            require_once('models/melhores_class.php');


            $listCampo_controller = new melhores();

            return $listCampo_controller->SelectALLCampos();

        }

        public function listar_fazenda(){

            require_once('models/melhores_class.php');


            $listCampo_controller = new melhores();

            return $listCampo_controller->SelectALLFazendas();

        }





    }

?>
