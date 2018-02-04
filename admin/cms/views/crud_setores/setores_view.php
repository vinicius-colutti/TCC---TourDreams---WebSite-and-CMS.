<?php
@require_once('models/bd_class.php');
//cria uma instancia da classe mysql_db
@$conexao_bd = new mysql_db();
//estabelece a conexao com BD
@$conexao_bd->conectar();
    $id_setor = '';
    $nome_setor = '';
    $modo = 'novo';

    if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'editar_setor')
        {
            $id_setor = $result->id_setor;
            $nome_setor = $result->nome_setor;
            $modo = 'editarsetor_id';
        }
    }



 ?>
 <div id="principal_niveis_usuarios">
   <h1>Adicionar Níveis de acesso</h1>
   <form class="" action="router.php?controller=setores&modo=<?php echo($modo)?>&id_setor=<?php echo($id_setor)?>" method="post">

   <div id="add_nivel_usuario">
     <input type="text" name="nome_setor" value="<?php echo($nome_setor); ?>" placeholder="Nome do Nível..." id="input_nome_nivel_usuario">
     <br>
     <input type="submit" name="nome" value="<?php if($modo == 'novo'){ echo('Salvar'); }else{ echo('Editar'); } ?>" id="btn_salvar_nivel_usuario">

   </div>
   </form>
   <div id="listar_niveis_usuario">
     <h1>Níveis cadastrados</h1>
     <?php
           //Incluindo o arquivo da controller para fazer o select
           require_once('controllers/setores_controller.php');
           //Instancia do objeto de controller, e chamada dos metodos para listar os registros
           $controller_setores = new controllerSetores();
           $rsSetores = $controller_setores->listar();
           $cont=0;
           while ($cont<count($rsSetores)) {



          ?>
     <div class="listar_niveis_usuario_id">
       <div class="nome_nivel_usuario">
         <p><?php echo($rsSetores[$cont]->nome_setor);?></p>
       </div>
       <div class="opt_nivel_usuario">
         <div class="opt_nivel_usuario_opt">
           <a href="<?php echo("router.php?controller=setores&modo=editar_setor&id_setor=".$rsSetores[$cont]->id_setor); ?>"><img src="imagens/editar.png" alt=""></a>

         </div>
         <div class="opt_nivel_usuario_opt">
           <a href="router.php?controller=setores&modo=excluir_setor&id_setor=<?php echo($rsSetores[$cont]->id_setor);?>"><img src="imagens/deletar.png" alt=""></a>
         </div>

       </div>

     </div>
     <?php
       $cont+=1;

       }


     ?>

   </div>

 </div>
