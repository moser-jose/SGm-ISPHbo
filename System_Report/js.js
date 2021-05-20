//CR
function __get_CR(){
	var dat ={ accion: "get_CR", 
				   TP: $('#pagamento').val(),
			    turma: $('#id_turma').val()
			 };
	
   $.ajax({ type:"POST", url: "php.php", async: false, data: dat,
		 success: function(data){	  
              
			   var i =0;
			   $('#_list').DataTable({ "destroy": true,
									      "data": eval(data), 
									   "columns": [
										 		   {   "data": "",
												     "render": function (data, type, row){ i++; return i;																		                     
												   }},
										 		   {   "data": "cNome"         },												   																											   
												   {   "data": "bi_passaporte" },					   
												   {   "data": "ffpNome"       },												   																											   
												   {   "data": "valor_final"   },												   																											   
												   {   "data": "data"          }
											      ],
								                   "language": dt_idioma,									  
												        "dom": 'Bfrtip',
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
								  });
   }});	
}
//NOTAS
function __get_Traza_Not(){
	 var dat ={ accion: "get_Traza_Not", 
		     disc: $('#disciplina').val(), 
		     eval: $('#tipo_eval').val() , 
		      tur: $('#id_turma' ).val() };
	
   $.ajax({ type:"POST", url: "php.php", async: false, data: dat,
		 success: function(data){	   
              
			   var i =0;
			   $('#_list').DataTable({ "destroy": true,
									      "data": eval(data), 
									   "columns": [
										 		   {   "data": "",
												     "render": function (data, type, row){ i++; return i;																		                     
												   }},
										 		   {   "data": "cNome"       },
												   {   "data": "nota_antiga" },
										   		   {   "data": "nota_nova" 	 },														
										   		   {   "data": "data" 	     },														
										   		   {   "data": "hora"        },
										   		   {   "data": "nome"        }
											      ],
								                   "language": dt_idioma,									  
												        "dom": 'Bfrtip',
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
								  });
   }});
}
function GETT( ){
var dat ={ accion: "GETT"            , 
              ano: $('#data').val()  , 
             eval: $('#tipo_eval').val()  , 
			 disc: $('#disciplina').val() };
	
   $.ajax({ type:"POST", url: "php.php", data: dat, async: false,
	     success: function(data){
         
			       var i =0;
			       data  =eval(data);
			       $('#_list').DataTable({ "destroy": true,
											  "data": data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "tDesc"          },																									   
													   {   "data": "tAno_curricular"},																									   
													   {   "data": "tPeriodo"		},																									   
													   {   "data": "a",
														 "render": function ( data, type, row ) { 
																	// return '<a id="'+i+'x" href="" target="_blank"><img src="../images/menu/7.ico" width="18px" height="18px" style="vertical-align:middle" /></a>';							
																	 return '';							
													   }},
											   		   {   "data": "a",
														 "render": function ( data, type, row ) { 
																	 return '<a id="'+i+'y"  href="" target="_blank"><img src="../images/postpdficon.png"  width="18px" height="18px" style="vertical-align:middle" /></a';							
													   }}
													  ],"language": dt_idioma,									  
												       	     "dom": 'Bfrtip',
											          	   buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
										  });
			 
			    _text_N(dat, data);
			}});
	
}
function GETT_P( b ){
var dat ={ accion: "GETT_P"            , 
              ano: $('#data').val()  ,            
			 disc: $('#disciplina').val() };
	
   $.ajax({ type:"POST", url: "php.php", data: dat, async: false,
	     success: function(data){
         
			       var i =0;
			       data  =eval(data);
			       $('#_list').DataTable({ "destroy": true,
											  "data": data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "tDesc"          },																									   
													   {   "data": "tAno_curricular"},																									   
													   {   "data": "tPeriodo"		},																									   
													   {   "data": "a",
														 "render": function ( data, type, row ) { 
																	// return '<a id="'+i+'x" href="" target="_blank"><img src="../images/menu/7.ico" width="18px" height="18px" style="vertical-align:middle" /></a>';							
																	 return '';							
													   }},
											   		   {   "data": "a",
														 "render": function ( data, type, row ) { 
																	 return '<a id="'+i+'y"  href="" target="_blank"><img src="../images/postpdficon.png"  width="18px" height="18px" style="vertical-align:middle" /></a';							
													   }}
													  ],"language": dt_idioma,									  
												       	     "dom": 'Bfrtip',
											          	   buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
										  });
			 
			    _text_G(dat, data, b);
			}});
	
}

