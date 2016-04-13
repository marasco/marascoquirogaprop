 
var imageJopen = "<div align='center'><img src='images/loader.gif' /></div>";    
//0 means disabled; 1 means enabled;
var popupStatus = 0;
var idPopup = "#popupContact";
var idPopup2 = "popupContact";
//loading popup with jQuery magic!
function loadPopup(){
    //loads popup only if it is disabled
    if(popupStatus==0){
        $("#backgroundPopup").css({
            "opacity": "0.7"
        });
        $("#backgroundPopup").fadeIn("slow");
        $("#popupContact").fadeIn("slow");
        popupStatus = 1;
    }
}
function desplegarPopup(file,params){
loadPopup();
jopen(file,idPopup2, params,1);   
}
//disabling popup with jQuery magic!
function disablePopup(){
    //disables popup only if it is enabled
    if(popupStatus==1){
        $("#backgroundPopup").fadeOut("slow");
        $("#popupContact").fadeOut("slow");
        popupStatus = 0;
    }
}

//centering popup
function centerPopup(){
    //request data for centering
    var top = 100;
    var windowWidth = document.body.clientWidth;
    var windowHeight = document.body.clientHeight;  
    var popupHeight = $(idPopup).height();
    var popupWidth = $(idPopup).width();
    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ //test for MSIE x.x;
	 var ieversion=new Number(RegExp.$1) // capture x.x portion and store as a number
	   if(ieversion>6) {
		 getScrollHeight(top);
	   }
	} else {
	  getScrollHeight(top);
	}
   // alert(($(window).height()-$(window).outerHeight())/ 2 + 'px');
    //centering
    $(idPopup).css({
        "position": "absolute",
      //  "top": ($(window).height()-$(window).outerHeight())/ 2 + 'px', //windowHeight/2-popupHeight/2,
        "left": windowWidth/2-popupWidth/2
    });
    
    //only need force for IE6
	
    $("#backgroundPopup").css({
        "height": "3000px"
    });
	
}
function getScrollHeight(top) {
   
   var h = window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop;
           
	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
		
		var ieversion=new Number(RegExp.$1);
		
		if(ieversion>6) {
			$(idPopup).css({'top': h + top + 'px'});
		} else {
			$(idPopup).css({'top': top + 'px'});
		}
		
	} else {
		$(idPopup).css({'top': h + top + 'px'});
	}
	
}
$(document).ready(function() {
    jopen('propiedades.php','contenido','filter=0');
    $("#popupContactClose").click(function(){
        disablePopup();
    });
    $("#backgroundPopup").click(function(){
        disablePopup();
    });
    //Press Escape event!
    $(document).keypress(function(e){
        if(e.keyCode==27 && popupStatus==1){
            disablePopup();
        }
    });
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
            background:'#555555'
        }); 
    });
    $(".menu_item").mouseleave(function() {
        $(this).css({
            background:'#333333'
        }); 
    });
    $(".roundedcornr_box_507328").fadeTo(1000,0.9);
});
 
function changePic(prop,n){
    $("#pic_big").attr("src","../images/inmuebles/inm_"+prop+"_"+n+".jpg");
    //var width2 = $("#width_"+prop+"_"+n).val();
    $("#pic_big").attr("width", 480);
   // alert(width2);
    
    
}
function g(id){
    return document.getElementById(id);
}

function enviar_msg()
{
	
    jopen ('enviar_msg.php',"resultado_msg","from="+$("#contacto_de").val()+"&tel="+$("#contacto_tel").val()+"&mail="+$("#contacto_mail").val()+"&msg="+$("#contacto_msg").val());
}
function redirect(obj){
    jopen("admin/modificar.php","contenido","propiedad="+obj.value);

}
function deleteImg(id,n){
    jopen("admin/modificar.php","contenido","propiedad="+id+"&eliminar="+n);

}
function loadProp(id){
    location.href="index.php?id="+id;
}
function jopen (file,div_id,params,action){ 
    if ($("#"+div_id)){
        $("#"+div_id).html(imageJopen);
	}
    $.ajax({
        type: "POST",
        url:  file,
        data: params,
        error: function(a,b,c)
        {
            //jopen(file, div_id, params);
            $("#"+div_id).html('No se ha podido abrir. Intente mas tarde.');
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
                            background: "#F4F8EE"
                        });
 
                    });
                    $(".panelx").mouseleave(function(){
                        $(this).css({
                            background: "#FFFFFF"
                        });
                    });
                                                         
                    break;
                } 
                default:
                {
                    break;
                }
				
					
            }
             $(".button").mouseenter(function(){
                        $(this).css({
                            background: "#444444"
                        });
 
                    });
                   
                    $(".button").mouseleave(function(){
                        $(this).css({
                            background: "#000"
                        });
                    });	
            if (action){
                centerPopup(); //alert('centrado');
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
 
