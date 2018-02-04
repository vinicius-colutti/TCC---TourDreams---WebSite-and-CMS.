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
    <title>Gerenciar Usuários</title>
    <link rel="stylesheet" href="css/style_cms.css">
<script src="js/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section id="section_gerenciar_usuarios">
      <?php include_once('crud_usuarios/usuarios_view.php'); ?>

      </div>
      <?php include_once('crud_setores/setores_view.php'); ?>

    </section>

    <footer>

        <?php include('footer.php') ?>

    </footer>
  </body>
</html>