//------------------------------------------------------------------------------------------------------------------//
function __get_Turma(){
   $( '#turma' ).html('');
    var dat ={ accion:"get_turma"   	 , 
			  	  ano:$('#data').val()   , 
		        curso:$('#curso').val() };
	
   $.ajax({ type:"POST", url: "php.php", async: false, data: dat,
	     success: function(data){
			data = eval(data);

			  se = document.getElementById("turma");
			  op = '';
			  op +='<option style="cursor:pointer" value="-">-</option>';

			$.each(data, function(i, dat){
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["tDesc"] +'</option>';
		    });

		    se.innerHTML = op;
		}});
}
function __get_DIS(){ 
	    var dat ={ accion: "_get_DIS"       , 
		            curso: $('#curso').val(),  
		              sem: $('#sem'  ).val() };
	
	 $.ajax({ type:"POST", url: "php.php", data: dat, async: false,
	       success: function(data){

			       var i =0;
			       data  =eval(data);
			       $('#_list').DataTable({ "destroy": true,
											  "data": data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "dDesc"},																									   
													   {   "data": "select",
														 "render": function ( data, type, row ) { 
																	 return '<select id="'+i+'" style="width: 83px" onChange="_text_(this.id, '+row.id+')"></select>';							
													   }},
											           {   "data": "a",
														 "render": function ( data, type, row ) { 
																	 return '<a id="'+i+'x" href="" target="_blank"><img src="../images/menu/7.ico" width="18px" height="18px" style="vertical-align:middle" /></a>';							
													   }},
											   		   {   "data": "a",
														 "render": function ( data, type, row ) { 
																	 return '<a id="'+i+'y"  href="" target="_blank"><img src="../images/postpdficon.png" width="18px" height="18px" style="vertical-align:middle" /></a>';							
													   }}
													  ],"language": dt_idioma,									  
												             "dom": 'Bfrtip',
											               buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
										  });			   							   
      _set_Turma(data.length, data[0]["dAno_curricular"]);
   }});	
}

 var put =0;
var list =new Array();
function _set_Turma(i, ano_){ 
var dat ={ accion: "_get_Turma_"    , 
			curso: $('#curso').val(),  
			 anoC: ano_				,
			 anoA: $('#data').val() };
	            k =i;
     if (put == 0) 	 
     $.ajax({ type:"POST", url: "php.php", data: dat, async: false,
		 success: function(data){
	     data =eval(data); 
         list =data;
		  
		  
      		while (k > 0){	
				se = document.getElementById( k );
				  op = '';
				  op +='<option style="cursor:pointer" value="-">-</option>';

					$.each(list, function(j, dat){ 
						op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["tDesc"] +'</option>';
					});
					se.innerHTML = op;
			
			 k--;	
			}
			
   } });
   
  else{
	  while (k > 0){	
	  se = document.getElementById( k );
			  op = '';
			  op +='<option style="cursor:pointer" value="-">-</option>';

			$.each(list, function(j, dat){
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["tDesc"] +'</option>';
		    });

		    se.innerHTML = op;
	        k--;
	  }
  }	  
 put++;  

}

function _set_Semestre_L(i, data){  
 k =i;
 while (k > 0){	
	ano_ =data[k -1]["tAno_curricular"];	 
	  se = document.getElementById( k );
	
	switch (ano_){
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
	 
	_text(k, data[k -1]["id"]);  
	k--;
 }	
}
function __get_Lista_TURMAS( ){
var dat ={ accion: "get_turma"       , 
              ano: $('#data').val()  , 
			curso: $('#curso').val() };
	
   $.ajax({ type:"POST", url: "php.php", data: dat, async: false,
	     success: function(data){
         
			       var i =0;
			       data  =eval(data);
			       $('#_list').DataTable({ "destroy": true,
											  "data": data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "tDesc"          },																									   
													   {   "data": "tAno_curricular"},																									   
													   {   "data": "tPeriodo"		},																									   
													   {   "data": "select",
														 "render": function ( data, type, row ) { 
																	 return '<select id="'+i+'" style="width: 83px" onChange="_text(this.id, '+row.id+')"></select>';							
													   }},
											           {   "data": "a",
														 "render": function ( data, type, row ) { 
																	 return '<a id="'+i+'x" href="" target="_blank"><img src="../images/menu/7.ico" width="18px" height="18px" style="vertical-align:middle" /></a>';							
													   }},
											   		   {   "data": "a",
														 "render": function ( data, type, row ) { 
																	 return '<a id="'+i+'y"  href="" target="_blank"><img src="../images/postpdficon.png"  width="18px" height="18px" style="vertical-align:middle" /></a';							
													   }}
													  ],"language": dt_idioma,									  
												       	     "dom": 'Bfrtip',
											          	   buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
										  });

											   
  				    _set_Semestre_L(data.length, data);   					
			}});
}

