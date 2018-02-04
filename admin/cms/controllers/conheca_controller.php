<?php
/*


Objetivo: CRUD dos comentários do conheca seu destino.
data: 08/11/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:08/11/2017
observações: nd.
Arquivos relacionados: router.php, conheca_view.php, conheca_class.php.



*/

    class controllerConheca{



        public function ativar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_comentario=$_GET['id_comentario'];


              $comentario_controller = new conheca();
              $comentario_controller->id_comentario = $id_comentario;


              $comentario_controller->Ativar($comentario_controller);


          }


        }


        public function desativar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


            //Resgatando os valores do form
            $id_comentario=$_GET['id_comentario'];


            $comentario_controller = new conheca();
            $comentario_controller->id_comentario = $id_comentario;


            $comentario_controller->Desativar($comentario_controller);

          }


        }


        public function listar(){

            require_once('models/conheca_class.php');


            $listConheca_controller = new conheca();

            return $listConheca_controller->SelectALL();

        }




    }

?>
