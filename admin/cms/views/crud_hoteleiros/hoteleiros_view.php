<div id="principal_gerenciar_hoteis">
  <div id="txt_hoteis_cadastrados">
    <p>Hotéis cadastrados no portal TourDreams</p>

  </div>

  <div id="principal_select_hoteis_cadastrados">
    <?php
          //Incluindo o arquivo da controller para fazer o select
          require_once('controllers/hoteleiros_controller.php');
          //Instancia do objeto de controller, e chamada dos metodos para listar os registros
          $controller_hoteis = new controllerHoteis();
          $rsHoteis = $controller_hoteis->listar();
          $cont=0;
          while ($cont<count($rsHoteis)) {



         ?>
    <div id="select_hotel_cadastrado">

      <div class="nome_hotel">
        <p><?php echo($rsHoteis[$cont]->nome_hotel);?></p>
      </div>
      <div class="nome_hotel">
        <p><?php echo($rsHoteis[$cont]->cnpj_hotel);?></p>
      </div>
      <div class="nome_hotel">
        <p><?php echo($rsHoteis[$cont]->cidade_hotel);?></p>
      </div>
      <div id="opt_hoteis">
        <div class="opcoes_hotel">
          <a href="router.php?controller=detalhes_hotel&modo=aceitar_hotel&id_hotel=<?php echo($rsHoteis[$cont]->id_hotel);?>" id="aceitar_hotel_a" ><p class="aceitar_hotel_a">Aceitar</p></a>

        </div>
        <div class="opcoes_hotel">
          <a href="router.php?controller=detalhes_hotel&modo=recusar_hotel&id_hotel=<?php echo($rsHoteis[$cont]->id_hotel);?>" id="recusar_hotel_a" ><p class="recusar_hotel">Recusar</p></a>
        </div>
        <div class="opcoes_hotel">
            <a href="router.php?controller=detalhes_hotel&modo=listar_hotel&id_hotel=<?php echo($rsHoteis[$cont]->id_hotel);?>" onClick="window.open(this.href,'detalhes_hoteis.php','resizable=no,scrollbars=no,left=500,menubar=no,height=800,width=475'); return false;" id="detalhes_hotel_a" ><p class="detalhes_hotel">+ Detalhes</p></a>

        </div>

      </div>



    </div>
    <?php
      $cont+=1;

      }


    ?>


  </div>

</div>
