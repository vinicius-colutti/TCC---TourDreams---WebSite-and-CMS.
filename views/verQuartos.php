<?php

session_start();

if(isset($_SESSION['id_usuario'])){

$id_usuario = $_SESSION['id_usuario'];

}else {
  $id_usuario = 'null';
}



 ?>

<!DOCTYPE html>
<html>
  <head>
    <?php include('head.php'); ?>
  </head>
  <body>

    <header>
        <?php include('menu.php'); ?>
        <link href="css/carousel.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
        <script type="text/javascript" src="js/carousel.js"></script>
    </header>

      <section>
        <div id="principal">
          <div id="txt_perfilUsuario">
            <p>QUARTOS</p>
          </div>



          <div id="principal_produtos">


            <?php
                  //Incluindo o arquivo da controller para fazer o select
                  require_once('controllers/visualizar_quartos_controller.php');
                  //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                  $controller_quartos = new controllerQuartos();
                  $rsQuartos = $controller_quartos->listar_quartos();
                  $cont=0;
                  while ($cont<count($rsQuartos)) {
                    $id_quarto = $rsQuartos[$cont]->id_quarto;



                 ?>
            <div class="produtos_div_verQuartos">
              <?php
                $sql = "select i.nome_imagem from tbl_imagens_quarto as i where id_quarto = $id_quarto limit 1;";
                $select = mysql_query($sql);
                while($rs=mysql_fetch_array($select)){






              ?>
              <a href="areaReserva.php?id_quarto=<?php echo($id_quarto); ?>&id_usuario=<?php echo($id_usuario); ?>"><img class="img_hotel" src="<?php echo($rs['nome_imagem']);?>" alt=""></a>
              <?php

               }

               ?>
              <div class="legenda_produto_verQuartos">
                <p class="txt_nome_hotel"><?php echo($rsQuartos[$cont]->nome_quarto);?></p>
                <p class="txt_estado_hotel">R$<?php echo($rsQuartos[$cont]->preco_quarto);?></p>
                <div class="caracteristicas_verQuartos">
                  <img class="img_caracteristicas_verQuartos" src="imagens/wifi.png" alt="">
                </div>
                <p class="txt_caracteristica_verQuartos2">Wi-fi gratuito</p>

                <a href="areaReserva.php?id_quarto=<?php echo($id_quarto); ?>&id_usuario=<?php echo($id_usuario); ?>"><input type="submit" name="btn_produto" value="reservar" class="btn_produto_verQuartos"></a>

              </div>

            </div>
            <?php
              $cont+=1;

              }


            ?>

          </div>
        </div>


      </section>

          <footer>
            <?php include('rodape.php'); ?>
          </footer>
  </body>
</html>
