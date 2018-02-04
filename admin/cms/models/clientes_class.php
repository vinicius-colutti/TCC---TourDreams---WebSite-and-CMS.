<?php

    class clientes{





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
           $sql = "select * from tbl_usuario order by id_usuario desc";
           $select = mysql_query($sql);
           $cont=0;

           //repetição para guardar os registros do banco de dados em array de objetos
           while ($rs=mysql_fetch_array($select)) {

             //instancia da classe contato, criando uma coleção de objetos
             $listClientes[] = new clientes;

             //guardando em cada objeto um registro do banco de dados, referenciando pelo indece $cont
               $listClientes[$cont]->id_usuario=$rs['id_usuario'];
               $listClientes[$cont]->nome_usuario=$rs['nome_usuario'];
               $listClientes[$cont]->email_usuario=$rs['email_usuario'];
               $listClientes[$cont]->cpf_usuario=$rs['cpf_usuario'];
              $cont+=1;

           }

           return  $listClientes;

        }
        public function SelectById($cliente){
          $sql = "select * from select_cliente where id_usuario = ".$cliente->id_cliente;
         $select = mysql_query($sql);

         //Verifica se existe algum registro no banco de dados.
         if($rs=mysql_fetch_array($select))
         {
             //Preenche o objeto com os dados provenientes do banco de dados.
             $cliente->nome_cliente = $rs['nome_usuario'];
             $cliente->foto_cliente = $rs['foto_usuario'];
             $cliente->cpf_cliente = $rs['cpf_usuario'];
             $cliente->cidade_cliente = $rs['cidade_descricao'];
             $cliente->estado_cliente = $rs['uf_descricao'];

             return $cliente;
         }




       }




    }

?>
