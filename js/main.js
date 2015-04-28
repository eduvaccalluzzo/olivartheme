var documento = $(document);
var ventana = $(window);



/* Header 
–––––––––––––––––––––––––––––––––––––––––––––––––– */

ventana.on('scroll', olivar_cambio_menu);
documento.on('ready', olivar_cambio_menu);

function olivar_cambio_menu(){

	if(ventana.scrollTop() > 100){
		$('header').removeClass('top').addClass('scroll');
	}else{
		$('header').removeClass('scroll').addClass('top');
	}

}

/*
function olivar_cambio_submenu(){

  if(ventana.scrollTop() > 100){
    $('ul.sub-menu').removeClass('top').addClass('scroll');
  }else{
    $('ul.sub-menu').removeClass('scroll').addClass('top');
  }

}*/



/* Acordeón
–––––––––––––––––––––––––––––––––––––––––––––––––– */

$('dl.acordeon dd').not('dl.acordeon dt.activo + dd').hide(); 

 $('dl.acordeon dt').click(function(){
   if ($(this).hasClass('activo')) {

        $(this).removeClass('activo');
        $(this).next('dd').slideUp(400);

   } else {

        $('dl.acordeon dt').removeClass('activo');
        $(this).addClass('activo');
        $('dl.acordeon dd').slideUp(400);
        $(this).next('dd').slideDown(600);
   }
});





/* Popup
–––––––––––––––––––––––––––––––––––––––––––––––––– */

documento.on('ready',function(){
  $('.pop').children('a').addClass('open-popup-link');
});


documento.on('ready',byadr_popup_form);

function byadr_popup_form(){

  $('.open-popup-link').magnificPopup({
      type: 'inline',
      midClick: true,

      src: '#'

  });

  $('.gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Cargando imagen #%curr%...',
    mainClass: 'mfp-img-mobile',
    showCloseBtn: false,
    gallery: {
      enabled: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">La imagen #%curr%</a> no se ha cargado.',
      titleSrc: function(item) {
        return item.el.attr('title') ;
      }
    }
  });
}





/* Focus
–––––––––––––––––––––––––––––––––––––––––––––––––– */

$('.input-container input').focus(function(){
  $(this).parents('.input-container').find('.input-title').addClass('focus');
});

$('.input-container input').focusout(function(){
  var contenido = $(this).val().length;
    
  console.log(contenido);
  
  if( contenido == 0){
    $(this).parents('.input-container').find('.input-title').removeClass('focus');
  }

});




$('.input-textarea textarea').focus(function(){
  $(this).parents('.input-textarea').find('.input-title').addClass('focus');
});

$('.input-textarea textarea').focusout(function(){
  var contenido = $(this).val().length;
    
  console.log(contenido);
  
  if( contenido == 0){
    $(this).parents('.input-textarea').find('.input-title').removeClass('focus');
  }

});






/* Menu Mobile
–––––––––––––––––––––––––––––––––––––––––––––––––– */


$('.mobileNav').on('click',byadr_mostrar_menu_responsive);

function byadr_mostrar_menu_responsive () {
  $('.mobileNav .menu-menu-principal-container').toggleClass('right_ok');

}






























 