//url general para el js.
var _url ='../g_Opcao/php.php';

$(document).ready(function(e) {
    //for validate files	
	$( '#opcNome' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();
	
	__LOAD_();
	$( '#viewGO'  ).css('display', 'none');
});

function __SAVE_(){ 	
  var dat ={ accion:"_SAVE"						,
			 t_name:"opcao"				        ,
			  _form:$('#_view').serializeArray() };
	
    ___SAVE_(dat, 'dDesc', '_view', '../_php/__all_view.php');
	 _set_Semestre();
}//---------------------------------------------------------------
function __DELL_( id ){	var dat ={ accion:"_DELETE", t_name:"opcao", id:id };	
        ___DELL_(dat, '_view', '../_php/__all_view.php');
 }
//-------------------------------

function __Full_Form_( i ){ 
  ___Full_Form_(i,'_view');
  _set_Semestre();	
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
													   {   "data": "opcNome"},																										   
													   {   "data": "div",
														 "render": function ( data, type, row ) { 
																	   return '<div align="right"><img id="'+i+'" onClick="__Full_Form_(this.id)"  src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																	                             '<img id ="'+row.id+'" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>';							
													   }}         
													  ],"language": dt_idioma
										  });
			                              		  
   }});	
}