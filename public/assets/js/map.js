 window.onload = function () {
//Declaracion de variables

var depMeta = document.getElementById("depMeta");
var acacias = document.getElementById("acacias");
var barrancadeUpia = document.getElementById("barrancadeUpia");
var cabuyaro = document.getElementById("cabuyaro");
var castillaLanueva = document.getElementById("castillaLanueva");
var cubarral = document.getElementById("cubarral");
var cumaral = document.getElementById("cumaral");
var elCalvario = document.getElementById("elCalvario");
var elDorado = document.getElementById("elDorado");
var elCastillo = document.getElementById("elCastillo");
var fuentedeOro = document.getElementById("fuentedeOro");
var granada = document.getElementById("granada");
var guamal = document.getElementById("guamal");
var laMacarena = document.getElementById("laMacarena");
var laUribe = document.getElementById("laUribe");
var lejanias = document.getElementById("lejanias");
var mapiripan = document.getElementById("mapiripan");
var mesetas = document.getElementById("mesetas");
var ptoConcordia = document.getElementById("ptoConcordia");
var ptoGaitan = document.getElementById("ptoGaitan");
var ptoLleras = document.getElementById("ptoLleras");
var ptoLopez = document.getElementById("ptoLopez");
var ptoRico = document.getElementById("ptoRico");
var restrepo = document.getElementById("restrepo");
var sancarlosdeGuaroa = document.getElementById("sancarlosdeGuaroa");
var sanjuandeArama = document.getElementById("sanjuandeArama");
var sanJuanito = document.getElementById("sanJuanito");
var sanMartin = document.getElementById("sanMartin");
var vistaHermosa = document.getElementById("vistaHermosa");
var villavicencio = document.getElementById("villavicencio");


  
//Eventos al click
  acacias.onclick = function(){ 
  //alert("haz hecho click en  acacias"); 
  $("#myModal").show();
  //contenido
  $.ajax({
    type: "GET",
    url: "/municipios/Acacias",
     success: function(a) {
       $('.contenido').html(a);
      }
    });
  }
 barrancadeUpia.onclick = function(){ 
  //alert("haz hecho click en barranca de upia"); 
  $("#myModal").show();
  $.ajax({
    type: "GET",
    url: "/municipios/Barranca-de-Upia",
      success: function(a) {
        $('.contenido').html(a);
      }
    });
  } 
  cabuyaro.onclick = function(){ 
  //alert("haz hecho click en cabuyaro"); 
  $("#myModal").show();
  $.ajax({
    type: "GET",
    url: "/municipios/Cabuyaro",
      success: function(a) {
        $('.contenido').html(a);
      }
    });
  }
  castillaLanueva.onclick = function () {
    //alert("haz hecho click en castilla la nueva"); 
    $("#myModal").show();
    $.ajax({
      type: "GET",
      url: "/municipios/Castilla-la-Nueva",
      success: function (a) {
        $('.contenido').html(a);
      }
    });
  }
   cubarral.onclick = function () {
     //alert("haz hecho click en cubarral"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Cubarral",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   cumaral.onclick = function () {
     //alert("haz hecho click en cumaral"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Cumaral",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   elCalvario.onclick = function () {
     //alert("haz hecho click en el calvario"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/El-Calvario",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   elCastillo.onclick = function () {
     //alert("haz hecho click en el castillo"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/El-Castillo",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   elDorado.onclick = function () {
     //alert("haz hecho click en el el dorado"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/El-Dorado",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   fuentedeOro.onclick = function () {
     //alert("haz hecho click en fuente de oro"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Fuente-de-Oro",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   granada.onclick = function () {
     //alert("haz hecho click en granada"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Granada",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }   
   guamal.onclick = function () {
     //alert("haz hecho click en guamal"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Guamal",
       success: function (a) {
         $('.contenido').html(a);

       }
     });
   }
    laMacarena.onclick = function(){ 
      //alert("haz hecho click en la macarena"); 
      $("#myModal").show();
      $.ajax({
        type: "GET",
        url: "/municipios/La-Macarena",
        success: function(a) {        
        $('.contenido').html(a);
        }
      });
    }
laUribe.onclick = function(){ 
	//alert("haz hecho click en la uribe"); 
	$("#myModal").show();
	$.ajax({
    type: "GET",
    url: "municipios/La-Uribe",
    success: function(a) {
      $('.contenido').html(a);
      }
    });
  }
   lejanias.onclick = function () {
     //alert("haz hecho click en lejanias"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Lejanias",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   mapiripan.onclick = function () {
     //alert("haz hecho click en mapiripan"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Mapiripan",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   mesetas.onclick = function () {
     //alert("haz hecho click en mesetas"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Mesetas",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   ptoConcordia.onclick = function () {
     //alert("haz hecho click en puerto concordia"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "municipios/Puerto-Concordia",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   ptoGaitan.onclick = function () {
     //alert("haz hecho click en puerto gaitan");
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Puerto-Gaitan",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   ptoLleras.onclick = function () {
     //alert("haz hecho click en ptolleras"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Puerto-Lleras",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   ptoLopez.onclick = function () {
     //alert("haz hecho click en puerto lopez"); 
     $("#myModal").show();
     $.ajax({
       type: "/municipios/Puerto-Lopez",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   ptoRico.onclick = function () {
     //alert("haz hecho click en puerto rico"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Puerto-Rico",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   restrepo.onclick = function () {
     //alert("haz hecho click en restrepo"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Restrepo",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   sancarlosdeGuaroa.onclick = function () {
     //alert("haz hecho click en san carlos de guaroa"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/San-Carlos-de-Guaroa",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   sanjuandeArama.onclick = function () {
     //alert("haz hecho click en san juan de arama"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/San-Juan-de-Arama",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   sanJuanito.onclick = function () {
     //alert("haz hecho click en san juanito"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/San-Juanito",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   sanMartin.onclick = function () {
     //alert("haz hecho click en san martin"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/San-Martin",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   } 
   vistaHermosa.onclick = function () {
     //alert("haz hecho click en vistahermosa"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Vista-Hermosa",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }
   villavicencio.onclick = function () {
     //alert("haz hecho click en villavicencio"); 
     $("#myModal").show();
     $.ajax({
       type: "GET",
       url: "/municipios/Villavicencio",
       success: function (a) {
         $('.contenido').html(a);
       }
     });
   }	

//Hover
//$('#depMeta').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#laMacarena').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#laUribe').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#mesetas').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#vistaHermosa').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#elDorado').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#cubarral').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#guamal').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#castillaLanueva').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#acacias').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#sancarlosdeGuaroa').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#villavicencio').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#elCalvario').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#sanJuanito').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#restrepo').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#cumaral').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#lejanias').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#elCastillo').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#granada').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#sanjuandeArama').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#fuentedeOro').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#ptoLleras').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#sanMartin').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#ptoRico').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#ptoConcordia').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#mapiripan').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#barrancadeUpia').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#cabuyaro').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#ptoGaitan').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});
$('#ptoLopez').hover( function () {$(this).addClass('hvr-bob'); }, function () { $(this).removeClass('hvr-bob');});



}