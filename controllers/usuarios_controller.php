<?php

class controllerUsuarios{

    //metodo para inserir um novo contato
    public function novo(){
        //Verifica se a requisição feita pelo form é utilizando o metodo POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Resgatando os valores do form
            $nome_usuario=$_POST['nome_usuario'];
            $cpf_usuario=$_POST['cpf_usuario'];
            $rg_usuario=$_POST['rg_usuario'];
            $email_usuario=$_POST['email_usuario'];
            $senha_usuario=$_POST['senha_usuario'];
            $telefone_usuario=$_POST['telefone_usuario'];
            $celular_usuario=$_POST['celular_usuario'];
            $email_usuario=$_POST['email_usuario'];
            //$foto_usuario=$_POST['foto_usuario'];

            $rua_usuario=$_POST['rua_usuario'];
            $bairro_usuario=$_POST['bairro_usuario'];
            $numero_usuario=$_POST['numero_usuario'];
            $cidade_usuario=$_POST['cb_cidade'];
            $i = 0;


           foreach ($_FILES["arquivos"]["error"] as $key => $error) {

             $destino = "arquivos_usuarios/".$_FILES["arquivos"]["name"]
             [$i];

             move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i],

             $destino );

             //aqui vai o insert

             $usuarios_controller = new cadastroUsuario();
             $usuarios_controller->foto_usuario = $destino;
             $usuarios_controller->nome_usuario = $nome_usuario;
             $usuarios_controller->cpf_usuario = $cpf_usuario;
             $usuarios_controller->rg_usuario = $rg_usuario;
             $usuarios_controller->email_usuario = $email_usuario;
             $usuarios_controller->senha_usuario = $senha_usuario;
             $usuarios_controller->telefone_usuario = $telefone_usuario;
             $usuarios_controller->celular_usuario = $celular_usuario;
             $usuarios_controller->email_usuario = $email_usuario;
             //$usuarios_controller->foto_usuario = $foto_usuario;

             $usuarios_controller->rua_usuario = $rua_usuario;
             $usuarios_controller->bairro_usuario = $bairro_usuario;
             $usuarios_controller->numero_usuario = $numero_usuario;
             $usuarios_controller->cb_cidade = $cidade_usuario;

             $usuarios_controller->Insert($usuarios_controller);

             $i++;

           }

        }

    }

    //metodo para atualizar um contato
    public function atualizar(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

          //Resgatando os valores do form
          $id_usuario=$_GET['id_usuario'];
          $nome_usuario=$_POST['nome_usuario'];
          $rg_usuario=$_POST['rg_usuario'];
          $email_usuario=$_POST['email_usuario'];
          $senha_usuario=$_POST['senha_usuario'];
          $telefone_usuario=$_POST['telefone_usuario'];
          $celular_usuario=$_POST['celular_usuario'];
          $email_usuario=$_POST['email_usuario'];


          $rua_usuario=$_POST['rua_usuario'];
          $bairro_usuario=$_POST['bairro_usuario'];
          $numero_usuario=$_POST['numero_usuario'];


          $foto_usuario = basename($_FILES["arquivos"]["name"]);

          $i = 0;


         foreach ($_FILES["arquivos"]["error"] as $key => $error) {

           $destino = "arquivos_usuarios/".$_FILES["arquivos"]["name"]
           [$i];

           move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i],

           $destino );

          $usuarios_controller = new cadastroUsuario();

          $usuarios_controller->id_usuario = $id_usuario;
          $usuarios_controller->nome_usuario = $nome_usuario;
          $usuarios_controller->rg_usuario = $rg_usuario;
          $usuarios_controller->email_usuario = $email_usuario;
          $usuarios_controller->senha_usuario = $senha_usuario;
          $usuarios_controller->telefone_usuario = $telefone_usuario;
          $usuarios_controller->celular_usuario = $celular_usuario;
          $usuarios_controller->email_usuario = $email_usuario;

          $usuarios_controller->rua_usuario = $rua_usuario;
          $usuarios_controller->bairro_usuario = $bairro_usuario;
          $usuarios_controller->numero_usuario = $numero_usuario;

          //var_dump ($_FILES['arquivos']);
          //echo('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
          if(empty($_FILES['arquivos']) ){

              $usuarios_controller->Update($usuarios_controller);

          }else{
              //$foto_usuario = $_FILES['arquivos'];
              $usuarios_controller->foto_usuario = $destino;
              $usuarios_controller->Update_foto($usuarios_controller);

          }

          $i++;

        }

      }

    }


    //metodo parar buscar informações do usuario
    /*public function Buscar(){
      if($_SERVER['REQUEST_METHOD'] == 'GET'){

        //Resgatar do form
        $id_usuario=$_GET['id_usuario'];

        $usuarios_controller = new cadastroUsuario();
        $usuarios_controller->id_usuario = $id_usuario;

        $list=$usuarios_controller->SelectById($usuarios_controller);
        require_once("perfilUsuario.php");
      }

    }*/

    public function BuscarAJAX(){
      if($_SERVER['REQUEST_METHOD'] == 'GET'){

        //Resgatar do form
        $id_usuario=$_GET['id_usuario'];

        $usuarios_controller = new cadastroUsuario();
        $usuarios_controller->id_usuario = $id_usuario;

        $list=$usuarios_controller->SelectById($usuarios_controller);

        echo json_encode($list);

      }

    }
}

?>
