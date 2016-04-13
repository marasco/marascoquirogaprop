 
$(function(){
    $('#slides').slides({
        preload: true,
        preloadImage: 'img/loading.gif',
        play: 3000,
        pause: 2000,
        hoverPause: true,
        animationStart: function(current){
            $('.caption').animate({
                bottom:-35
            },150);
          /*  if (window.console && console.log) {
                // example return of current slide number
                console.log('animationStart on slide: ', current);
            };*/
        },
        animationComplete: function(current){
            $('.caption').animate({
                bottom:0
            },100);
            /*if (window.console && console.log) {
                // example return of current slide number
                console.log('animationComplete on slide: ', current);
            };*/
        },
        slidesLoaded: function() {
            $('.caption').animate({
                bottom:0
            },100);
        }
    });
});
$(document).ready(function() {
    //jopen('propiedades.php','contenido','filter=0');
    $("#link_propiedades").click(function() {
        jopen('propiedades.php','contenido','filter=0');
    });
    $("#link_cargar").click(function() {
        jopen('admin/nuevo.php','contenido','filter=0');
    });
    $("#link_modificar").click(function() {
        jopen('admin/modificar.php','contenido','filter=0');
    });
    $("#link_salir").click(function() {
        location.href="index.php?out=1";
    });
    $("#link_login").click(function() {
        jopen('admin/index.php','contenido','filter=0');

    });
    $("#link_contacto").click(function () {
        jopen('contacto.php','contenido','filter=0');
    });
    $(".menu_item").mouseenter(function() {
        $(this).css({
            background:'#444444'
        }); 
    });
    $(".menu_item").mouseleave(function() {
        $(this).css({
            background:'#9D4747'
        }); 
    }); 
});
 
function changePic(prop,n){
    $("#pic_big").attr("src","images/inmuebles/inm_"+prop+"_"+n+".jpg");
}
function g(id){
    return document.getElementById(id);
}

function enviar_msg()
{
	
    jopen ('enviar_msg.php',"resultado_msg","from="+$("#contacto_de").val()+"&msg="+$("#contacto_msg").val());
}
function redirect(obj){
    jopen("admin/modificar.php","contenido","propiedad="+obj.value);

}
function deleteImg(id,n){
    jopen("admin/modificar.php","contenido","propiedad="+id+"&eliminar="+n);

}
function jopen (file,div_id,params){ 
    if ($("#"+div_id))
        $("#"+div_id).css({
            display:'none'
        });
	
    $.ajax({
        type: "POST",
        url:  file,
        data: params,
        error: function(a,b,c)
        {
            alert('Ha ocurrido un error');
        },
        success: function(result){ 
            if (result=='OKLogin')
                window.location.href = 'index.php';
                                    
            if ($("#"+div_id))
                $("#"+div_id).html(result).fadeTo(400,1);
            switch (file)
            {
                case 'admin/nuevo.php':
                {
                    $(".button").mouseenter(function() { 
                        $(this).css({
                            background:'#555555'
                        }); 
                    });
                    $(".button").mouseleave(function() {
                        $(this).css({
                            background:'#333333'
                        }); 
                    });
							

                    break;
                }
                case 'admin/index.php':
                {
                    $("#btn_Login").click(function () {
                        var n0 = $("#campo0").val();
                        var n1 = $("#campo1").val();
                        jopen('admin/checkLogin.php','error_ingreso','n0='+n0+'&n1='+n1);
                    });
                    break;
                } 
                case 'propiedades.php':
                {
                    $(".panelx").mouseenter(function(){
                        $(this).css({
                            background: "#ffc"
                        });

                    });
                    $(".panelx").mouseleave(function(){
                        $(this).css({
                            background: "#fff"
                        });
                    });
                    $(".panelx").click(function(){
                        jopen("detalle.php","contenido","id="+$(this).attr("id"));
                                                             
                    });
                    break;
                } 
                default:
                {
                    break;
                }
					
					
            }
            if (params.indexOf('image=1')>0)
            {
            //VentanaModal(result);
            }
        }
			
    }); 
} 
function open_desc(id)
{ 
 
	 
}
function eliminar(id)
{ 
    jopen ('propiedades.php','contenido','id='+id);
	 
}
function nueva_casa()
{
    jopen ('admin/guardar.php','error_ingreso','c0='+$('#campo0').val()+'&c1='+$('#campo1').val()+'&c2='+$('#campo2').val()+'&c3='+$('#campo3').val());
 
}
function login(){
	 
}
 
