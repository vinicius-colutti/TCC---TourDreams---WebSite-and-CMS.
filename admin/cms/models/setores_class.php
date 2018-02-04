<?php

    class setores{

        public $id_setor;
        public $nome_setor;



        //metodo construtor
        public function __construct(){

            //incluir o arquivo de conexao
            require_once('models/bd_class.php');
            //cria uma instancia da classe mysql_db
            $conexao_bd = new mysql_db();
            //estabelece a conexao com BD
            $conexao_bd->conectar();



        }

        //metodo para inserir no banco
         public function Insert($setores){

            $sql ="insert into tbl_setores (nome_setor)values('".$setores->nome."')";


            if (mysql_query($sql)) {
                header('location:usuarios.php');
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }

        //metodo para atualizar um campo no banco
         public function Update($setores){
           $sql = "UPDATE tbl_setores SET nome_setor='".$setores->nome_setor."' WHERE id_setor=".$setores->id_setor;

            if (mysql_query($sql)) {
                header('location:usuarios.php');
            }
            else
            {
                echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
            }



        }

        //metodo para deletar algo do banco
         public function Delete($setores){
           $sql="delete from tbl_setores where id_setor = $setores->id_setor";
           if (mysql_query($sql)){
             header('location:usuarios.php');



           }else{


               echo('impossivel');



           }



        }

        //metodo para selecionar tudo do banco
         public function SelectALL(){
           //script de select no banco de dados
           $sql = "select * from tbl_setores order by id_setor desc";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listsetores[] = new setores;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
              $listsetores[$cont]->id_setor=$rs['id_setor'];
              $listsetores[$cont]->nome_setor=$rs['nome_setor'];


              $cont+=1;

           }

           return $listsetores;

        }


        //selecionar por id
         public function SelectById($setores){
           $sql = "SELECT * FROM tbl_setores WHERE id_setor = ".$setores->id_setor;
          $select = mysql_query($sql) or die(mysql_error($sql));

          //Verifica se existe algum registro no banco de dados.
          if($rs=mysql_fetch_array($select))
          {
              //Preenche o objeto com os dados provenientes do banco de dados.
              $setores->nome_setor = $rs['nome_setor'];
              $setores->id_setor = $rs['id_setor'];

              return $setores;
          }




        }


    }

?>
