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
    <title>Estatísticas</title>
    <link rel="stylesheet" href="css/style_cms.css">
<script src="js/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
// obtenemos el width y el color segun el data-attribute
$(document).ready(function() {
  $('.barras').each(function() {
     var dataWidth = $(this).data('value');
     $(this).css("width", dataWidth + "%");
    if (dataWidth <=25) { $(this).css("background-color", "gray"); }
		else if (dataWidth >25 && dataWidth <=50){ $(this).css("background-color", "gray"); }
		else if (dataWidth >50 && dataWidth<=75) { $(this).css("background-color", "gray"); }
		else if (dataWidth >75 && dataWidth<=100) { $(this).css("background-color", "gray"); }
  });
});

</script>

<script type="text/javascript">
function imprime(text){
      text=document
      print(text)

    }



</script>
  </head>
  <body>
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section id="section_estatisticas">
      <div id="principal_estatisticas"  class="area_print">
        <h1>Hotéis em Destaque</h1>
        <ul id="ul_estatisticas">
             <span class="barra-fondo">
                <li class="barras" data-value="70">Opcion1</li>
             </span>
             <span class="barra-fondo">
              	<li class="barras" data-value="60">Opcion2</li>
             </span>
             <span class="barra-fondo">
              	<li class="barras" data-value="50">Opcion3</li>
             </span>
             <span class="barra-fondo">
              	<li class="barras" data-value="40">Opcion4</li>
             </span>
             <span class="barra-fondo">
              	<li class="barras" data-value="20">Opcion5</li>
             </span>
             <span class="barra-fondo">
               <li class="barras" data-value="18">Opcion5</li>
             </span>
             <span class="barra-fondo">
               <li class="barras" data-value="15">Opcion5</li>
             </span>
             <span class="barra-fondo">
               <li class="barras" data-value="10">Opcion5</li>
             </span>
             <span class="barra-fondo">
               <li class="barras" data-value="08">Opcion5</li>
             </span>
             <span class="barra-fondo">
               <li class="barras" data-value="05">Opcion5</li>
             </span>
				</ul>
      </div>
<input type="button" onclick="imprime()" value="Imprimir Gráfico" id="btn_imprimir_estatisticas">
    </section>


  </body>
</html>
