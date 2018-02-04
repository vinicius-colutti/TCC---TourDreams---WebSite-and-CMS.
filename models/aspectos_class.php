<?php

    class aspectos{


        //metodo construtor
        public function __construct(){

            //incluir o arquivo de conexao
            require_once('models/bd_class.php');
            //cria uma instancia da classe mysql_db
            $conexao_bd = new mysql_db();
            //estabelece a conexao com BD
            $conexao_bd->conectar();



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




    }

?>
