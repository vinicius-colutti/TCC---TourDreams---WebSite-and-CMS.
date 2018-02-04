<?php
$modo = 'busca_reserva';
 ?>

<div id="principal_reservas_solicitadas">
  <div id="area_pesquisa_reserva">

  <form class="" action="router.php?controller=conheca&modo=<?php echo($modo); ?>" method="post">


  <input type="text" name="busca" id="input_pesquisa_reserva" placeholder="Pesquise por reservas Ex: Fulano, Hotel Fazenda">
  <button type="submit" name="button" id="btn_buscar_reserva">
    <img src="imagens/pesquisa.png" alt="">
  </button>
  </form>
  </div>
  <h1>Reservas Solicitadas</h1>


  <?php
  if(isset($_GET['modo'])){

        if($_GET['modo'] == 'busca_reserva'){
          $cont2=0;

          while ($cont2<count($lstPesquisada)) {



   ?>

   <div class="select_reservas_solicitadas_id">
     <div class="carac_reserva_solictida">
       <div class="opt_reservas_id">
         <p><?php echo($lstPesquisada[$cont2]->nome_usuario);?></p>
       </div>
       <div class="opt_reservas_id">
         <p><?php echo($lstPesquisada[$cont2]->nome_hotel);?></p>

       </div>
       <div class="opt_reservas_id">
         <p><?php echo($lstPesquisada[$cont2]->nome_quarto);?></p>

       </div>
       <div class="opt_reservas_id">
         <p><?php echo($lstPesquisada[$cont2]->data_entrada);?> à <?php echo($lstPesquisada[$cont2]->data_saida);?></p>

       </div>

     </div>
     <div class="opt_reservas">
       <div class="aceitar_reserva">
         <a href="router.php?controller=reservas&modo=aprovar&id_reserva=<?php echo($lstPesquisada[$cont2]->id_reserva); ?>" class="a_reservas"><p>Aprovar</p></a>
       </div>
       <div class="recusar_reserva">
         <a href="router.php?controller=reservas&modo=recusar&id_reserva=<?php echo($lstPesquisada[$cont2]->id_reserva); ?>" class="a_reservas"><p>Recusar</p></a>
       </div>


     </div>

     <div class="status_reserva_blabla">
       <?php
       if($lstPesquisada[$cont2]->status_reserva == 'aprovada'){



        ?>
           <img src="imagens/aprovado.png" alt="">
       <?php
     }elseif ($lstPesquisada[$cont2]->status_reserva == 'pendente') {

        ?>
        <img src="imagens/pendente.png" alt="">
     <?php
   }elseif($lstPesquisada[$cont2]->status_reserva == 'viajando'){

      ?>
        <img src="imagens/viajando.png" alt="">
     <?php
   }else{

      ?>
        <img src="imagens/recusado.png" alt="">

     <?php
     }


      ?>


     </div>

   </div>
   <?php
   $cont2+=1;
   }
   }
 }else{

    ?>
  <div id="select_reservas_solicitadas">
    <?php
          //Incluindo o arquivo da controller para fazer o select
          require_once('controllers/reserva_controller.php');
          //Instancia do objeto de controller, e chamada dos metodos para listar os registros
          $controller_list_reserva = new controllerReserva();
          $rsReserva = $controller_list_reserva->listar();
          $cont=0;
          while ($cont<count($rsReserva)) {



    ?>
    <div class="select_reservas_solicitadas_id">
      <div class="carac_reserva_solictida">
        <div class="opt_reservas_id">
          <p><?php echo($rsReserva[$cont]->nome_usuario);?></p>
        </div>
        <div class="opt_reservas_id">
          <p><?php echo($rsReserva[$cont]->nome_hotel);?></p>

        </div>
        <div class="opt_reservas_id">
          <p><?php echo($rsReserva[$cont]->nome_quarto);?></p>

        </div>
        <div class="opt_reservas_id">
          <p><?php echo($rsReserva[$cont]->data_entrada);?> à <?php echo($rsReserva[$cont]->data_saida);?></p>

        </div>

      </div>
      <div class="opt_reservas">
        <div class="aceitar_reserva">
          <a href="router.php?controller=reservas&modo=aprovar&id_reserva=<?php echo($rsReserva[$cont]->id_reserva); ?>" class="a_reservas"><p>Aprovar</p></a>
        </div>
        <div class="recusar_reserva">
          <a href="router.php?controller=reservas&modo=recusar&id_reserva=<?php echo($rsReserva[$cont]->id_reserva); ?>" class="a_reservas"><p>Recusar</p></a>
        </div>


      </div>

      <div class="status_reserva_blabla">
        <?php
        if($rsReserva[$cont]->status_reserva == 'aprovada'){



         ?>
            <img src="imagens/aprovado.png" alt="">
        <?php
      }elseif ($rsReserva[$cont]->status_reserva == 'pendente') {

         ?>
         <img src="imagens/pendente.png" alt="">
      <?php
    }elseif($rsReserva[$cont]->status_reserva == 'viajando'){

       ?>
         <img src="imagens/viajando.png" alt="">
      <?php
    }else{

       ?>
         <img src="imagens/recusado.png" alt="">

      <?php
      }


       ?>


      </div>

    </div>

    <?php
      $cont+=1;

      }
    }

    ?>

  </div>
</div>
