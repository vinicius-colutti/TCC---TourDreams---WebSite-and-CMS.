<?php
if(isset($_GET['modo'])){

      if($_GET['modo'] == 'busca_conheca'){
        $cont2=0;

        while ($cont2<count($lstPesquisada)) {

          

 ?>
 <div class="area_comentario">
     <img class="img_hotel_conhecaDestino" src="<?php echo($lstPesquisada[$cont2]->imagem_hotel_1);?>" alt="">
     <img class="img_usuario_conhecaDestino" src="<?php echo($lstPesquisada[$cont2]->foto_usuario);?>" alt="">
     <p class="txt_nome_conhecaDestino" ><?php echo($lstPesquisada[$cont2]->nome_usuario);?></p>
     <p class="txt_comentario_conhecaDestino"><?php echo($lstPesquisada[$cont2]->cidade_descricao);?>: <?php echo($lstPesquisada[$cont2]->txt_comentario);?> </p>
 </div>



<?php
$cont2+=1;

}
}
}else{

 ?>


 <?php
        //Incluindo o arquivo da controller para fazer o select
        require_once('controllers/conheca_controller.php');
        //Instancia do objeto de controller, e chamada dos metodos para listar os registros
        $controller_conheca = new controllerConheca();
        $rsConheca= $controller_conheca->listar();
        $cont=0;
        while ($cont<count($rsConheca)) {

       ?>
       <div class="area_comentario">
           <img class="img_hotel_conhecaDestino" src="<?php echo($rsConheca[$cont]->imagem_hotel_1);?>" alt="">
           <img class="img_usuario_conhecaDestino" src="<?php echo($rsConheca[$cont]->foto_usuario);?>" alt="">
           <p class="txt_nome_conhecaDestino" ><?php echo($rsConheca[$cont]->nome_usuario);?></p>
           <p class="txt_comentario_conhecaDestino"><?php echo($rsConheca[$cont]->cidade_descricao);?>: <?php echo($rsConheca[$cont]->txt_comentario);?> </p>
       </div>


       <?php
         $cont+=1;

         }


       ?>
<?php
}


 ?>
