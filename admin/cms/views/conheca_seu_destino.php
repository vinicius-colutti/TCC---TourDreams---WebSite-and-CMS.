<?php
include_once 'conexao_ok.php';

$nome_sessao = $_SESSION['nome_funcionario'];
$id_funcionario = $_SESSION['id_funcionario'];
$id_setor_sessao = $_SESSION['id_setor'];


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gerenciar Conheça seu destino</title>
    <link rel="stylesheet" href="css/style_cms.css">
    <script src="js/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <header>
      <?php include_once('header.php') ?>

    </header>
    <?php include_once('section_home.php') ?>
    <section id="section_gerenciar_conheca_seu_destino">
      <div id="principal_conheca_seu_destino">
        <h1>Comentários Enviados</h1>

        <?php include_once('crud_conheca/conheca_view.php'); ?>

      </div>

    </section>

    <footer>
        <?php include('footer.php') ?>

    </footer>
  </body>
</html>
