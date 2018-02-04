<?php
include_once('conectar_banco.php');

$nome_usuario = "";
$cpf_usuario = "";
$rg_usuario = "";
$email_usuario = "";
$senha_usuario = "";
$telefone_usuario = "";
$celular_usuario = "";
$foto_usuario = "";
$qtds_reserva_usuario = "";
$senha_usuario = "";
$btn_usuario = "ENVIAR";

$rua_usuario = "";

$bairro_usuario = "";
$numero_usuario = "";

$action = "novo";

if (isset($_GET['modo'] )){

  if($_GET['modo'] == 'editar'){
    $id_usuario=$list->id_usuario;
    $nome_usuario=$list->nome_usuario;
    $cpf_usuario=$list->telefone_usuario;
    $rg_usuario=$list->celular_usuario;
    $email_usuario=$list->email_usuario;
    $senha_usuario=$list->senha_usuario;
    $telefone_usuario =$list->telefone_usuario;
    $celular_usuario = $list->celular_usuario;

    $foto_usuario=$list->foto_usuario;

    $rua_usuario=$list->rua_usuario;
    $bairro_usuario=$list->bairro_usuario;
    $numero_usuario=$list->numero_usuario;

    $action = "alterar_dados";
    $btn_usuario="ALTERAR";
    $idEditar = "&id_usuario=$id_usuario";
  }

}

?>

<form id="form_modal_editar_perfilUsuario" name="Atualizar_usuario" method="post" enctype="multipart/form-data" action="">
  <div class="group_editar_perfilUsuario">
     <input name="nome_usuario" type="text" placeholder="nome" class="input_modal_editar_perfilUsuario" id="nome_usuario" value="<?php echo($nome_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
     <!--<label class="label_modal">nome</label>-->
  </div>
  <div class="group_editar_perfilUsuario">
    <input name="email_usuario" type="text" placeholder="e-mail" class="input_modal_editar_perfilUsuario" id="email_usuario" value="<?php echo($email_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
    <!--<label class="label_modal">e-mail</label>-->
  </div>

  <div class="group_editar_perfilUsuario">
    <input name="rua_usuario" type="text" placeholder="rua" class="input_modal_editar_perfilUsuario" id="rua_usuario" value="<?php echo($rua_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
    <!--<label class="label_modal">endereço</label>-->
  </div>
  <div class="group_editar_perfilUsuario">
    <input name="bairro_usuario" type="text" placeholder="bairro" class="input_modal_editar_perfilUsuario" id="bairro_usuario" value="<?php echo($bairro_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
    <!--<label class="label_modal">telefone</label>-->
  </div>
  <div class="group_editar_perfilUsuario">
    <input name="numero_usuario" type="text" placeholder="numero" class="input_modal_editar_perfilUsuario" id="numero_usuario" value="<?php echo($numero_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
    <!--<label class="label_modal">celular</label>-->
  </div>
  <div class="group_editar_perfilUsuario">
    <input name="telefone_usuario" type="text" placeholder="telefone" class="input_modal_editar_perfilUsuario" id="telefone_usuario" value="<?php echo($telefone_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
    <!--<label class="label_modal">CPF</label>-->
  </div>
  <div class="group_editar_perfilUsuario">
    <input name="celular_usuario" type="text" placeholder="celular" class="input_modal_editar_perfilUsuario" id="celular_usuario" value="<?php echo($celular_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
    <!--<label class="label_modal">RG</label>-->
  </div>
  <div class="group_editar_perfilUsuario">
    <input name="rg_usuario" type="text" placeholder="RG" class="input_modal_editar_perfilUsuario" id="rg_usuario" value="<?php echo($rg_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
    <!--<label class="label_modal">RG</label>-->
  </div>
  <div class="group_editar_perfilUsuario">
    <input name="senha_usuario" type="text" placeholder="senha" class="input_modal_editar_perfilUsuario" id="senha_usuario" value="<?php echo($senha_usuario); ?>"><span class="highlight"></span><span class="bar"></span>
    <!--<label class="label_modal">senha</label>-->
  </div>



    <!--<label class="label_modal">senha</label>-->



  <div class="group_editar_perfilUsuario">
    <div id="corpo">

      <select name="cb_estado" id="cb_estado" class="option_cadastro_editar_perfilUsuario">
          <option selected id="cb_estado_selecione">Estado</option>
      </select>
          <select name="cb_cidade" id="cb_cidade" style="display:none;" class="option_cadastro_editar_perfilUsuario">
      </select>
    </div>

   <script src="jquery-2.1.1.min.js"></script>

   <script>
     $(document).ready(function(e) {
       $.ajax({"url":"views/crud_cadastroUsuario/comboboxDataSource.php"}).done(
       function(data){
         for(var i =0;i<data.Estados.length;i++)
         {
           var idEstado = data.Estados[i].nome;
             $('select[name="cb_estado"]').append("<option value=\""+data.Estados[i].id+"\">"+idEstado+"</option>");


         }
       });
        });
     $('select[name="cb_estado"]').change(
       function(){
         var estadoValor = $("select option:selected").val();
         var cb_cidade = $('select[name="cb_cidade"]');
         var cb_estado = $(this);
         $.ajax({"url":"views/crud_cadastroUsuario/comboboxDataSource.php?id="+estadoValor}).done(
           function(data){
             var nCidade = data.Cidades.length;
             cb_cidade.show(200);
             cb_cidade.empty();
             cb_estado.find("option:contains('Selecione')").remove();
             $("#corpo").width(250);
             for(var i =0;i<nCidade;i++)
             {
               var idCidade = data.Cidades[i].nome;
               cb_cidade.append("<option value=\""+data.Cidades[i].id+"\">"+data.Cidades[i].nome+"</option>");
             }
           }
         );
       });


   </script>
 </div>




 <div class="group_editar_perfilUsuario">
   <div id="foto_editar_usuario">
     <img src="imagens/usuario.png" width="100%" height="98%" id="img_perfil_usuario_modal"/>
   </div>
   <div id="espacoBotao_enviarfile_editar">
    <label id="escolha_foto_usu_label_editar"for='filefotousuario'>Alterar foto</label>
     <!-- <input name="arquivos[]" type="file" id="filefotousuario"/>-->

     <input name="arquivos[]" type="file" id="filefotousuario"/>
   </div>
 </div>

  <input type="submit" name="btnCadastrar" value="<?php echo($btn_usuario) ?>" id="botao" style="<?php echo($style_btn) ?>" class="button_editar_perfilUsuario buttonBlue">

</form>
