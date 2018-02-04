<?php

    class reserva{




        //metodo construtor
        public function __construct(){

            //incluir o arquivo de conexao
            require_once('models/bd_class.php');
            //cria uma instancia da classe mysql_db
            $conexao_bd = new mysql_db();
            //estabelece a conexao com BD
            $conexao_bd->conectar();



        }



        //metodo para atualizar um campo no banco
         public function Ativar($reserva){
           $sql = "UPDATE tbl_reserva SET status_reserva = 'aprovada' WHERE id_reserva=".$reserva->id_reserva;

            if (mysql_query($sql)) {

              $sql2="select distinct h.id_hotel, u.id_usuario from tbl_reserva as r inner join tbl_quarto as q on q.id_quarto = r.id_quarto inner join tbl_hotel as h on h.id_hotel = q.id_hotel inner join tbl_usuario as u on u.id_usuario = r.id_usuario where r.id_reserva =$reserva->id_reserva";

              $select = mysql_query($sql2);


              while($rs=mysql_fetch_array($select)){

                $sql3 = 'update tbl_hotel set situacao_hotel = "devendo" where id_hotel ='.$rs['id_hotel'];

                mysql_query($sql3);

                $sql4 = 'insert into tbl_pontos_usuario (id_usuario, id_pontos)values('.$rs['id_usuario'].', 1);';
                mysql_query($sql4);

                $sql5 = 'insert into tbl_pontos_hotel (id_hotel, id_pontos)values('.$rs['id_hotel'].', 1);';
                mysql_query($sql5);
                //header('location:index.php?reserva_aceita');
                ?>
                <script type="text/javascript">
                  window.alert('Reserva Aprovada!');
                  window.location.href = "index.php";
                </script>
                <?php

              }




            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }



        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select u.nome_usuario, h.nome_hotel, r.id_reserva, r.status_reserva, q.nome_quarto, DATE_FORMAT(STR_TO_DATE(r.data_entrada, '%Y-%m-%d'), '%d/%m/%Y') as data_entrada, DATE_FORMAT(STR_TO_DATE(r.data_saida, '%Y-%m-%d'), '%d/%m/%Y') as data_saida from tbl_reserva as r inner join tbl_quarto as q on q.id_quarto = r.id_quarto inner join tbl_hotel as h on h.id_hotel = q.id_hotel inner join tbl_usuario as u on u.id_usuario = r.id_usuario;";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listReserva[] = new reserva;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listReserva[$cont]->id_reserva=$rs['id_reserva'];
              $listReserva[$cont]->nome_usuario=$rs['nome_usuario'];
              $listReserva[$cont]->nome_hotel=$rs['nome_hotel'];
              $listReserva[$cont]->nome_quarto=$rs['nome_quarto'];
              $listReserva[$cont]->data_entrada=$rs['data_entrada'];
              $listReserva[$cont]->data_saida=$rs['data_saida'];
              $listReserva[$cont]->status_reserva=$rs['status_reserva'];


              $cont+=1;

           }

           return $listReserva;

        }


        //selecionar por id
         public function Desativar($reserva_desativar){
           $sql = "UPDATE tbl_reserva SET status_reserva = 'recusada' WHERE id_reserva=".$reserva_desativar->id_reserva;

            if (mysql_query($sql)) {


              ?>
              <script type="text/javascript">
                window.alert('Reserva recusada!');
                window.location.href = "index.php";
              </script>
              <?php
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }

        public function Pesquisa($pesquisa){

          $sql = "select u.nome_usuario, h.nome_hotel, r.id_reserva, r.status_reserva, q.nome_quarto, DATE_FORMAT(STR_TO_DATE(r.data_entrada, '%Y-%m-%d'), '%d/%m/%Y') as data_entrada, DATE_FORMAT(STR_TO_DATE(r.data_saida, '%Y-%m-%d'), '%d/%m/%Y') as data_saida from tbl_reserva as r inner join tbl_quarto as q on q.id_quarto = r.id_quarto inner join tbl_hotel as h on h.id_hotel = q.id_hotel inner join tbl_usuario as u on u.id_usuario = r.id_usuario where u.nome_usuario like'%$pesquisa->buscar%' or h.nome_hotel like'%$pesquisa->buscar%';";
                   //echo($sql);

                   $select = mysql_query($sql);


                   $cont=0;

                  $listPesquisa = array();

                   //repetição para guardar os registros do banco de dados em array de objetos
                   while ($rs=mysql_fetch_array($select)) {



                     $item  = new reserva;


                       //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
                       $item->id_reserva=$rs['id_reserva'];
                       $item->nome_usuario=$rs['nome_usuario'];
                       $item->nome_hotel=$rs['nome_hotel'];
                       $item->status_reserva=$rs['status_reserva'];
                       $item->nome_quarto=$rs['nome_quarto'];
                       $item->data_entrada=$rs['data_entrada'];
                       $item->data_saida=$rs['data_saida'];


                       $listPesquisa[] = $item;
                       
                   }

                   return  $listPesquisa;
       }


    }

?>
