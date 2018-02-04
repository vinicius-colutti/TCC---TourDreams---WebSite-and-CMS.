<?php

  $listBusca="";

    class conheca{

        //metodo construtor
        public function __construct(){

            //incluir o arquivo de conexao
            require_once('models/bd_class.php');
            //cria uma instancia da classe mysql_db
            $conexao_bd = new mysql_db();
            //estabelece a conexao com BD
            $conexao_bd->conectar();



        }
        public function Pesquisa($pesquisa){

          $sql = "select u.foto_usuario, u.nome_usuario, c.cidade_descricao, h.imagem_hotel_1, co.txt_comentario from tbl_comentarios as co inner join tbl_reserva as r on r.id_reserva = co.id_reserva inner join tbl_quarto as q on q.id_quarto = r.id_quarto inner join tbl_hotel as h on h.id_hotel = q.id_hotel inner join tbl_endereco_hotel as eh on eh.id_hotel = h.id_hotel inner join cidade as c on c.cidade_codigo = eh.cidade_codigo inner join tbl_usuario as u on u.id_usuario = r.id_usuario where c.cidade_descricao like'%$pesquisa->buscar%' and co.situacao_comentario = 1;";
                   //echo($sql);

                   $select = mysql_query($sql);


                   $cont=0;

                  $listPesquisa = array();

                   //repetição para guardar os registros do banco de dados em array de objetos
                   while ($rs=mysql_fetch_array($select)) {



                     $item  = new conheca;


                       //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
                       $item->foto_usuario=$rs['foto_usuario'];
                       $item->nome_usuario=$rs['nome_usuario'];
                       $item->cidade_descricao=$rs['cidade_descricao'];
                       $item->imagem_hotel_1=$rs['imagem_hotel_1'];
                       $item->txt_comentario=$rs['txt_comentario'];


                       $listPesquisa[] = $item;
                   }

                   return  $listPesquisa;
       }


        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select u.foto_usuario, u.nome_usuario, c.cidade_descricao, h.imagem_hotel_1, co.txt_comentario from tbl_comentarios as co inner join tbl_reserva as r on r.id_reserva = co.id_reserva inner join tbl_quarto as q on q.id_quarto = r.id_quarto inner join tbl_hotel as h on h.id_hotel = q.id_hotel inner join tbl_endereco_hotel as eh on eh.id_hotel = h.id_hotel inner join cidade as c on c.cidade_codigo = eh.cidade_codigo inner join tbl_usuario as u on u.id_usuario = r.id_usuario where co.situacao_comentario = 1;";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listConheca[] = new conheca;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
               $listConheca[$cont]->foto_usuario=$rs['foto_usuario'];
               $listConheca[$cont]->nome_usuario=$rs['nome_usuario'];
               $listConheca[$cont]->cidade_descricao=$rs['cidade_descricao'];
               $listConheca[$cont]->imagem_hotel_1=$rs['imagem_hotel_1'];
               $listConheca[$cont]->txt_comentario=$rs['txt_comentario'];

              $cont+=1;

           }

           return  $listConheca;

        }



    }

?>
