<?php
$modo = 'busca_conheca';


 ?>

<!DOCTYPE html>
<html>
  <head>
    <?php include('head.php'); ?>
  </head>
  <body>
    <header>
      <?php include('menu.php'); ?>
    </header>
    <section>

      <div id="principal">
        <div id="txt_parceiros">
          <p>PESQUISE SOBRE SEU DESTINO</p>
        </div>
        <form class="" action="router.php?controller=conheca&modo=<?php echo($modo); ?>" method="post">

        <div id="area_pesquisa">
          <input id="input_busca_conhecaDestino" placeholder="Ex: Vargem Grande" type="text" name="busca" value="">
          <button id="btn_buscar_conhecaDestino" type="submit" name="button" ><img  src="imagens/img_btn3.png" alt=""></button>
        </div>
        </form>

      <?php include_once('conheca/conheca_view.php'); ?>

      </div>
    </section>
    <footer>
      <?php include('rodape.php'); ?>
    </footer>
  </body>
</html>
