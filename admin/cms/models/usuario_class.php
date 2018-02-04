<?php

    class usuarios{

        public $id_usuario;
        public $nome_usuario;
        public $email_usuario;
        public $senha_usuario;
        public $id_setor_usuario;


        //metodo construtor
        public function __construct(){

            //incluir o arquivo de conexao
            require_once('models/bd_class.php');
            //cria uma instancia da classe mysql_db
            $conexao_bd = new mysql_db();
            //estabelece a conexao com BD
            $conexao_bd->conectar();



        }

        //metodo para inserir no banco
         public function Insert($usuario){

            $sql ="insert into tbl_funcionarios (nome_funcionario, email_funcionario, senha, id_setor)values('".$usuario->nome."', '".$usuario->email."', '".$usuario->senha."', '".$usuario->id_setor."')";


            if (mysql_query($sql)){
              header('location:usuarios.php');



            }else{


                echo('impossivel');



            }



        }

        //metodo para atualizar um campo no banco
         public function Update($usuario){
           $sql = "UPDATE tbl_funcionarios SET nome_funcionario='".$usuario->nome."', email_funcionario='".$usuario->email."', senha='".$usuario->senha."', id_setor='".$usuario->id_nivel."' WHERE id_funcionario=".$usuario->id_funcionario;

            if (mysql_query($sql)) {
                header('location:usuarios.php');
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }

        //metodo para deletar algo do banco
         public function Delete($usuario){
           $sql="delete from tbl_funcionarios where id_funcionario = $usuario->id_funcionario";
           if (mysql_query($sql)){
             header('location:usuarios.php');



           }else{


               echo('impossivel');



           }



        }

        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select * from tbl_funcionarios order by id_funcionario desc";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listusuarios[] = new usuarios;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listusuarios[$cont]->id_funcionario=$rs['id_funcionario'];
              $listusuarios[$cont]->nome_funcionario=$rs['nome_funcionario'];
              $listusuarios[$cont]->email_funcionario=$rs['email_funcionario'];
              $listusuarios[$cont]->senha=$rs['senha'];
              $listusuarios[$cont]->id_setor=$rs['id_setor'];

              $cont+=1;

           }

           return $listusuarios;

        }


        //selecionar por id
         public function SelectById($usuarios){
           $sql = "SELECT * FROM tbl_funcionarios WHERE id_funcionario = ".$usuarios->id_funcionario;
          $select = mysql_query($sql);

          //Verifica se existe algum registro no banco de dados.
          if($rs=mysql_fetch_array($select))
          {
              //Preenche o objeto com os dados provenientes do banco de dados.
              $usuarios->nome_funcionario = $rs['nome_funcionario'];
              $usuarios->email_funcionario = $rs['email_funcionario'];
              $usuarios->senha_funcionario = $rs['senha'];
              $usuarios->id_setor = $rs['id_setor'];

              return $usuarios;
          }




        }


    }

?>
