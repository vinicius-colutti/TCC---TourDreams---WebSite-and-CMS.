<?php
/*


Objetivo: CRUD dos setores dos funcionários que acessam o cms.
data: 23/09/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:23/09/2017
observações: nd.
Arquivos relacionados: router.php, setores_view.php, setores_class.php.



*/

    class controllerSetores{

        //metodo para inserir um novo contato
        public function novo(){
            //Verifica se a requisição feite pelo form é utilizando o metodo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                //Resgatando os valores do form
                $nome=$_POST['nome_setor'];

                $setores_controller = new setores();

                $setores_controller->nome = $nome;


                $setores_controller->Insert($setores_controller);


            }



        }

        //metodo para atualizar um contato
        public function atualizar(){

                  $nome_setor=$_POST['nome_setor'];
                  $id_setor=$_GET['id_setor'];


                $setores_class = new setores();


                $setores_class->id_setor=$id_setor;
                $setores_class->nome_setor=$nome_setor;


                $setores_class->Update($setores_class);





        }

        //metodo para apagar um contato
        public function apagar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_setor=$_GET['id_setor'];


              $setores_controller = new setores();
              $setores_controller->id_setor = $id_setor;


              $setores_controller->Delete($setores_controller);


          }






        }

        //metodo para listar todos os contato
        public function listar(){

            require_once('models/setores_class.php');

            //Cria a instancia para model contato
            $listSetores_controller = new setores();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listSetores_controller->SelectALL();





        }

        //metodo para buscar um determinado contato
        public function buscar(){
          //Coleta do parâmetro GET id_cadastro
            $id_setor = $_GET['id_setor'];


            //Instância da classe Contato e com o atributo de id_setor
            $setores_class = new setores();
            $setores_class->id_setor = $id_setor;
            $result = $setores_class->SelectById($setores_class);

            require_once("usuarios.php");



        }


    }

?>
