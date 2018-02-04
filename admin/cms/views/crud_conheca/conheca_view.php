<?php
      //Incluindo o arquivo da controller para fazer o select
      require_once('controllers/conheca_controller.php');
      //Instancia do objeto de controller, e chamada dos metodos para listar os registros
      $controller_conheca = new controllerConheca();
      $rsConheca = $controller_conheca->listar();
      $cont=0;
      while ($cont<count($rsConheca)) {



     ?>

<div class="contanier_comentarios">
  <div class="comentarios_conheca_seu_destino_id">
    <div class="nome_comentario">
      <p><?php echo($rsConheca[$cont]->nome_usuario);?></p>
    </div>
    <div class="nome_comentario_sobre">
      <p>Comentou sobre</p>
    </div>
    <div class="nome_comentario_lugar">
      <p><?php echo($rsConheca[$cont]->cidade_descricao);?></p>
    </div>
    <div class="comentario_conheca_id">
      <p><?php echo($rsConheca[$cont]->txt_comentario);?></p>

    </div>
    <div class="aceitar_comentario">
      <a href="router.php?controller=conheca&modo=ativar_conheca&id_comentario=<?php echo($rsConheca[$cont]->id_comentario); ?>;"><img src="imagens/aceitar.png" alt=""></a>
    </div>
    <div class="excluir_comentario">
        <a href="router.php?controller=conheca&modo=desativar_conheca&id_comentario=<?php echo($rsConheca[$cont]->id_comentario); ?>;"><img src="imagens/deletar.png" alt=""></a>
    </div>


  </div>


</div>
<?php
  $cont+=1;

  }


?>
