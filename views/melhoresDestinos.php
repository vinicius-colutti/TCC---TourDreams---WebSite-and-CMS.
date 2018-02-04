<!DOCTYPE html>
<html>
  <head>
  <?php include('head.php'); ?>

<link href="css/carousel.css" rel="stylesheet" type="text/css" media="screen and (min-width:1200px)"/>
<link href="css/carousel_datashow.css" rel="stylesheet" type="text/css" media="screen and (min-width:1024px)"/>

<link href="css/carousel_responsivo.css" rel="stylesheet" type="text/css" media="screen and (max-device-width:700px)"/>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>

  </head>
  <body>
		<header>
			<?php include('menu.php'); ?>
		</header>
		<section>

			<div id="principal">
				<div id="txt_categoria">
					<p>PRAIAS</p>
				</div>
				<div class="espacoCat">
        <ul id="flexiselDemo1">
          <?php
                 //Incluindo o arquivo da controller para fazer o select
                 require_once('controllers/melhores_destinos_controlller.php');
                 //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                 $controller_praia = new controllerMelhores();
                 $rsPraia = $controller_praia->listar_praias();
                 $cont=0;
                 while ($cont<count($rsPraia)) {
                  $id_hotel =  $rsPraia[$cont]->id_hotel;




                ?>

            <li>
                  <div class="produtos_div_melhoresDestinos">
       						  <img src="<?php echo($rsPraia[$cont]->imagem_hotel);?>" alt="" class="imagem_melhoresdestinos">
       							<div class="caracteristicas">
       								<img src="imagens/localizacao.png" alt="">
                      	<p  class="cidade_destinos"><?php echo($rsPraia[$cont]->cidade_hotel);?></p>
                    <div class="espaco_wifi">
      								<img src="imagens/wifi.png" alt="" class="wifi_melhores_img">
      								<div class="carac_espaco">Wi-fi grátis</div>

					</div>

                          <p  class="diaria_melhores">Diárias a partir de</p>
                          <p class="rs_espaco_preco">R$</p>
                          <?php
                      								$sql = "select * from tbl_quarto where id_hotel = $id_hotel  order by preco_quarto asc limit 1;";
                      								$select = mysql_query($sql);

                      								while($rs=mysql_fetch_array($select)){






                      		?>
                          <p class="preco_melhores_destinos"><?php echo($rs['preco_quarto']);  ?></p>
                          <?php

                        }

                           ?>

                          <a href="verQuartos.php?id_hotel=<?php echo($id_hotel);?>">
                             <input type="submit" name="btn_produto" value="Reservar" class="btn_produto_melhores_destinos">
                          </a>
       							</div>
 				</div>
            </li>
            <?php
              $cont+=1;

              }


            ?>




          </ul>

				</div>
				<div id="txt_categoria">
					<p>INVERNO</p>
				</div>
                <div class="espacoCat">
                  <ul id="flexiselDemo2">
                    <?php
                           //Incluindo o arquivo da controller para fazer o select
                           require_once('controllers/melhores_destinos_controlller.php');
                           //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                           $controller_inverno = new controllerMelhores();
                           $rsInverno = $controller_inverno->listar_inverno();
                           $cont2=0;
                           while ($cont2<count($rsInverno)) {
                            $id_hotel_2 = $rsInverno[$cont2]->id_hotel;




                          ?>
                    <li>
                          <div class="produtos_div_melhoresDestinos">
                            <img src="<?php echo($rsInverno[$cont2]->imagem_hotel);?>" alt="" class="imagem_melhoresdestinos">
                            <div class="caracteristicas">
                              <img src="imagens/localizacao.png" alt="">
                            	<p  class="cidade_destinos"><?php echo($rsInverno[$cont2]->cidade_hotel);?></p>
								<div class="espaco_wifi">
									<img src="imagens/wifi.png" alt="" class="wifi_melhores_img">
									<div class="carac_espaco">Wi-fi grátis</div>

								</div>
                                  <p class="diaria_melhores">Diárias a partir de</p>
                                  <p class="rs_espaco_preco">R$</p>
                                  <?php
                              								$sql = "select * from tbl_quarto where id_hotel = $id_hotel_2  order by preco_quarto asc limit 1;";
                              								$select = mysql_query($sql);
                                              //echo $sql;

                              								while($rs=mysql_fetch_array($select)){






                              		?>
                                  <p class="preco_melhores_destinos"><?php echo($rs['preco_quarto']);  ?></p>
                                  <?php
                                  }

                                   ?>
                                  <a href="verQuartos.php?id_hotel=<?php echo($id_hotel_2);?>">
                                    <input type="submit" name="btn_produto" value="Reservar" class="btn_produto_melhores_destinos">
                                  </a>
                            </div>
                           </div>
                    </li>
                    <?php
                      $cont2+=1;

                      }


                    ?>



                  </ul>

                </div>

				<div id="txt_categoria">
					<p>CAMPOS</p>
				</div>
				 <div class="espacoCat">
                  <ul id="flexiselDemo3">
                    <?php
                           //Incluindo o arquivo da controller para fazer o select
                           require_once('controllers/melhores_destinos_controlller.php');
                           //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                           $controller_campo = new controllerMelhores();
                           $rsCampo = $controller_campo->listar_campo();
                           $cont3=0;
                           while ($cont3<count($rsCampo)) {
                            $id_hotel_3 = $rsCampo[$cont3]->id_hotel;




                          ?>
                    <li>
                          <div class="produtos_div_melhoresDestinos">
                            <img src="<?php echo($rsCampo[$cont3]->imagem_hotel);?>" alt="" class="imagem_melhoresdestinos">
                            <div class="caracteristicas">
                              <img src="imagens/localizacao.png" alt="">
								              <p  class="cidade_destinos"><?php echo($rsCampo[$cont3]->cidade_hotel);?></p>
									<div class="espaco_wifi">
										<img src="imagens/wifi.png" alt="" class="wifi_melhores_img">
									<div class="carac_espaco">Wi-fi grátis</div>

								</div>
                                  <p class="diaria_melhores">Diárias a partir de</p>
                                  <p class="rs_espaco_preco">R$</p>
                                  <?php
                                              $sql = "select * from tbl_quarto where id_hotel = $id_hotel_3  order by preco_quarto asc limit 1;";
                                              $select = mysql_query($sql);

                                              while($rs=mysql_fetch_array($select)){






                                  ?>
                                  <p class="preco_melhores_destinos"> <?php echo($rs['preco_quarto']);  ?></p>
                                  <?php
                                }
                                   ?>
                                  <a href="verQuartos.php?id_hotel=<?php echo($id_hotel_3);?>">
                                    <input type="submit" name="btn_produto" value="Reservar" class="btn_produto_melhores_destinos">
                                  </a>
                            </div>
                           </div>
                    </li>
                    <?php
                      $cont3+=1;

                      }


                    ?>



                  </ul>

                </div>
				<div id="txt_categoria">
					<p>FAZENDAS</p>
				</div>
				 <div class="espacoCat">
                  <ul id="flexiselDemo4">
                    <?php
                           //Incluindo o arquivo da controller para fazer o select
                           require_once('controllers/melhores_destinos_controlller.php');
                           //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                           $controller_fazenda = new controllerMelhores();
                           $rsFazenda = $controller_fazenda->listar_fazenda();
                           $cont4=0;
                           while ($cont4<count($rsFazenda)) {
                            $id_hotel_4 = $rsFazenda[$cont4]->id_hotel;




                          ?>
                    <li>
                          <div class="produtos_div_melhoresDestinos">
                            <img src="<?php echo($rsFazenda[$cont4]->imagem_hotel);?>" alt="" class="imagem_melhoresdestinos">
                            <div class="caracteristicas">
                              <img src="imagens/localizacao.png" alt="">
								              <p  class="cidade_destinos"><?php echo($rsFazenda[$cont4]->cidade_hotel);?></p>
								<div class="espaco_wifi">
									<img src="imagens/wifi.png" alt="" class="wifi_melhores_img">
									<div class="carac_espaco">Wi-fi grátis</div>

								</div>
                                  <p class="diaria_melhores">Diárias a partir de</p>
                                  <p class="rs_espaco_preco">R$</p>
                                  <?php
                                              $sql = "select * from tbl_quarto where id_hotel = $id_hotel_4  order by preco_quarto asc limit 1;";
                                              $select = mysql_query($sql);

                                              while($rs=mysql_fetch_array($select)){






                                  ?>
                                  <p class="preco_melhores_destinos"><?php echo($rs['preco_quarto']); ?></p>
                                  <?php
                                  }
                                   ?>
                                  <a href="verQuartos.php?id_hotel=<?php echo($id_hotel_4);?>">
                                    <input type="submit" name="btn_produto" value="Reservar" class="btn_produto_melhores_destinos">
                                  </a>
                            </div>
                           </div>
                    </li>
                    <?php
                      $cont4+=1;

                      }


                    ?>


                  </ul>

                </div>
			</div>

		</section>
		<footer>
			<?php include('rodape.php'); ?>
		</footer>

  </body>
</html>
