<?php
/*


Objetivo: Selecionar registros do banco de dados da promoção.
data: 04/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:04/10/2017
observações: nd.
Arquivos relacionados: promocao.php, promocao_class.php.



*/

    class controllerPromocao{



        //metodo para listar todos os contato
        public function listarfotos(){

            require_once('models/promocao_class.php');

            //Cria a instancia para model contato
            $listPromocao_controller = new promocao();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listPromocao_controller->SelectALLFotos();

        }



    }

?>
