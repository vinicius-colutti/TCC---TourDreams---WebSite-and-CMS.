<?php
$id_promocao = "";
$modo = "novo";


 ?>

<form class="" action="router.php?controller=promocoes&modo=<?php echo($modo)?>&id_promocao=<?php echo($id_promocao)?>" method="post" enctype="multipart/form-data">

<div id="add_banner_promocao">
  <div id="multiple_upload">
      <input type="file" name="arquivos[]" multiple="multiple" id="uploadChange" />
      <div id="message">Selecionar fotos</div>
      <input type="button" id="botao" value="Upload" />
     <div id="lista">
     </div>

  </div>


  <script type="text/javascript">
  $(function(){
        $('#uploadChange').on('change',function() {
             var id = $(this).attr('id');
            var totalFiles = $(this).get(0).files.length;
            if(totalFiles == 0) {
              $('#message').text('Selecionar fotos' );
            }
            if ( totalFiles > 1) {
              $('#message').text( totalFiles+' arquivos selecionados' );
            } else {
              $('#message').text( totalFiles+' arquivo selecionado' );
            }
               var htm='<ol>';
             for (var i=0; i < totalFiles; i++) {
                 var c = (i % 2 == 0) ? 'item_white' : 'item_grey';
                 var arquivo = $(this).get(0).files[i];
                 var fileV = new readFileView(arquivo, i);
                 htm += '<li class="'+c+'"><div class="box-images"><img class="item" data-img="'+i+'" data-id="'+id+'" border="0"></div><span>'+arquivo.name+'</span><a href="javascript:removeFile('+i+',\''+id+'\')" class="remove">x</a></li>'+"\n";
             }
            htm += '</ol>';


               $('#lista').html(htm);

        });

      });

      function readFileView(file, i) {

        var reader = new FileReader();
         reader.onload = function (e) {
           $('[data-img="'+i+'"]').attr('src', e.target.result);
      }

        reader.readAsDataURL(file);
      }

      function removeFile(item, id) {
        var el = $('img[data-img="'+item+'"]');
        var textoQtdArquivosAtuais = $('#message').text();
        var qtdArquivosSelecionados = parseInt(textoQtdArquivosAtuais.substring(0, parseInt(textoQtdArquivosAtuais.indexOf(' arquivo'))));

      if (confirm('Tem certeza que deseja remover este item?')) {
          el.closest("li").remove();
          qtdArquivosSelecionados = qtdArquivosSelecionados -1;
          //Alterando label com quantidade de arquivos selecionados..

            if(qtdArquivosSelecionados == 0) {
              $('#message').text('Selecionar fotos' );
            } else {
            if (qtdArquivosSelecionados > 1) {
              $('#message').text( qtdArquivosSelecionados+' arquivos selecionados' );
            } else {
              $('#message').text( qtdArquivosSelecionados+' arquivo selecionado' );
            }
            }
      }
      }

  </script>

</div>
<div id="div_save_promocao">
  <input type="submit" name="btn_salvar_imagens" value="">
</div>
</form>
<div id="select_banners_promocao">
  <?php
        //Incluindo o arquivo da controller para fazer o select
        require_once('controllers/promocoes_controller.php');
        //Instancia do objeto de controller, e chamada dos metodos para listar os registros
        $controller_promocoes = new controllerPromocoes();
        $rsPromocoes = $controller_promocoes->listar();
        $cont=0;
        while ($cont<count($rsPromocoes)) {



       ?>
  <div class="select_banner_id">
    <div class="img_banner_promocao">
      <img src="<?php echo($rsPromocoes[$cont]->banner_promocao);?>" alt="">

    </div>
    <div class="opt_promocoes">
      <div class="excluir_promocao">
        <a href="<?php echo("router.php?controller=promocoes&modo=excluir_promocao&id_promocao=".$rsPromocoes[$cont]->id_promocao); ?>"><img src="imagens/deletar.png" alt=""></a>

      </div>
      <div class="excluir_promocao">
        <a href="<?php echo("router.php?controller=promocoes&modo=ativar_promocao&id_promocao=".$rsPromocoes[$cont]->id_promocao); ?>"><img src="imagens/ativar.png" alt=""></a>
      </div>
      <div class="excluir_promocao">
          <a href="<?php echo("router.php?controller=promocoes&modo=desativar_promocao&id_promocao=".$rsPromocoes[$cont]->id_promocao); ?>"><img src="imagens/desativar.png" alt=""></a>

      </div>

    </div>

  </div>
  <?php
    $cont+=1;

    }


  ?>




</div>
