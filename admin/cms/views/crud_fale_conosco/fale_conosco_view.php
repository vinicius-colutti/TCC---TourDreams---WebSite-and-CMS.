<?php
$modo = "";
$nome = "";
$email = "";
$telefone = "";
$sugestao_critica = "";

if(isset($_GET['modo']))
{
    if($_GET['modo'] == 'buscar_fale')
    {


        $nome = $result->nome;
        $email = $result->email;
        $telefone = $result->telefone;
        $sugestao_critica = $result->sugestao_critica;

    }
}




 ?>



<div id="select_fale_conosco">
  <?php
        //Incluindo o arquivo da controller para fazer o select
        require_once('controllers/fale_controller.php');
        //Instancia do objeto de controller, e chamada dos metodos para listar os registros
        $controller_fale = new controllerFale();
        $rsFale = $controller_fale->listar();
        $cont=0;
        while ($cont<count($rsFale)) {



       ?>

  <div id="formularios_fale_conosco">
    <h1><?php echo($rsFale[$cont]->nome);?></h1>
    <br>
    <p><?php echo($rsFale[$cont]->email);?></p>
    <div class="opt_fale_conosco">

      <div class="excluir_fale_conosco">
        <a href="<?php echo("router.php?controller=faleconosco&modo=deletar_fale&id_fale_conosco=".$rsFale[$cont]->id_fale_conosco); ?>"><img src="imagens/deletar.png" alt="asds"></a>
      </div>
      <div class="verificar_fale_conosco">
        <a href="<?php echo("router.php?controller=faleconosco&modo=buscar_fale&id_fale_conosco=".$rsFale[$cont]->id_fale_conosco); ?>"><img src="imagens/detalhes_fale_conosco.png" alt="asd"></a>
      </div>

    </div>

  </div>
  <?php
    $cont+=1;

    }


  ?>




</div>

<section id="section_geerenciar_fale_conosco">

  <div id="principal_fale_conosco">
    <div id="principal_detalhes_fale_conosco">
      <input type="text" name="" value="<?php echo($nome); ?>" class="input_detalhes_fale" placeholder="Aguardando..." readonly="true">
      <br>
      <input type="text" name="" value="<?php echo($email); ?>" class="input_detalhes_fale" placeholder="Aguardando..." readonly="true">
      <br>
      <input type="text" name="" value="<?php echo($telefone); ?>" class="input_detalhes_fale" placeholder="Aguardando..." readonly="true">
      <br>
      <input type="text" name="" value="<?php echo($sugestao_critica); ?>" id="input_detalhes_fale_obs" placeholder="Aguardando..." readonly="true">


    </div>

  </div>



</section>
