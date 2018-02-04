<?php
$modo = 'busca_avancada';

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

    <!--<div id="template_info_todos" class="content visible">
      <img src="imagens/maldives.jpg" alt="">
      <div id="txt_template_info_buscaAvancada">
        <p id="texto">Faça uma pesquisa mais detalhada</p>
      </div>
    -->
    </div>
      <div id="principal">
        <div id="area_pesquisa">
          <form class="" action="router.php?controller=busca&modo=<?php echo($modo); ?>" method="post">
          <input id="input_busca_avancada" placeholder="Faça uma busca..." type="text" name="busca" value="">

          <button id="btn_pesquisa_avancada" type="button" name="button" >
            <a href="#" id="mostrar"><img id="img_filtro" src="imagens/filtro.png" alt="dasd"></a></button>
        </div>
        <div id="filtros">

          <div class="container">



            <div class="control-group">

              <?php
                    //Incluindo o arquivo da controller para fazer o select
                    require_once('controllers/busca_avancada_controller.php');
                    //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                    $controller_busca_categoria = new controllerBuscaAvancada();
                    $rsCategoria = $controller_busca_categoria->listar_categorias();
                    $cont2=0;
                    while ($cont2<count($rsCategoria)) {

              ?>
              <!--<p class="titulo_filtro" >ESTRELAS</p>-->
              <label class="control control--checkbox"><?php echo($rsCategoria[$cont2]->nome_categoria);?>
                <input  type="checkbox" value="   <?php echo($rsCategoria[$cont2]->id_categoria);?>" name="categoria[]" />
                <div class="control__indicator"></div>
              </label>
              <?php
                $cont2+=1;

                }


              ?>

              <!--<label class="control control--checkbox">Disabled
                <input type="checkbox" disabled="disabled"/>
                <div class="control__indicator"></div>
              </label>
              <label class="control control--checkbox">Disabled & checked
                <input type="checkbox" disabled="disabled" checked="checked"/>
                <div class="control__indicator"></div>
              </label>-->
            </div>


            <div class="control-group">
              <!--<p class="titulo_filtro" >LOCAL</p>-->
              <?php
                    //Incluindo o arquivo da controller para fazer o select
                    require_once('controllers/busca_avancada_controller.php');
                    //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                    $controller_busca_categoria = new controllerBuscaAvancada();
                    $rsCarac = $controller_busca_categoria->listar_caracteristicas();
                    $cont4=0;
                    while ($cont4<count($rsCarac)) {
              ?>
              <label class="control control--checkbox"><?php echo($rsCarac[$cont4]->descricao_carac);?>
                <input type="checkbox" value="<?php echo($rsCarac[$cont4]->id_carac);?>" name="caracteristicas[]" />
                <div class="control__indicator"></div>
              </label>
              <?php
                $cont4+=1;

                }

              ?>
            </div>

            <input id="btn_aplicarFiltros" type="submit" name="button" value="APLICAR" />
            </form>
          </div>
        </div>
        <div id="txt_busca_avancada">
          <p>ALGUMAS SUGESTÕES</p>
        </div>

        <?php
        if (isset($_GET['modo'])) {

          if($_GET['modo'] == "busca_avancada"){
            $cont2=0;

            while ($cont2<count($lstPesquisada)) {
            $id_hotel = $lstPesquisada[$cont2]->id_hotel;

        ?>
        <div class="produtos_div"  data-scroll-reveal="enter from the left after 0.3s, move 40px, over 2s">
          <img src="<?php echo($lstPesquisada[$cont2]->imagem_hotel);?>" alt="">
          <div class="legenda_produto">
            <p class="txt_nome_hotel"><?php echo($lstPesquisada[$cont2]->nome_hotel);?></p>
            <p class="txt_estado_hotel"><?php echo ($lstPesquisada[$cont2]->cidade_hotel);?></p>
            <div class="estrelas">
              <img class="img_estrelas_hotel" src="imagens/estrelas.png" alt="">
            </div>
            <div class="caracteristicas_hotel">
              <img class="img_caracteristica_hotel" src="imagens/wifi.png" alt="">
            </div>
            <p class="txt_caracteristica_hotel">Wi-fi grátis</p>
            <p class="txt_diaria_hotel" >Diárias a partir de</p>
            <p class="txt_rs" >R$</p>
            <?php
        								$sql = "select * from tbl_quarto where id_hotel = $id_hotel  order by preco_quarto asc limit 1;";
        								$select = mysql_query($sql);

        								while($rs=mysql_fetch_array($select)){

        								?>
            <p class="txt_preco_hotel"><?php echo($rs['preco_quarto']); ?></p>
            <?php
          }

             ?>
            <a href="verQuartos.php"><input type="submit" name="btn_produto" value="ver quartos" class="btn_produto"></a>

          </div>

        </div>
        <?php
          $cont2+=1;
          }
        ?>
        <?php
          }

        }else{
            //Instancia do objeto de controller, e chamada dos metodos para listar os registros
            $controller_busca = new controllerBuscaAvancada();
            $rsBusca = $controller_busca->listar();
            $cont=0;
            while ($cont<count($rsBusca)) {

            $id_hotel = $rsBusca[$cont]->id_hotel;

         ?>

        <div class="produtos_div"  data-scroll-reveal="enter from the left after 0.3s, move 40px, over 2s">
          <img src="<?php echo($rsBusca[$cont]->imagem_hotel);?>" alt="">
          <div class="legenda_produto">
            <p class="txt_nome_hotel"><?php echo($rsBusca[$cont]->nome_hotel);?></p>
            <p class="txt_estado_hotel"><?php echo ($rsBusca[$cont]->cidade_hotel);?></p>
            <div class="estrelas">
              <img class="img_estrelas_hotel" src="imagens/estrelas.png" alt="">
            </div>
            <div class="caracteristicas_hotel">
              <img class="img_caracteristica_hotel" src="imagens/wifi.png" alt="">
            </div>
            <p class="txt_caracteristica_hotel">Wi-fi grátis</p>
            <p class="txt_diaria_hotel" >Diárias a partir de</p>
            <p class="txt_rs" >R$</p>
            <?php
							$sql = "select * from tbl_quarto where id_hotel = $id_hotel  order by preco_quarto asc limit 1;";
							$select = mysql_query($sql);

							while($rs=mysql_fetch_array($select)){


						?>
            <p class="txt_preco_hotel"><?php echo($rs['preco_quarto']); ?></p>
            <?php
          }
             ?>
            <a href="verQuartos.php"><input type="submit" name="btn_produto" value="ver quartos" class="btn_produto"></a>

          </div>

        </div>
        <?php
          $cont+=1;
          }
        }
        ?>
      </div>
    </section>
    <footer>
      <?php include('rodape.php'); ?>
    </footer>
  </body>
</html>
