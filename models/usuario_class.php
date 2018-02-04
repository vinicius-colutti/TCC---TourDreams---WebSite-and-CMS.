<?php

class cadastroUsuario{

  public $id_usuario;
  public $nome_usuario;
  public $cpf_usuario;
  public $rg_usuario;
  public $email_usuario;
  public $telefone_usuario;
  public $celular_usuario;
  public $qtds_reserva_usuario;
  public $endereco_usuario;
  public $senha_usuario;
  public $btn_usuario;

  public $rua_usuario;
  public $bairro_usuario;
  public $numero_usuario;
  public $cidade_usuario;

  public $foto_usuario;


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
  public function Insert($usuario){

     //Fazendo o select para verificar o email
     $sql_verificaEmail = mysql_query("select * from tbl_usuario where email_usuario = '$usuario->email_usuario'");

     //Vendo se o email inserido já existe no BD
     if(@mysql_num_rows($sql_verificaEmail) > 0){

      echo "<script> alert('E-mail já cadastrado!'); </script>";

     }else {
       $sql = mysql_query("insert into tbl_usuario (nome_usuario, cpf_usuario, rg_usuario, email_usuario, senha_usuario, telefone_usuario, celular_usuario, foto_usuario, qtds_reservas_usuario)
                                        values('".$usuario->nome_usuario."', '".$usuario->cpf_usuario."', '".$usuario->rg_usuario."',
                                        '".$usuario->email_usuario."','".$usuario->senha_usuario."','".$usuario->telefone_usuario."','".$usuario->celular_usuario."', '".$usuario->foto_usuario."', 0);");


        mysql_query($sql);


        //Pegando o ID do insert anterior
        $id_usuario = mysql_insert_id();

        //Fazendo o insert da tabela endereco_usuario de acordo com o ID do usuario
        $sql_endereco = "insert into tbl_endereco_usuario (id_usuario, rua_usuario, bairro_usuario, numero_usuario, cidade_codigo)
                                                          values('".$id_usuario."', '".$usuario->rua_usuario."', '".$usuario->bairro_usuario."', '".$usuario->numero_usuario."',
                                                          '".$usuario->cb_cidade."')";

        mysql_query($sql_endereco);


        header('location:cadastroUsuario.php');


      }

  }

    //metodo para atualizar um campo no banco
    public function Update($usuario){

      $sql_atualizar = "update tbl_usuario as u inner join tbl_endereco_usuario as e on u.id_usuario = e.id_usuario
                        set nome_usuario='".$usuario->nome_usuario."', email_usuario='".$usuario->email_usuario."',
                            rua_usuario='".$usuario->rua_usuario."', bairro_usuario='".$usuario->bairro_usuario."',
                            numero_usuario='".$usuario->numero_usuario."',telefone_usuario='".$usuario->telefone_usuario."',
                            celular_usuario='".$usuario->celular_usuario."', rg_usuario='".$usuario->rg_usuario."',
                            senha_usuario='".$usuario->senha_usuario."'
                            where u.id_usuario=$usuario->id_usuario";

      mysql_query($sql_atualizar);

      //echo ($sql_atualizar);

      //header('location:perfilUsuario.php');

  }

    //metodo para atualizar com foto
    public function Update_foto($usuario){

      $sql_atualizar_foto = "update tbl_usuario as u inner join tbl_endereco_usuario as e on u.id_usuario = e.id_usuario
                            set nome_usuario='".$usuario->nome_usuario."', email_usuario='".$usuario->email_usuario."',
                                rua_usuario='".$usuario->rua_usuario."', bairro_usuario='".$usuario->bairro_usuario."',
                                numero_usuario='".$usuario->numero_usuario."',telefone_usuario='".$usuario->telefone_usuario."',
                                celular_usuario='".$usuario->celular_usuario."', rg_usuario='".$usuario->rg_usuario."',
                                senha_usuario='".$usuario->senha_usuario."', foto_usuario='".$usuario->foto_usuario."'
                                where u.id_usuario=$usuario->id_usuario";

      mysql_query($sql_atualizar_foto);

      //echo ($sql_atualizar);

      //header('location:perfilUsuario.php');

    }

  //selecionar por id
   public function SelectById($usuario){

     $sql_selectById = "select u.id_usuario,
                        u.nome_usuario,
                        u.email_usuario,
                        e.rua_usuario,
                        e.bairro_usuario,
                        e.numero_usuario,
                        u.telefone_usuario,
                        u.celular_usuario,
                        u.rg_usuario,
                        u.senha_usuario from tbl_usuario as u
                        inner join tbl_endereco_usuario as e
                        on e.id_usuario = u.id_usuario where u.id_usuario=$usuario->id_usuario";

     $select = mysql_query($sql_selectById);

     //verifica se existe algum registro no banco de dados
     if ($rs=mysql_fetch_array($select)) {

       //instancia da classe cadastroUsuario
       $listUsuario_id = new cadastroUsuario;

       //guarda os dados do DB no objeto criado
        $listUsuario_id->id_usuario=$rs['id_usuario'];
        $listUsuario_id->nome_usuario=$rs['nome_usuario'];
        $listUsuario_id->email_usuario=$rs['email_usuario'];
        $listUsuario_id->telefone_usuario=$rs['telefone_usuario'];
        $listUsuario_id->celular_usuario=$rs['celular_usuario'];
        $listUsuario_id->rg_usuario=$rs['rg_usuario'];
        $listUsuario_id->senha_usuario=$rs['senha_usuario'];

        $listUsuario_id->rua_usuario=$rs['rua_usuario'];
        $listUsuario_id->bairro_usuario=$rs['bairro_usuario'];
        $listUsuario_id->numero_usuario=$rs['numero_usuario'];

        return $listUsuario_id;

   }

 }

}

?>
