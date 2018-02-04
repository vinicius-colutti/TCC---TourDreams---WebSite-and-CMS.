<?php

  $listHome="";

    class quartos{





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
         public function SelectALL($hotel){
           //script de select no banco de dados
           $sql = "select * from tbl_quarto where id_hotel=".$hotel->id_hotel;
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listQuartos[] = new quartos;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
               $listQuartos[$cont]->nome_quarto=$rs['nome_quarto'];
                $listQuartos[$cont]->id_quarto=$rs['id_quarto'];
               $listQuartos[$cont]->preco_quarto=$rs['preco_quarto'];


              $cont+=1;

           }

           return  $listQuartos;

        }

        public function SelectReserva($quarto){
          //script de select no banco de dados
          $sql = "select * from select_quarto_reserva where id_quarto =".$quarto->id_quarto;
          $select = mysql_query($sql);
          $cont=0;

          //repetição para guardar os registros do banco de dados em array de objetos
          while ($rs=mysql_fetch_array($select)) {

            //instancia da classe contato, criando uma coleção de objetos
            $listQuartosReserva[] = new quartos;

            //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listQuartosReserva[$cont]->nome_quarto=$rs['nome_quarto'];
               $listQuartosReserva[$cont]->id_quarto=$rs['id_quarto'];
              $listQuartosReserva[$cont]->preco_quarto=$rs['preco_quarto'];
              $listQuartosReserva[$cont]->rua_quarto=$rs['rua_hotel'];
              $listQuartosReserva[$cont]->cidade_quarto=$rs['cidade_descricao'];
              $listQuartosReserva[$cont]->uf_quarto=$rs['uf_descricao'];


             $cont+=1;

          }

          return  $listQuartosReserva;

       }


    }

?>
