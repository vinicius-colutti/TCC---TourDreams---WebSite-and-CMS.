<meta charset="utf-8">
<title>TOURDREAMS</title>

<!--============= LINKS =============-->
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen and (min-device-width:1200px)">
<link rel="stylesheet" type="text/css" href="css/style_responsivo.css" media="screen and (max-device-width:700px)">
<link rel="stylesheet" type="text/css" href="css/superslides_responsivo.css" media="screen and (max-device-width:700px)">
<link rel="stylesheet" type="text/css" href="css/calendario_responsivo.css" media="screen and (max-device-width:700px)">

<link rel="shortcut icon" href="imagens/logo_predio.png" />
<link href="fontes/fonte.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/calendario.css" media="screen and (min-device-width:1200px)">
<link rel="stylesheet" src="js/jquery-ui.css" />
<link rel="stylesheet" href="css/superslides.css">

<!--============= Scripts diversos =============-->
<script language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery-1.8.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.calendar-widget.js"></script>
<script src="js/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.superslides.min.js" type="text/javascript"></script>



<!-- ========================================= Script para menu 2 ========================================= -->
<script type="text/javascript">

$(window).scroll(function() {
  if ($(this).scrollTop() > 1){
    $('header').addClass("sticky");
  }
  else{
    $('header').removeClass("sticky");
  }
  });

</script>

<script type="text/javascript">
    $("#calendar").calendarWidget({
  	month: 5,
  	year: 2009
   });

</script>

  <!-- ========================================= Script para Slidetoogle ========================================= -->
  <script type="text/javascript">
      jQuery(document).ready(function($){
        $("#btn_pesquisa_avancada").click(function(event){

          event.stopPropagation();
          event.preventDefault();

          $("#filtros").slideToggle(500);



        });




      });
  </script>

  <script type="text/javascript">


  function funcao(idhotel){


      $("#comentario_perfil"+ idhotel).slideToggle(100);



  }



  </script>


<!-- ========================================= Script para Ancora ========================================= -->
<script type="text/javascript">

  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top}, 900);
   });
  });


</script>

<!--<script type="text/javascript">
  $(document).ready(function(){
    $("#filtrar").click(function(event){
      event.preventDefault();
      $(".labels").slideToggle(300);
    });
  });
</script>-->

  <!-- ========================================= Script para tradutor ========================================= -->
  <!--<script type="text/javascript">
  function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
  }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->


