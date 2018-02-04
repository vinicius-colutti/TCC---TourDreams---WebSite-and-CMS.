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
    <title>Gerenciar Fale Conosco</title>
    <link rel="stylesheet" href="css/style_cms.css">

  </head>
  <body>

    <header>
      <?php include_once('header.php') ?>
    </header>


    <?php include_once('crud_fale_conosco/fale_conosco_view.php') ?>
  


    <footer>
        <?php include('footer.php') ?>
    </footer>


  </body>
</html>
