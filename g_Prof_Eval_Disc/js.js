//url general para el js.
var _url ='../g_Prof_Eval_Disc/php.php';

$(document).ready(function(e) {
    	
    $( '#viewPDE' ).css('display', 'none');
	$( '#id_prof_disc' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#id_tipo_eval' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');	

	__GET_COMBOXS_('id_prof_disc', 'get_DISC', 'dDesc', _url); 
	__GET_COMBOXS_('id_tipo_eval', 'get_EVAL', 'tipo' , _url); 
	
	__Checked_EVAl();
	$('#id_prof_disc, #id_tipo_eval').change(function (){ __Checked_EVAl(); });
	__LOAD_();		
});


function __SAVE_(){ 	
  var dat ={ accion:"_SAVE"						,
			 t_name:"prof_eval_disc"		,
			  _form:$('#_view').serializeArray() };
	
    ___SAVE_(dat, 'id_prof_disc', '_view', '../_php/__all_view.php');			  
}//---------------------------------------------------------------
function __DELL_( id ){	var dat ={ accion:"_DELETE", t_name:"prof_eval_disc", id:id };	
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
													   {   "data": "dDesc"    },												   																											   
													   {   "data": "tipo"     },												   																											   
													   {   "data": "div"       ,
														 "render": function ( data, type, row ) { 
																	   return '<div align="right"><img id="'+i+'" onClick="___Full_Form_(this.id,\'_view\')"  src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																	                             '<img id ="'+row.id+'" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>';							
													   }}         
													  ],"language": dt_idioma
										  });
			                              		  
   }});	
}


function __Checked_EVAl(){    
	
   $.ajax({ type:"POST", url: "php.php", data: { accion:"chek_EVAL", disc:$( "#id_prof_disc" ).val(), eval:$( "#id_tipo_eval" ).val() }, async: false,
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