<!-- ========================================= Script para Modal do usuario ========================================= -->
 <script>
    $(document).ready(function(){

      $("a[rel=modal_editar]").click( function(ev){
        //alert('teste');
        //$("#editar_perfilUsuario").slideToggle(1000);

        ev.preventDefault();

        var mod = this;

            //Fazendo a modal
            //alert('teste');
            var id = $(mod).attr("href");
            var alturaTela = $(document).height();
            var larguraTela = $(window).width();

            //colocando o fundo preto
            //alert('teste');
            $('#mascara_usuario').css({'width':larguraTela,'height':alturaTela});
            $('#mascara_usuario').fadeIn(1000);
            $('#mascara_usuario').fadeTo("slow",0.8);

            //alert('teste');
            var left = ($(window).width() /2) - ( $(id).width() / 2 );
            var top = ($(window).height() / 2) - ( $(id).height() / 2 );

            $(id).css({'top':top,'left':left});
            $(id).show();


            //======== FORM COM AJAX ========
            jQuery(document).ready(function(){
              jQuery('#form_modal_editar_perfilUsuario').submit(function(event) {

                //anula a ação do submit tradicional "botao" ou F5
                //event.preventDefault();

                jQuery.ajax({
                  type: "POST",
                  url: "router.php?controller=usuarios&modo=alterar_dados&id_usuario=<?php echo($id_usuario); ?>",

                  //Foi utilizado o FormData para o resgate da foto do usuario
                  //Pois o serialize() nao tem o suporte essencial para tal função
                  data: new FormData($("#form_modal_editar_perfilUsuario")[0]),

                  cache:false,
                  contentType:false,
                  processData:false,
                  async:true,

                  success: function(dados){
                    //alert(dados);
                    $('.modal').html(dados);
                  }
                });

              });

              return false;

            });

            //Trazer informações do usuario cadastrado
            $.ajax({"url":"router.php?controller=usuarios&modo=buscarAJAX&id_usuario=<?php echo($id_usuario); ?>"}).done(
              function(data){

                //alert('teste');
                //alert(data);

               var user = jQuery.parseJSON(data);

                  $("[name='nome_usuario']").val( user.nome_usuario);
                  $("[name='email_usuario']").val( user.email_usuario);
                  $("[name='rua_usuario']").val( user.rua_usuario);
                  $("[name='bairro_usuario']").val( user.bairro_usuario);
                  $("[name='numero_usuario']").val( user.numero_usuario);
                  $("[name='telefone_usuario']").val( user.telefone_usuario);
                  $("[name='celular_usuario']").val( user.celular_usuario);
                  $("[name='rg_usuario']").val( user.rg_usuario);
                  $("[name='senha_usuario']").val( user.senha_usuario);

                  //poder vizualizar informações no console do inspecionar
                  console.log(user);

                  //trazer a imagem do usuario atraves do atributo src
                  var foto = $("#img_perfil_usuario").attr("src");
                  $("#img_perfil_usuario_modal").attr("src", foto );

                  $("[name='btnCadastrar']").val( "ALTERAR");

              });


      });

   //alert('teste');
   $("#mascara_usuario").click( function(){
    $(this).hide();
    $(".window").hide();
   });

   //alert('teste');
   $('.mascara_usuario').click(function(ev){
    ev.preventDefault();
    $("#mascara").hide();
    $(".window").hide();
   });

  });

  $(document).ready(function(){

    $("a[rel=modal]").click( function(ev){
      //alert('teste');
      //$("#editar_perfilUsuario").slideToggle(1000);

      ev.preventDefault();

      var mod = this;

          //Fazendo a modal
          //alert('teste');
          var id = $(mod).attr("href");
          var alturaTela = $(document).height();
          var larguraTela = $(window).width();

          //colocando o fundo preto
          //alert('teste');
          $('#mascara_usuario').css({'width':larguraTela,'height':alturaTela});
          $('#mascara_usuario').fadeIn(1000);
          $('#mascara_usuario').fadeTo("slow",0.8);

          //alert('teste');
          var left = ($(window).width() /2) - ( $(id).width() / 2 );
          var top = ($(window).height() / 2) - ( $(id).height() / 2 );

          $(id).css({'top':top,'left':left});
          $(id).show();

    });

 //alert('teste');
 $("#mascara_usuario").click( function(){
  $(this).hide();
  $(".window").hide();
 });

 //alert('teste');
 $('.mascara_usuario').click(function(ev){
  ev.preventDefault();
  $("#mascara").hide();
  $(".window").hide();
 });

});

</script>

<!-- ========================================= Script para Modal ========================================= -->
 <script>
    $(document).ready(function(){
      $("a[rel=modal]").click( function(ev){
        ev.preventDefault();

        var mod = this;

            var id = $(mod).attr("href");

            var alturaTela = $(document).height();
            var larguraTela = $(window).width();

            //colocando o fundo preto
            $('#mascara').css({'width':larguraTela,'height':alturaTela});
            $('#mascara').fadeIn(1000);
            $('#mascara').fadeTo("slow",0.8);

            var left = ($(window).width() /2) - ( $(id).width() / 2 );
            var top = ($(window).height() / 2) - ( $(id).height() / 2 );

            $(id).css({'top':top,'left':left});
            $(id).show();


   });

   $("#mascara").click( function(){
    $(this).hide();
    $(".window").hide();
   });

   $('.fechar').click(function(ev){
    ev.preventDefault();
    $("#mascara").hide();
    $(".window").hide();
   });

  });

</script>


<!-- ========================================= Script para o slider ========================================= -->
<script>
  var index = 1;

  function plusIndex(n){
    index = index + n;
    showImage(index);
  }

  showImage(1);

  function showImage(n){
    var i;
    var x = document.getElementsByClassName("slides");
    if(n > x.length){index = 1};
    if(n < 1){index = x.length};
    for(i=0;i<x.length;i++)
      {
        x[i].style.display = "none";
      }
    x[index-1].style.display = "block";
  }


