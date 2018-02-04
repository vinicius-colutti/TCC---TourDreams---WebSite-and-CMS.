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
        <title>TITULO</title>
        <link rel="stylesheet" href="css/style_cms.css">
        <link rel="stylesheet" href="http://www.amaranjs.com/AmaranJS/dist/css/amaran.min.css">
    <link rel="stylesheet" href="http://www.amaranjs.com/AmaranJS/dist/css/animate.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ignore styles below you dont need for basic setup -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="js/jquery-3.2.1.min.js"></script>


    <script src="js/classie.js"></script>
		<script src="js/notificationFx.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>





      </head>
      <body>
        <header>
          <?php include_once('header.php') ?>

        </header>

        <?php include_once('section_home.php') ?>
          <section id="section_hoteis">
            <div id="abrirModal" class="modal">
            	<!-- conteúdo do modal aqui -->
              <a href="#fechar" title="Fechar" class="fechar">x</a>
            </div>
            <?php include_once('crud_hoteleiros/hoteleiros_view.php') ?>



          </section>

          <footer>
            <?php include('footer.php') ?>

          </footer>


      </body>
    </html>
