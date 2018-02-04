<?php

    class faleconosco{





        //metodo construtor
        public function __construct(){

            //incluir o arquivo de conexao
            require_once('models/bd_class.php');
            //cria uma instancia da classe mysql_db
            $conexao_bd = new mysql_db();
            //estabelece a conexao com BD
            $conexao_bd->conectar();



        }





        //metodo para deletar algo do banco
         public function Delete($faleconosco){
           $sql="delete from tbl_fale_conosco where id_fale_conosco = $faleconosco->id_fale_conosco";
           if (mysql_query($sql)){
             header('location:fale_conosco.php');



           }else{


               echo('impossivel');



           }



        }

        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select * from tbl_fale_conosco order by id_fale_conosco desc";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listfale[] = new faleconosco;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
               $listfale[$cont]->id_fale_conosco=$rs['id_fale_conosco'];
               $listfale[$cont]->email=$rs['email'];
               $listfale[$cont]->nome=$rs['nome'];
               $listfale[$cont]->telefone=$rs['telefone'];
               $listfale[$cont]->sugestao_critica=$rs['sugestao_critica'];


              $cont+=1;

           }

           return  $listfale;

        }
        public function SelectById($faleconosco){
          $sql = "SELECT * FROM tbl_fale_conosco WHERE id_fale_conosco = ".$faleconosco->id_fale_conosco;
         $select = mysql_query($sql);

         //Verifica se existe algum registro no banco de dados.
         if($rs=mysql_fetch_array($select))
         {
             //Preenche o objeto com os dados provenientes do banco de dados.
             $faleconosco->nome = $rs['nome'];
             $faleconosco->email = $rs['email'];
             $faleconosco->telefone = $rs['telefone'];
             $faleconosco->sugestao_critica = $rs['sugestao_critica'];

             return $faleconosco;
         }




       }




    }

?>
