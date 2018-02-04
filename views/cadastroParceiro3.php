<!DOCTYPE html>
<?php 
if(isset($_GET['id_hotel']))
			$action_id_hotel = "&id_hotel=".$_GET['id_hotel'];
	else
			$action_id_hotel="";

?>
<html>
  <head>
    <?php include('head.php'); ?>


  </head>
  <body>
  <header>
		  <?php include('menu.php'); ?>
	 
   </header>
   </body>
    <section>

      <div id="principal">
	  	<div id="area_optCadastro">
          <div id="txt_area_optCadastro">
            <p> DESEJA MESMO FINALIZAR CADASTRO ?</p>
          </div>
          <div id="btns_area_optCadastro">
			<a href="cadastroParceiro2.php?<?php echo($action_id_hotel);?>">
              <div class="btn_area_optCadastro">
                <p>ADICIONAR + </p>
              </div>
            </a>
		   <a href="index.php">
              <div class="btn_area_optCadastro">
                <p>FINALIZAR</p>
              </div>
            </a>


			<div class="txt_btn_optCadastro">
              <p> Adicionar mais um quarto ao cadastro de seu Hotél.</p>
            </div>
            <div class="txt_btn_optCadastro">
              <p>  Finalizar o cadastro do seu Hotél.</p>
            </div>


          </div>
        </div>
      </div>
	  </div>

	</section>
