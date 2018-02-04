

  //$(window).load(function() {


function definirCarrossel(idDiv) {

  $("#" + idDiv).flexisel({
      visibleItems: 3,
      itemsToScroll: 3,
      animationSpeed: 200,
      infinite: true,
      navigationTargetSelector: null,
      autoPlay: {
          enable: false,
          interval: 5000,
          pauseOnHover: true
      },

      loaded: function(object) {
          console.log('Slider loaded...');
      },
      before: function(object){
          console.log('Before transition...');
      },
      after: function(object) {
          console.log('After transition...');
      },
      resize: function(object){
          console.log('After resize...');
      }
  });
}

$(document).ready(function() {

  definirCarrossel("flexiselDemo1");
  definirCarrossel("flexiselDemo2");
  definirCarrossel("flexiselDemo3");
  definirCarrossel("flexiselDemo4");
  definirCarrossel("slide_verQuartos");


});
