var dt_idioma;
$(document).ready(function(e) { 
	$( '#save_'  ).html('<img src="../images/menu/Save.ico"  width="15px" height="15px" style="vertical-align:sub" />&nbsp;Guardar');
	$( '#save_M' ).html('<img src="../images/menu/Save.ico"  width="15px" height="15px" style="vertical-align:sub" />&nbsp;Guardar');
	$( '#_dell'  ).html('<img src="../images/menu/Dell.ico"  width="15px" height="15px" style="vertical-align:sub" />&nbsp;Eliminar');
	$( '#_clear' ).html('<img src="../images/menu/Clear.ico" width="15px" height="15px" style="vertical-align:sub" />&nbsp;Limpar');
	
	bmenu =$(location).attr('href').split('=-')[1];
	switch (bmenu){
		case 'collapseOne1': { 
							  $( '#collapseOne1'   ).attr('class', 'panel-collapse collapse in'); 
							  $( '#collapseTwo1'   ).attr('class', 'panel-collapse collapse'   );
							  $( '#collapseThree1' ).attr('class', 'panel-collapse collapse'   ); 
			                  break;
							 }
		case 'collapseTwo1': { 
				  $( '#collapseOne1'   ).attr('class', 'panel-collapse collapse'    ); 
				  $( '#collapseTwo1'   ).attr('class', 'panel-collapse collapse in' );
				  $( '#collapseThree1' ).attr('class', 'panel-collapse collapse'    );
			      break;
				 }
		case 'collapseThree1': { 
				  $( '#collapseOne1'   ).attr('class', 'panel-collapse collapse'    ); 
				  $( '#collapseTwo1'   ).attr('class', 'panel-collapse collapse in' );
				  $( '#collapseThree1' ).attr('class', 'panel-collapse collapse'    );
			      break;
				 }
	  }
	
	dt_idioma =_idioma('portugues');
	
    t =setInterval( _set_dt_Selected, 1000 );
});
var t;
var tem =0;
function _set_dt_Selected(){ 
     (tem != 3) ? tem++ : clearInterval (t);

	 if ($.fn.DataTable.isDataTable( '#_list' ) ){ 	 
			$('#_list tbody').on( 'click', 'tr', function () { $(this).toggleClass('selected');  });
		    clearInterval (t);
	 }
}

//-------------------------------------
function _m_Sucesso(txt){
 $.confirm({
			  title: false,
			  content: txt,
			  confirmButton: false,
			  cancelButton: false,
			  autoClose: false,
			  backgroundDismiss: false,
			  theme: 'black',			 			  
			  animation: 'scalex' });
}
//-------------------------------------
/*****Modulo de estudantes****************/
function __GET_PROV_(  id, P ){ 
	$( '#'+id ).html('');
    (P != 1) ? Pa = $( '#'+P ).val() : Pa =P; 
    
	
   $.ajax({ type:"POST", url: "../g_Estudante/_forms_subModules/D_pessonais/php.php", data: "accion=getProv&p="+Pa, 
	     success: function(data){ 
			data = eval(data); 

			se   = document.getElementById( id );  			    
			    op = ''; 
				
			$.each(data, function(i, dat){  
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["provNome"] +'</option>';	
		    });		
			
		    se.innerHTML = op; 
		}, async: false		
	});		
}
function __GET_MUNIC_( id, P ){
	$( '#'+id ).html('');
	p = $( '#'+P ).val(); 

    
   $.ajax({ type:"POST", url: "_forms_subModules/D_pessonais/php.php", data: "accion=getMunic&p="+p, 
	     success: function(data){ 
			data = eval(data); 

			se   = document.getElementById( id );  			    
			    op = ''; 
				
			$.each(data, function(i, dat){  
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["munNome"] +'</option>';	
		    });		
			
		    se.innerHTML = op; 
		}, async: false		
	});		
}
function __GET_CURSO_( id, urL ){
	$( '#'+id ).html('');

   $.ajax({ type:"POST", url: urL, data: "accion=getCU", 
	     success: function(data){ 
			data =eval(data); 

			  se =document.getElementById( id );  			    
			    op  =''; 
				op +='<option style="cursor:pointer" value="">-</option>';
			 
			$.each(data, function(i, dat){  
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["cDesc"] +'</option>';	
		    });		
			
		    se.innerHTML = op; 
		}, async: false		
	});		
}
//-------------------------------------
//-------------------------------------

