<?php
/*


Objetivo: CRUD da página sobre a empresa.
data: 25/09/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:25/09/2017
observações: nd.
Arquivos relacionados: router.php, sobre_a_empresa_img.php, sobre_a_empresa_txt.php, sobre_class.php.



*/

    class controllerSobre{

        //metodo para inserir um novo contato
        public function novo(){
            //Verifica se a requisição feite pelo form é utilizando o metodo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                //Resgatando os valores do form
                $missao=$_POST['txt_missao'];
                $visao=$_POST['txt_visao'];
                $nossa_empresa=$_POST['txt_sobre_empresa'];
                $valores=$_POST['txt_valores'];



                $sobre_controller = new sobre();

                  $sobre_controller->missao = $missao;
                  $sobre_controller->visao = $visao;
                  $sobre_controller->nossa_empresa = $nossa_empresa;
                  $sobre_controller->valores = $valores;

                  $sobre_controller->Insert(  $sobre_controller);


            }



        }

        //metodo para atualizar um contato
        public function atualizar(){

                  $sobre=$_POST['txt_sobre_empresa'];
                  $missao=$_POST['txt_missao'];
                  $visao=$_POST['txt_visao'];
                  $valores=$_POST['txt_valores'];
                  $id_sobre_a_empresa=$_GET['id_sobre_a_empresa'];


                $sobre_class = new sobre();


                $sobre_class->id_sobre_a_empresa=$id_sobre_a_empresa;
                $sobre_class->missao=$missao;
                $sobre_class->visao=$visao;
                $sobre_class->valores=$valores;
                $sobre_class->sobre=$sobre;

                $sobre_class->Update($sobre_class);





        }

        //metodo para apagar um contato
        public function apagar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


            //Resgatando os valores do form
            $id_sobre_a_empresa=$_GET['id_sobre_a_empresa'];


            $sobre_controller = new sobre();
            $sobre_controller->id_sobre_a_empresa = $id_sobre_a_empresa;


            $sobre_controller->Delete($sobre_controller);


          }
        }

          public function apagar_fotos(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_imagem_sobre=$_GET['id_imagem_sobre'];


              $sobre_controller = new sobre();
              $sobre_controller->id_imagem_sobre = $id_imagem_sobre;


              $sobre_controller->DeleteFotos($sobre_controller);


            }

          }

        public function ativar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_sobre_a_empresa=$_GET['id_sobre_a_empresa'];


              $sobre_controller = new sobre();
              $sobre_controller->id_sobre_a_empresa = $id_sobre_a_empresa;


              $sobre_controller->Ativar($sobre_controller);


          }

        }

        public function desativar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_sobre_a_empresa=$_GET['id_sobre_a_empresa'];


              $sobre_controller = new sobre();
              $sobre_controller->id_sobre_a_empresa = $id_sobre_a_empresa;


              $sobre_controller->Desativar($sobre_controller);


          }

        }

        //metodo para listar todos os contato
        public function listar(){

            require_once('models/sobre_class.php');

            //Cria a instancia para model contato
            $listSobre_controller = new sobre();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listSobre_controller->SelectALL();

        }

        public function listar_fotos(){

            require_once('models/sobre_class.php');

            //Cria a instancia para model contato
            $listSobre_controller = new sobre();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listSobre_controller->SelectALLFotos();

        }

        //metodo para buscar um determinado contato
        public function buscar(){
          //Coleta do parâmetro GET id_cadastro
            $id_sobre_a_empresa = $_GET['id_sobre_a_empresa'];


            //Instância da classe Contato e com o atributo de id_cadastro
            $sobre_class = new sobre();
            $sobre_class->id_sobre_a_empresa = $id_sobre_a_empresa;
            $result = $sobre_class->SelectById($sobre_class);

            require_once("sobre.php");



        }

        public function fotos(){
            //Verifica se a requisição feite pelo form é utilizando o metodo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


               $i = 0;


              foreach ($_FILES["arquivos"]["error"] as $key => $error) {

                $destino = "arquivos_sobre/".$_FILES["arquivos"]["name"]
                [$i];

                move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i],

                $destino );

                //aqui vai o insert
                $sobre_controller = new sobre();

                $sobre_controller->descricao_imagem_sobre = $destino;


                $sobre_controller->InsertFotos($sobre_controller);
                $i++;


              }

            }

        }


    }

?>
