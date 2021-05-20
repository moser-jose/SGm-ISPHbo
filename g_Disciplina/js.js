//url general para el js.
var _url ='../g_Disciplina/php.php';

$(document).ready(function(e) {
    	//for validate files
	$( '#dDesc'           ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();
	$( '#dAno_curricular' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('int');
	$( '#id_grelha'       ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');		
	$( '#id_tipo'         ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');		
	$( '#dCarga_h'        ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('int');	
	$( '#dSemestre'       ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');		
		
	//for load all users
	__GET_COMBOXS_('id_tipo', 'getTipo', 'tDesc', 'php.php');	
	 _getGrelha_();
	__LOAD_();	
	
	_set_Semestre();	
	$('#dAno_curricular' ).change(function(){ _set_Semestre(); });
	$('#id_grelha'       ).change(function(){ __LOAD_()      ; });
	
	$( '#viewGD' ).css('display', 'none');
});

function _getGrelha_(){ 
	$( '#grelha' ).html(''); 

   $.ajax({ type:"POST", url:'../g_Grelha/php.php', data:{accion:"load"}, 
	     success: function(data){ 
			data = eval(data); 

			se   = document.getElementById( 'id_grelha' );  			    
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
			 t_name:"disciplina"				,
			  _form:$('#_view').serializeArray() };
	
    ___SAVE_(dat, 'dDesc', '_view', '../_php/__all_view.php');
	 _set_Semestre();
}//---------------------------------------------------------------
function __DELL_( id ){	var dat ={ accion:"_DELETE", t_name:"disciplina", id:id };	
        ___DELL_(dat, '_view', '../_php/__all_view.php');
 }
//-------------------------------

function __Full_Form_( i ){ 
  ___Full_Form_(i,'_view');
  _set_Semestre();	
  $( '#dSemestre' ).val(dt_data[i -1].dSemestre	);
}

var dt_data;
function __LOAD_(){   
   $.ajax({ type:"POST", url:_url, data:{accion:"load", grelha:$('#id_grelha').val()}, async:false,      
		 success: function(data){
			 
			 var i =0;
			 dt_data =eval(data); 			  
			       $('#_list').DataTable({ "destroy": true,
											  "data": dt_data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "dDesc"           },
													   {   "data": "tDesc"           },
													   {   "data": "dSemestre" 		 },																											   
													   {   "data": "dAno_curricular" },																											   
													   {   "data": "dAno_curricular" },																											   
													   {   "data": "dCarga_h" 		 },																											   
													   {   "data": "div",
														 "render": function ( data, type, row ) { 
																	   return '<div align="right"><img id="'+i+'" onClick="__Full_Form_(this.id)"  src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																	                             '<img id ="'+row.id+'" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>';							
													   }}         
													  ],"language": dt_idioma
										  });
			                              		  
   }});	
}

/**************************/
function _set_Semestre(){
 se = document.getElementById( 'dSemestre' );
	
	switch ($('#dAno_curricular').val()){
		case '1': 		
			     op  ='<option style="cursor:pointer" value="1">1°</option>'; 
			     op +='<option style="cursor:pointer" value="2">2°</option>'; 
			    break;
	    case '2': 		
			     op  ='<option style="cursor:pointer" value="3">3°</option>'; 
			     op +='<option style="cursor:pointer" value="4">4°</option>'; 
			    break;	
	    case '3': 		
			     op  ='<option style="cursor:pointer" value="5">5°</option>'; 
			     op +='<option style="cursor:pointer" value="6">6°</option>'; 
			    break;	
	    case '4': 		
			     op  ='<option style="cursor:pointer" value="7">7°</option>'; 
			     op +='<option style="cursor:pointer" value="8">8°</option>'; 
			    break;	
	    case '5': 		
			     op  ='<option style="cursor:pointer" value="9">9°</option>'; 
			     op +='<option style="cursor:pointer" value="10">10°</option>'; 
			    break;				
			  
	}
	se.innerHTML = op;
}
