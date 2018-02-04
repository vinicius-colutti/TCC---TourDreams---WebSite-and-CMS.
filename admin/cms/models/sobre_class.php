<?php

    class sobre{

        public $id_sobre_a_empresa;
        public $visao;
        public $missao;
        public $valores;
        public $sobre_empresa;


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
         public function Insert($sobre){

            $sql ="insert into tbl_sobre_a_empresa (txt_visao, txt_valores, txt_missao, txt_sobre, status_sobre)values('".$sobre->visao."', '".$sobre->valores."', '".$sobre->missao."', '".$sobre->nossa_empresa."', 1)";

            //echo ($sql);
            if (mysql_query($sql)){

              header('location:sobre.php');



           }else{


                echo('impossivel');



          }



        }
        public function InsertFotos($sobre){

           $sql ="insert into tbl_imagens_sobre_a_empresa (descricao_imagem_sobre)values('".$sobre->descricao_imagem_sobre."')";

           echo ($sql);
           if (mysql_query($sql)){

             header('location:sobre.php');



          }else{


               echo('impossivel');



         }



       }
        //metodo para atualizar um campo no banco
         public function Update($sobre){
           $sql = "UPDATE tbl_sobre_a_empresa SET txt_sobre='".$sobre->sobre."', txt_visao='".$sobre->visao."', txt_missao='".$sobre->missao."', txt_valores='".$sobre->valores."' WHERE id_sobre_a_empresa=".$sobre->id_sobre_a_empresa;

           //echo ($sql);
            if (mysql_query($sql)) {
               header('location:sobre.php');
            }
           else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }

        //metodo para deletar algo do banco
         public function Delete($sobre){
           $sql="delete from tbl_sobre_a_empresa where id_sobre_a_empresa = $sobre->id_sobre_a_empresa";
           if (mysql_query($sql)){
             header('location:sobre.php');



           }else{


               echo('impossivel');



           }



        }

        public function DeleteFotos($sobre){
          $sql="delete from tbl_imagens_sobre_a_empresa where id_imagem_sobre = $sobre->id_imagem_sobre";
          if (mysql_query($sql)){
            header('location:sobre.php');



          }else{


              echo('impossivel');



          }



       }

        public function Ativar($sobre){
          $sql="UPDATE tbl_sobre_a_empresa set status_sobre = 0";
         mysql_query($sql);
          $sql="UPDATE tbl_sobre_a_empresa set status_sobre = 1 where id_sobre_a_empresa =  $sobre->id_sobre_a_empresa ";
          if (mysql_query($sql)){
            ?>
            <script type="text/javascript">
              window.alert('Cadastrado Ativado');
              window.location.href = "sobre.php";
            </script>
            <?php
          }else{


              echo('impossivel');

          }
       }

       public function Desativar($sobre){
         $sql="UPDATE tbl_sobre_a_empresa set status_sobre = 0 where id_sobre_a_empresa =  $sobre->id_sobre_a_empresa ";
         if (mysql_query($sql)){
           ?>
           <script type="text/javascript">
             window.alert('Cadastrado Desativado');
             window.location.href = "sobre.php";
           </script>
           <?php
         }else{

             echo('impossivel');

         }
      }

        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select * from tbl_sobre_a_empresa order by id_sobre_a_empresa desc";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listsobre[] = new sobre;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listsobre[$cont]->id_sobre_a_empresa=$rs['id_sobre_a_empresa'];
              $listsobre[$cont]->txt_visao=$rs['txt_visao'];
              $listsobre[$cont]->txt_valores=$rs['txt_valores'];
              $listsobre[$cont]->txt_missao=$rs['txt_missao'];
              $listsobre[$cont]->txt_sobre=$rs['txt_sobre'];

              $cont+=1;

           }

           return $listsobre;

        }

        public function SelectALLFotos(){
          //script de select no banco de dados
          $sql = "select * from tbl_imagens_sobre_a_empresa order by id_imagem_sobre desc";
          $select = mysql_query($sql);
          $cont=0;

          //repetição para guardar os registros do banco de dados em array de objetos
          while ($rs=mysql_fetch_array($select)) {

            //instancia da classe contato, criando uma coleção de objetos
            $listsobre[] = new sobre;

            //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
             $listsobre[$cont]->id_imagem_sobre=$rs['id_imagem_sobre'];
             $listsobre[$cont]->descricao_imagem_sobre=$rs['descricao_imagem_sobre'];


             $cont+=1;

          }

          return $listsobre;

       }


        //selecionar por id
         public function SelectById($sobre){
           $sql = "SELECT * FROM tbl_sobre_a_empresa WHERE id_sobre_a_empresa = ".$sobre->id_sobre_a_empresa;
          $select = mysql_query($sql);

          //Verifica se existe algum registro no banco de dados.
          if($rs=mysql_fetch_array($select))
          {
              //Preenche o objeto com os dados provenientes do banco de dados.
              $sobre->visao = $rs['txt_visao'];
              $sobre->valores = $rs['txt_valores'];
              $sobre->missao = $rs['txt_missao'];
              $sobre->sobre = $rs['txt_sobre'];

              return $sobre;
          }




        }


    }

?>
