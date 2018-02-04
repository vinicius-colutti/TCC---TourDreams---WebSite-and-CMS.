<?php

    class hoteis{





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
           $sql = "select * from select_hotel_cms; ";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listHoteis[] = new hoteis;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listHoteis[$cont]->id_hotel=$rs['id_hotel'];
               $listHoteis[$cont]->nome_hotel=$rs['nome_hotel'];
               $listHoteis[$cont]->cnpj_hotel=$rs['cnpj'];
               $listHoteis[$cont]->cidade_hotel=$rs['cidade_descricao'];

              $cont+=1;

           }

           return  $listHoteis;

        }
        public function SelectById($hotel){
          $sql = "select * from select_detalhes_hotel where id_hotel =".$hotel->id_hotel;
         $select = mysql_query($sql);

         //echo ($sql);

         //Verifica se existe algum registro no banco de dados.
         if($rs=mysql_fetch_array($select))
         {
             //Preenche o objeto com os dados provenientes do banco de dados.
             $hotel->id_hotel = $rs['id_hotel'];
             $hotel->nome_hotel = $rs['nome_hotel'];
             $hotel->cnpj_hotel = $rs['cnpj'];
             $hotel->cidade_hotel = $rs['cidade_descricao'];
             $hotel->estado_hotel = $rs['uf_descricao'];
             $hotel->imagem_hotel = $rs['imagem_hotel_1'];


             return $hotel;
         }




       }

       public function Ativar($hotel){
         $sql = "UPDATE tbl_hotel SET aprovar_hotel= 1 WHERE id_hotel=".$hotel->id_hotel;

          if (mysql_query($sql)) {
            ?>
            <script type="text/javascript">
              window.alert('Hotel aceito');
              window.location.href = "hoteis.php";
            </script>
            <?php


              //header('location:promocoes.php');
          }
          else
          {
              echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
          }



      }
      public function Recusar($hotel){
        $sql = "UPDATE tbl_hotel SET aprovar_hotel= 0 WHERE id_hotel=".$hotel->id_hotel;

         if (mysql_query($sql)) {
           ?>
           <script type="text/javascript">
             window.alert('Hotel Recusado');
             window.location.href = "hoteis.php";
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
