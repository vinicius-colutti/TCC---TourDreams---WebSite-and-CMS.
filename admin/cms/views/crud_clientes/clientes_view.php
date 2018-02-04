

<div id="principal_select_clientes_cadastrados">
  <?php
        //Incluindo o arquivo da controller para fazer o select
        require_once('controllers/clientes_controller.php');
        //Instancia do objeto de controller, e chamada dos metodos para listar os registros
        $controller_clientes = new controllerClientes();
        $rsClientes = $controller_clientes->listar();
        $cont=0;
        while ($cont<count($rsClientes)) {



       ?>
  <div id="select_hotel_cadastrado">
    <div class="nome_hotel_id">
      <p><?php echo($rsClientes[$cont]->id_usuario);?></p>
    </div>
    <div class="nome_hotel">
      <p><?php echo($rsClientes[$cont]->nome_usuario);?></p>
    </div>
    <div class="nome_hotel_email">
      <p><?php echo($rsClientes[$cont]->email_usuario);?></p>
    </div>
    <div class="nome_hotel">
      <p><?php echo($rsClientes[$cont]->cpf_usuario);?></p>
    </div>

    <div id="opt_usuarios">
          <div class="opcoes_cliente">
          <a href="router.php?controller=detalhes_cliente&modo=listar&id_usuario=<?php echo($rsClientes[$cont]->id_usuario);?>" onClick="window.open(this.href,'detalhes_cliente.php','resizable=no,scrollbars=no,left=500,menubar=no,height=800,width=475'); return false;" id="detalhes_hotel_a" ><p class="detalhes_hotel">+ Detalhes</p></a>

          </div>

    </div>



  </div>
  <?php
    $cont+=1;

    }


  ?>



</div>
