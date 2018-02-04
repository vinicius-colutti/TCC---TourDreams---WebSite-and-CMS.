<?php

@require_once('models/bd_class.php');
//cria uma instancia da classe mysql_db
@$conexao_bd = new mysql_db();
//estabelece a conexao com BD
@$conexao_bd->conectar();
    $id_sobre_a_empresa = "";
    $valores = '';
    $visao = '';
    $missao = '';
    $sobre = '';
    $modo = "novo_sobre";

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'editar_sobre')
        {
            $id_sobre_a_empresa=$_GET['id_sobre_a_empresa'];
            $valores = $result->valores;
            $visao = $result->visao;
            $missao = $result->missao;
            $sobre = $result->sobre;
            $modo = 'editar_sobre_id';
        }
    }





 ?>
<form class="" action="router.php?controller=sobre_empresa&modo=<?php echo($modo)?>&id_sobre_a_empresa=<?php echo($id_sobre_a_empresa)?>" method="post">
<div id="sobre_nossa_empresa">
  <div class="txt_sobre_nosssa_empresa" id="nossa_empresa">
    <p>Sobre nossa empresa</p>

    <textarea name="txt_sobre_empresa" rows="8" cols="80" placeholder="A sua mensagem">
      <?php echo($sobre); ?>

    </textarea>

  </div>

</div>

<div id="sobre_nossa_empresa">
  <div class="txt_sobre_nosssa_empresa" id="missao">
    <p>Missão</p>

    <textarea name="txt_missao" rows="8" cols="80">
          <?php echo($missao); ?>

    </textarea>

  </div>

</div>

<div id="sobre_nossa_empresa">
  <div class="txt_sobre_nosssa_empresa" id="visao">
    <p>Visão</p>

    <textarea name="txt_visao" rows="8" cols="80">
        <?php echo($visao); ?>

    </textarea>

  </div>

</div>
<div id="sobre_nossa_empresa">
  <div class="txt_sobre_nosssa_empresa" id="valores">
    <p>Valores</p>

    <textarea name="txt_valores" rows="8" cols="80">
      <?php echo($valores); ?>

    </textarea>

  </div>

</div>

<div id="div_btn_salvar">
  <input id="btn_salvar_sobre" type="submit" name="btn_salvar_sobre" value="<?php if($modo == 'novo_sobre'){ echo('SALVAR'); }else{ echo('ALTERAR'); } ?>">
</div>

</form>

<div id="txt_select_sobre">
  <p>Registros já inseridos...</p>

</div>

<div id="select_sobre">
  <?php
        //Incluindo o arquivo da controller para fazer o select
        require_once('controllers/sobre_controller.php');
        //Instancia do objeto de controller, e chamada dos metodos para listar os registros
        $controller_sobre = new controllerSobre();
        $rsSobre = $controller_sobre->listar();
        $cont=0;
        while ($cont<count($rsSobre)) {



       ?>
  <div class="textos_sobre">
    <p class="test1"><?php echo($rsSobre[$cont]->txt_sobre);?></p>
  </div>
  <div class="textos_sobre">
    <p class="test1"><?php echo($rsSobre[$cont]->txt_missao);?></p>
  </div>
  <div class="textos_sobre">
    <p  class="test1"><?php echo($rsSobre[$cont]->txt_visao);?></p>
  </div>
  <div class="textos_sobre">
    <p class="test1"><?php echo($rsSobre[$cont]->txt_valores);?></p>
  </div>
  <div class="textos_opc">
    <div class="opc_txt">
      <a href="<?php echo("router.php?controller=sobre_empresa&modo=excluir_sobre&id_sobre_a_empresa=".$rsSobre[$cont]->id_sobre_a_empresa); ?>"><img src="imagens/deletar.png" alt="delete" title="Deletar"></a>

    </div>
    <div class="opc_txt">
      <a href="<?php echo("router.php?controller=sobre_empresa&modo=editar_sobre&id_sobre_a_empresa=".$rsSobre[$cont]->id_sobre_a_empresa); ?>"><img src="imagens/editar.png" alt="editar" title="Editar"></a>

    </div>
    <div class="opc_txt">
      <a href="<?php echo("router.php?controller=sobre_empresa&modo=ativar_sobre&id_sobre_a_empresa=".$rsSobre[$cont]->id_sobre_a_empresa); ?>"><img src="imagens/ativar.png" alt="editar" title="Ativar"></a>

    </div>
    <div class="opc_txt">
      <a href="<?php echo("router.php?controller=sobre_empresa&modo=desativar_sobre&id_sobre_a_empresa=".$rsSobre[$cont]->id_sobre_a_empresa); ?>"><img src="imagens/desativar.png" alt="editar" title="Desativar"></a>

    </div>



  </div>
  <div id="separatoria_sobre">

  </div>
  <?php
    $cont+=1;

    }


  ?>

</div>