</script>




<!-- ========================================= Script para o superslider (promoções) ========================================= -->
<script>
  $(function() {
    $('#slides').superslides({
      hashchange: true
    });
  });
</script>

<!-- ========================================= Script para o calendario ========================================= -->
<script type='text/javascript'>
$(function() {
   $('#calendario').datepicker({ minDate: 0,
     changeMonth: true,
     changeYear: true,

     dateFormat: 'dd/mm/yy',
     dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
     dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
     dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
     monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
     monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']

     ,
     nextText: 'Próximo',
     prevText: 'Anterior'



   });
});

$(function() {
  $('#calendario2').datepicker({ minDate: 0,
    changeMonth: true,
    changeYear: true,

    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']

    ,
    nextText: 'Próximo',
    prevText: 'Anterior'





  });

});

</script>

<!-- ========================================= Style e Script para o slide de imagens da Area da Reserva ========================================= -->
<style>
body {
  margin: 0;
  padding: 0;
}
a {
  color: #09f;
}
a:hover {
  text-decoration: none;
}
#back_to_camera {
  clear: both;
  display: block;
  height: 80px;
  line-height: 40px;
  padding: 20px;
}
.fluid_container {
  margin: 0 auto;
  width:500px;
}
</style>

<!-- Pegando Scripts -->
<!--
<script type='text/javascript' src='scripts_slide_areaReserva/jquery.min.js'></script>-->
<script type='text/javascript' src='scripts_slide_areaReserva/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='scripts_slide_areaReserva/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='scripts_slide_areaReserva/camera.min.js'></script>

<script>
jQuery(function(){
  jQuery('#camera_wrap_2').camera({
    height: '400px',
    loader: 'bar',
    pagination: false,
    thumbnails: true
  });
});
</script>

<!-- ========================================= Script para formar a mascara dos cadastros ========================================= -->

<script type="text/javascript">
function verificaNumero(e){
  if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
    return false;
  }
}

$(document).ready(function(){

  //***** USUARIO *****
  $("#telefone_usuario").keypress(verificaNumero);
  $("#celular_usuario").keypress(verificaNumero);
  $("#cpf_usuario").keypress(verificaNumero);
  $("#rg_usuario").keypress(verificaNumero);

  //***** HOTELEIRO *****
  $("#telefone_hotel").keypress(verificaNumero);
  $("#cnpj_hotel").keypress(verificaNumero);

});

function FormataTel(evt){
  vr = (navigator.appName == "Netscape") ?evt.target.value : evt.srcElement.value;

    if(vr.length == 0)vr = vr+"(";
    if(vr.length == 3)vr = vr+")";
    if(vr.length == 8) vr = vr+"-";

  return vr;
}

function FormataCel(evt){
  vr = (navigator.appName == "Netscape") ?evt.target.value : evt.srcElement.value;

  if(vr.length == 0)vr = vr+"(";
  if(vr.length == 3)vr = vr+")";

  return vr;
}

function FormataCpf(evt){
  vr = (navigator.appName == "Netscape") ?evt.target.value : evt.srcElement.value;

    if(vr.length == 3) vr = vr+".";
    if(vr.length == 7) vr = vr+".";
    if(vr.length == 11) vr = vr+"-";

  return vr;
}

function FormataRg(evt){
  vr = (navigator.appName == "Netscape") ?evt.target.value : evt.srcElement.value;

    if(vr.length == 2) vr = vr+".";
    if(vr.length == 6) vr = vr+".";
    if(vr.length == 10) vr = vr+"-";

  return vr;
}

function FormataCnpj(evt){
  vr = (navigator.appName == "Netscape") ?evt.target.value : evt.srcElement.value;

    if(vr.length == 2) vr = vr+".";
    if(vr.length == 6) vr = vr+".";
    if(vr.length == 10) vr = vr+"/";
    if(vr.length == 15) vr = vr+"-";

  return vr;
}

</script>
