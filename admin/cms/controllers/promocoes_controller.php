<?php
/*


Objetivo: CRUD dos banners de promoção.
data: 25/09/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:25/09/2017
observações: nd.
Arquivos relacionados: router.php, promocoes_view.php, promocoes_class.php.



*/

    class controllerPromocoes{

        //metodo para inserir um novo contato
        public function novo(){
            //Verifica se a requisição feite pelo form é utilizando o metodo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


               $i = 0;


              foreach ($_FILES["arquivos"]["error"] as $key => $error) {


                # code...

                $destino = "arquivos_promocao/".$_FILES["arquivos"]["name"]
                [$i];

                move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i],

                $destino );

                //aqui vai o insert
                $promocao_controller = new promocoes();

                $promocao_controller->banner_promocao = $destino;


                $promocao_controller->Insert($promocao_controller);
                $i++;





              }




            }



        }
        public function apagar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_promocao=$_GET['id_promocao'];


              $promocoes_controller = new promocoes();
              $promocoes_controller->id_promocao = $id_promocao;


              $promocoes_controller->Delete($promocoes_controller);


          }

        }

        public function ativar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_promocao=$_GET['id_promocao'];


              $promocoes_controller = new promocoes();
              $promocoes_controller->id_promocao = $id_promocao;


              $promocoes_controller->Ativar($promocoes_controller);


          }


        }


        public function desativar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_promocao=$_GET['id_promocao'];


              $promocoes_controller = new promocoes();
              $promocoes_controller->id_promocao = $id_promocao;


              $promocoes_controller->Desativar($promocoes_controller);


          }


        }


        public function listar(){

            require_once('models/promocoes_class.php');


            $listPromocoes_controller = new promocoes();

            return $listPromocoes_controller->SelectALL();





        }




    }

?>
