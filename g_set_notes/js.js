//url general para el js.
var _url ='../g_set_notes/php.php';

$(document).ready(function(e) {
    	
    $( '#viewPDN' ).css('display', 'none');
	$( '#disciplina' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#tipo_eval' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');	
	$( '#id_turma'     ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');	

	__GET_COMBOXS_('disciplina', 'get_DISC', 'dDesc', _url); 
	__GET_COMBOXS_('tipo_eval', 'get_EVAL&id='+$('#disciplina').val(), 'tipo' , _url); 
	
	
	_getGrelha_();	
	__GET_COMBOXS_('id_turma', 'get_TURMA&grelha='+$('#grelha').val(), 'tDesc', '../g_Professor_Disciplina/php.php');
	$('#grelha').change(function (){ __GET_COMBOXS_('id_turma'     , 'get_TURMA&grelha='+$('#grelha').val(), 'tDesc', '../g_Professor_Disciplina/php.php'); });
	
	
	$('#disciplina').change(function (){ __GET_COMBOXS_('tipo_eval', 'get_EVAL&id='+$('#disciplina').val(), 'tipo' , _url); __LOAD_();	 });	
	$('#tipo_eval, #grelha, #id_turma').change(function (){ __LOAD_(); });
	__LOAD_();		
});


function __SAVE_(){ 
	
	_DELL_ALL();   //limpiar notas 
	data =__DATA_OFF();
	hora =__HORA_OFF();
	 	 
	$('#_stu').find(':input').each(function(){ 	   	
	 arr =[];	  
	 arr.push ({"name":"id"        ,   "value":$('#id'         ).val() });	
	 arr.push ({"name":"disciplina",   "value":$('#disciplina' ).val() });
	 arr.push ({"name":"tipo_eval" ,   "value":$('#tipo_eval'  ).val() });	
	 arr.push ({"name":"data"      ,   "value":data  				   });
	 arr.push ({"name":"turma"     ,   "value":$('#id_turma'   ).val() });	 
	
	if ($(this).attr('id').split('-')[1] != 'x'){	
		
	 var id =$(this).attr('id'); arr.push ({"name":"estudiante", "value":id   });			
	 var nota =$(this).val();	 arr.push ({"name":"nota"      , "value":nota });
	
     //log
	 $(dt_notas).each(function (i, dat){               
	   if (dat.id ==id && dat.nota !=nota){ 
		   
		  ar =[];
		  ar.push({"name":"id"          , "value":'-'					 });
		  ar.push({"name":"disciplina"  , "value":$('#disciplina' ).val()});
		  ar.push({"name":"usuario"     , "value":$('#uId'        ).val()});
		  ar.push({"name":"tipo_eval"   , "value":$('#tipo_eval'  ).val()});
		  ar.push({"name":"turma"       , "value":$('#id_turma'   ).val()});
		  ar.push({"name":"estudante"   , "value":id                     });
		  ar.push({"name":"nota_antiga" , "value":dat.nota               });
		  ar.push({"name":"nota_nova"   , "value":nota                   });
		  ar.push({"name":"data"        , "value":data                   });
		  ar.push({"name":"hora"        , "value":hora                   });
		  
		  var datt ={ accion:"_SAVE", _form:ar, t_name:"log_notas" };			   
          _SAVE_(datt, 'disciplina', '../_php/__all_view.php');	
	   }
	 });/////////////
		
	 id =$(this).attr('id') +'-x'; 	
	 arr.push ({"name":"observacao",   "value":$('#'+id).val()});	
		
	    var dat ={ accion:"_SAVE", _form:arr, t_name:"estudiante_notas" };	 
        _SAVE_(dat, 'disciplina', '../_php/__all_view.php');		
	}		
	});
	
	 __LOAD_(); 
     __BUTTON_();
	
}//---------------------------------------------------------------

//-------------------------------
function _SAVE_(dat, cmp, _url_){ 			       
	$.ajax({ type:"POST", url:_url_, data:dat, async:false }) 	     
	.done(function(data){ console.log(eval(data));
			$( '#error' ).html('<font color="#000"><img width="18" height="18" src="../images/mono-icons/check32.png" />Operação com sucesso!</font>');				
			$( '#error').fadeIn('slow');

			$( "#"+cmp ).focus(function(e1){
			$( '#error').fadeOut('fast', function(e2){ $('#error > font.font_v').remove(); }); });			

		 });
}


var dt_data;
function __LOAD_(){   
		
   $.ajax({ type:"POST", url:_url, data:{accion:"load", disc:$('#disciplina').val(), tur:$('#id_turma').val()}, async:false,      
		 success: function(data){
			 
			 var i =0;
			 dt_data =eval(data); 	
			       $('#_list').DataTable({ "destroy": true,
											  "data": dt_data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "cNome"    },												   																											   													   
													   {   "data": "div"       ,
														 "render": function ( data, type, row ) { 	
																	   return '<input type="text" name="'+row.id+'" id="'+row.id+'" max="20" min="0" />';							
											 		   }},
											           {   "data": "div"       ,
														 "render": function ( data, type, row ) { 	
																	   return '<input type="text" name="'+row.id+'-x" id="'+row.id+'-x" width="300px" />';							
													   }}
													  ],"language": dt_idioma,
										                "sDom"    : '<>t<"F">', "bJQueryUI": true
										  });
			 
			                              		  
   }});	
	  
   dt_notas =[];	
   $.ajax({ type:"POST", url:_url, data:{accion:"getNotes", disc:$('#disciplina').val(), tur:$('#id_turma').val(),eval:$('#tipo_eval').val()}, async:false,      
		 success: function(data){			 
			 
			 $(eval(data)).each(function (i, dat){				 
				 $('#'+dat[0]     ).val(dat[1]);  
				 $('#'+dat[0]+'-x').val(dat[2]);		
				 
				 dt_notas.push({id:dat[0], nota:dat[1], idN:dat[3]});
			 });
		 }});	
	//dt_notas.splice(dt_notas.length/2);	
}
var dt_notas;

function _getGrelha_(){ 
	$( '#grelha' ).html(''); 

   $.ajax({ type:"POST", url:'../g_Grelha/php.php', data:{accion:"load"}, 
	     success: function(data){ 
			data = eval(data); 

			se   = document.getElementById( 'grelha' );  			    
			    op = ''; 				
			 
			$.each(data, function(i, dat){  
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["gDesc"]+' ('+dat['cDesc']+')' +'</option>';	
		    });		
			
		    se.innerHTML = op; 
		}, async: false		
	});		
}
function _DELL_ALL(){
	 $.ajax({ type:"POST", url:_url, data:{accion:'dellAll', disc:$('#disciplina').val(), 
										                     tur :$('#id_turma'  ).val(),
										                     eval:$('#tipo_eval' ).val()}, async: false }).done(function(){ /****/ });
}
