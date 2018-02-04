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
    $id_hotel = '';
    $nome_hotel = '';
    $cnpj_hotel= '';
    $cidade_hotel = '';
    $estado_hotel  = '';
    $quarto_hotel = '';
    $id_quarto_hotel = '';
    $modo = '';
    $imagem_hotel = '';

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'listar_hotel')
        {
            $nome_hotel = $result->nome_hotel;
            $id_hotel = $result->id_hotel;
            $cnpj_hotel = $result->cnpj_hotel;
            $cidade_hotel = $result->cidade_hotel;
            $estado_hotel = $result->estado_hotel;
            $imagem_hotel = $result->imagem_hotel;

        }
    }





 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Detalhes do hotel</title>
    <link rel="stylesheet" type="text/css" href="css/style_detalhes.css" media="screen and (min-width:100px) and (max-width:500px)">
  </head>
  <body>
    <section>

      <div id="principal_detalhes">
        <div id="div_detalhes">
        <div id="img_detalhes">
          <img src="../../<?php echo($imagem_hotel); ?>" alt="imagem hotel">

        </div>
        <p><?php echo($nome_hotel); ?></p>
        <br>
        <p><?php echo($cidade_hotel); ?> - <?php echo($estado_hotel); ?></p>
        <br>
        <p><?php echo($cnpj_hotel); ?></p>
        </div>

        <div id="detalhes_quarto">
          <h1>Quartos:</h1>
          <br>
          <?php
								$sql = "select * from select_quarto_hotel where id_hotel = $id_hotel";
								$select = mysql_query($sql);

								while($rs=mysql_fetch_array($select)){






								?>
          <p><?php echo($rs['nome_quarto']);?></p>
          <br>
          <?php

           }

           ?>
        </div>

      </div>

    </section>

  </body>
</html>
