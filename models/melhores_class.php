<?php

  $listHome="";

    class melhores{

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
         public function SelectALLPraias(){
           //script de select no banco de dados
           $sql = "select h.id_hotel, h.nome_hotel, c.cidade_descricao, h.imagem_hotel_1 from tbl_hotel as h inner join tbl_endereco_hotel as eh on h.id_hotel = eh.id_hotel inner join cidade as c on eh.cidade_codigo = c.cidade_codigo where id_categora = 3;";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listPraias[] = new melhores;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
               $listPraias[$cont]->nome_hotel=$rs['nome_hotel'];
               $listPraias[$cont]->cidade_hotel=$rs['cidade_descricao'];
               $listPraias[$cont]->imagem_hotel=$rs['imagem_hotel_1'];
               $listPraias[$cont]->id_hotel=$rs['id_hotel'];


              $cont+=1;

           }

           return  $listPraias;

        }

        public function SelectALLInverno(){
          //script de select no banco de dados
          $sql = "select h.id_hotel, h.nome_hotel, c.cidade_descricao, h.imagem_hotel_1 from tbl_hotel as h inner join tbl_endereco_hotel as eh on h.id_hotel = eh.id_hotel inner join cidade as c on eh.cidade_codigo = c.cidade_codigo where id_categora = 4;";
          $select = mysql_query($sql);
          $cont=0;

          //repetição para guardar os registros do banco de dados em array de objetos
          while ($rs=mysql_fetch_array($select)) {

            //instancia da classe contato, criando uma coleção de objetos
            $listInverno[] = new melhores;

            //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listInverno[$cont]->nome_hotel=$rs['nome_hotel'];
              $listInverno[$cont]->cidade_hotel=$rs['cidade_descricao'];
              $listInverno[$cont]->imagem_hotel=$rs['imagem_hotel_1'];
              $listInverno[$cont]->id_hotel=$rs['id_hotel'];


             $cont+=1;

          }

          return  $listInverno;

       }

       public function SelectALLCampos(){
         //script de select no banco de dados
         $sql = "select h.id_hotel, h.nome_hotel, c.cidade_descricao, h.imagem_hotel_1 from tbl_hotel as h inner join tbl_endereco_hotel as eh on h.id_hotel = eh.id_hotel inner join cidade as c on eh.cidade_codigo = c.cidade_codigo where id_categora = 2;";
         $select = mysql_query($sql);
         $cont=0;

         //repetição para guardar os registros do banco de dados em array de objetos
         while ($rs=mysql_fetch_array($select)) {

           //instancia da classe contato, criando uma coleção de objetos
           $listCampos[] = new melhores;

           //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
             $listCampos[$cont]->nome_hotel=$rs['nome_hotel'];
             $listCampos[$cont]->cidade_hotel=$rs['cidade_descricao'];
             $listCampos[$cont]->imagem_hotel=$rs['imagem_hotel_1'];
             $listCampos[$cont]->id_hotel=$rs['id_hotel'];


            $cont+=1;

         }

         return  $listCampos;

      }

      public function SelectALLFazendas(){
        //script de select no banco de dados
        $sql = "select h.id_hotel, h.nome_hotel, c.cidade_descricao, h.imagem_hotel_1 from tbl_hotel as h inner join tbl_endereco_hotel as eh on h.id_hotel = eh.id_hotel inner join cidade as c on eh.cidade_codigo = c.cidade_codigo where id_categora = 1;";
        $select = mysql_query($sql);
        $cont=0;

        //repetição para guardar os registros do banco de dados em array de objetos
        while ($rs=mysql_fetch_array($select)) {

          //instancia da classe contato, criando uma coleção de objetos
          $listFazenda[] = new melhores;

          //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
            $listFazenda[$cont]->nome_hotel=$rs['nome_hotel'];
            $listFazenda[$cont]->cidade_hotel=$rs['cidade_descricao'];
            $listFazenda[$cont]->imagem_hotel=$rs['imagem_hotel_1'];
            $listFazenda[$cont]->id_hotel=$rs['id_hotel'];


           $cont+=1;

        }

        return  $listFazenda;

     }




    }

?>
