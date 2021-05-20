//url general para el js.
var _url ='../g_Municipio/php.php';

$(document).ready(function(e) {
    	
    $( '#viewGN'   ).css('display', 'none');
	$( '#munNome'  ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();

	__GET_COMBOXS_('Provincias_id', 'load', 'provNome', '../g_Provincia/php.php'); 
	__LOAD_();	
	
	$( '#prov' ).change(function (){ __LOAD_(); });
});

function __SAVE_(){ 	
  var dat ={ accion:"_SAVE"						,
			 t_name:"municipios"				,
			  _form:$('#_view').serializeArray() };
	
    ___SAVE_(dat, 'munNome', '_view', '../_php/__all_view.php');			  
}//---------------------------------------------------------------
function __DELL_( id ){	var dat ={ accion:"_DELETE", t_name:"municipios", id:id };	
        ___DELL_(dat, '_view', '../_php/__all_view.php');
 }
//-------------------------------

var dt_data;
function __LOAD_(){   
   $.ajax({ type:"POST", url:_url, data:{accion:"load", prov:$('#Provincias_id').val()}, async:false,      
		 success: function(data){
			 
			 var i =0;
			 dt_data =eval(data); 			  
			       $('#_list').DataTable({ "destroy": true,
											  "data": dt_data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "munNome"     },												   																											   
													   {   "data": "div"          ,
														 "render": function ( data, type, row ) { 
																	   return '<div align="right"><img id="'+i+'" onClick="___Full_Form_(this.id,\'_view\')"  src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																	                             '<img id ="'+row.id+'" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>';							
													   }}         
													  ],"language": dt_idioma
										  });
			                              		  
   }});	
}