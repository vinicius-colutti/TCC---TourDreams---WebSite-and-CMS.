<?php
/*


Objetivo: Listar todos os aspectos do site que foram alterados no cms, e armazenados no banco de dados.
data: 04/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:04/10/2017
observações: nd.
Arquivos relacionados: home.php, aspectos_class.php.



*/

    class controllerAspectos{


        //metodo para listar todos os contato
        public function listar_cor_preco(){

            require_once('models/aspectos_class.php');

            //Cria a instancia para model contato
            $listAspectos_controller = new aspectos();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listAspectos_controller->SelectALLPreco();


        }



        public function listar_cor_rodape(){

            require_once('models/aspectos_class.php');

            //Cria a instancia para model contato
            $listAspectos_controller = new aspectos();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listAspectos_controller->SelectALLRodaPe();


        }

        public function listar_img_template(){

            require_once('models/aspectos_class.php');

            //Cria a instancia para model contato
            $listAspectos_controller = new aspectos();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listAspectos_controller->SelectALLImgTemplate();


        }

      
    }

?>
