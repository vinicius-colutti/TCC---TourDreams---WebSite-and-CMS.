<?php

	$nome_hotel="";
	$telefone_hotel="";

	$id_categoria="";

	$cnpj_hotel="";
	$imagem_hotel_1="";
	$imagem_hotel_2="";

	$btnAvancar="AVANÇAR";
	$id_hotel=$_GET['id_hotel'];
	$email_hotel="";
	$pais_hotel="";
	$estado_hotel="";
	$cidade_hotel="";
	$wi_fi="";
	$aceita_animais="";
	$estacionamento="";
	$spa="";
	$pscina="";
	$academia="";
	$cafe_da_manha="";
	$almoco="";
	$cafe_da_tarde="";
	$jantar="";
	$rua_hotel="";
	$CEP = "";
	$bairro_hotel="";
	$action="Novo";
	$numero_hotel="";
	$restaurante="";
  $senha_hotel="";
	$idEditar="";


	$titulo_parceiro = "SEJA NOSSO PARCEIRO";


	 if (isset($_GET['modo'] )){

	   if($_GET['modo'] == 'BuscarInfoHotel'){

	     $id_hotel=$list->id_hotel;

	     $nome_hotel=$list->nome_hotel;
			 $telefone_hotel=$list->telefone_hotel;

			 $id_categoria=$list->id_categoria;

			 $cnpj_hotel=$list->cnpj_hotel;
			 $imagem_hotel_1=$list->imagem_hotel_1;
			 $imagem_hotel_2=$list->imagem_hotel_2;
			 $email_hotel=$list->email_hotel;
			 $pais_hotel=$list->pais_hotel;
			 $estado_hotel=$list->estado_hotel;
			 $cidade_hotel=$list->cidade_hotel;
			 $wi_fi=$list->wi_fi;
			 $aceita_animais=$list->aceita_animais;
			 $estacionamento=$list->estacionamento;
			 $spa=$list->spa;
			 $pscina=$list->pscina;
			 $academia=$list->academia;
			 $cafe_da_manha=$list->cafe_da_manha;
			 $almoco=$list->almoco;
			 $cafe_da_tarde=$list->cafe_da_tarde;
			 $jantar=$list->jantar;
			 $rua_hotel=$list->rua_hotel;
			 $bairro_hotel=$list->bairro_hotel;

			 $numero_hotel=$list->numero_hotel;
			 $restaurante=$list->restaurante;
			 $senha_hotel=$list->senha_hotel;

	     $action = "alterar_dados";
	     $btnAvancar="ALTERAR";
	     $idEditar = "&id_hotel=$id_hotel";

			 $titulo_parceiro = "EDITE AS INFORMAÇÕES DO SEU HOTEL";
	   }

	 }

?>

<div id="seja_usuario">
	<p><?php echo($titulo_parceiro); ?></p>
</div>

