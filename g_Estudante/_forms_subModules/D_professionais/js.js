//url general para el js.
var _url_Pro ='_forms_subModules/D_professionais/php.php';

$(document).ready(function(e) {
    //for validate files personales
	$( '#local'   ).val_text();
	$( '#cargo'   ).val_text();

		
     // fica en _all_view
	__GET_COMBOXS_('profesion', 'getProfesion', 'proNome', _url_Pro );	
	__GET_COMBOXS_('tutela'   , 'getTutela'   , 'otNome' , _url_Pro );	

	$( '#trabajador' ).change(function (){ __Enabled_Forms(); });
	$( '#inst'       ).change(function (){ 
		                                   ($('#inst').val() == 2) 
											   ? $( '#tutela' ).attr('disabled', false) 
										       : $( '#tutela' ).attr('disabled', true);
	                                       });
	
});

function __Enabled_Forms(){ 
	b = $( '#trabajador' ).val();
	
	if (b == 1){
		$( '#inst'      ).attr('disabled', false);
		$( '#profesion' ).attr('disabled', false);
		$( '#local'     ).attr('disabled', false);
		$( '#cargo'     ).attr('disabled', false);
	}else{	
		$( '#inst'      ).attr('disabled', true);
		$( '#profesion' ).attr('disabled', true);
		$( '#local'     ).attr('disabled', true);
		$( '#cargo'     ).attr('disabled', true);
		$( '#tutela'    ).attr('disabled', true);
	}
}

function __Full_Form_PRO( dt_data ){ 
 /*full data values in de form*/	
	$( '#trabajador' ).val( dt_data.trabalhador			 );
	__Enabled_Forms();
		
	$( '#profesion'  ).val( dt_data.profissao_id 		 );
	$( '#local'      ).val( dt_data.dlLocal_Trabalho 	 );
	$( '#tutela'     ).val( dt_data.organismos_tutela_id );		
	$( '#inst'       ).val( dt_data.tipo_institucao 	 );	
	$( '#cargo'      ).val( dt_data.dlCargo				 );
	
	(dt_data.atleta         == 1) ? $( '#atleta'    ).attr('checked', true) : $( '#atleta'    ).attr('checked', false);
	(dt_data.dirigente      == 1) ? $( '#dirigente' ).attr('checked', true) : $( '#dirigente' ).attr('checked', false);
	(dt_data.militar        == 1) ? $( '#militar'   ).attr('checked', true) : $( '#militar'   ).attr('checked', false);
	(dt_data.mulher_gravida == 1) ? $( '#mg'        ).attr('checked', true) : $( '#mg'        ).attr('checked', false);
	
  /*show the buton dell*/ 
  $( '#_dell' ).fadeIn('slow');
}

/*********************************************************************************/
/*********************************************************************************/
function __LOAD_PRO_( dt_data ){ 
	   var i =0;		
       $('#_list_PRO').DataTable({ "destroy": true,
									"data": dt_data, 
								 "columns": [
											 {   "data": "",
											   "render": function (data, type, row){ i++; return i;
											 }},
											 {   "data": "bi_passaporte"    },
											 {   "data": "cNome"   		    },
											 {   "data": "label",
											   "render": function (data, type, row){
												                  (row["trabalhador"] ==1) ? t ='Sim' : t ='Não';
												   return '<label>'+t+'</label>';
											 }},
											 {   "data": "proNome"          },
											 {   "data": "label",
											   "render": function (data, type, row){
												               if (row["tipo_institucao"] ==1)       k ='-'; 
											                     else (row["tipo_institucao"] ==2) ? k ='Privada' : k ='Pública';
												   return '<label>'+k+'</label>';
											 }},
											 {   "data": "otNome" 			},												    
											 {   "data": "dlLocal_Trabalho" },												    
											 {   "data": "dlCargo" 			},												    
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
/*********************************/

function _Sabe_DL_PRO( id_C ){	
	id = $( '#id' ).attr('value');
	 f = $( '#_view_M' ).serialize(); 
	
	/****/
	 i = $( '#inst'      ).val(); 
	 t = $( '#tutela'    ).val(); 
	 l = $( '#local'     ).val(); 
	 c = $( '#cargo'     ).val();
	 p = $( '#profesion' ).val();
	
	
	$.ajax({ type:"POST", url: _url_Pro, data: "accion=saveDL_PRO&id_C="+id_C +"&i="+i +"&t="+t +"&l="+l +"&c="+c +"&p="+p +"&id="+id +"&f="+f,  async: false });
}

