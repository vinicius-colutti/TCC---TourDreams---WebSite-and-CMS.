<?php

    class aspectos{

        public $cor_preco;
        public $cor_rodape;
        public $img_template;



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
         public function UpdateCorRodaPe($aspectos){
           $sql = "UPDATE tbl_aspectos SET cor_rodape='".$aspectos->cor_rodape."' where id_aspecto = 1";

           //echo ($sql);

            if (mysql_query($sql)) {
                header('location:aspectos.php');
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }
        public function UpdateComentarioMtf($aspectos){
          $sql = "UPDATE tbl_pontos SET qtds_ponto='".$aspectos->ptns_comentario."' where id_pontos = 2";

          //echo ($sql);

           if (mysql_query($sql)) {
               header('location:aspectos.php');
           }
           else
           {
               echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
           }



       }

       public function UpdateReservasMtf($aspectos){
         $sql = "UPDATE tbl_pontos SET qtds_ponto='".$aspectos->ptns_reserva."' where id_pontos = 1";

         //echo ($sql);

          if (mysql_query($sql)) {
              header('location:aspectos.php');
          }
          else
          {
              echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
          }



      }

      public function UpdateAllMtf($aspectos){
        $sql = "UPDATE tbl_pontos SET qtds_ponto='".$aspectos->ptns_reserva."' where id_pontos = 1";
        //echo ($sql);

         mysql_query($sql);

         $sql2 = "UPDATE tbl_pontos SET qtds_ponto='".$aspectos->ptns_comentario."' where id_pontos = 2";
         //echo ($sql);

          mysql_query($sql2);
          header('location:aspectos.php');



     }

        public function UpdateCorPreco($aspectos){
          $sql = "UPDATE tbl_aspectos SET cor_preco='".$aspectos->cor_preco."' where id_aspecto = 1";

          //echo ($sql);

           if (mysql_query($sql)) {
               header('location:aspectos.php');
           }
           else
           {
               echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
           }



       }

       public function UpdateImgTemplate($aspectos){
         $sql = "UPDATE tbl_aspectos SET logo_site='".$aspectos->img_template."' where id_aspecto = 1";

         //echo ($sql);

          if (mysql_query($sql)) {
              header('location:aspectos.php');
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
         public function SelectALLPreco(){
           //script de select no banco de dados
           $sql = "select id_aspecto, cor_preco from tbl_aspectos";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listaspectos[] = new aspectos;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listaspectos[$cont]->id_aspecto=$rs['id_aspecto'];
              $listaspectos[$cont]->cor_preco=$rs['cor_preco'];


              $cont+=1;

           }

           return $listaspectos;

        }
        public function SelectALLRodaPe(){
          //script de select no banco de dados
          $sql = "select id_aspecto, cor_rodape from tbl_aspectos";
          $select = mysql_query($sql);
          $cont=0;

          //repetição para guardar os registros do banco de dados em array de objetos
          while ($rs=mysql_fetch_array($select)) {

            //instancia da classe contato, criando uma coleção de objetos
            $listaspectos[] = new aspectos;

            //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
             $listaspectos[$cont]->id_aspecto=$rs['id_aspecto'];
             $listaspectos[$cont]->cor_rodape=$rs['cor_rodape'];


             $cont+=1;

          }

          return $listaspectos;

       }

       public function SelectALLImgTemplate(){
         //script de select no banco de dados
         $sql = "select id_aspecto, logo_site from tbl_aspectos";
         $select = mysql_query($sql);
         $cont=0;

         //repetição para guardar os registros do banco de dados em array de objetos
         while ($rs=mysql_fetch_array($select)) {

           //instancia da classe contato, criando uma coleção de objetos
           $listaspectos[] = new aspectos;

           //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
            $listaspectos[$cont]->id_aspecto=$rs['id_aspecto'];
            $listaspectos[$cont]->img_template=$rs['logo_site'];


            $cont+=1;

         }

         return $listaspectos;

      }

      public function   SelectPtnsReserva(){
        //script de select no banco de dados
        $sql = "select * from tbl_pontos where id_pontos = 1";
        $select = mysql_query($sql);
        $cont=0;

        //repetição para guardar os registros do banco de dados em array de objetos
        while ($rs=mysql_fetch_array($select)) {

          //instancia da classe contato, criando uma coleção de objetos
          $listptnsreserva[] = new aspectos;

          //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
           $listptnsreserva[$cont]->id_pontos=$rs['id_pontos'];
           $listptnsreserva[$cont]->qtd_ponto_reservas=$rs['qtds_ponto'];


           $cont+=1;

        }

        return $listptnsreserva;

     }

     public function   SelectPtnsComentario(){
       //script de select no banco de dados
       $sql = "select * from tbl_pontos where id_pontos = 2";
       $select = mysql_query($sql);
       $cont=0;

       //repetição para guardar os registros do banco de dados em array de objetos
       while ($rs=mysql_fetch_array($select)) {

         //instancia da classe contato, criando uma coleção de objetos
         $listptnscomentario[] = new aspectos;

         //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
          $listptnscomentario[$cont]->id_pontos=$rs['id_pontos'];
          $listptnscomentario[$cont]->qtd_ponto_comentario=$rs['qtds_ponto'];


          $cont+=1;

       }

       return $listptnscomentario;

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
