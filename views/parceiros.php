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
          <p>NOSSOS PARCEIROS</p>
        </div>
        <?php
              //Incluindo o arquivo da controller para fazer o select
              require_once('controllers/home_controller.php');
              //Instancia do objeto de controller, e chamada dos metodos para listar os registros
              $controller_home = new controllerHome();
              $rsHome = $controller_home->listar();
              $cont2=0;
              while ($cont2<count($rsHome)) {

              $id_hotel = $rsHome[$cont2]->id_hotel;


        ?>
        <div class="area_parceiro">
          <img class="img_logo_parceiro" src="<?php echo ($rsHome[$cont2]->imagem_hotel);?>" alt="">
          <img class="img_icone_local" src="imagens/localizacao.png" alt="">
          <p class="txt_local_parceiro" ><?php echo ($rsHome[$cont2]->cidade_hotel);?></p>
          <p class="txt_nome_parceiro"><?php echo($rsHome[$cont2]->nome_hotel);?></p>
          <a href="verQuartos.php?id_hotel=<?php echo($rsHome[$cont2]->id_hotel); ?>"><input type="submit" name="btn_produto" value="ver" class="btn_ver_parceiro"></a>
        </div>
        <?php
          $cont2+=1;

          }

        ?>

      </div>
    </section>
    <footer>
      <?php include('rodape.php'); ?>
    </footer>
  </body>
</html>
