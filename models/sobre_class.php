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


        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select * from tbl_sobre_a_empresa where status_sobre = 1";
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

        //metodo para selecionar tudo do banco
         public function SelectALLFotos(){
           //script de select no banco de dados
           $sql = "select * from tbl_imagens_sobre_a_empresa";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listsobre_fotos[] = new sobre;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listsobre_fotos[$cont]->id_imagem=$rs['id_imagem_sobre'];
              $listsobre_fotos[$cont]->descricao_imagem=$rs['descricao_imagem_sobre'];

              $cont+=1;

           }

           return $listsobre_fotos;

        }



    }

?>
