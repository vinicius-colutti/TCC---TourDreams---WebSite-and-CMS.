<?php
$str = "A2R675UIY0PAQ8BLZ7";
$codigo = str_shuffle($str);






  session_start();
  $id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('head.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  </head>
  <body>
    <div class="window" id="janela1">

			<form id="form_modal_favorito" method="post" action="views/verificar_login_hoteleiro.php">
        <div class="quarto_favorito">
          <div class="img_favorito_quarto">
            <img src="arquivos_parceiro/quarto2_hotel40.jpg" alt="">

          </div>
          <div class="opt_fav_quarto">
            <p>Quarto Duplo Deluxe</p>
            <p>R$300</p>
            <p>ACORIZAL - MATO GROSSO</p>
            <input id="btn_fav_quarto" type="submit" name="" value="Visualizar quarto">
          </div>


        </div>
        <div class="quarto_favorito">
          <div class="img_favorito_quarto">
            <img src="arquivos_parceiro/quarto2_hotel40.jpg" alt="">

          </div>
          <div class="opt_fav_quarto">
            <p>Suíte Broadway</p>
            <p>R$250</p>
            <p>ACORIZAL - MATO GROSSO</p>
            <input id="btn_fav_quarto" type="submit" name="" value="Visualizar quarto">
          </div>


        </div>

			</form>

		</div>
    <div class="window" id="editar_perfilUsuario">
			<hgroup id="hgroup_modal_editar_perfilUsuario">
			  <h1 class="h1_modal"><p>ATUALIZE SUAS INFORMAÇÕES</p></h1>
			</hgroup>

      <?php
          require_once('crud_cadastroUsuario/editar_usuarios_view.php');
      ?>

		</div>
		<div class="window" id="janela1">
			<hgroup id="hgroup_modal">
			  <h1 class="h1_modal"><p>O QUE É MILHAS TRAVEL FIDELIDADE</p></h1>
			</hgroup>
			<form id="form_modal">
			  <div class="group">
				   <p>  O Milhas Travel Fidelidade conhecida como MTF, é uma
           maneira que a TourDreams encontrou de presentear nossos
         clientes por tais ações realizadas no portal, ou até mesmo, no aplicativo.  </p>
			  </div>
			</form>
		</div>
    <div class="window" id="janela2">
			<hgroup id="hgroup_modal">
			  <h1 class="h1_modal"><p>COMO ADQUIRIR MILHAS TRAVEL FIDELIDADE</p></h1>
			</hgroup>
			<form id="form_modal">
			  <div class="group">
				   <p>Para adquirir e acumular seus pontos MTF, é necessário
           <a href="index.php" color="#5270ff">realizar reservas</a> ou interagir,
           <a href="conhecaDestino.php">publicando comentários</a> em
         lugares que você ja visitou.</p>
			  </div>
			</form>
		</div>
	<div class="window" id="janela3">
		<hgroup id="hgroup_modal">
			  <h1 class="h1_modal"><p>DETALHES STATUS</p></h1>
		</hgroup>
		<form id="form_modal">
			  <div class="group">
				<div id="espaco_icones_status_detalhes">
					<div class="icone_status_detalhes_">
						&nbsp;<img src="imagens/pendentee.png" alt="pendente" width="100%" height="100%">
					</div>
					<div class="_status_detalhes_2">
						 Reserva Pendente
					</div>
					<div class="icone_status_detalhes_">
						<img src="imagens/aprovado.png" alt="aprovado" width="100%" height="100%">
					</div>
					<div class="_status_detalhes_2">
						Reserva Aprovada
					</div>
					<div class="icone_status_detalhes_">
						<img src="imagens/curtindo_cinza.png" alt="curtindo_viagem" width="100%" height="100%">
					</div>
					<div class="_status_detalhes_2">
						Curtindo Viagem
					</div>
					<div class="icone_status_detalhes_">
						<img src="imagens/aguardando_avalicao_cinza.png" alt="avaliacao" width="100%" height="100%">
					</div>
					<div class="_status_detalhes_2">
						Aguardando sua Avaliação
					</div>
				</div>
			  </div>
		</form>
	</div>
<!-- mascara para cobrir o site -->
<div id="mascara_usuario"></div>
    <header>
      <div id="ex1" class="modal">
        <p>Obrigado por enviar seu comentário!!.</p>

      </div>

      <div id="ex2" class="modal">
        <p>Cupom resgatado, este é seu cupom: <b><?php echo($_GET['cupom_resgatado']); ?></b>, utilize em reservas para obter descontos :D</p>

      </div>

      <!-- Link to open the modal -->
      <p><a href="#ex1" rel="modal:open" id="open_modal">Open Modal</a></p>
      <p><a href="#ex2" rel="modal:open" id="open_modal2">Open Modal</a></p>
        <?php include('menu.php'); ?>
    </header>

      <section>
        <!--<div id="principal">-->
          <div id="capa_usuario">

            <?php
              $sql = 'select * from tbl_usuario where id_usuario = '.$id_usuario;

              $select=mysql_query($sql);
              while ($rs=mysql_fetch_array($select)) {
            //echo ($sql);


             ?>
            <div id="img_perfilUsuario">
              <img src="<?php echo($rs['foto_usuario']); ?>" alt="" id="img_perfil_usuario" >
            </div>
            <div id="area_info_perfilUsuario">

              <p><?php echo($rs['nome_usuario']); ?></p>
              <p><?php echo($rs['telefone_usuario']); ?></p>
              <p><?php echo($rs['email_usuario']); ?></p>
              <p><?php echo($rs['cpf_usuario']); ?></p>
              <div id="area_opcoes_perfilUsuario">

                  <a href="#editar_perfilUsuario" id="a_index_duvida" rel="modal_editar">
                    <p>Editar informações</p>

                    <img src="imagens/editar.png" alt="">
                  </a>



              </div>
              <a href="#janela1" id="favoritos" rel="modal">
                <p>Meus favoritos</p>


              </a>

            </div>
            <div id="mtf_perfilUsuario">
              <p id="titulo_mtf_perfilUsuario">MILHAS TRAVEL FIDELIDADE</p>
              <div id="pontuacao_mtf_perfilUsuario">
                <img src="imagens/mtf.png" alt="">
                <?php
                $id_usuario = $_GET['id_usuario'];


                $sql="select sum(p.qtds_ponto) as valor_total from tbl_pontos as p
                      inner join tbl_pontos_usuario as pu
                      on p.id_pontos = pu.id_pontos
                      inner join tbl_usuario as u on u.id_usuario = pu.id_usuario
                      where u.id_usuario = $id_usuario
                      group by u.id_usuario;";
                //echo($sql);
                $select = mysql_query($sql);

                while($rs=mysql_fetch_array($select)){





                 ?>
                <p><?php echo($rs['valor_total']); ?></p>

                <?php
                if($rs['valor_total'] > 0){

                 ?>
                 <form class="" action="router.php?controller=reserva_usuario&modo=pegar_cupom&id_usuario=<?php echo($id_usuario); ?>&cupom=<?php echo($codigo); ?>" method="post">
                  <input id="pontuacao_mtf_perfilUsuario_input" type="submit" name="" value=" Pegar meu cupom ">
                </form>
                <?php
              }else{

                 ?>
                   <input type="submit" name="" value="pegar meu cupom" style="display:none;">
              <?php

               }
               ?>


                <?php
                }
                 ?>
              </div>
              <div id="duvida_mtf_perfilUsuario">
                <a href="#janela1" id="a_index_duvida" rel="modal"><p>O que é MTF?</p></a>
                <a href="#janela2" id="a_index_duvida" rel="modal"><p>Como adquirir?</p></a>
              </div>

            </div>
            <?php

             }

             ?>
          </div>
		  <div id="espaco_status">
			<p>MINHAS RESERVAS</p>
			<table id="status_table">
				<tr>
					<td class="campos_status_usuario">
						&nbsp;&nbsp;Hotel
					</td>
					<td class="campos_status_usuario">
						&nbsp;&nbsp;Lugar
					</td>
					<td  class="campos_status_usuario">
						&nbsp;&nbsp;Data da Reserva
					</td>
					<td  class="campos_status_usuario">
						&nbsp;&nbsp;Status
					</td>
					<td  class="campos_status_usuario">
						&nbsp;&nbsp;Mais informações
					</td>
				</tr>
        <?php
              //Incluindo o arquivo da controller para fazer o select
              require_once('controllers/reserva_usuario_controller.php');
              //Instancia do objeto de controller, e chamada dos metodos para listar os registros
              $controller_list_reserva = new controllerReservaUsuario();
              $rsReserva = $controller_list_reserva->listar();
              $cont=0;
              while ($cont<count($rsReserva)) {

        ?>
				<tr class="conteudo_status">
					<td>
						&nbsp;<?php echo($rsReserva[$cont]->nome_hotel);?>
					</td>
					<td>
						&nbsp;<?php echo($rsReserva[$cont]->cidade_descricao);?>
					</td>
					<td>
            <?php

               $dtEntrega=date("Y-m-d",strtotime($rsReserva[$cont]->data_entrada));
                     $today = date("Y-m-d");
                     if($today > $dtEntrega){

                      $sql = "update tbl_reserva set status_reserva = 'viajando' where id_reserva=".$rsReserva[$cont]->id_reserva;
                      mysql_query($sql);


            ?>
						&nbsp;Curtindo sua viagem
            <?php
          }else{


             ?>
             <?php echo($rsReserva[$cont]->data_entrada);?>
             <?php
           }
              ?>
					</td>
					<td>
						&nbsp;Reserva <?php echo($rsReserva[$cont]->status_reserva);?>
					</td>
					<td>
						<a href="#janela3" rel="modal"  id="a_index_duvida">
							<img class="icone_perfil_mais_status" src="imagens/mais.png" width="100%" height="100%"/>
							&nbsp;Detalhes
						</a>

					</td>
				</tr>
        <?php
          $cont+=1;

          }


        ?>
			</table>
		  </div>
      <div id="reserva_null_usuario">
        <p>Você não possui nenhuma reserva em nosso site, Bora lá? <a href="home.php">Reservar</a></p>

      </div>
          <div id="txt_perfilUsuario">
            <p>LUGARES POR ONDE VOCÊ PASSOU</p>
          </div>

          <div id="principal_produtos">
            <?php
                  //Incluindo o arquivo da controller para fazer o select
                  require_once('controllers/reserva_usuario_controller.php');
                  //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                  $controller_list_lugares = new controllerReservaUsuario();
                  $rsLugares = $controller_list_lugares->listar_lugares_que_passou();
                  $cont2=0;
                  while ($cont2<count($rsLugares)) {

                  $id_hotel = $rsLugares[$cont2]->id_hotel;

                  $id_reserva = $rsLugares[$cont2]->id_reserva;


            ?>
            <div class="produtos_div"  data-scroll-reveal="enter from the left after 0.3s, move 40px, over 2s">
              <img src="<?php echo($rsLugares[$cont2]->imagem_hotel);?>" alt="">
              <div class="legenda_produto">
                <p class="txt_nome_hotel"><?php echo($rsLugares[$cont2]->nome_hotel);?></p>
                <p class="txt_estado_hotel"><?php echo($rsLugares[$cont2]->cidade_descricao);?></p>
                <div class="estrelas">
                  <img class="img_estrelas_hotel" src="imagens/estrelas.png" alt="">
                </div>
                <div class="caracteristicas_hotel">
                  <img class="img_caracteristica_hotel" src="imagens/wifi.png" alt="">
                </div>
                <p class="txt_caracteristica_hotel">Wi-fi grátis</p>
                <div id="area_comentario_perfilUsuario">
                   <a onclick="funcao(<?php echo($id_hotel); ?>)" id="comentario_mostrar">
                    <button id="btn_pesquisa_avancada" type="button" name="button" ></button>
                    <img  id="img_filtro_comentario" src="imagens/cv.png" alt="dasd"></a>
                </div>
                <p class="txt_diaria_hotel" >Diárias a partir de</p>
                <p class="txt_rs" >R$</p>
                <?php
                  $sql = "select * from tbl_quarto where id_hotel = $id_hotel  order by preco_quarto asc limit 1;";
                  $select = mysql_query($sql);

                  while($result=mysql_fetch_array($select)){


                ?>
                <p class="txt_preco_hotel"><?php echo($result['preco_quarto']); ?></p>
                <?php

                 }

                 ?>
                <input type="submit" name="btn_produto" value="ver novamente" class="btn_produto">
                <form class="" action="router.php?controller=reserva_usuario&modo=inserir_comentario&id_reserva=<?php echo($id_reserva); ?>&id_usuario=<?php echo($_GET['id_usuario']); ?>" method="post">


                <div id="comentario_perfil<?php echo($id_hotel); ?>" class="comentario_perfil">

                <textarea name="comentario" rows="2" cols="1" class="input_comentario_perfil" placeholder="Insira uma comentário"></textarea>

                <button type="submit" name="button" class="input_enviar_comentario"> <img src="imagens/enviar_comentario.png" alt=""></button>

                </div>
              </form>

              </div>

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
  <?php



  if(isset($_GET['comentario_enviado'])){


  ?>
  <script type="text/javascript">




  $('#open_modal').click();





  </script>

  <?php
  }
  ?>


  <?php



  if(isset($_GET['cupom'])){

  $cupom_resgatado = $_GET['cupom_resgatado'];

  ?>
  <script type="text/javascript">




  $('#open_modal2').click();





  </script>


  <?php
  }
  ?>
</html>
