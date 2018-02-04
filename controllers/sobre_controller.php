<?php
/*


Objetivo: Selecionar registros do banco de dados na página SOBRE A EMPRESA.
data: 04/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:04/10/2017
observações: nd.
Arquivos relacionados: sobre.php, sobre_class.php.



*/

    class controllerSobre{



        //metodo para listar todos os contato
        public function listar(){

            require_once('models/sobre_class.php');

            //Cria a instancia para model contato
            $listSobre_controller = new sobre();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listSobre_controller->SelectALL();

        }

        //metodo para listar todos os contato
        public function listarfotos(){

            require_once('models/sobre_class.php');

            //Cria a instancia para model contato
            $listSobre_controller = new sobre();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listSobre_controller->SelectALLFotos();

        }





    }

?>
