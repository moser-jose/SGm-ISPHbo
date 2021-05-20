//url general para el js.
var _url ='../g_Professor_Disciplina/php.php';

$(document).ready(function(e) {
    	
    $( '#viewGPD'      ).css('display', 'none');
	$( '#id_professor' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#id_disciplina').clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#data'         ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#id_turma'	   ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');

	__GET_COMBOXS_('id_dpto'     , 'get_DPTO', 'descricao', '../g_Professor/php.php'); 
	__GET_COMBOXS_('id_professor', 'get_PROFE&dpto='+$('#id_dpto').val(), 'nome' , _url); 
	$('#id_dpto').change(function (){ __GET_COMBOXS_('id_professor', 'get_PROFE&dpto='+$('#id_dpto').val(), 'nome' , _url);   });
	
    _getGrelha_();
	__GET_COMBOXS_('id_disciplina', 'load&grelha='+$('#grelha').val(), 'dDesc', '../g_Disciplina/php.php');
	__GET_COMBOXS_('id_turma'     , 'get_TURMA&grelha='+$('#grelha').val(), 'tDesc', _url);
	$('#grelha').change(function (){ __GET_COMBOXS_('id_disciplina', 'load&grelha='+$('#grelha').val(), 'dDesc', '../g_Disciplina/php.php');  
								     __GET_COMBOXS_('id_turma'     , 'get_TURMA&grelha='+$('#grelha').val(), 'tDesc', _url);
									 __Checked_PROFE_TURMA();
								   });
	
	$('#id_proessor, #id_turma, #id_disciplina').change(function (){ __Checked_PROFE_TURMA(); });
	
	__LOAD_();		
});

function __Checked_PROFE_TURMA(){    
	
   $.ajax({ type:"POST", url: "php.php", data: { accion:"chek_PT", name:$( "#id_professor" ).val(), disc:$('#id_disciplina').val(), turma:$('#id_turma').val() }, async: false,
    success: function(data){  
			data = eval(data); 
					
			if (data != ''){ 
				  $( "#UE" ).fadeIn('slow'); 
				  $( "#_panel_b" ).fadeOut('slow');
			   }else{
				   $( "#UE"       ).fadeOut('slow');
                   $( "#_panel_b" ).fadeIn('slow');				   
			   }
			 
		}}); 
}

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



function __SAVE_(){ 	
  var dat ={ accion:"_SAVE"						,
			 t_name:"professor_disciplina"		,
			  _form:$('#_view').serializeArray() };
	
 dat._form.splice(1, 1);	
 dat._form.splice(2, 1);	
	
    ___SAVE_(dat, 'id_professor', '_view', '../_php/__all_view.php');			  
}//---------------------------------------------------------------
function __DELL_( id ){	var dat ={ accion:"_DELETE", t_name:"professor_disciplina", id:id };	
        ___DELL_(dat, '_view', '../_php/__all_view.php');
 }
//-------------------------------

var dt_data;
function __LOAD_(){   
   $.ajax({ type:"POST", url:_url, data:{accion:"load"}, async:false,      
		 success: function(data){
			 
			 var i =0;
			 dt_data =eval(data); 			  
			       $('#_list').DataTable({ "destroy": true,
											  "data": dt_data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "nome"      },												   																											   
													   {   "data": "dDesc"     },												   																											   
													   {   "data": "data"      },												   																											   
													   {   "data": "tDesc"     },												   																											   
													   {   "data": "div"        ,
														 "render": function ( data, type, row ) { 
																	   return '<div align="right"><img id="'+i+'" onClick="___Full_Form_(this.id,\'_view\')"  src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																	                             '<img id ="'+row.id+'" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>';							
													   }}         
													  ],"language": dt_idioma
										  });
			                              		  
   }});	
}


