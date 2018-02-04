<?php
	$id_quarto = $_GET['id_quarto'];
	//$action ="EditarQuarto";
	if(isset($_GET['id_quarto']))
			$action_id_quarto = "&id_quarto=".$_GET['id_quarto'];
	else
			$action_id_quarto="";




 ?>

<div id="principal">
	<div id="seja_usuario">
	<p> ALTERAR QUARTO </p>
	</div>
	<form  name="Cadastro_Parceiro" method="post" enctype="multipart/form-data" action="router.php?controller=quarto&modo=EditarQuarto<?php echo($action_id_quarto) ?>">
	<div id="espaco_cadastro_p2">
		<?php
			require_once('controllers/quarto_controller.php');
			$quarto_controller = new ControllerQuarto();

			$rsconsulta0 = $quarto_controller->BuscarInfoQuarto();


		 ?>
			  <input  type="text" name="txtNome" placeholder="  Nome do quarto (ex: Suíte Presidencial)" class="input_cadastro_parceiroo" value="<?php echo ($rsconsulta0->nome_quarto); ?>"/>
			  <input type="text" name="txtNumero"  placeholder=" N° do quarto" class="input_cadastro_parceiroo2" value="<?php echo ($rsconsulta0->numero_quarto); ?>"/>
			  <div id="espaco_parceiroo_perguntas">
				<p>Quantidade de camas de solteiro: &nbsp;<input   type="text" name="txtCamasSolteiro" placeholder=" " class="input_cadastro_parceiroo3" value="<?php echo ($rsconsulta0->camas_solteiro); ?>"/></p>
				<p>&nbsp;Quantidade de camas de casal: &nbsp;<input   type="text" name="txtCamasCasal" placeholder=" " class="input_cadastro_parceiroo3" value="<?php echo ($rsconsulta0->camas_casal); ?>"/></p>
				<p>&nbsp;<input type="text"placeholder="Preço" name="txtPreco" placeholder=" " class="input_cadastro_parceiroo3" id="preco_quarto" value="<?php echo ($rsconsulta0->preco_quarto); ?>"/></p>
				<p> O que contém no quarto? </p>
				<div id="resp_parceiro2">

		 <?php

			require_once('controllers/quarto_controller.php');
			$quarto_controller = new ControllerQuarto();

			$rsconsulta = $quarto_controller->ListarCategoriaQuarto();

			$cont2 = 0;
			while($cont2<count($rsconsulta)){
			$id_carac_quarto = $rsconsulta[$cont2]->id_carac_quarto;

		?>
										<label class="control2 control--checkbox">
											<input type="checkbox"
											<?php
												require_once('controllers/quarto_controller.php');
												$quarto_controller = new ControllerQuarto();

												$rsconsulta_check = $quarto_controller->ListarCheckQuarto($id_quarto,$id_carac_quarto);

												echo $rsconsulta_check;



											?> name="optC[]" value="<?php echo($rsconsulta[$cont2]->id_carac_quarto); ?>" />
											<?php echo($rsconsulta[$cont2]->descricao_carac_quarto); ?>
											<div class="control__indicator2"></div>

										</label>
		<?php
				$cont2+=1;
			}


		?>
		</div>
		<p>&nbsp;Adicione fotos do quarto:</p>


			<div id="espaco_fotos_parceiro_cadastro">


				<?php
					require_once('controllers/quarto_controller.php');
					$quarto_controller = new ControllerQuarto();

					$rsconsultaimagens = $quarto_controller->BuscarInfoQuartoImagens();

					$cont_imagem = 0;
					while($cont_imagem<count($rsconsultaimagens)){
					$id_imagem = $rsconsultaimagens[$cont_imagem]->id_imagem_quarto;
					//echo($id_imagem);

				?>

					<div class="area_img_quarto">
						<img class="img_parceiro_cadastro2_quarto_editar"  src="<?php echo($rsconsultaimagens[$cont_imagem]->nome_imagem); ?>" />

						    <?php
								//require_once('controllers/quarto_controller.php');
								/*$quarto_controller_imagem = new ControllerQuarto();

								$rsconsultaimagem = $quarto_controller->DelImgQuarto($id_imagem);*/

							?>
						<div class="area_icons_edit_delete">
							<!--<label name="editar_foto_quarto"  for='uploadChange'><img class="icon_img_quarto" src="imagens/editar_icon.png" alt=""></label>
							 <input type="file" name="imagem_quarto" id="uploadChange" />-->


							<a href="router.php?controller=quarto&modo=DelImgQuarto&id_imagem=<?php echo($id_imagem); ?>&id_quarto=<?php echo($id_quarto); ?>">

									<img class="icon_img_quarto"  src="imagens/excluir_icon.png" alt="" name="btn_excluir_img">
								</a>
							</div>


					</div>



				<?php
					 $cont_imagem +=1;
					}


				?>


				<div class="img_parceiro_cadastro22">
					<!--<a href="router.php?controller=quarto&modo=AddImgQuarto&id_quarto=<?php //echo($id_quarto);?>">-->
						<label name="addquartoo" class="addquartoo" for='uploadChange'><img src="imagens/addMais.png" width="90%" height="90%"/> </label>
					   <input type="file" name="arquivos2[]" multiple="multiple" id="uploadChange" />

					<!--</a>-->
				</div>
				<div class="img_parceiro_cadastro2">

				</div>
			  <!--<div class="img_parceiro_cadastro22">
				  <label name="addquartoo" class="addquartoo" for='uploadChange'><img src="imagens/addMais.png" width="90%" height="90%"/> </label>
				   <input type="file" name="arquivos[]" multiple="multiple" id="uploadChange" />
			  </div>-->
			</div>


	</div>
	<p><a href="router.php?controller=quarto&modo=EditarQuarto<?php echo($action_id_quarto) ?>"><input type="submit" class="btn_avanca_parceiro" value="ALTERAR" name="btnAlterar"/></a></p>


	</form>

</div>
