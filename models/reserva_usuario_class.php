<?php

    class reserva_usuario{

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




        //metodo para selecionar tudo do banco
         public function SelectALL(){

           $id_usuario = $_GET['id_usuario'];
           //script de select no banco de dados
           $sql = "select u.nome_usuario, r.id_reserva, u.id_usuario, h.nome_hotel, q.nome_quarto, r.status_reserva, DATE_FORMAT(STR_TO_DATE(r.data_entrada, '%Y-%m-%d'), '%d/%m/%Y') as data_entrada, c.cidade_descricao, DATE_FORMAT(STR_TO_DATE(r.data_saida, '%Y-%m-%d'), '%d/%m/%Y') as data_saida from tbl_reserva as r inner join tbl_quarto as q on q.id_quarto = r.id_quarto inner join tbl_hotel as h on h.id_hotel = q.id_hotel inner join tbl_usuario as u on u.id_usuario = r.id_usuario inner join tbl_endereco_hotel as eh on eh.id_hotel = h.id_hotel inner join cidade as c on c.cidade_codigo = eh.cidade_codigo where u.id_usuario = $id_usuario;";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listReserva[] = new reserva_usuario;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listReserva[$cont]->id_reserva=$rs['id_reserva'];
              $listReserva[$cont]->nome_usuario=$rs['nome_usuario'];
              $listReserva[$cont]->nome_hotel=$rs['nome_hotel'];
              $listReserva[$cont]->nome_quarto=$rs['nome_quarto'];
              $listReserva[$cont]->data_entrada=$rs['data_entrada'];
              $listReserva[$cont]->data_saida=$rs['data_saida'];
              $listReserva[$cont]->cidade_descricao=$rs['cidade_descricao'];
              $listReserva[$cont]->status_reserva=$rs['status_reserva'];


              $cont+=1;



           }

           if(@$listReserva == null){
             ?>
              <script type="text/javascript">
                $("#espaco_status").css("display","none");

              </script>
             <?php
           }
           return @$listReserva;


        }




        //metodo para selecionar tudo do banco
         public function SelectALugares(){

           $id_usuario = $_GET['id_usuario'];
           //script de select no banco de dados
           $sql = "select distinct h.nome_hotel, c.cidade_descricao, h.id_hotel, h.imagem_hotel_1, r.id_reserva from tbl_reserva as r inner join tbl_quarto as q on q.id_quarto = r.id_quarto inner join tbl_hotel as h on h.id_hotel = q.id_hotel inner join tbl_endereco_hotel as eh on eh.id_hotel = h.id_hotel inner join cidade as c on c.cidade_codigo = eh.cidade_codigo inner join tbl_usuario as tbu on tbu.id_usuario = r.id_usuario where r.status_reserva = 'viajando' and tbu.id_usuario = $id_usuario;";
           $select = mysql_query($sql);
           $cont2=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listLugares[] = new reserva_usuario;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listLugares[$cont2]->id_hotel=$rs['id_hotel'];
              $listLugares[$cont2]->nome_hotel=$rs['nome_hotel'];
              $listLugares[$cont2]->cidade_descricao=$rs['cidade_descricao'];
              $listLugares[$cont2]->imagem_hotel=$rs['imagem_hotel_1'];
              $listLugares[$cont2]->id_reserva=$rs['id_reserva'];


              $cont2+=1;

           }
           if(@$listLugares == null){

             ?>
              <script type="text/javascript">
                $("#reserva_null_usuario").css("display","block");
                $("#txt_perfilUsuario").css("display","none");

              </script>
             <?php


           }
           return @$listLugares;

        }



        public function InsertComentario($comentario){

          $sql = "insert into tbl_comentarios (id_reserva, txt_comentario, situacao_comentario)values($comentario->id_reserva, '".$comentario->comentario."', 0);";
          //echo($sql);



          mysql_query($sql);

          $sql2 = "insert into tbl_pontos_usuario(id_usuario, id_pontos)values($comentario->id_usuario, 2); ";

          mysql_query($sql2);



          header('location:perfilUsuario.php?comentario_enviado&id_usuario='.$comentario->id_usuario);

        }

        public function InsertCupom($cupom){

          $sql = "insert into tbl_cupons(descricao_cupons, situacao_cupons, id_usuario)values('$cupom->cupom', 0, $cupom->id_usuario);";
          //echo($sql);
          mysql_query($sql);
          header('location:perfilUsuario.php?cupom&cupom_resgatado='.$cupom->cupom.'&id_usuario='.$cupom->id_usuario);

        }




    }

?>
