jQuery(document).ready(function ($){
  // titles dinámicos
    if(window.location.href.indexOf("pedido/hacer") > -1) {
      document.title= 'Datos de envío' ;
  } 
  if(window.location.href.indexOf("carrito/index") > -1) {
      document.title= 'Carrito' ;
  } 
  if(window.location.href.indexOf("producto/ver") > -1) {
      document.title= 'Producto' ;
  }
  if(window.location.href.indexOf("pedido/confirmado") > -1) {
      document.title= 'Pedido registrado' ;
  } 
  if(window.location.href.indexOf("pedido/mis_pedidos") > -1) {
      document.title= 'Mis pedidos' ;
  }   
  if(window.location.href.indexOf("categoria/ver") > -1) {
      document.title= 'Categoría' ;
  }
  if(window.location.href.indexOf("categoria/index") > -1) {
      document.title= 'Gestionar categorías' ;
  }
  if(window.location.href.indexOf("categoria/crear") > -1) {
      document.title= 'Crear categoría' ;
  }
  if(window.location.href.indexOf("producto/gestion") > -1) {
      document.title= 'Gestión de productos' ;
  }
  if(window.location.href.indexOf("producto/crear") > -1) {
      document.title= 'Dar de alta producto' ;
  }
  if(window.location.href.indexOf("producto/editar") > -1) {
      document.title= 'Editar producto' ;
  }
  if(window.location.href.indexOf("pedido/gestion") > -1) {
      document.title= 'Gestionar pedidos' ;
  }
  if(window.location.href.indexOf("pedido/detalle") > -1) {
      document.title= 'Detalle del pedido' ;
  }
  if(window.location.href.indexOf("legal/terminosYCondiciones") > -1) {
      document.title= 'Términos y condiciones' ;
  }
  if(window.location.href.indexOf("legal/terminosDeUso") > -1) {
    document.title= 'Términos de uso' ;
  }
  if(window.location.href.indexOf("legal/politicaDePrivacidad") > -1) {
    document.title= 'Política de privacidad' ;
  }
  if(window.location.href.indexOf("legal/politicaDeCookies") > -1) {
    document.title= 'Política de cookies' ;
  }
  
  // welcome rotating texts
  $("#welcome .rotating").Morphext({
    animation: "flipInX",
    separator: ",",
    speed: 3000
  });

  // Back to top button
$(window).scroll(function () {

  if ($(this).scrollTop() > 100) {
    $('.back-to-top').fadeIn('slow');
  } else {
    $('.back-to-top').fadeOut('slow');
  }

});

$('.back-to-top').click(function () {
  $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
  return false;
});
})