 <!DOCTYPE html>

<html>
  <head>
    <?php


		include('head.php');


		if(isset($_POST['arquivos[]'])){
			$i = 0;

			foreach ($_FILES["arquivos"]["error"] as $key => $error) {

					# Definir o diretório onde salvar os arquivos.
					$destino = "imagens/" . $_FILES["arquivos"]["name"][$i];

					#Move o arquivo para o diretório de destino
					move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i], $destino );

					#Próximo arquivo a ser analisado
					$i++;
			}
		}


	?>

	<script type="text/javascript">
                $(function(){
                      $('#uploadChange').on('change',function() {
						    var id = $(this).attr('id');
							var totalFiles = $(this).get(0).files.length;



							var htm='<ol>';
							for (var i=0; i < totalFiles; i++) {
                               var c = (i % 2 == 0) ? 'item_white' : 'item_grey';
                               var arquivo = $(this).get(0).files[i];
                               var fileV = new readFileView(arquivo, i);
                               htm +='<li class="+c+"><img class="img_parceiro_cadastro2" data-img="'+i+'" data-id="'+id+'" border="1"><span>'+"</li>";
							}
                          htm += '</ol>';


                             $('.img_parceiro_cadastro2').html(htm);

                      });

                    });


                    function readFileView(file, i) {

                      var reader = new FileReader();
                       reader.onload = function (e) {
                         $('[data-img="'+i+'"]').attr('src', e.target.result);
                    }

                      reader.readAsDataURL(file);
                    }





	</script>

  </head>
  <body>
	  <header>
		  <?php include('menu.php'); ?>
	  </header>
   </body>



 <?php
	$nome_quarto="";
	$numero_quarto="";
	$camas_casal="";
	$camas_solteiro ="";
	$action="NovoQuartoHotel";
	$preco_quarto="";
	//$_GET['id_hotel'];
	if(isset($_GET['id_hotel']))
			$action_id_hotel = "&id_hotel=".$_GET['id_hotel'];
	else
			$action_id_hotel="";

 ?>

 <div id="principal">
	  	<div id="seja_usuario">
			<p>ADICIONE UM QUARTO </p>
		</div>
		<form  name="Cadastro_Parceiro" method="post" enctype="multipart/form-data" action="router.php?controller=quarto&modo=<?php echo($action.$action_id_hotel) ?>">
			<div id="espaco_cadastro_p2">

				<input  type="text" name="txtNome" placeholder="  Nome do quarto (ex: Suíte Presidencial)" class="input_cadastro_parceiroo" value="<?php echo($nome_quarto); ?>"/>
				<input type="text" name="txtNumero"  placeholder=" N° do quarto" class="input_cadastro_parceiroo2" value="<?php echo($numero_quarto);?>"/>

				<div id="espaco_parceiroo_perguntas">
					<p>Quantidade de camas de solteiro: &nbsp;<input   type="text" name="txtCamas" placeholder=" " class="input_cadastro_parceiroo3"  value="<?php echo($camas_solteiro);?>"/></p>
					<p>&nbsp;Quantidade de camas de casal: &nbsp;<input type="text" name="txtCamasCasal" placeholder=" " class="input_cadastro_parceiroo3"  value="<?php echo($camas_casal);?>"/></p>
					<p>&nbsp;<input type="text"placeholder="Preço" name="txtPreco" placeholder=" " class="input_cadastro_parceiroo3" id="preco_quarto"
             required value="<?php echo($preco_quarto);?>"/></p>


          <div id="pergunta_quarto">
					    <p>O que contém no quarto? </p>
          </div>
					<div id="resp_parceiro2">
							<?php
									require_once('controllers/quarto_controller.php');


									$quarto_controller = new ControllerQuarto();

									 $rsconsulta = $quarto_controller->ListarCategoriaQuarto();

									$cont2 = 0;
									while($cont2<count($rsconsulta)){
							?>
										<label class="control2 control--checkbox">
											<input type="checkbox" name="optC[]" value="<?php echo($rsconsulta[$cont2]->id_carac_quarto); ?>" />
											<?php echo($rsconsulta[$cont2]->descricao_carac_quarto); ?>
											<div class="control__indicator2"></div>

										</label>
							<?php
										$cont2+=1;



									}
							?>



					</div>
          <div id="pergunta_quarto2">
					       <p>&nbsp;Adicione fotos do quarto:</p>
         </div>
					<div id="espaco_fotos_parceiro_cadastro">

							<div class="img_parceiro_cadastro2">

							</div>

						<div class="img_parceiro_cadastro22">
							  <label name="addquartoo" class="addquartoo" for='uploadChange'><img src="imagens/addMais.png" width="90%" height="90%"/> </label>
							   <input type="file" name="arquivos2[]" multiple="multiple" id="uploadChange" />
						</div>
					</div>
				</div>


			</div>

				<p><input type="submit" class="btn_avanca_parceiro" value="Finalizar" name="btnFinalizar"/></p>

		</form>

	  </div>
