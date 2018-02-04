


<?php
$parceiro="";
	$id_quarto="";
$id_hotel=$_GET['id_hotel'];
?>

<form  name="perfil_Parceiro" method="GET" enctype="multipart/form-data" action="editarQuarto.php">

				<div id="principal_produtos">
				<?php
				    $sql="select * from tbl_quarto where id_hotel=".$id_hotel;
                    mysql_query($sql);


					if($sql != null){


						 require_once('controllers/quarto_controller.php');

						$quarto_controller = new ControllerQuarto();

						 $rsconsulta1= $quarto_controller->ListarQuartos($id_hotel);

						$cont3 = 0;



						while($cont3<count($rsconsulta1)){

							$id_quarto = $rsconsulta1[$cont3]->id_quarto;
						  $vetor_carac[] = $rsconsulta1[$cont3]->descricao_carac_quarto;

				?>

								<div class="produtos_div_verQuartos">


									<a href="editarQuarto.php?modo=BuscarInfoQuarto&id_quarto=<?php echo($rsconsulta1[$cont3]->id_quarto); ?>">
										<?php
											$sql = "select * from tbl_imagens_quarto where id_quarto =".$id_quarto." limit 1";
											//echo($sql);
											$select = mysql_query($sql);

											while($rs=mysql_fetch_array($select)){


										?>
										<img class="img_hotel" src="<?php echo($rs['nome_imagem']); ?>"/>
									</a>
										<?php
											}

										?>

									<div class="legenda_produto_verQuartos">
										<div class="excluir_quarto_espaco">
											<a href="router.php?controller=quarto&modo=excluirQuarto&id_quarto=<?php echo($id_quarto); ?>&id_hotel=<?php echo($_GET['id_hotel']);?>"><img src="imagens/delete_edit.png" width="100%" height="100%" /></a>
										</div>

										<p class="txt_nome_hotel"><?php echo($rsconsulta1[$cont3]->nome_quarto); ?> N° <?php echo($rsconsulta1[$cont3]->numero_quarto); ?></p>
										<!--<div class="caracteristicas_verQuartos">
											<img class="img_caracteristicas_verQuartos" src="imagens/wifi.png" alt="">
										</div>-->

										<?php
											//var_dump($vetor_carac);*/
											//$cont_carac = 0;

											$sql_carac ="select c.descricao_carac_quarto from caracteristicas_quarto as c JOIN caracteristicas_quarto_hotel as ch ON c.id_carac_quarto = ch.id_carac_quarto where ch.id_quarto=".$id_quarto;
											//echo($sql_carac);
											$select_carac = mysql_query($sql_carac);

											while($rsconsultacarac=mysql_fetch_array($select_carac)){
											//while($cont_carac<count($vetor_carac)){

										?>
												<p class="txt_caracteristica_verQuartos"><?php echo($rsconsultacarac['descricao_carac_quarto']);?><p>

										<?php
											 //$cont_carac+=1;
											}
										?>
										<p class="txt_diaria_hotel">Diárias a partir de </p>
										<p class="txt_rs" style="color:#000000;">R$ </p>
										<p class="txt_preco_hotel" style="color:#000000;"><?php echo($rsconsulta1[$cont3]->preco_quarto); ?></p>
										<a href="editarQuarto.php?modo=BuscarInfoQuarto&id_quarto=<?php echo($rsconsulta1[$cont3]->id_quarto); ?>"><p class="btn_produto_verQuartos"><font color="#ffffff">&nbsp;&nbsp;Editar</font></a>


									</div>

								</div>
					<?php
							$cont3+=1;

						}
						?>
						<div id="espaco_add_quarto">
							<a href="ADDQuarto.php?id_hotel=<?php echo($id_hotel);?>" >	<p> Adicione + Quartos</p> </a>
						</div>
				<?php
					}else if(empty($sql)){
				?>

						<div id="mensagem_quartos">
							<p><?php echo('NÃO HÁ QUARTOS CADASTRADOS'); ?> <p>

						</div>
						<div id="espaco_add_quarto">
								<a href="ADDQuarto.php?id_hotel=<?php echo($id_hotel);?>" >	<p> Adicione Quartos</p> </a>

						</div>
				<?php
					}
					?>
				</div>

 </form>
