<?php
@require_once('models/bd_class.php');
//cria uma instancia da classe mysql_db
@$conexao_bd = new mysql_db();
//estabelece a conexao com BD
@$conexao_bd->conectar();
$id_funcionario = '';
    $nome_funcionario = '';
    $email_funcionario = '';
    $senha_funcionario = '';
    $id_setor = '';
    $id_setor_func = '';
    $modo = 'novo';

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'editar')
        {
            $id_setor_func=$_GET['id_setor'];
            $id_funcionario = $result->id_funcionario;
            $nome_funcionario = $result->nome_funcionario;
            $email_funcionario = $result->email_funcionario;
            $senha_funcionario = $result->senha_funcionario;
            $modo = 'editarfuncionario';
        }
    }

?>

<div id="principal_usuarios">
  <h1>Adicione Usuários de acesso ao CMS.</h1>
  <form class="" action="router.php?controller=usuarios&modo=<?php echo($modo)?>&id_funcionario=<?php echo($id_funcionario)?>" method="post">
  <div id="add_usuarios">



    <select class="" name="option">
    <?php
    $sql = "select id_setor, nome_setor from tbl_setores";
		$select = mysql_query($sql);
		while($rs=mysql_fetch_array($select)){
    if($rs['id_setor'] ==   $id_setor_func){


     ?>
      <option value="<?php echo($rs['id_setor']);?>" selected><?php echo($rs['nome_setor']);?></option>
      <?php
    }else{
      ?>
        <option value="<?php echo($rs['id_setor']);?>"><?php echo($rs['nome_setor']);?></option>
    <?php
    }

     ?>

    <?php

     }

     ?>

    </select>
    <br>
    <input type="text" name="nome" value="<?php echo($nome_funcionario); ?>" class="inputs_gerenciar_usuarios" placeholder="Nome...">
    <br>
    <input type="text" name="email" value="<?php echo($email_funcionario); ?>" class="inputs_gerenciar_usuarios" placeholder="Email...">
    <br>
    <input type="text" name="senha" value="<?php echo($senha_funcionario); ?>" class="inputs_gerenciar_usuarios" placeholder="Senha...">
    <br>
    <input type="submit" name="" value="<?php if($modo == 'novo'){ echo('Cadastrar'); }else{ echo('Editar'); } ?>" id="btn_salvar_usuarios_cms">


  </div>
  </form>
  <div id="listar_usuarios_cms">
    <h1>Usuários já cadastrados.</h1>
    <?php
          //Incluindo o arquivo da controller para fazer o select
          require_once('controllers/usuarios_controller.php');
          //Instancia do objeto de controller, e chamada dos metodos para listar os registros
          $controller_usuarios = new controllerUsuarios();
          $rsUsuarios = $controller_usuarios->listar();
          $cont=0;
          while ($cont<count($rsUsuarios)) {



         ?>
    <div class="listar_usuarios_cms_id">
      <div class="nome_usuario">
        <p><?php echo($rsUsuarios[$cont]->nome_funcionario);?></p>
      </div>
      <div class="nome_usuario">
        <p><?php echo($rsUsuarios[$cont]->email_funcionario);?></p>
      </div>
      <div class="opt_usuarios_cms">
        <div class="excluir_usuario_cms">
          <a href="<?php echo("router.php?controller=usuarios&modo=editar&id_funcionario=".$rsUsuarios[$cont]->id_funcionario); ?>&id_setor=<?php echo($rsUsuarios[$cont]->id_setor);?> "><img src="imagens/editar.png" alt=""></a>

        </div>
        <div class="excluir_usuario_cms">
          <a href="router.php?controller=usuarios&modo=excluir&id_funcionario=<?php echo($rsUsuarios[$cont]->id_funcionario);?>"><img src="imagens/deletar.png" alt=""></a>
        </div>

      </div>

    </div>
    <?php
      $cont+=1;

      }


    ?>



  </div>
