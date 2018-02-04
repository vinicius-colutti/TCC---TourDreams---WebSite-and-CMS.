<?php
  session_start();
  $id_hotel = $_SESSION['id_hotel'];

	if(isset($_POST['btn_quarto_editar'])){
		header('location:editarQuarto.php');

	}

  /*if(isset($_POST['btn_hotel_editar'])){
		header("location:editarHotel.php?id_hotel=".$id_hotel);

  }*/

//CONEXÃO
	@require_once('models/bd_class.php');
	@$conexao_bd = new mysql_db();
	@$conexao_bd->conectar();

?>

<!DOCTYPE html>


<html>
  <head>
    <?php include('head.php'); ?>
  </head>
  <body>

		<div class="window" id="janela1">
			<hgroup id="hgroup_modal">
			  <h1 class="h1_modal"><p>O QUE É MILHAS TRAVEL FIDELIDADE</p></h1>
			</hgroup>
			<form id="form_modal">
			  <div class="group">
				   <p>O Milhas Travel Fidelidade conhecida como MTF, é uma
           maneira que a TourDreams encontrou de presentear nossos
         clientes por tais ações realizadas no portal, ou até mesmo, no aplicativo.</p>
			  </div>
			</form>
		</div>
    <div class="window" id="janela2">
			<hgroup id="hgroup_modal">
			  <h1 class="h1_modal"><p>COMO ADQUIRIR MILHAS TRAVEL FIDELIDADE</p></h1>
			</hgroup>
			<form id="form_modal">
			  <div class="group">
				   <p>Para adquirir e acumular seus pontos MTF, é necessário que algum cliente
             realize reservas em seu hotel.
           </p>
			  </div>
			</form>
		</div>

<!-- mascara para cobrir o site -->
<div id="mascara">

</div>
    <header>
        <?php include('menu.php'); ?>
    </header>

      <section>
        <!--<div id="principal">-->
          <div id="capa_parceiro">

            <div id="mtf_perfilParceiro">
              <p id="titulo_mtf_perfilParceiro">MILHAS TRAVEL FIDELIDADE</p>
              <div id="pontuacao_mtf_perfilParceiro">
                <img src="imagens/mtf.png" alt="">
                <?php
                $id_hotel = $_GET['id_hotel'];


                $sql="select sum(p.qtds_ponto) as valor_total from tbl_pontos as p
                      inner join tbl_pontos_hotel as ph
                      on p.id_pontos = ph.id_pontos
                      inner join tbl_hotel as h on h.id_hotel = ph.id_hotel
                      where h.id_hotel = $id_hotel
                      group by p.id_pontos;";
                //echo($sql);
                $select = mysql_query($sql);

                while($rs=mysql_fetch_array($select)){

                 ?>
                <p><?php echo($rs['valor_total']); ?></p>
                <?php
                }
                 ?>
              </div>
              <div id="duvida_mtf_perfilParceiro">
                <a href="#janela1" id="a_index_duvida" rel="modal"><p>O que é MTF?</p></a>
                <a href="#janela2" id="a_index_duvida" rel="modal"><p>Como adquirir?</p></a>
              </div>

            </div>
          </div>

          <div id="area_indicacao_hotel_perfilParceiro">
            <?php

            /*require_once('controllers/hotel_controller.php');

            $hotel_controller = new ControllerHotel();

            $rs = $hotel_controller->ListarInfoHotel($id_hotel);*/

            $sql = 'select h.nome_hotel,
                           h.imagem_hotel_1,
                           c.nome_categoria,
                           eh.rua_hotel,
                           eh.numero_hotel
                           from tbl_hotel as h
                           inner join
                           tbl_categoria as c
                           on h.id_categora = c.id_categoria
                           inner join
                           tbl_endereco_hotel as eh
                           on h.id_hotel = eh.id_hotel
                           where h.id_hotel = '.$id_hotel;

            $select=mysql_query($sql);

            //echo($sql);

            while ($rs=mysql_fetch_array($select)) {


             ?>

            <div id="produto_div_hotel_perfilParceiro">
              <img id="img_hotel_perfilParceiro" src="<?php echo($rs['imagem_hotel_1']); ?>" alt="" width="100%" height="100%">
              <div id="legenda_hotel_perfilParceiro">
                <div id="area_titulo_hotel_perfilParceiro">
                  <p>HOTEL <?php echo($rs['nome_hotel']); ?></p>
                </div>

                <div id="area_infos_hotel_perfilParceiro">
                  <p><?php echo($rs['nome_categoria']); ?></p>
                  <p><?php echo($rs['rua_hotel']); ?></p>
                  <p>N <?php echo($rs['numero_hotel']); ?></p>

                  <a href="router.php?controller=hotel&modo=BuscarInfoHotel&id_hotel=<?php echo($id_hotel); ?>">
                    <input type="submit" id="btn_produto_editarHotel" name="btn_hotel_editar" value="Editar">
                  </a>
                </div>
              </div>

            </div>
            <?php
              }
             ?>
          </div>


          <div id="txt_perfilUsuario">
            <p>MEUS QUARTOS CADASTRADOS</p>
          </div>
			<?php

            require_once('crud_cadastroParceiro/perfilparceiro_view.php');

			?>
        </div>


      </section>

          <footer>
            <?php include('rodape.php'); ?>
          </footer>
  </body>
</html>
