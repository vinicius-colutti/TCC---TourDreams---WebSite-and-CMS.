<?php
/*


Objetivo: CRUD dos usuarios que acessam o CMS.
data: 20/09/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:20/09/2017
observações: nd.
Arquivos relacionados: router.php, usuarios_view.php, usuarios_class.php.



*/

    class controllerUsuarios{

        //metodo para inserir um novo contato
        public function novo(){
            //Verifica se a requisição feite pelo form é utilizando o metodo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                //Resgatando os valores do form
                $nome=$_POST['nome'];
                $email=$_POST['email'];
                $senha=$_POST['senha'];
                $nivel=$_POST['option'];



                $usuarios_controller = new usuarios();

                $usuarios_controller->nome = $nome;
                $usuarios_controller->email = $email;
                $usuarios_controller->senha = $senha;
                $usuarios_controller->id_setor = $nivel;

                $usuarios_controller->Insert($usuarios_controller);


            }



        }

        //metodo para atualizar um contato
        public function atualizar(){

                  $nome=$_POST['nome'];
                  $email=$_POST['email'];
                  $senha=$_POST['senha'];
                  $nivel=$_POST['option'];
                  $id_funcionario=$_GET['id_funcionario'];


                $usuario_class = new usuarios();


                $usuario_class->id_funcionario=$id_funcionario;
                $usuario_class->nome=$nome;
                $usuario_class->email=$email;
                $usuario_class->senha=$senha;
                $usuario_class->id_nivel=$nivel;

                $usuario_class->Update($usuario_class);





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
        public function listar(){

            require_once('models/usuario_class.php');

            //Cria a instancia para model contato
            $listContatos_controller = new usuarios();
            //chamada para o método SelectALL que vai fazer o select no banco de dados;
            return $listContatos_controller->SelectALL();





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
