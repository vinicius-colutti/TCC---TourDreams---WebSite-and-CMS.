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
      <div id="principal">
		<div id="espaco_sobre">
			<div id="slider">
        <?php
              //Incluindo o arquivo da controller para fazer o select
              require_once('controllers/sobre_controller.php');
              //Instancia do objeto de controller, e chamada dos metodos para listar os registros
              $controller_sobre_foto = new controllerSobre();
              $rsSobreFotos = $controller_sobre_foto->listarfotos();
              $cont=0;
              while ($cont<count($rsSobreFotos)) {



             ?>
				<img class="slides" title="" src="admin/cms/<?php echo($rsSobreFotos[$cont]->descricao_imagem);?>" alt="">
        <?php
          $cont+=1;

          }


        ?>

				<button class = "button" onClick = "plusIndex(-1)" id = "btn1"> &#10094;</button>
				<button class = "button" onClick = "plusIndex(1)" id = "btn2"> &#10095;</button>
			</div>

			<div id="menu_hex">
				<div class="hexagon">
					 <a class="scroll" href="#slider"><p class="menu_opt_sobre" > SOBRE</p></a>
				</div>
				<div class="hexagon2">
					 <a class="scroll" href="#area_info_sobre"><p class="menu_opt_sobre"> MISSÃO</p></a>
        </div>
				<div class="hexagon3">
					 <a class="scroll" href="#area_info_visao"><p class="menu_opt_sobre_visao"> VALORES</p></a>
				</div>
				<div class="hexagon4">
					 <a class="scroll" href="#area_info_missao"><p class="menu_opt_sobre"> VISÃO</p></a>
				</div>
			</div>
		</div>
    <?php
          //Incluindo o arquivo da controller para fazer o select
          require_once('controllers/sobre_controller.php');
          //Instancia do objeto de controller, e chamada dos metodos para listar os registros
          $controller_sobre = new controllerSobre();
          $rsSobre = $controller_sobre->listar();
          $cont=0;
          while ($cont<count($rsSobre)) {



         ?>
        <div id="area_info_sobre">
          <div class="titulo_info_sobre">
            <p >SOBRE NOSSA EMPRESA</p>
          </div>
          <div class="txt_info_sobre">
            <p><?php echo($rsSobre[$cont]->txt_sobre);?>
                </p>
          </div>
        </div>
        <div id="area_info_missao">
          <div class="titulo_info_sobre">
            <p>MISSÃO</p>
          </div>
          <div class="txt_info_sobre">
            <p><?php echo($rsSobre[$cont]->txt_missao);?>
                </p>
          </div>
        </div>
        <div id="area_info_visao">
          <div class="titulo_info_sobre">
            <p>VISÃO</p>
          </div>
          <div class="txt_info_sobre">
            <p><?php echo($rsSobre[$cont]->txt_visao);?>
                </p>
          </div>
        </div>
        <div id="area_info_valores">
          <div class="titulo_info_sobre">
            <p>VALORES</p>
          </div>
          <div class="txt_info_sobre">
            <p><?php echo($rsSobre[$cont]->txt_valores);?>
                </p>
          </div>
        </div>
        <?php
          $cont+=1;

          }


        ?>
      </div>
    </section>
    <script type="text/javascript">
    /* Passar automaticamente as imagens */
    autoSlide();
    function autoSlide(){
      var i;
      var x = document.getElementsByClassName("slides");
      for(i=0;i<x.length;i++)
        {
          x[i].style.display = "none";
        }
      if(index > x.length){ index = 1}
      x[index-1].style.display = "block";
      index++;
      setTimeout(autoSlide, 3000);
    }
    </script>
    <footer>
      <?php include('rodape.php'); ?>
    </footer>
  </body>
</html>
