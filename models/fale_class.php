<?php

class cadastroFaleConosco{



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
  public function Insert($fale){
    $sql = "insert into tbl_fale_conosco(nome, email, telefone, sugestao_critica) values ('$fale->nome', '$fale->email', '$fale->telefone', '$fale->obs') ";
    if (mysql_query($sql)) {
          ?>
            <script type="text/javascript">
              window.alert('Obrigado, equipe TourDreams, agradece!');
              window.location.href = "home.php";
            </script>
            <?php
          }
          else
          {
              echo ('Erro no script SQL de edição no banco de dados.<br>ERROR: ' . mysql_error());
          }



  }



}

?>
