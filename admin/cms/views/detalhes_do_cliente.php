<?php
include_once 'conexao_ok.php';

$nome_sessao = $_SESSION['nome_funcionario'];
$id_funcionario = $_SESSION['id_funcionario'];
$id_setor_sessao = $_SESSION['id_setor'];

@require_once('models/bd_class.php');
//cria uma instancia da classe mysql_db
@$conexao_bd = new mysql_db();
//estabelece a conexao com BD
@$conexao_bd->conectar();
    $id_cliente = '';
    $nome_cliente = '';
    $email_cliente = '';
    $cpf_cliente = '';
    $cidade_cliente  = '';
    $estado_cliente = '';
    $modo = '';

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'listar')
        {
            $nome_cliente = $result->nome_cliente;
            $cpf_cliente = $result->cpf_cliente;
            $cidade_cliente = $result->cidade_cliente;
            $estado_cliente = $result->estado_cliente;
            $foto_cliente = $result->foto_cliente;

        }
    }





 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Detalhes do cliente</title>
    <link rel="stylesheet" type="text/css" href="css/style_detalhes.css" media="screen and (min-width:100px) and (max-width:500px)">
  </head>
  <body>
    <section>

      <div id="principal_detalhes">
        <div id="div_detalhes">

        <div id="img_detalhes">
          <img src="../../<?php echo($foto_cliente); ?>" alt="imagem hotel">

        </div>
        <p><?php echo($nome_cliente); ?></p>
        <br>
        <p><?php echo($cidade_cliente); ?> - <?php echo($estado_cliente); ?></p>
        <br>
        <p><?php echo($cpf_cliente); ?></p>
        </div>

        <div id="detalhes_quarto">
          <h1>Reservas realizadas:</h1>
          <br>
          <p>Quarto Suite 3, 09/03/2017</p>
          <br>
          <p>Quarto Suite Fuck, 09/03/2017</p>
          <br>
          <p>Quarto Suite Jailson, 09/03/2017</p>

        </div>

      </div>

    </section>

  </body>
</html>
