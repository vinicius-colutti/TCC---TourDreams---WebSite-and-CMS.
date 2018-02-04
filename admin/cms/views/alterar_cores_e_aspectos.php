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
    <title>Gerenciar cores e aspectos</title>
    <link rel="stylesheet" href="css/style_cms.css">
    <script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<link href="js/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <style>
			body {
				font-family:	'Segoe UI', Verdana, Arial, Helvetica, sans-serif;
				font-size:		62.5%;
			}
        </style>
		<script src="jquery.colorpicker.js"></script>
		<link href="jquery.colorpicker.css" rel="stylesheet" type="text/css"/>
		<script src="i18n/jquery.ui.colorpicker-nl.js"></script>
		<script src="swatches/jquery.ui.colorpicker-pantone.js"></script>
		<script src="swatches/jquery.ui.colorpicker-crayola.js"></script>
		<script src="swatches/jquery.ui.colorpicker-ral-classic.js"></script>
		<script src="swatches/jquery.ui.colorpicker-x11.js"></script>
		<script src="swatches/jquery.ui.colorpicker-copic.js"></script>
		<script src="swatches/jquery.ui.colorpicker-prismacolor.js"></script>
		<script src="swatches/jquery.ui.colorpicker-isccnbs.js"></script>
		<script src="swatches/jquery.ui.colorpicker-din6164.js"></script>
		<script src="parts/jquery.ui.colorpicker-rgbslider.js"></script>
		<script src="parts/jquery.ui.colorpicker-memory.js"></script>
		<script src="parts/jquery.ui.colorpicker-swatchesswitcher.js"></script>
		<script src="parsers/jquery.ui.colorpicker-cmyk-parser.js"></script>
		<script src="parsers/jquery.ui.colorpicker-cmyk-percentage-parser.js"></script>


		<script>
			$(function() {
				$('#tabs').tabs();
			});
		</script>
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
        <a class="scroll" href="#txt_cores_aspectos">Cor dos preços</a>
      </div>
      <br>
      <div class="icon_menu_ancora">
      <a class="scroll" href="#txt_cores_aspectos_rodape">Cor do rodapé</a>
      </div>
      <br>
      <div class="icon_menu_ancora">
      <a class="scroll" href="#txt_image_template">Imagem do Template</a>
      </div>
      <br>
     <div class="icon_menu_ancora">
      <a class="scroll" href="#txt_pontos_mtf_cliente">Pontos MTF</a>
    </div>


    </div>
    <section id="section_cores_aspectos">
      <?php include_once('crud_aspectos/aspectos_view.php') ?>



    </section>

    <footer>
      <?php include('footer.php') ?>

    </footer>
  </body>
</html>
