<?php

    class promocoes{

        public $id_promocao;
        public $banner_promocao;



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
         public function Insert($promocoes){

            $sql ="insert into tbl_promocoes (banner_promocao, status_promocao)values('".$promocoes->banner_promocao."', 1)";


            if (mysql_query($sql)) {
                header('location:promocoes.php');
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }

        //metodo para atualizar um campo no banco
         public function Ativar($promocoes){
           $sql = "UPDATE tbl_promocoes SET status_promocao= 1 WHERE id_promocao=".$promocoes->id_promocao;

            if (mysql_query($sql)) {
              ?>
              <script type="text/javascript">
                window.alert('Promoção ativada');
                window.location.href = "promocoes.php";
              </script>
              <?php


                //header('location:promocoes.php');
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }

        //metodo para deletar algo do banco
         public function Delete($promocoes){
           $sql="delete from tbl_promocoes where id_promocao = $promocoes->id_promocao";
           if (mysql_query($sql)){
             header('location:promocoes.php');



           }else{


               echo('impossivel');



           }



        }

        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select * from tbl_promocoes order by id_promocao desc";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listpromocoes[] = new promocoes;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listpromocoes[$cont]->id_promocao=$rs['id_promocao'];
              $listpromocoes[$cont]->banner_promocao=$rs['banner_promocao'];


              $cont+=1;

           }

           return $listpromocoes;

        }


        //selecionar por id
         public function Desativar($promocoes){
           $sql = "UPDATE tbl_promocoes SET status_promocao= 0 WHERE id_promocao=".$promocoes->id_promocao;

            if (mysql_query($sql)) {
              ?>
              <script type="text/javascript">
                window.alert('Promoção Desativada');
                window.location.href = "promocoes.php";
              </script>
              <?php


                //header('location:promocoes.php');
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }


    }

?>
