(function($){
	
$.fn.val_Email = function($button, $mensage, $dirc, $div){
  var $input =$(this);
  
		$('#'+$button).click(function(e){			
			if($('#'+$input.attr('id')).val().indexOf('@', 0) == -1 || $('#'+$input.attr('id')).val().indexOf('.', 0) == -1){
				  e.preventDefault(); 
				  $input.css({"border":"1px dashed #FF0048"}).fadeTo('slow',0.2).fadeTo('slow',1.0);
				  if(($('#'+$div+' > font').attr('class')!='font_v')&&($mensage=='true')){	  $('#'+$div).html('<font class="font_v" color="#FF0048"> <img width="18" height="18" src="'+$dirc+'" /> La dirección e-mail parece incorrecta!</font>');				
				 	 $('#'+$div).fadeIn('slow');
				  }		
				  		 
				  $input.focus(function(e1){
						$input.css({"border":""});
						$('#'+$div).fadeOut('fast',function(e2){ 
							$('#'+$div+' > font.font_v').remove();	
						});															 
				  });				
			 }
		});				
	return this;			
}	
	
/*Validar campos en blanco*/	
$.fn.clearFile = function($button,$mensage,$dirc,$div){  
/*$mensage:Si quiere que debajo del campo en vacio salga un mensage. Pasar por parámetro:'true', de lo contrario no pasarle
 ningún parámetro.*/
/*En caso de marcar true en $mensage, introducir en $dirc la dirección del icono */
/*$div: En caso de marcar true en $mensage, introducir en $div el id del div donde quiero que se muestre el error*/
/*$button: Es el id del botón al que le voy a realizar el efecto click()*/

	var $input =$(this);
	/*Para evitar que se precione espacio cuando no hay nada en el textfield*/
	  	$('#'+$input.attr('id')).keypress(function(e){																
					if(String.fromCharCode(e.which) == " "){
						if($input.val()==''){
						 	e.preventDefault();
						}
					}										
		});
	/*fin*/
		$('#'+$button).click(function(e){			
			if($input.val()==''){
				  e.preventDefault(); 
				  $input.css({"border":"1px dashed #FF0048"}).fadeTo('slow',0.2).fadeTo('slow',1.0);
				  if(($('#'+$div+' > font').attr('class')!='font_v')&&($mensage=='true')){	  
					  $('#'+$div).html('<font class="font_v" color="#000" style="margin-left: 0.5em"> <img width="18" height="18" src="'+$dirc+'" /> Erro ao Guardar!</font>').fadeTo('slow',0.2).fadeTo('slow',1.0);				
				 	  $('#'+$div).fadeIn('slow');
				  }				 
				  $input.focus(function(e1){
						$input.css({"border":""});
						$('#'+$div).fadeOut('fast',function(e2){ 
							$('#'+$div+' > font.font_v').remove();	
						});															 
				  });				
			 }
		});				
	return this;
}
/*Fin*/


/*Validar selecct*/
$.fn.validar_selecct = function($button,$mensage,$dirc,$div){  
/*$mensage:Si quiere que debajo del campo en vacio salga un mensage. Pasar por parámetro:'true', de lo contrario no pasarle
 ningún parámetro.*/
/*En caso de marcar true en $mensage, introducir en $dirc la dirección del icono */
/*$div: En caso de marcar true en $mensage, introducir en $div el id del div donde quiero que se muestre el error*/
/*$button: Es el id del botón al que le voy a realizar el efecto click()*/
/*NOTA: para que se ejecute poner en el value del selecct 0*/
	var $input =$(this);	
		$('#'+$button).click(function(e){			
			if($input.val()=='0'){
				  e.preventDefault();
				  $input.css({"border":"1px dashed #FF0048"}).fadeTo('slow',0.2).fadeTo('slow',1.0);
				  if(($('#'+$div+' > font').attr('class')!='font_v')&&($mensage=='true')){										  
					 $('#'+$div).html('<font class="font_v" color="#000" style="margin-left: 0.5em"><img width="18" height="18" src="'+$dirc+'" /> Erro ao Guardar!</font>').fadeTo('slow',0.2).fadeTo('slow',1.0);;				
				 	 $('#'+$div).fadeIn('fast');						
				  }
				  $input.focus(function(e1){
						$input.css({"border":""});
						$('#'+$div).fadeOut('fast',function(e2){ 
							$('#'+$div+' > font.font_v').remove();	
						});									 
				  });				
			 }
		});				
	return this;
}
/*Fin*/


/*Validar si hay espacios en blanco*/	
$.fn.validar_esp = function($button,$mensage,$dirc,$div){ 
/*$mensage:Si quiere que debajo del campo en vacio salga un mensage. Pasar por parámetro:'true', de lo contrario no pasarle
 ningún parámetro.*/
/*En caso de marcar true en $mensage, introducir en $dirc la dirección del icono */
/*$div: En caso de marcar true en $mensage, introducir en $div el id del div donde quiero que se muestre el error*/
/*$button: Es el id del botón al que le voy a realizar el efecto click()*/
	 	var $input =$(this);
		$('#'+$button).click(function(e){
			var $esp = false;				
			$.each($input.val(),function(index,dat){ 				
					if(dat == " "){
						$esp = true;
					}				
			});
			if($esp==true){				  
				  if(($('#'+$div+' > font').attr('class')!='font_v')&&($mensage=='true')){	
				  	  e.preventDefault();
				  	  $input.css({"border":"1px dashed #FF0048"}).fadeTo('slow',0.2).fadeTo('slow',1.0);									  
					$('#'+$div).html('<font class="font_v" color="#FF0048"><img width="18" height="18" src="'+$dirc+'" />Error! Verifique los Espacios!</font>');				
				 	 $('#'+$div).fadeIn('fast');	
				  }
				  $input.focus(function(e1){
						$input.css({"border":""});
						$('#'+$div).fadeOut('fast',function(e2){ 
							$('#'+$div+' > font.font_v').remove();	
						});									 
				  });				
			 }
		});				
	return this;
}
/*Fin*/


/*Validar mínimo de caracteres*/	
$.fn.validar_min = function($button,$cart,$mensage,$dirc,$div){ 
/*$mensage:Si quiere que debajo del campo en vacio salga un mensage. Pasar por parámetro:'true', de lo contrario no pasarle
 ningún parámetro.*/
/*En caso de marcar true en $mensage, introducir en $dirc la dirección del icono */
/*$div: En caso de marcar true en $mensage, introducir en $div el id del div donde quiero que se muestre el error*/
/*$button: Es el id del botón al que le voy a realizar el efecto click()*/
/*$cart: valor mínimo de caracteres permitidos*/
	var $input =$(this);	
		$('#'+$button).click(function(e){ 			
			if($input.val().length < $cart){				 				  
				  if(($('#'+$div+' > font').attr('class')!='font_v')&&($mensage=='true')){
					   e.preventDefault(); 
					  $input.css({"border":"1px dashed #FF0048"}).fadeTo('slow',0.2).fadeTo('slow',1.0);	
				      $('#'+$div).html('<font class="font_v" color="#FFF"> <img width="18" height="18" src="'+$dirc+'" /> Valor de caracteres mínimo incorrecto: '+$cart+' !</font>');				
				 	 $('#'+$div).fadeIn('fast');									  						
				  }
				  $input.focus(function(e1){
						$input.css({"border":""});
						$('#'+$div).fadeOut('fast',function(e2){ 
							$('#'+$div+' > font.font_v').remove();	
						});									 
				  });				
			 }
		});				
	return this;
}
/*Fin*/




/*Para validar números*/	
$.fn.val_num = function($tipo){ 
/*Para $tipo los valores son: 'int' o 'double'*/
	var $input =$(this);
	/*Para validar solo números: enteros*/
	if($tipo=='int'){ 
		$('#'+$input.attr('id')+'').keypress(function(e){
			if((String.fromCharCode(e.which)!="1")&&(String.fromCharCode(e.which)!="2")&&(String.fromCharCode(e.which)!="3")&&
			   (String.fromCharCode(e.which)!="4")&&(String.fromCharCode(e.which)!="5")&&(String.fromCharCode(e.which)!="6")&&
			   (String.fromCharCode(e.which)!="7")&&(String.fromCharCode(e.which)!="8")&&(String.fromCharCode(e.which)!="9")&&
			   (String.fromCharCode(e.which)!="0")&&(e.which!=0)&&(e.which!=8)){							
				  e.preventDefault();							
			}
		});		
	}
	
	/*Para validar solo números: enteros y con coma*/
	if($tipo=='double'){
		$('#'+$input.attr('id')+'').keypress(function(e){
			if((String.fromCharCode(e.which)!="1")&&(String.fromCharCode(e.which)!="2")&&(String.fromCharCode(e.which)!="3")&&
			   (String.fromCharCode(e.which)!="4")&&(String.fromCharCode(e.which)!="5")&&(String.fromCharCode(e.which)!="6")&&
			   (String.fromCharCode(e.which)!="7")&&(String.fromCharCode(e.which)!="8")&&(String.fromCharCode(e.which)!="9")&&
			   (String.fromCharCode(e.which)!="0")&&(e.which!=0)&&(e.which!=8)){							
				  
				if(String.fromCharCode(e.which)=="."){
						if(($input.attr("value").indexOf(".")!=-1)||($input.attr("value").length==0)){
							  e.preventDefault();
					    }
				   }else				
				if(String.fromCharCode(e.which)=="-"){
						if(($input.attr("value").indexOf("-")!=-1)||($input.attr("value").length!=0)){
							  e.preventDefault();
					    }
				   }else e.preventDefault();
				   							
			}
		});		
	}
	
	return this;
}
/*Fin*/
/*Validar solo texto, no acepta números*/	
$.fn.val_text = function(){ 
	var $input =$(this);	
	 
		$('#'+$input.attr('id')+'').keypress(function(e){ 
			if((String.fromCharCode(e.which)=="1")||(String.fromCharCode(e.which)=="2")||(String.fromCharCode(e.which)=="3")||
			   (String.fromCharCode(e.which)=="4")||(String.fromCharCode(e.which)=="5")||(String.fromCharCode(e.which)=="6")||
			   (String.fromCharCode(e.which)=="7")||(String.fromCharCode(e.which)=="8")||(String.fromCharCode(e.which)=="9")||
			   (String.fromCharCode(e.which)=="0")){							
				  e.preventDefault();							
			}
		});		
	
	
	return this;
}
/*Fin*/	


/*Validar campos en blanco de fecha*/	
$.fn.validar_fecha = function($button,$mensage,$dirc){ 
/*$mensage:Si quiere que debajo del campo en vacio salga un mensage. Pasar por parámetro:'true', de lo contrario no pasarle
 ningún parámetro.*/
/*En caso de marcar true en $mensage, introducir en $dirc la dirección del icono */
/*$button: Es el id del botón al que le voy a realizar el efecto click()*/
	var $input =$(this);
	/*Para evitar que se escriba en el textfield*/
	  	$('#'+$input.attr('id')).keypress(function(e){																										
				e.preventDefault();																					
		});
	/*fin*/
		$('#'+$button).click(function(e){			
			if($input.val()==''){
				  e.preventDefault();
				  $input.css({"border":"1px dashed #FF0048"}).fadeTo('slow',0.2).fadeTo('slow',1.0);
				  if(($('#'+$input.attr('id')+' ~ font').attr('class')!='font_v')&&($mensage=='true')){										  
					$('#'+$input.attr('id')+'~ button').after('<font class="font_v" size="1" color="#b11f1f"><br /> <img class="" width="10" height="10" src="'+$dirc+'" /> Este campo es obligatorio </font>');	
				  }
				  $('#'+$input.attr('id')+'~ button').focus(function(e1){
						$input.css({"border":""}); 
						$('#'+$input.attr('id')+' ~ font.font_v').remove();															 
				  });				
			 }
		});				
	return this;
}
/*Fin*/

/*Validar si el valor del campo existe en la BD (ej. comprobar si el usuario existe)*/	
$.fn.validar_existe_camp = function($direcM, $error, $button,$tabla,$campo){ 
/*$direcM: Dirección donde se encuentra el archivo donde se va a ejecutar la consulta Ej: Manejadora.php */
/*$error: id del font donde se encuentra el error a mostrar */
/*$button: id del botón que se decee ocultar*/
/*$tabla: nombre de la tabla en la que se buscará el campo*/
/*$campo: nombre del campo de la condición (where)*/
/*NOTA: La acción se denomina comprobarC y el nombre del post text*/

	var $input =$(this);		
		$('#'+$input.attr('id')).keyup(function(e){ 	
		$text   = $input.attr('value');	
			$.ajax({ 
							type:"POST",
							url:$direcM, 
							data:"accion=ComprobarC&text="+$text+"&tabla="+$tabla+"&campo="+$campo,
							success: function(data){ 
							data = eval(data);		  			       	   			   
							if(data=="existe"){														  
							$( '#'+$error ).show("fast");						   
							$('#'+$button).fadeOut('fast');
							}else{
							    $( '#'+$error ).hide("fast");
								$('#'+$button).fadeIn('fast');
							}
						}
			});
		});				
	return this;
}
/*Fin*/

	
})(jQuery);