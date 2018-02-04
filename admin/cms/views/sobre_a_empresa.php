<?php
include_once 'conexao_ok.php';

$nome_sessao = $_SESSION['nome_funcionario'];
$id_funcionario = $_SESSION['id_funcionario'];
$id_setor_sessao = $_SESSION['id_setor'];
if(isset($_POST['btn_salvar_imagens'])){
  $i = 0;


  foreach ($_FILES["arquivos"]["error"] as $key => $error) {


    # code...

    $destino = "arquivos_sobre/".$_FILES["arquivos"]["name"]
    [$i];

    move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i],

    $destino );

    //aqui vai o insert
    $i++;




  }






}






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

    <script>

      jQuery(document).ready(function($) {
          $(".scroll").click(function(event){
              event.preventDefault();
              $('html,body').animate({scrollTop:$(this.hash).offset().top}, 900);
         });
      });

    </script>



      </head>
      <body>
        <header>
          <?php include_once('header.php') ?>

        </header>

        <div id="menu_ancora">
        <div class="icon_menu_ancora">
          <a class="scroll" href="#nossa_empresa">Sobre Nossa Empresa</a>
        </div>
          <br>
          <div class="icon_menu_ancora">
          <a class="scroll" href="#missao">Missão</a>
        </div>
          <br>
            <div class="icon_menu_ancora">
          <a class="scroll" href="#visao">Visão</a>
        </div>
          <br>
            <div class="icon_menu_ancora">
          <a class="scroll" href="#valores">Valores</a>
        </div>
          <br>
            <div class="icon_menu_ancora">
          <a class="scroll" href="#txt_select_sobre">Registros inseridos</a>
        </div>
          <br>
            <div class="icon_menu_ancora">
          <a class="scroll" href="#select_imagens_sobre">Imagens Slider</a>
        </div>

        </div>

          <section id="section_empresa">
            <div id="principal_sobre_empresa">
            <?php include_once('crud_sobre_a_empresa/sobre_a_empresa_txt.php') ?>
            <?php include_once('crud_sobre_a_empresa/sobre_a_empresa_img.php') ?>


          </section>

          <footer>
            <?php include('footer.php') ?>

          </footer>


      </body>
    </html>
