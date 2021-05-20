//url general para el js.
var _url_per ='_forms_subModules/D_pessonais/php.php';

$(document).ready(function(e) {
    //for validate files personales
	$( '#nome'   ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();
	$( '#pai'    ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();
	$( '#mae'    ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();
	$( '#BIpass' ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	
	$( '#genero'       ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#dataNac'      ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#prov'         ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#munic'        ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#nacionalidad' ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#estadoC'      ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#nee'          ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#dataBIemi'    ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#Acurso'       ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#BIprov'       ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();

		
     // fica en _all_view
	__GET_COMBOXS_('pais'        , 'getPais', 'paNome', _url_per );
	__GET_COMBOXS_('nacionalidad', 'getPais', 'paNome', _url_per );
	
	
	__GET_PROV_( 'prov',   'nacionalidad'  );
	__GET_MUNIC_( 'munic', 'pais'          );
	$( '#BIprov' ).val( $( '#prov option:selected').text() );
	
	$( '#prov'   ).change(function (){ __GET_MUNIC_( 'munic', 'prov'  ); 
									     $( '#BIprov' ).val( $( '#prov option:selected').text()); });
	
	$( '#pais'         ).change(function (){ __GET_PROV_( 'provA',  'pais'  		); });	
	$( '#nacionalidad' ).change(function (){ __GET_PROV_( 'prov',   'nacionalidad'  ); 
											 __GET_MUNIC_( 'munic', 'prov' 			); });	
	
	$( '#BIpass' ).keyup(function(){ __Checked_BI(); });
	__GET_COMBOXS_('nee', 'getNEE', 'neeNome', _url_per    );
	__GET_CURSO_(  'Acurso', _url_per );

});



function __Full_Form_P( dt_data ){ 	
	
    $( '#id'           ).val( dt_data.id                  );    
	$( '#nome'  	   ).val( dt_data.cNome               );
	$( '#pai'    	   ).val( dt_data.cPai			      );
	$( '#mae'    	   ).val( dt_data.cMae				  );
	$( '#BIpass'       ).val( dt_data.bi_passaporte		  );
	$( '#dataBIemi'    ).val( dt_data.cDataBI             );
	$( '#genero'       ).val( dt_data.cGenero			  );
	$( '#dataNac'      ).val( dt_data.cDataNac			  );
	
	$( '#nacionalidad' ).val( dt_data.cNacionalidad	      ); __GET_PROV_( 'prov',  'nacionalidad'  );
	$( '#prov'         ).val( dt_data.cProvNacimiento	  ); __GET_MUNIC_('munic', 'prov');
	$( '#munic'        ).val( dt_data.cMunicNascimento    );
	
	$( '#estadoC'      ).val( dt_data.cEstadoC			  );
	$( '#nee'          ).val( dt_data.nee_id			  );
	
	$( '#BIprov'       ).val( $( '#prov option:selected').text() );
	
  /*show the buton dell*/ 
  $( '#_dell' ).fadeIn('slow');
}

//--------------------------------------------------------------/
function __LOAD_PER_( dt_data ){ 
	
	var i =0;		
    $('#_list_M').DataTable({ "destroy": true,
									"data": dt_data, 
								 "columns": [
											 {   "data": "",
											   "render": function (data, type, row){ i++; return i;
											 }},
											 {   "data": "bi_passaporte"    },
											 {   "data": "cNome"   		    },
											 {   "data": "cGenero" 		    },
											 {   "data": "paNome"           },
											 {   "data": "provNome"  		},
											 {   "data": "munNome" 			},												    
											 {   "data": "div",
											   "render": function ( data, type, row ) { 												   
																							btn  ='<div align="right"><img id="'+i+'" onClick="__Full_Form_G(this.id)" src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />';
																  ($('#id_U_').val() ==1) ? btn +='<img id="'+i+'" onClick="__DELL_E(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>'
																						  : btn +='</div>';
												 return btn;
											 }}         
										   ],"language": dt_idioma
							});
		//action functions
		//__Full_Form_( tabla );
		//__xDELL_    ();	
}
//--------------------------------------------------------------/
/**********/
function __SAVE_PER(){  
     id = $( '#id' ).val();
      f = $( '#_view_M' ).serialize(); 
	
	$.ajax({ type:"POST", url: _url_per, data: "accion=save&id="+id +"&f="+f,    
	 success :function(data){ r = eval(data); }, async: false });
	
  return r;
}

/***************/
function __DELL_PRO( id ){	 				   
	$.ajax({ type:"POST", url: _url_per, data: "accion=dell&id="+ id, async: false });		 
}
function __Checked_BI(){  
  bi = $( "#BIpass" ).val();  
	
   $.ajax({ type:"POST", url: _url_per, data: "accion=chek_bi&bi="+bi,
	 success: function(data){  
			data = eval(data)
			
			//alert(data);
			
			if (data != ''){ 
				  $( "#UE" ).fadeIn('slow'); 
				  $( "#_panel_b" ).fadeOut('slow');
			   }else{
				   $( "#UE"       ).fadeOut('slow');
                   $( "#_panel_b" ).fadeIn('slow');				   
			   }
	}, async: false }); 
}



