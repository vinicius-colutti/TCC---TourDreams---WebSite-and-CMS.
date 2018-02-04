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
    <title>Gerenciar Clientes</title>
    <link rel="stylesheet" href="css/style_cms.css">
  </head>
  <body>
    <header>
        <?php include_once('header.php') ?>
    </header>
<?php include_once('section_home.php') ?>
    <section id="section_gerenciar_clientes">

      <div id="principal_gerenciar_clientes">
        <div id="txt_clientes_cadastrados">
          <p>Clientes cadastrados no portal TourDreams</p>

        </div>
          <?php include_once('crud_clientes/clientes_view.php'); ?>


      </div>

    </section>


    <footer>
      <?php include('footer.php') ?>

    </footer>


  </body>
</html>