function _text_N(dat, data){
	$(data).each(function (i, datt){
	
		//$('#'+i +'x').attr('href',  'pdf_Ex.php?id_T='+id+'&sem='+$("#"+i).val() +'&ano='+$('#data').val());
		$('#'+parseInt(i +1) +'y').attr('href', 'pdf_nota.php?id_D='+dat.disc+'&eval='+dat.eval +'&ano='+dat.ano +'&id_T='+datt[1]);
	});
}
function _text_G(dat, data, b){
	$(data).each(function (i, datt){
	
		//$('#'+i +'x').attr('href',  'pdf_Ex.php?id_T='+id+'&sem='+$("#"+i).val() +'&ano='+$('#data').val());
	(b) ? $('#'+parseInt(i +1) +'y').attr('href', 'pdf_pauta_G.php?id_D='+dat.disc+'&ano='+dat.ano +'&id_T='+datt[1])
		: $('#'+parseInt(i +1) +'y').attr('href', 'pdf_Aprovechamento.php?id_D='+dat.disc+'&ano='+dat.ano +'&id_T='+datt[1]);
	});
}
function _text_(i, id){ 
	$('#'+i +'x').attr('href', 'pdf_dex.php?id_D='+id+'&sem='+$('#sem').val() +'&id_T='+$("#"+i).val() +'&ano='+$('#data').val());
	$('#'+i +'y').attr('href',   'pdf_d.php?id_D='+id+'&sem='+$('#sem').val() +'&id_T='+$("#"+i).val() +'&ano='+$('#data').val());
}
function _text(i, id){ 
	$('#'+i +'x').attr('href',  'pdf_Ex.php?id_T='+id+'&sem='+$("#"+i).val() +'&ano='+$('#data').val());
	$('#'+i +'y').attr('href', 'pdf_pdf.php?id_T='+id+'&sem='+$("#"+i).val() +'&ano='+$('#data').val());
}
/////////////////////////////////////////
////Lista Estudantes///////////////////////////////////////////////////
function __get_Lista_Estudante( ){
	
 var dat ={ accion: "get_list_Est"   , 
		     turma: $('#turma').val(), 
		       ano: $('#data' ).val() };
	
   $.ajax({ type:"POST", url: "php.php", async: false, data: dat,
		 success: function(data){
	     //data = eval(data);
            var i =0;
			$('#_list').DataTable({ "destroy": true,
									      "data": eval(data), 
									   "columns": [
										 		   {   "data": "",
												     "render": function (data, type, row){ i++; return i;																		                     
												   }},
										 		   {   "data": "bi_passaporte" },
												   {   "data": "cNome" },
										   		   {   "data": "cGenero" },														
										   		   {   "data": "ctelefone" },														
										   		   {   "data": "cDesc" },														
										   		   {   "data": "maData" }
											      ],
								                   "language": dt_idioma,									  
												        "dom": 'Bfrtip',
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
								  });
   }});
}
/////////////////////////////////////////
////Mastriculas Hechas///////////////////////////////////////////////////
function __get_Matriculas_Ano( ){
	
 var dat ={ accion: "get_Mat_ano"    , 
		     curso: $('#curso').val(), 
		       ano: $('#data' ).val() };
	
   $.ajax({ type:"POST", url: "php.php", async: false, data: dat, async: false,		   
		 success: function(data){
	     //data = eval(data);
         var i =0;
			$('#_list').DataTable({ "destroy": true,
									      "data": eval(data), 
									   "columns": [
										 		   {   "data": "",
												     "render": function (data, type, row){ i++; return i;																		                     
												   }},
										 		   {   "data": "bi_passaporte" },
												   {   "data": "cNome"         },
										   		   {   "data": "cGenero" 	   },														
										   		   {   "data": "ctelefone" 	   },														
										   		   {   "data": "maData"        },														
										   		   {   "data": "maVez"         },
										   		   {   "data": "maSemestre"    },
										   		   {   "data": "tDesc"         },
										   		   {   "data": "maValor_total" }
											      ],
								                   "language": dt_idioma,									  
												        "dom": 'Bfrtip',
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
								  });
   }});
}
////Rebuscas///////////////////////////////////////////////////
function __get_Rebusca(  ){
	
 var dat ={ accion: "get_Reb"    , 
		     curso: $('#curso').val(), 
		       ano: $('#data' ).val() };
	
   $.ajax({ type:"POST", url: "php.php", data: dat, async: false,
		 success: function(data){
	     
			 var i =0;
			$('#_list').DataTable({ "destroy": true,
									      "data": eval(data), 
									   "columns": [
										 		   {   "data": "",
												     "render": function (data, type, row){ i++; return i;																		                     
												   }},
										 		   {   "data": "bi_passaporte" },
												   {   "data": "cNome"         },
										   		   {   "data": "cGenero" 	   },														
										   		   {   "data": "ctelefone" 	   },														
										   		   {   "data": "maData"        },														
										   		   {   "data": "md_Vez"        },
										   		   {   "data": "maSemestre"    },										   		   
										   		   {   "data": "maValor_total" }
											      ],
								                   "language": dt_idioma,									  
												        "dom": 'Bfrtip',
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
								  });			
   } });
}
////Trazas Estudantes///////////////////////////////////////////////////
function __get_Traza_EST( ){
	
 var dat ={ accion: "get_Traza_EST"  , 
		     curso: $('#curso').val(), 
		        op: $('#op'   ).val(), 
		       ano: $('#ano'  ).val()};
	
   $.ajax({ type:"POST", url: "php.php", data: dat, async: false,
		 success: function(data){
	     
			 var i =0;
			$('#_list').DataTable({ "destroy": true,
									      "data": eval(data), 
									   "columns": [
										 		   {   "data": "",
												     "render": function (data, type, row){ i++; return i;																		                     
												   }},
										 		   {   "data": "aIdentify"   },
												   {   "data": "aDesc"       },
										   		   {   "data": "aData" 	     },														
										   		   {   "data": "aHora" 	     },														
										   		   {   "data": "nome"        },														
										   		   {   "data": "font"         ,        
										   		     "render": function (data, type, row){
													           (row.activo ==1) ? act ='<font>Activo</font>' : act ='<font color="red">Desactivado</font>';
													           return act;
												   }}									   		   
											      ],
								                   "language": dt_idioma,									  
												        "dom": 'Bfrtip',
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
								  });
         }});
}
/////Trazas Matriculas////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function __get_Traza_MAT( ){
	
 var dat ={ accion: "get_Traza_MATR", 
	 curso: $('#curso').val()       , 
	   ano: $('#data' ).val()        };
	
   $.ajax({ type:"POST", url: "php.php", async: false, data: dat, 
		 success: function(data){	     

			var i =0;
			   $('#_list').DataTable({ "destroy": true,
									      "data": eval(data), 
									   "columns": [
										 		   {   "data": "",
												     "render": function (data, type, row){ i++; return i;																		                     
												   }},
										 		   {   "data": "bi_passaporte"   },
												   {   "data": "cNome"           },
										   		   {   "data": "cGenero" 	     },														
										   		   {   "data": "maData" 	     },														
										   		   {   "data": "maVez"           },														
										   		   {   "data": "maSemestre"      },														
										   		   {   "data": "maValor_total"   },														
										   		   {   "data": "font"             ,        
										   		     "render": function (data, type, row){ return '<font color="#05669E">'+row.nome+'</font>';
												   }},
										           {   "data": "font"         ,        
										   		     "render": function (data, type, row){
													           (row.activo ==1) ? act ='<font>Activo</font>' : act ='<font color="red">Desactivado</font>';
													           return act;
												   }}
											      ],
								                   "language": dt_idioma,									  
												        "dom": 'Bfrtip',
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
								  });
		
   }});
}

