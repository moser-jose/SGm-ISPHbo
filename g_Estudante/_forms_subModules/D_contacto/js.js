//url general para el js.
var _url_cnt ='_forms_subModules/D_contacto/php.php';

$(document).ready(function(e) {
    //for validate files personales
	$( '#tele'   ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('int');
	
	__GET_COMBOXS_('paisC', 'getPais', 'paNome', _url_per );
		
	__GET_PROV_( 'provC',  'paisC' );
	
	//__GET_MUNIC_( 'munic',  'prov' );
	__GET_MUNIC_( 'municC', 'provC');
	
	//__GET_COMUNA_('comuna', 'municC');
	
	$( '#paisC'  ).change(function (){ __GET_PROV_(  'provC', 'paisC'  );  __GET_MUNIC_( 'municC', 'provC' ) ;});
	$( '#provC'  ).change(function (){ __GET_MUNIC_( 'municC', 'provC' ); 									  });	
	//$( '#municC' ).change(function (){ __GET_COMUNA_('comuna', 'municC'); });
	
});

function __Full_Form_CNT( dt_table ){

	$( '#paisC'  ).val(dt_table.idPa );           __GET_PROV_(  'provC',  'paisC' );
	$( '#provC'  ).val(dt_table.Provincias_id );  __GET_MUNIC_( 'municC', 'provC' );
	$( '#municC' ).val(dt_table.idMun           ); 		  
	
	$( '#email'  ).val(dt_table.cEmail    );
	$( '#tele'   ).val(dt_table.ctelefone );
	
	
  /*show the buton dell*/ 
  $( '#_dell' ).fadeIn('slow');
}

function __LOAD_CNT_( dt_data ){   
       var i =0;		
       $('#_list_CNT').DataTable({ "destroy": true,
									"data": dt_data, 
								 "columns": [
											 {   "data": "",
											   "render": function (data, type, row){ i++; return i;
											 }},
											 {   "data": "bi_passaporte"    },
											 {   "data": "cNome"   		    },											
											 {   "data": "paNome"           },
 											 {   "data": "provNome" 		},												    
											 {   "data": "munNome"          },												    
											 {   "data": "ctelefone" 		},												    
											 {   "data": "cEmail" 			},												    
											 {   "data": "div",
											   "render": function ( data, type, row ){ 
																							btn  ='<div align="right"><img id="'+i+'" onClick="__Full_Form_G(this.id)" src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />';
																  ($('#id_U_').val() ==1) ? btn +='<img id="'+i+'" onClick="__DELL_E(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>'
																						  : btn +='</div>';
												 return btn;
											 }}         
										   ],"language": dt_idioma
								 });		  			                                       
}




