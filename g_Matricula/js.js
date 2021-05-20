//url general para el js.
var _url ='../g_Matricula/php.php';

$(document).ready(function(e) { 
    //for validate files	
	$( '#bi'    ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#valor' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('double');
	$( '#vez'   ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('int');
	$( '#turma' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
    $( '#curso' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
    $( '#dataM' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
	

	__LOAD_();
	
	_GET_Grelhas();
	_GET_Grelhas_Reb();
	_set_Semestre();
	
	$( '#bi' ).keyup(function (e){ if (e.keyCode == 13){ _get_EST_();  __LOAD_(); __get_Turmas()     ; 
									                                               _GET_Grelhas()    ;
														                           _GET_Grelhas_Reb();     
														                           document.getElementById('dataM').valueAsDate =new Date();
								                       }else 
														   	if ( ((e.keyCode == 8) || (e.keyCode == 46)) && ($(this).val() == '')){
																  _get_EST_(); __LOAD_(); __get_Turmas()     ; 
									                                                       _GET_Grelhas()    ;
								                                                           _GET_Grelhas_Reb();
																                          $('#dataM').val('');
																 } 
								                                    });	
	
	$('#periodo' ).change(function(){ __get_Turmas() 		;  _GET_Grelhas() ;  _GET_Grelhas_Reb(); });
	
	$('#ano'     ).change(function(){ __get_Turmas() 		;  
									   _set_Semestre()      ; 
									   _GET_Grelhas()       ; 
									  __Checked_Matricula() ; 
									   _print_anos_Reb()    ; 
									   _GET_Grelhas_Reb()	;   
									   _get_VEZ_()  		; 
									});
	
	$('#dataM'   ).change(function(){  __Checked_Matricula()  ; 		     });
	$('#vez'     ).change(function(){        				  /*; _get_VEZ_();*/ });//kitar comentario para calcualr automatico
	$('#vez'     ).keyup(function() {        				  /*; _get_VEZ_(); */});
	$('#anoGR'   ).change(function(){   _GET_Grelhas_Reb()      				  ; });
	$('#semestre').change(function(){  _get_VEZ_();   _GET_Grelhas() ; _GET_Grelhas_Reb(); __Checked_Matricula() ; });
	
	$( '#viewGM'  ).css('display', 'none');
});

function _validate_DISP(){
	 A =false;
	 R =false;
	 b =false;
	 
	 $('#gc_A input[type=checkbox]').each(function(){ if ((this.checked) && ($(this).val() != 0)) A =true; });
	 $('#gc_R input[type=checkbox]').each(function(){ if ((this.checked) && ($(this).val() != 0)) R =true; });
	
    if (A || R) b =true;	  
	     
    return b;  
 }

function _validar_SEM(){
      b =false;
	  d = new Date();
	mes = d.getMonth() +1;
	
	if ($('#ano').val() != 5)// quinto ano pode matricular no 9 semestre	
		if ( $( '#semestre' ).val() % 2 ==1 )
			if (mes >= 5) b =true; else b =false;	
		else
			if (mes <  5) b =true; else b =false;
	else 
		b = true;		
	
	return b;
}

function _get_idTurmaREBUSCA(){
	tur =$( '#turma option:selected' ).text().split('.'); //turma actual
	tur =tur[0]+'.'+$('#anoGR').val()+'.'+tur[2]+'.'+tur[3]; //a buscar
	
    $.ajax({ type:"POST", url: _url, data: "accion=get_idTurmaREBUSCA&turDesc=" +tur, 	     
	 success: function(data){ 
				    data =eval(data); 
				    res =data;
				   }, async: false });	
	return res[0][0];
}

function __SAVE_(){ 

 if (_validate_DISP() ){
	 if (_validar_SEM() ){
	 
	 $.confirm({  backgroundDismiss: false,
				  title: false,
				  content: 'Os dados seram guardados, confirma a operação!',
				  confirmButton: 'Aceitar',
				  autoClose: 'cancel|6000',
				  keyboardEnabled: true,
				  confirmKeys: [13, 32],
				  cancelKeys: [27],
				  theme: 'black',			 				  
				  animation: 'scalex',
				  confirm: function () {
					  
				  
						 /*vars for insert date*/
						   id =$( '#id'    ).val();			 			  		 
						  idE =$( '#idE'   ).val();			 			  		 
							f =$( '#_view' ).serialize()  ;
						anoGR =$( '#anoGR' ).val();							

						   $.ajax({ type:"POST", url: _url, data: "accion=save&id=" +id +"&idE=" +idE +"&f=" +f, async: false });

						   //buscar el id insertado
						   $.ajax({ type:"POST", url: _url, data: "accion=get_id&idE=" +idE, 	     
							success: function(data){ id_Ma = eval(data); }, async: false });					  

					   /****************/
					       if ($('#id').val() != '-'){ // borrar para modificar las disciplinas
							$.ajax({ type:"POST", url: _url, data: "accion=delete_DA&id_M=" +$('#id').val(), async: false });							   
							$.ajax({ type:"POST", url: _url, data: "accion=delete_DR&id_M=" +$('#id').val(), async: false });
						   }
					  /****************/
						   //guardar las disciplinas matriculadas del ano
						   $('#gc_A input[type=checkbox]').each(function(){ 

								if ((this.checked) && ($(this).val() != 0))    
									$.ajax({ type:"POST", url: _url, data: "accion=save_M&id_M=" +id_Ma[0][0] +"&vez=" +$('#vez').val() +"&discp=" +$(this).val(), async: false });
						   }); 
					   ///////////////////////////////////////////////////
						   //guardar las disciplinas matriculadas rebusca
						   if ($('#semestre').val() >= 3){
							   $('#gc_R input[type=checkbox]').each(function(){
									vez =parseInt($('#vez').val());
									vez++;
									if ((this.checked) && ($(this).val() != 0)){   
										turma =_get_idTurmaREBUSCA();
										$.ajax({ type:"POST", url: _url, data: "accion=save_MR&id_M=" +id_Ma[0][0] +"&vez=" +vez +"&discp=" +$(this).val() +"&anoGR=" +anoGR +"&turma=" +turma, async: false });
									}
							   });
						   }
					   
                      //////////////////////////////////////////////////				   			         
									//restart form...
									__RESSET_('_view');
					                 _set_Semestre();
	                                 _get_EST_();
					                 __LOAD_();
									__BUTTON_();
													      
								$( '#error' ).html('<font color="#000"><img width="18" height="18" src="../images/mono-icons/cd.png" />Operação com Sucesso!</font>');				
								$( '#error' ).fadeIn('slow');
														
								$( '#bi'    ).focus(function(e1){
								$( '#error' ).fadeOut('fast', function(e2){ $( '#error > font.font_v' ).remove(); }); });
					  
			        ///////////////////////	
					  __Faturar(id_Ma[0][0]);
					  ///*comprovativo*/window.location.href ="pdf_.php?id_Ma="+id_Ma[0][0];

	 
    }});
		 
}//validar semestre
 else
	 $.alert({
			  backgroundDismiss: false,		          
			  title: false,
			  content: 'Erro: está tentando inserir um semestre errado, verifique-lho!',
			  confirmButton: false,				  
			  theme: 'black',			 
			  keyboardEnabled: true,
			  confirmKeys: [13, 32],
              cancelKeys: [27],
			  animation: 'scalex',
			  confirm: function () {/****/} });
}//validar disciplinas
 else
	     $.alert({
			      backgroundDismiss: false,		          
				  title: false,
				  content: 'Erro: Deve inserir pelo menos uma disciplina!',
				  confirmButton: false,				  
				  theme: 'black',			 
				  keyboardEnabled: true,
				  confirmKeys: [13, 32],
				  cancelKeys: [27],
				  animation: 'scalex',
				  confirm: function () {/****/} });
}
function __Faturar(id){
	//$('#fac').html('<a id="_fac" href="pdf_.php?id_Ma='+id+'" target="_blank"></a>');
	$('#fac').attr('href', 'pdf_.php?id_Ma='+ id);	
   // $("#fac").();
	document.getElementById("fac").click();
}

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
function __Full_Form_( i ){ 
	      var dat =dt_data[i -1];
		  clear_textMatricula();	
		  $( '#id'     ).val(dat.id_ma  			); 
		  $( '#dataM'  ).val(dat.maData 			); 
		  $( '#vez'    ).val(dat.maVez  			);	
		  $( '#ano'    ).val(dat.maAno_curricular   );	
		  $( '#valor'  ).val(dat.maValor_total      );	
		  $( '#obs'    ).val(dat.observacoes        );
	
		  /***********************/
			$.ajax({ type:"POST", url: _url, data: "accion=get_EST&BI=" +$('#bi').val(), 
			 success: function(data){
				   data = eval(data);            

					 $( '#nome' ).val(data[0]['cNome'] ); 
					 $( '#idE'  ).val(data[0]['id']    );
						   /**********/
						   se = document.getElementById( 'curso' ); 			
						   op = '<option style="cursor:pointer" value="'+ data[0]["id_curso"] +'">'+ data[0]['cDesc'] +'</option>';	
						   se.innerHTML = op;			 
						   /**********/	

						  __get_Turmas()	 ;
						   _set_Semestre()	 ;				   		 
		   }, async: false });
		  /*********************************************/	
	  $( '#turma'  	 ).val(dat.id_turma     );  
	  $( '#semestre' ).val(dat.maSemestre   );
	  _print_anos_Reb(); 	
	    
      _GET_Grelhas();  
	
    //poner el ano en las rebuscas para cargar las disciplinas seleccionadas
	$.ajax({ type:"POST", url: _url, data: "accion=get_AR&id_M=" +$('#id').val(),  
     success: function(data){
						   data = eval(data);         

						   if (data != ''){
						   se = document.getElementById( 'anoGR' ); 			
						   op = '<option style="cursor:pointer" value="'+ data[0]["mdAno_curricular"] +'">'+ data[0]['mdAno_curricular'] +'</option>';	
						   se.innerHTML = op;	
						   }
		 }, async: false });

  _GET_Grelhas_Reb() ;
    /***********************/ 
	//marcar las disciplinas
	for (i = 0; i <= 1; i++){
	(i == 0) ? b ='DA' : b ='DR';
		
		 $.ajax({ type:"POST", url: _url, data: "accion=get_D&id_M=" +$('#id').val() +"&b=" +b, 
		  success: function(data){
								   data = eval(data);          

							   if (data != '') 
									 $.each(data, function(i, dat){ 
									 $( '#'+dat['id_disciplina'] ).attr('checked', true);
								 });					   		 
		 }, async: false }); 
	}		
  /*********************************************/  	
  _uncheck_All('gc_A', 'all' );
  _uncheck_All('gc_R', 'all_');
  
  /*show the buton dell*/ 
	_get_idTurmaREBUSCA();
  $( '#_dell' ).fadeIn('slow');
	
}

var dt_data;
function __LOAD_(){  
   $.ajax({ type:"POST", url:'php.php', data: "accion=load&bi="+$('#bi').val(), 
    success: function( data ) { 
		 dt_data =eval(data); 
		       var i =0;	    
	           $('#_list').DataTable({ "destroy": true,
									      "data": dt_data, 
									   "columns": [
										 		   {   "data": "",
													 "render": function (data, type, row){ i++; return i;
												   }},
										 		   {   "data": "bi_passaporte" },
												   {   "data": "cNome"         },
										   		   {   "data": "cGenero"       },																										   										   		   																										   
										   		   {   "data": "cDesc"         },																										   
										   		   {   "data": "maData"        },																										   
										   		   {   "data": "maVez"         },																	   
										   		   {   "data": "tDesc"         },
										           {   "data": "maSemestre"    },
										   		   {   "data": "maValor_total" },																										   
												   {   "data": "div",
												     "render": function ( data, type, row ){ 
																	    ($('#id_U_').val() ==1) ? btn ='<div align="right"><img id="'+i+'" onClick="__Full_Form_(this.id)" src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																	                                   '<img id ="'+row.id_M+'" onClick="__DEL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>'
																							    : btn ='<div></div>';
													 return btn;
												   }},
										           {   "data": "a",
												     "render": function ( data, type, row ){ 
														 	              return '<a href="pdf_.php?id_Ma='+row.id_M+'" target="_blank"><img src="../images/menu/7.ico"  width="18px" height="18px" style="vertical-align:middle" /></a>';													 
												   }}										            
											      ],
									                "language": dt_idioma, 
										                 "dom": 'Bfrtip',
											           buttons: ['copy', 'csv', 'excel', 'pdf', 'print']								      
									 });		
    }, async: false }); 													
}
function __DEL_( id ){	
     $.confirm({
			  title: false,
			  content: 'Atenção: está tentado apagar um registro, os dados se perderão permanentemente!',
		      confirmButton: 'Aceitar',
			  autoClose: 'cancel|6000',
			  theme: 'black',
		      keyboardEnabled: true,
			  confirmKeys: [13, 32],
              cancelKeys: [27],
			  animation: 'scalex',
			  confirm: function () {				  
				   
				    $.ajax({ type:"POST", url: _url, data: "accion=dell&id="+ id, success: function(data){ 
							// var options = {}; 
	                         //$( "#"+id +"xx" ).hide('highlight', options, 800, '');
							
							__RESSET_('_view');
							__LOAD_(); 
							__BUTTON_();     						
		  
		  				}, async: false });
			  }
		  });    
}

function clear_textMatricula(){ $( "#UE" ).fadeOut('slow'); $( "#_panel_b" ).fadeIn('slow') ;}
/************************************************************/
/************************************************************/
function _get_EST_(){ 
	$.ajax({ type:"POST", url: _url, data: "accion=get_EST&BI=" +$('#bi').val(),
		 success: function(data){
	     data = eval(data); 
           
	     if (data != ''){		 
			 $( '#nome' ).attr('value', data[0]['cNome'] ); 		 	  
			 $( '#idE'  ).attr('value', data[0]['id']	 );	

			 /**********/
			   se = document.getElementById( 'curso' ); 			
			   op = '<option style="cursor:pointer" value="'+ data[0]["id_curso"] +'">'+ data[0]['cDesc'] +'</option>';	
			   se.innerHTML = op;			 
			   /**********/	
			        //__LOAD_();
			 	  __get_Turmas();			     
				   _GET_Grelhas();
			       _GET_Grelhas_Reb();
				   _get_VEZ_(); 			     
			 
		 }else {
			 $( '#nome'  ).val('');
			 $( '#idE'   ).val('-');
			 $( '#curso' ).html('');
		 }
			 
   }, async: false	
   });
 	
} 
/***/
function _set_Semestre(){
	se = document.getElementById( 'semestre' );
	
	switch ($('#ano').val()){
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
}
/***/
function __get_Turmas( ){
   a =$('#ano').val();  p =$('#periodo').val();  c =$('#curso').val();   
	 
   $.ajax({ type:"POST", url: _url, data: "accion=getTurma&a="+a +"&p=" +p +"&c=" +c, 
	     success: function(data){ 
			data = eval(data); 

			se   = document.getElementById( 'turma' );  			    
			    op = ''; 
				
			$.each(data, function(i, dat){  
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["tDesc"] +'</option>';	
		    });	
			
		    se.innerHTML = op; 
		}, async: false		
	});		
}
/***/
function _get_VEZ_(){ 
   
   if ( _validar_SEM() ){
			f =$('#_view').serialize();
			
			$.ajax({ type:"POST", url: _url, data: "accion=get_Vez&idE=" +$('#idE').val() +"&f="+f,
				 success: function(data){
				 data = eval(data); 
				   
				 if (data[0][0] == null){
					   $( '#vez' ).val(1);	
					   
				 }			 
				   else {
					   cVez =parseInt(data[0]['vez']);
					   cVez++;
					  (cVez <= 3)
							  ? $( '#vez' ).val(cVez) 
							  : $.alert({
										  title: false,
										  content: 'Atenção: está tentado matrícular um estudante prescrito',
										  confirmButton: false,								 
										  theme: 'black',			 
										  keyboardEnabled: true,
										  confirmKeys: [13, 32],
										  cancelKeys: [27],
										  animation: 'scalex',
										  onclose: function () {  __RESSET_('_view'); _get_EST_(); __BUTTON_();  }, async: false  });
				  }

		   }, async: false	
		   });
   }
} 
/****/
function __Checked_Matricula(){  
   bi =$( "#bi"       ).val();  
  sem =$( "#semestre" ).val();  
    d =$( "#dataM"    ).val();  
	
   $.ajax({ type:"POST", url: _url, data: "accion=chek_Matr&bi="+bi +"&sem="+sem +"&d="+d, 
	     success: function(data){  
			data = eval(data); 		
			 
			if (data != ''){ 
				  $( "#UE" ).fadeIn('slow')        ; 
				  $( "#_panel_b" ).fadeOut('slow') ;				  
				
			   }else{
				   $( "#UE"       ).fadeOut('slow');
                   $( "#_panel_b" ).fadeIn('slow') ;				   
			   }
			 
		}, async: false
	}); 
}
/****/
function __RESSET_(form){
	
	$('#'+form).find(':input').each(function(){ 
	   switch(this.type){ 
		  case 'password': 
		  case 'select-multiple': 
		  case 'select-one': 
		  case 'text': 
		  case 'number':
		  case 'textarea':
		  case 'date': 
	   $(this).val(''); break; 
	   
		 case 'checkbox': 
		 case 'radio': 
	   this.checked = false; 
	  } 
	});	
	
  $( '#id').val( '-' );
	
  __BUTTON_()		   ;
   _get_EST_()		   ; 
   _GET_Grelhas()	   ;
   _GET_Grelhas_Reb()  ;
   _set_Semestre()     ;
   _print_anos_Reb()   ;
   $('#vez'  ).html('');	  	
   $('#turma').html('');
   __LOAD_();   
}
/****/
function _GET_Grelhas(){ 
	
   $.ajax({ type:"POST", url: _url, data: "accion=get_grelha&idC=" +$('#curso').val() +"&sem=" +$('#semestre').val() +"&ano="+$('#ano').val(),       
		 success: function(data){
	     data = eval(data); 

			tables = $.fn.dataTable.fnTables(true); 
            $("#td_grelha").html('');

			$tabla = $("<tbody></tbody>").appendTo($('<table ><thead><tr>'+
													      '<th scope="col" width="1%"><input type="checkbox" id="all" value="0" onclick="_check_All(\'gc_A\', this.id)"></th>'+													     
														  '<th scope="col">Disciplina</th>' +	
														 //'<th scope="col">Tipo</th>'       +	
														  '<th scope="col">Grelha</th>'     +	
													 
														  '</tr></thead></table>').appendTo( "#td_grelha" ));   

			if (data != '') 
            $.each(data, function(i, dat){     $('<tr>'+
												      '<td><input type="checkbox" value="'+dat["id"]+'" name="checkBox[]" id="'+dat["id"]+'" onclick="_uncheck_All(\'gc_A\', \'all\')"></td>'+													 
													  '<td>'+ dat["dDesc"]     +'</td>'+													  
													  //'<td>'+ dat["tDesc"]     +'</td>'+				  
													  '<td>'+ dat["gDesc"]     +'</td>'+													  
												 
							                   '</tr>').appendTo($tabla);
            });
			
			$("#td_grelha table").dataTable({"sDom": '<>t<"F">', "bJQueryUI": true }); 				  
   }, async: false	
   });	
}
function _GET_Grelhas_Reb(){
  if ($('#vez').val() == 3)
	   $.confirm({
				  title: false,
				  content: 'Erro: o estudante '+$('#nome').val()+' não pode fazer rebuscas!!!',
				  confirmButton: false,				  
				  theme: 'black',			 
				  keyboardEnabled: true,
				  confirmKeys: [13, 32],
				  cancelKeys: [27],
				  animation: 'scalex',
				  confirm: function () { /***/ }});
	else {	
		   /*Ano actual*/  aT =$( '#ano'      ).val();
		   /*ano rebusca*/ aR =$( '#anoGR'    ).val();
		   /*sem Actual*/  sA =$( '#semestre' ).val();
		
		   /*dif. anos*/   Da =parseInt(aT) -parseInt(aR);
		   /*canti. sem*/  Cs =Da *2;
		   /*sem Reb.*/     R =sA -Cs;
		
		
		   $.ajax({ type:"POST", url: _url, data: "accion=get_grelhaRH&idC=" +$('#curso').val() +"&ano="+$('#anoGR').val() +"&sem="+R,       
					 success: function(data){
					 data = eval(data); 

						tables = $.fn.dataTable.fnTables(true); 
						$("#td_grelha_R").html('');

						$tabla = $("<tbody></tbody>").appendTo($('<table ><thead><tr>'+
																	  '<th scope="col" width="1%"><input type="checkbox" id="all_" value="0" onclick="_check_All(\'gc_R\', this.id)"></th>'+													     
																	  '<th scope="col">Disciplina</th>' +	
																	  //'<th scope="col">Tipo</th>'       +																  	
																	  '<th scope="col">Grelha</th>'     +	

																	  '</tr></thead></table>').appendTo( "#td_grelha_R" ));   

						if ((data != '') && ($('#ano').val() >= 2))
						$.each(data, function(i, dat){     $('<tr>'+
																  '<td><input type="checkbox" value="'+dat["id"]+'" name="checkBox[]" id="'+dat["id"]+'" onclick="_uncheck_All(\'gc_R\', \'all_\')"></td>'+													 
																  '<td>'+ dat["dDesc"]     +'</td>'+													  
																  //'<td>'+ dat["tDesc"]     +'</td>'+				  
																  '<td>'+ dat["gDesc"]     +'</td>'+													  

														   '</tr>').appendTo($tabla);
						});

						$("#td_grelha_R table").dataTable({"sDom": '<>t<"F">', "bJQueryUI": true }); 				  
			   }, async: false	
			   });	
  } 
	    
}
function _uncheck_All( _form, id ){
	b =false;
	$('#'+_form +' input[type=checkbox]').each(function(){ if ((!this.checked) && (this.id != id)) b =true; }); 
	
	(!b) ? $('#'+id).attr('checked', true) : $('#'+id).attr('checked', false); 
}
function _check_All( _form, id ){
	$('#'+_form +' input[type=checkbox]').each(function(){ 
		
		($('#'+id).attr('checked')) ? this.checked = true : this.checked = false; }); 
}
function _print_anos_Reb(){
	aC =$('#ano').val();

	  se =document.getElementById( 'anoGR' );  			    
	  op ='';
    for (i =1; i <aC; i++)			 
			    op += '<option style="cursor:pointer" value="'+ i +'">'+ i +'°</option>';	
			
       se.innerHTML = op;
	
}