<?php

    class promocao{


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
         public function SelectALLFotos(){
           //script de select no banco de dados
           $sql = "select * from tbl_promocoes where status_promocao = 1";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listpromocao_fotos[] = new promocao;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listpromocao_fotos[$cont]->id_promocao=$rs['id_promocao'];
              $listpromocao_fotos[$cont]->banner_promocao=$rs['banner_promocao'];

              $cont+=1;

           }

           return $listpromocao_fotos;

        }



    }

?>