<form name="Cadastro_parceiro" method="post" enctype="multipart/form-data" action="router.php?controller=hotel&modo=<?php echo($action) ?><?php echo($idEditar) ?>">

			<div id="espaco_cadastro_p1">
				<input type="text" name="txtNomeHotel" placeholder="  Nome do hotel " class="input_cadastro_parceiro"
				required value="<?php echo($nome_hotel); ?>"/>
				<input type="email" name="txtEmail" placeholder="  E-mail " class="input_cadastro_parceiro"
				required value="<?php echo($email_hotel); ?>"/>

				<input type="text" name="txtTelefone" placeholder="  Telefone " class="input_cadastro_parceiro" id="telefone_hotel"
				onkeypress="this.value = FormataTel(event)" maxlength="13" required value="<?php echo($telefone_hotel); ?>"/>

				<input type="text" name="txtBairro" placeholder="  Bairro" class="input_cadastro_parceiro2"
				required value="<?php echo($bairro_hotel); ?>"/>
				<input placeholder=" N°" type="text" name="txtNumeroHotel"
				required value="<?php echo($numero_hotel) ?>" class="numero_cadastro_parceiro" >
				<input type="text" name="txtCNPJ" placeholder="  CNPJ" class="input_cadastro_parceiro" id="cnpj_hotel"
				onkeypress="this.value = FormataCnpj(event)" maxlength="18" required value="<?php echo($cnpj_hotel); ?>"/>
				<input type="text" name="txtEndereco" placeholder="  Rua" class="input_cadastro_parceiro"
				required value="<?php echo($rua_hotel); ?>"/>
				<input type="password" name="txtSenha" maxlength="15" placeholder=" Senha " class="input_cadastro_parceiro"
				required value="<?php echo($senha_hotel); ?>"/>
				<div id="corpo">

				   <select name="cb_estado" id="cb_estado" class="option_cadastro2">
						<option selected id="cb_estado_selecione">Estado</option>
				   </select>
					   <select name="cb_cidade" id="cb_cidade" style="display:none;" class="option_cadastro2">
				   </select>
				</div>
				<script src="jquery-2.1.1.min.js"></script>
			   <script>
				$(document).ready(function(e) {
					$.ajax({"url":"views/crud_cadastroParceiro/comboboxDataSource.php"}).done(
					function(data){
						for(var i =0;i<data.Estados.length;i++)
						{
					var idEstado = data.Estados[i].nome;
							$('select[name="cb_estado"]').append("<option value=\""+data.Estados[i].id+"\">"+idEstado+"</option>");


						}
					});
				 });
				$('select[name="cb_estado"]').change(
					function(){
						var estadoValor = $("select option:selected").val();
						var cb_cidade = $('select[name="cb_cidade"]');
						var cb_estado = $(this);
						$.ajax({"url":"views/crud_cadastroParceiro/comboboxDataSource.php?id="+estadoValor}).done(
							function(data){
								var nCidade = data.Cidades.length;
								cb_cidade.show(200);
								cb_cidade.empty();
								cb_estado.find("option:contains('Selecione')").remove();
								$("#corpo").width(250);
								for(var i =0;i<nCidade;i++)
								{
						var idCidade = data.Cidades[i].nome;
									cb_cidade.append("<option value=\""+data.Cidades[i].id+"\">"+data.Cidades[i].nome+"</option>");
								}
							}
						);
					});
			 </script>

			</div>
			<table id="espaco_cadastro_p3" border="0">
				<tr>
					<td class="espaco_perguntas">
						<p class="mais_espaco_p">Nos ajude, seu hotel pertence a qual dessas opções?</p>
						<?php
									 require_once('controllers/hotel_controller.php');

									$hotel_controller = new ControllerHotel();

									 $rs = $hotel_controller->ListarCategoria();

									$cont = 0;
									while($cont<count($rs)){
						?>

								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input  type="radio"  name="opt" <?php if($id_categoria > 0 ){ echo('checked'); }?> value="<?php echo($rs[$cont]->idCategoria); ?>"/>  <?php echo($rs[$cont]->nome_categoria); ?>
										<div class="control__indicator2"></div>

									</label>
								</div>
						<?php
									$cont+=1;
								}
						?>
					</td>
				</tr>
				<?php

				//if(){}

				/*	require_once('controllers/hotel_controller.php');

				 	$hotel_controller = new ControllerHotel();

					$rs = $hotel_controller->ListarCaracteristicaHotel();

					while (mysql_fetch_array($rs)) {
					*/
					if($id_hotel == 0 ){?>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Seu Hotel possui Wi-Fi?</p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input  type="radio"  name="opt2" value="1"/>Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input  type="radio" name="opt2"  value="0"/>Não
										<div class="control__indicator2"></div>

									</label>

								</div>
							</td>
						</tr>

						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Permite animais estimações? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio" name="opt3"  value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio" name="opt3" value="0" />  Não
										<div class="control__indicator2"></div>

									</label>

								</div>
							</td>
						</tr>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Possui estacionamento? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio"  name="opt4"  value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio"  name="opt4"  value="0" />  Não
										<div class="control__indicator2"></div>

									</label>
								</div>
							</td>
						</tr>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Possui SPA? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio"  name="opt5" value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio"   name="opt5" value="0" />  Não
										<div class="control__indicator2"></div>

									</label>

								</div>
							</td>
						</tr>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Tem piscina? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio"  name="opt6" value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio"   name="opt6"  value="0" />  Não
										<div class="control__indicator2"></div>

									</label>

								</div>
							</td>

						</tr>
					</table>
					<table id="espaco_cadastro_p4" border="0">

						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Tem academia? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio"  name="opt7" value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio" name="opt7" value="0" />  Não
										<div class="control__indicator2"></div>

									</label>
								</div>
							</td>

						</tr>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Tem restaurante? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio" name="opt71" value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio"  name="opt71" value="0" />  Não
										<div class="control__indicator2"></div>

									</label>
								</div>
							</td>

						</tr>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Seu hotel tem café da manha? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio" name="opt8" value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio" name="opt8" value="0" />  Não
										<div class="control__indicator2"></div>

									</label>
								</div>
							</td>

						</tr>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Seu hotel tem almoço? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio"  name="opt9" value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio"   name="opt9" value="0" />  Não
										<div class="control__indicator2"></div>

									</label>

								</div>
							</td>

						</tr>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Seu hotel tem café da tarde? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio"  name="opt10" value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio"  name="opt10" value="0" />  Não
										<div class="control__indicator2"></div>

									</label>

								</div>
							</td>

						</tr>
						<tr>
							<td class="espaco_perguntas">
								<p class="espaco_p_cadastro">Seu hotel tem jantar? </p>
								<div class="resposta_opt_p">
									<label class="control2 control--radio">
										<input   type="radio"  name="opt11" value="1" />  Sim
										<div class="control__indicator2"></div>

									</label>
									<label class="control2 control--radio">
										<input   type="radio" name="opt11" value="0" />  Não
										<div class="control__indicator2"></div>

									</label>
								</div>
							</td>

						</tr>





		<?php
				}else{


					$sql="select * from tbl_caracteristicas_hotel where id_hotel=".$id_hotel;
					$select=(mysql_query($sql));
					//echo($sql);
					while($consulta = mysql_fetch_array($select)){
				?>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Seu Hotel possui Wi-Fi?</p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input  type="radio"  name="opt2"  <?php if($consulta['wifi'] == 1){ echo('checked'); } ?> value="1"/>Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input  type="radio" name="opt2"  <?php if($consulta['wifi'] == 0){ echo('checked'); } ?> value="0"/>Não
								<div class="control__indicator2"></div>

							</label>

						</div>
					</td>
				</tr>

				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Permite animais estimações? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio" name="opt3" <?php if($consulta['aceita_animais'] == 1){ echo('checked'); } ?> value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio" name="opt3" <?php if($consulta['aceita_animais'] == 0){ echo('checked'); } ?> value="0" />  Não
								<div class="control__indicator2"></div>

							</label>

						</div>
					</td>
				</tr>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Possui estacionamento? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio"  name="opt4" <?php if($consulta['estacionamento'] == 1){ echo('checked'); } ?> value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio"  name="opt4" <?php if($consulta['estacionamento'] == 0){ echo('checked'); } ?> value="0" />  Não
								<div class="control__indicator2"></div>

							</label>
						</div>
					</td>
				</tr>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Possui SPA? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['spa'] == 1){ echo('checked'); } ?>  name="opt5" value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['spa'] == 0){ echo('checked'); } ?>   name="opt5" value="0" />  Não
								<div class="control__indicator2"></div>

							</label>

						</div>
					</td>
				</tr>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Tem piscina? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['piscina'] == 1){ echo('checked'); } ?> name="opt6" value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['piscina'] == 0){ echo('checked'); } ?>   name="opt6"  value="0" />  Não
								<div class="control__indicator2"></div>

							</label>

						</div>
					</td>

				</tr>
			</table>
			<table id="espaco_cadastro_p4" border="0">

				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Tem academia? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['academia'] == 1){ echo('checked'); } ?>  name="opt7" value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['academia'] == 0){ echo('checked'); } ?> name="opt7" value="0" />  Não
								<div class="control__indicator2"></div>

							</label>
						</div>
					</td>

				</tr>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Tem restaurante? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['restaurante'] == 1){ echo('checked'); } ?> name="opt71" value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio"  <?php if($consulta['restaurante'] == 0){ echo('checked'); } ?> name="opt71" value="0" />  Não
								<div class="control__indicator2"></div>

							</label>
						</div>
					</td>

				</tr>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Seu hotel tem café da manha? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['cafe_da_manha'] == 1){ echo('checked'); } ?> name="opt8" value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio"  <?php if($consulta['cafe_da_manha'] == 0){ echo('checked'); } ?> name="opt8" value="0" />  Não
								<div class="control__indicator2"></div>

							</label>
						</div>
					</td>

				</tr>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Seu hotel tem almoço? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio"  <?php if($consulta['almoco'] == 1){ echo('checked'); } ?> name="opt9" value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio"   <?php if($consulta['almoco'] == 0){ echo('checked'); } ?> name="opt9" value="0" />  Não
								<div class="control__indicator2"></div>

							</label>

						</div>
					</td>

				</tr>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Seu hotel tem café da tarde? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['cafe_da_tarde'] == 1){ echo('checked'); } ?> name="opt10" value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio"  <?php if($consulta['cafe_da_tarde'] == 0){ echo('checked'); } ?> name="opt10" value="0" />  Não
								<div class="control__indicator2"></div>

							</label>

						</div>
					</td>

				</tr>
				<tr>
					<td class="espaco_perguntas">
						<p class="espaco_p_cadastro">Seu hotel tem jantar? </p>
						<div class="resposta_opt_p">
							<label class="control2 control--radio">
								<input   type="radio" <?php if($consulta['jantar'] == 1){ echo('checked'); } ?> name="opt11" value="1" />  Sim
								<div class="control__indicator2"></div>

							</label>
							<label class="control2 control--radio">
								<input   type="radio"    <?php if($consulta['jantar'] == 0){ echo('checked'); } ?> name="opt11" value="0" />  Não
								<div class="control__indicator2"></div>

							</label>
						</div>
					</td>

				</tr>
			<?php
					}
				}
			?>
				<tr>
					<td class="espaco_perguntas_img">

						<p  class="mais_espaco_p">Adicione fotos do seu hotel:  </p>

						<div class="img_parceiro_cadastro2">

						</div>
						<div class="img_parceiro_cadastro22">
							 <label name="addImg" class="addquartoo" for='uploadChange'><img src="imagens/addMais.png" width="90%" height="90%"/> </label>
							 <input type="file" name="arquivos[]" multiple="multiple" id="uploadChange" />
						</div>

					</td>
				</tr>
				<tr>
					<td class="espaco_perguntas_btn">
						<input type="submit" name="btnAvancar"  value = "<?php echo($btnAvancar); ?>" class="btn_avanca_parceiro"/>


					</td>
				</tr>
			</table>
		</form>
