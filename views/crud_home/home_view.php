<?php
if(isset($_GET['modo'])){

    if($_GET['modo'] == 'busca_home'){
      $cont5=0;

      while ($cont5<count($lstPesquisada)) {

      $id_hotel = $lstPesquisada[$cont5]->id_hotel;

    ?>

    <div class="produtos_div_no_effect"  data-scroll-reveal="enter from the left after 0.3s, move 40px, over 2s">
      <img id="img_produto_div_no_effect" src="<?php echo($lstPesquisada[$cont5]->imagem_hotel);?>" alt="">
      <div class="legenda_produto">
        <p class="txt_nome_hotel"><?php echo($lstPesquisada[$cont5]->nome_hotel);?></p>
        <p class="txt_estado_hotel"><?php echo($lstPesquisada[$cont5]->cidade_hotel);?></p>
        <div class="estrelas">
          <img class="img_estrelas_hotel" src="imagens/estrelas.png" alt="">
        </div>
        <div class="caracteristicas_hotel">
          <img class="img_caracteristica_hotel" src="imagens/wifi.png" alt="">
        </div>
        <p class="txt_caracteristica_hotel">Wi-fi grátis</p>
        <p class="txt_diaria_hotel" >Diárias a partir de</p>
        <?php
              //Incluindo o arquivo da controller para fazer o select
              require_once('controllers/aspectos_controller.php');
              //Instancia do objeto de controller, e chamada dos metodos para listar os registros
              $controller_cor_preco_aspecto = new controllerAspectos();
              $rsCorPreco = $controller_cor_preco_aspecto->listar_cor_preco();
              $cont=0;
              while ($cont<count($rsCorPreco)) {



             ?>
        <p class="txt_rs" style="color:#<?php echo($rsCorPreco[$cont]->cor_preco);?>;">R$</p>
        <?php
    								$sql = "select * from tbl_quarto where id_hotel = $id_hotel  order by preco_quarto asc limit 1;";
    								$select = mysql_query($sql);

    								while($rs=mysql_fetch_array($select)){


    								?>
        <p class="txt_preco_hotel" style="color:#<?php echo($rsCorPreco[$cont]->cor_preco);?>;"><?php echo($rs['preco_quarto']);?></p>
        <?php

        }
         ?>
        <?php
          $cont+=1;
          }
        ?>
        <a href="verQuartos.php?id_hotel=<?php echo($rsHome[$cont2]->id_hotel); ?>"><input type="submit" name="btn_produto" value="ver quartos" class="btn_produto"></a>

      </div>

    </div>
    <?php
    $cont5+=1;
    }
  }

}else{
 ?>

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

<div class="produtos_div_no_effect"  data-scroll-reveal="enter from the left after 0.3s, move 40px, over 2s">
  <img src="<?php echo($rsHome[$cont2]->imagem_hotel);?>" alt="">
  <div class="legenda_produto">
    <p class="txt_nome_hotel"><?php echo($rsHome[$cont2]->nome_hotel);?></p>
    <p class="txt_estado_hotel"><?php echo ($rsHome[$cont2]->cidade_hotel);?></p>
    <div class="estrelas">
      <img class="img_estrelas_hotel" src="imagens/estrelas.png" alt="">
    </div>
    <div class="caracteristicas_hotel">
      <img class="img_caracteristica_hotel" src="imagens/wifi.png" alt="">
    </div>
    <p class="txt_caracteristica_hotel">Wi-fi grátis</p>
    <p class="txt_diaria_hotel" >Diárias a partir de</p>
    <?php
          //Incluindo o arquivo da controller para fazer o select
          require_once('controllers/aspectos_controller.php');
          //Instancia do objeto de controller, e chamada dos metodos para listar os registros
          $controller_cor_preco_aspecto = new controllerAspectos();
          $rsCorPreco = $controller_cor_preco_aspecto->listar_cor_preco();
          $cont=0;
          while ($cont<count($rsCorPreco)) {

         ?>
    <p class="txt_rs" style="color:#<?php echo($rsCorPreco[$cont]->cor_preco);?>;">R$</p>
    <?php
			$sql = "select * from tbl_quarto where id_hotel = $id_hotel  order by preco_quarto asc limit 1;";
			$select = mysql_query($sql);

			while($rs=mysql_fetch_array($select)){

		?>
    <p class="txt_preco_hotel" style="color:#<?php echo($rsCorPreco[$cont]->cor_preco);?>;"><?php echo($rs['preco_quarto']);?></p>
    <?php
    }
     ?>
    <?php
      $cont+=1;
      }
    ?>
    <a href="verQuartos.php?id_hotel=<?php echo($rsHome[$cont2]->id_hotel); ?>"><input type="submit" name="btn_produto" value="ver quartos" class="btn_produto"></a>

  </div>
</div>

<?php
  $cont2+=1;
  }
}
?>
