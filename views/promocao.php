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
        <div id="slides">
        <div class="slides-container">
            <?php
                  //Incluindo o arquivo da controller para fazer o select
                  require_once('controllers/promocao_controller.php');
                  //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                 $promocao_controller = new controllerPromocao();
                 $rsPromocao = $promocao_controller->listarfotos();
                  $cont=0;
                  while ($cont<count($rsPromocao)) {

                 ?>

                <img src="admin/cms/<?php echo($rsPromocao[$cont]->banner_promocao);?>" alt="img_promo">

                <?php
                  $cont+=1;

                  }

                ?>
        </div>

        <nav class="slides-navigation">
          <a href="#" class="next"><button type="button" name="button"><b>></b></button></a>
          <a href="#" class="prev"><button type="button" name="button"><b><</b></button></a>
        </nav>
      </div>

      </section>
      <footer>
        <?php include('rodape.php'); ?>
      </footer>
  </body>
</html>
