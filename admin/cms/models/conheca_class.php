<?php

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


        //metodo para atualizar um campo no banco
         public function Ativar($comentario){
           $sql = "UPDATE tbl_comentarios SET situacao_comentario = 1 WHERE id_comentario=".$comentario->id_comentario;

            if (mysql_query($sql)) {
              ?>
              <script type="text/javascript">
                window.alert('Comentário aceito!');
                window.location.href = "conheca.php";
              </script>
              <?php


                //header('location:promocoes.php');
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }



        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select u.foto_usuario, u.nome_usuario, c.cidade_descricao, h.imagem_hotel_1, co.id_comentario, co.txt_comentario from tbl_comentarios as co inner join tbl_reserva as r on r.id_reserva = co.id_reserva inner join tbl_quarto as q on q.id_quarto = r.id_quarto inner join tbl_hotel as h on h.id_hotel = q.id_hotel inner join tbl_endereco_hotel as eh on eh.id_hotel = h.id_hotel inner join cidade as c on c.cidade_codigo = eh.cidade_codigo inner join tbl_usuario as u on u.id_usuario = r.id_usuario where situacao_comentario = 0 or situacao_comentario = 1 ;";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listConheca[] = new conheca;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listConheca[$cont]->id_comentario=$rs['id_comentario'];
              $listConheca[$cont]->nome_usuario=$rs['nome_usuario'];
              $listConheca[$cont]->cidade_descricao=$rs['cidade_descricao'];
              $listConheca[$cont]->txt_comentario=$rs['txt_comentario'];

              $cont+=1;

           }

           return $listConheca;

        }


        //selecionar por id
         public function Desativar($desativar){
           $sql = "UPDATE tbl_comentarios SET situacao_comentario = 0 WHERE id_comentario=".$desativar->id_comentario;

            if (mysql_query($sql)) {
              ?>
              <script type="text/javascript">
                window.alert('Comentário Desativado');
                window.location.href = "conheca.php";
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
