<?php

class controllerFaleConosco{

    //metodo para inserir um novo contato
    public function novofale(){
        //Verifica se a requisição feita pelo form é utilizando o metodo POST
        echo "string_controller";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          echo "string_controller+_IF";


          $nome=$_POST['txt_nome_fc'];
          $email=$_POST['txt_email_fc'];
          $telefone=$_POST['txt_telefone_fc'];
          $obs=$_POST['obs'];
          $fale_controller = new cadastroFaleConosco();
             $fale_controller->nome=$nome;
     				 $fale_controller->email=$email;
     				 $fale_controller->telefone=$telefone;
     				 $fale_controller->obs=$obs;

             $fale_controller->Insert($fale_controller);

        }

    }

    


}

?>
