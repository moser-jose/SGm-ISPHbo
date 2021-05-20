/*guardar los erros*/
$(document).ready(function (){
	$( "#sDesc" ).click(function (){ $( "#sDesc" ).css( "border", "1px solid #ABADB3"  ); });
		
});

function __SAVE_E(){ 
	if ($('#sDesc').val() =='') 
		  $( "#sDesc" ).css( "border", "1px dashed #FF0048" );
	else{ $( "#sDesc" ).css( "border", "1px solid #ABADB3"  );
		
		$('#erros input[type=radio]').each(function(){ if (this.checked) r =this.value; });		
		var arr =[];
			arr.push ({"name":"id"     ,"value":$('#idErr').val() });
			arr.push ({"name":"sTipo"  ,"value":r 				  });
			arr.push ({"name":"sData"  ,"value":__DATA_OFF()	  });
			arr.push ({"name":"id_user","value":$('#_u_id').val() });
			arr.push ({"name":"sDesc"  ,"value":$('#sDesc').val() });

		var dat ={ accion:"_SAVE", t_name:"sugestoes", _form:arr };

		 $.ajax({ type:"POST", url:'../_php/__all_view.php', data:dat, async:false })
		  .done(function () {
				 $.confirm({
							title: false, 					        
							columnClass: 'col-md-4',
					        backgroundDismiss: false,
							cancelButton: false, 
							confirmButton: false,
							
							theme: 'black',
							animation: 'rotatex',
							content: 'Sucesso: a sua sugestão foi enviada!',
					        onClose: function(){ $('#sDesc').val(''); }
				          });
				});	
		   
	}
}
//-------------------------------
function __get_Lista_Erros(){ 
	
	$.ajax({ type:"POST", url:'../g_Erros/php.php', data: "accion=load",
     success: function( data ) {
			var table =$('#_list').DataTable({ "data": eval(data), 
											"columns": [
														{ "data": "sData" },
														{ "data": "sTipo" },
														{ "data": "sDesc" },
														{ "data": "nome"  },
														{ "data"   : "div",
														  "render" : function ( data/*, type, row*/ ) {
																		   return '<div align="right"><img class="editar" src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																									 '<img class="delete" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" />'											
																	 }
														}         
													 ], "language": dt_idioma,									  
														"dom": 'lrfrtip', //dom para tenerlo todo Blrfrtip
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
											 });	

		
				obter_Datos("#_list", table);
    }}); 
	
}

function obter_Datos(tbody, table){
	$(tbody).on("click", "img.editar", function(){
		var data =table.row( $(this).parents("tr") ).data();
		
	});
}