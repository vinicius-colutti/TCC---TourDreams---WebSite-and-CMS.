<?php
      //Incluindo o arquivo da controller para fazer o select
      require_once('controllers/aspectos_controller.php');
      //Instancia do objeto de controller, e chamada dos metodos para listar os registros
      $controller_cor_preco_aspecto = new controllerAspectos();
      $rsCorPreco = $controller_cor_preco_aspecto->listar_cor_rodape();
      $cont=0;
      while ($cont<count($rsCorPreco)) {



     ?>

<div id="principal_footer" style="background-color:#<?php echo($rsCorPreco[$cont]->cor_rodape);?>">

  <?php
    $cont+=1;

    }


  ?>
  <div id="fale_conosco">
      <div id="titulo_fale_conosco">
          <h1>FALE CONOSCO</h1>

      </div>
      <?php include_once('views/crud_fale_conosco/view_fale_conosco.php'); ?>

  </div>

    <div id="rds_sociais">
        <div class="icons_rc">
            <img src="imagens/facebook.png" alt="face">
        </div>
        <div class="icons_rc">
            <img src="imagens/instagram.png" alt="insta">
        </div>
        <div class="icons_rc">
            <img src="imagens/twitter.png" alt="twitter">
        </div>
        <div class="icons_rc">
            <img src="imagens/youtube.png" alt="youtube">
        </div>

    </div>

        <div id="localização">
          <div id="maps">
            <iframe id="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.2260099021055!2d-46.659662285744375!3d-23.560324967437474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59cc22fd0f3f%3A0x636dada907dcf59e!2sAv.+Paulista%2C+1754!5e0!3m2!1spt-BR!2sbr!4v1503871224476"
            frameborder="0" style="border:0" allowfullscreen></iframe>

          </div>
          <div id="txt_tourdreams">

            <p>O escrítorio da TourDreams, localiza-se em:<br> Av. Paulista, 1754 - Consolação, São Paulo - SP, Brasil.</p>
            <p>Contate-nos: tourdreamsltda@sac.com.br </p>

          </div>
		  <div id="espaco_download">
			  <div id="baixar_app">
				      <a href="APK/app-debug.apk"><img src="imagens/android_1.png" width="100%" height="100%"/></a>
			  </div>
			  <a href="APK/app-debug.apk"><p>Baixe nosso app </p></a>
		  </div>
          <div id="google_translate_element"></div>
          <div id="direitos_reservados">
              <p>Direitos autorais 2017 tourdreams | Todos os direitos reservados.</p>
          </div>


        </div>

</div>