function __get_Traza_MAT_DIA( ano ){
	
	 var dat ={ accion: "get_Traza_MATR_dia", 
		     curso: $('#curso').val()       , 
		      data: $('#data' ).val()        };
	
   $.ajax({ type:"POST", url: "php.php", async: false, data: dat,
		 success: function(data){	     
              
			   var i =0;
			   $('#_list').DataTable({ "destroy": true,
									      "data": eval(data), 
									   "columns": [
										 		   {   "data": "",
												     "render": function (data, type, row){ i++; return i;																		                     
												   }},
										 		   {   "data": "bi_passaporte"   },
												   {   "data": "cNome"       },
										   		   {   "data": "cGenero" 	     },														
										   		   {   "data": "maData" 	     },														
										   		   {   "data": "maVez"        },														
										   		   {   "data": "maSemestre"        },														
										   		   {   "data": "maValor_total"        },														
										   		   {   "data": "font"         ,        
										   		     "render": function (data, type, row){ return '<font color="#05669E">'+row.nome+'</font>';
												   }},
										           {   "data": "font"         ,        
										   		     "render": function (data, type, row){
													           (row.activo ==1) ? act ='<font>Activo</font>' : act ='<font color="red">Desactivado</font>';
													           return act;
												   }}
											      ],
								                   "language": dt_idioma,									  
												        "dom": 'Bfrtip',
											          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
								  });
   }});
}
