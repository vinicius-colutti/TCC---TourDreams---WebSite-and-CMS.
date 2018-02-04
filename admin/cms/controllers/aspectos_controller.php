<?php
/*


Objetivo: CRUD de aspectos e cores do site TourDreams.
data: 23/09/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:23/09/2017
observações: nd.
Arquivos relacionados: router.php, aspectos_view.php, aspectos_class.php.



*/

    class controllerAspectos{



        //metodo para atualizar um contato
        public function att_cor_preco(){

                $cor_preco=$_POST['input_cor_aspecto'];

                $aspectos_class = new aspectos();


                $aspectos_class->cor_preco=$cor_preco;


                $aspectos_class->UpdateCorPreco($aspectos_class);





        }
        public function att_cor_rodape(){

                $cor_rodape=$_POST['input_rodape_aspecto'];

                $aspectos_class = new aspectos();


                $aspectos_class->cor_rodape=$cor_rodape;


                $aspectos_class->UpdateCorRodaPe($aspectos_class);





        }


        public function att_pontos_mtf(){

                $ptns_reserva=$_POST['txt_reserva'];
                $ptns_comentario=$_POST['txt_comentario'];


                if (empty($_POST['txt_reserva'])) {
                  $aspectos_class = new aspectos();


                  $aspectos_class->ptns_comentario=$ptns_comentario;


                  $aspectos_class->UpdateComentarioMtf($aspectos_class);



                }elseif (empty($_POST['txt_comentario'])) {
                  $aspectos_class = new aspectos();


                  $aspectos_class->ptns_reserva=$ptns_reserva;


                  $aspectos_class->UpdateReservasMtf($aspectos_class);


                }else{
                  $aspectos_class = new aspectos();

                    $aspectos_class->ptns_comentario=$ptns_comentario;
                    $aspectos_class->ptns_reserva=$ptns_reserva;



                  $aspectos_class->UpdateAllMtf($aspectos_class);



                }




        }

        public function att_img_template(){
          if($_SERVER['REQUEST_METHOD'] == 'POST'){


             $i = 0;




            foreach ($_FILES["arquivos"]["error"] as $key => $error) {


              # code...

              $destino = "arquivos_aspectos/".$_FILES["arquivos"]["name"]
              [$i];

              move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i],

              $destino );


              //aqui vai o insert
              $aspectos_controller = new aspectos();

              $aspectos_controller->img_template = $destino;


              $aspectos_controller->UpdateImgTemplate($aspectos_controller);
              $i++;


            }




          }


        }
        //metodo para apagar um contato
        public function apagar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_funcionario=$_GET['id_funcionario'];


              $usuarios_controller = new usuarios();
              $usuarios_controller->id_funcionario = $id_funcionario;


              $usuarios_controller->Delete($usuarios_controller);


          }

        }

        //metodo para listar todos os contato
        public function listar_cor_preco(){

            require_once('models/aspectos_class.php');

            //Cria a instancia para model contato
            $listAspectos_controller = new aspectos();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listAspectos_controller->SelectALLPreco();


        }

        public function listar_ptns_reserva(){

            require_once('models/aspectos_class.php');

            //Cria a instancia para model contato
            $listAspectos_controller = new aspectos();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listAspectos_controller->SelectPtnsReserva();


        }

        public function listar_ptns_comentarios(){

            require_once('models/aspectos_class.php');

            //Cria a instancia para model contato
            $listAspectos_controller = new aspectos();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listAspectos_controller->SelectPtnsComentario();


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

        //metodo para buscar um determinado contato
        public function buscar(){
          //Coleta do parâmetro GET id_cadastro
            $id_funcionario = $_GET['id_funcionario'];
            $id_setor_user = $_GET['id_setor'];

            //Instância da classe Contato e com o atributo de id_cadastro
            $usuario_class = new usuarios();
            $usuario_class->id_funcionario = $id_funcionario;
            $usuario_class->id_setor = $id_setor_user;
            $result = $usuario_class->SelectById($usuario_class);

            require_once("usuarios.php");



        }


    }

?>
