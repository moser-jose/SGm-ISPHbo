//url general para el js.
var _url_aca ='_forms_subModules/D_academicos/php.php';

$(document).ready(function(e) {
    //for validate files personales
	   $( '#ano'    ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('int');
	   $( '#media'  ).clearFile('save_M', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('double');
	
     // fica en _all_view
	__GET_COMBOXS_('hl'     , 'getHL', 'hlfNome', _url_aca );	
	__GET_COMBOXS_('opcion' , 'getOP', 'opcNome', _url_aca );
	__GET_PROV_(   'provA'  , 'pais'                       );
	
	__GET_ESCOLA_( $( '#hl option:selected' ).text() );
	
	
	$( '#hl' ).change(function (){ _punter_HL() });
	
});

var list_ESC = new Array();
var iesc;
function __Full_Form_ACA( i, dt_data ){ 
	iesc = i;
 /*full data values in de form*/	    
	$( '#pais'   ).val( dt_data.daPaisFormacao ); __GET_PROV_( 'provA'  , 'pais' );
	$( '#provA'  ).val( dt_data.daProvFormacao );
	$( '#hl'     ).val( dt_data.daHL_id 	   );		
	$( '#media'  ).val( dt_data.daMediaFinal   );
	$( '#Acurso' ).val( dt_data.id_curso	   );
		
	_punter_HL();
	
	if ($( '#hl' ).val() == 1){
		b ='EM';
		$.ajax({ type:"POST", url: _url_aca, data: "accion=getdataACA&idACA=" +dt_data.escola_id +"&b=" +b,     
	      success: function(data){ 
					 data =eval(data); 
					 list_ESC = data;

						  __GET_ESCOLA_( $( '#hl option:selected' ).text() );
						  __GET_COMBOXS_('opcion', 'getOP', 'opcNome', _url_aca );

						 $( '#escola' ).val(data[0]['escolaFormacao_id']);
						 $( '#opcion' ).val(data[0]['opcao_id']         );
						 $( '#ano'    ).val(data[0]['AnoConclucao']		);

					 }, async: false });
				}else {
						b = 'LC';
						$.ajax({ type:"POST", url: _url_aca, data: "accion=getdataACA&idACA=" +dt_data.universidad_id +"&b=" +b,      
								 success: function(data){ 
									 data = eval(data); 
									 list_ESC = data;  

										 __GET_ESCOLA_( $( '#hl option:selected' ).text() );
										 __GET_COMBOXS_('opcion', 'getCURSO', 'cDesc', _url_aca );

										 $( '#escola' ).val(data[0]['universidad_curso']);
										 $( '#opcion' ).val(data[0]['curso_id']		    );
										 $( '#ano'    ).val(data[0]['AnoConclucao']	    );

									 }, async: false });
					  }
	
     
  /*show the buton dell*/ 
  $( '#_dell' ).fadeIn('slow');
}
/**************/
function _punter_HL(){ 
	if ( $( "#hl" ).attr("value") == 1 ){ 
	   
		document.getElementById('tdl').innerHTML = 'Opção:';
		//$( '#tdsOptions' ).show('slow');
		
		__GET_COMBOXS_('opcion', 'getOP', 'opcNome', _url_aca );		
	}
	
		if ( $( '#hl' ).attr('value') == 2 ){ 

				document.getElementById('tdl').innerHTML = 'Curso:';
				//$( '#tdsOptions'  ).show('slow');
			
			__GET_COMBOXS_('opcion', 'getCURSO', 'cDesc', _url_aca );
	      }
	//siempre se ejecuta
	__GET_ESCOLA_( $( '#hl option:selected' ).text() );
}

/***********************************************************************/
/***********************************************************************/
function __GET_ESCOLA_( hl ){ 
	$( '#escola' ).html('');
	
   $.ajax({ type:"POST", url: "_forms_subModules/D_academicos/php.php", data: "accion=getESCOLA&hl="+hl,   
	 success:function(data){ 
			data = eval(data);  

			se   = document.getElementById( 'escola' );  			    
			    op = ''; 
				
			$.each(data, function(i, dat){  
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["nome"] +'</option>';	
		    });		
			
		    se.innerHTML = op; 
		}, async: false });		
}
/***********************************************************************/
function __LOAD_ACA_( dt_data ){   
       var i =0;		
       $('#_list_ACA').DataTable({ "destroy": true,
									"data": dt_data, 
								 "columns": [
											 {   "data": "",
											   "render": function (data, type, row){ i++; return i;
											 }},
											 {   "data": "bi_passaporte"    },
											 {   "data": "cNome"   		    },											
											 {   "data": "paNome"           },
 											 {   "data": "provNome" 		},												    
											 {   "data": "hlfNome"          },												    
											 {   "data": "daMediaFinal" 	},												    
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

/****/
function _Sabe_DL_ACA( id_C ){	
	 f =$( '#_view_M'   ).serialize();
	id =$( '#id' ).val();
	
				   /*******************/
						if (id != '-')
						if (dt_data[iesc -1].daHL_id != $('#hl').val() ){

								if ($('#hl').val() == 1) 
									__DELL_ACA( null, list_ESC[0]['id']); 
								else 
									__DELL_ACA(list_ESC[0]['id'], null);
							}
				   /******************/
	
	$.ajax({ type:"POST", url: _url_aca, data: "accion=save_ESCOLAS&f="+f, async: false }); 
	
	idE =0;
	idU =0;
	$.ajax({ type:"POST", url: _url_aca, data: "accion=get_IdCurren&f="+f,  	     
     success: function(data){ data =eval(data); 
						   ($('#hl').attr('value') == 1) ? idE =data : idU =data;
						 }, async: false }); 

	$.ajax({ type:"POST", url: _url_aca, data: "accion=save_ACA&f="+f +"&id="+id +"&id_C="+ id_C +"&idE="+idE +"&idU="+idU, async: false });
	
}

/***************/
function __DELL_ACA( idE, idU ){	
	  (idE == null) ? idE = 0 : idU =0;
      $.ajax({ type:"POST", url: _url_aca, data: "accion=dell&idE=" +idE +"&idU=" +idU, async: false });		 
}