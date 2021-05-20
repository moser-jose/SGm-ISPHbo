//url general para el js.
var _url ='../g_Grelha/php.php';

$(document).ready(function(e) {
    	//for validate files
	$( '#gDesc'       ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();
	$( '#gAno_Inicio' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('int');
	$( '#id_curso'    ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');		
		
	//for load all users
	__GET_COMBOXS_('id_curso', 'load', 'cDesc', '../g_Curso/php.php'	);	
	__LOAD_();
	
	$( '#viewGG' ).css('display', 'none');
});

function __SAVE_(){ 	
  var dat ={ accion:"_SAVE"						,
			 t_name:"grelha"					,
			  _form:$('#_view').serializeArray() };
	
    ___SAVE_(dat, 'gDesc', '_view', '../_php/__all_view.php');			  
}//---------------------------------------------------------------
function __DELL_( id ){	var dat ={ accion:"_DELETE", t_name:"grelha", id:id };	
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
													   {   "data": "gDesc"       },													   																											   
													   {   "data": "gAno_Inicio" },													   																											   
													   {   "data": "cDesc"       },													   																											   
													   {   "data": "div"          ,
														 "render": function ( data, type, row ) { 
																	   return '<div align="right"><img id="'+i+'" onClick="___Full_Form_(this.id,\'_view\')"  src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																	                             '<img id ="'+row.id+'" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>';							
													   }}         
													  ],"language": dt_idioma
										  });
			                              		  
   }});	
}