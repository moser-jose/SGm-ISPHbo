 //url general para el js.
var _url ='../g_Turma/php.php';

$(document).ready(function(e) {
    	//for validate files
    $( '#viewGT'  ).css('display', 'none');
	$( '#tDesc'   ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
	$( '#tNum'     ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
		
	//for load all users
	__GET_COMBOXS_('id_curso',  'load', 'cDesc', '../g_Curso/php.php'	);
	 _set_YearBox('anoAcademico');
	 _get_grelha()	
	__LOAD_();	
	Gerar_code();
	
	$( '#tPeriodo' 		 ).change(function (){ Gerar_code();           			       });
	$( '#id_curso'       ).change(function (){ Gerar_code(); __LOAD_(); _get_grelha()  });
	$( '#tAno_curricular').change(function (){ Gerar_code();		    			   });
	$( '#anoAcademico'   ).change(function (){ Gerar_code(); __LOAD_();   			   });
		
});

function _get_grelha(){ 
	
	$( '#id_grelha' ).html(''); 
    $.ajax({ type:"POST", url: _url, data:{accion:"getGrelha", curso:$('#id_curso').val()}, 
	      success: function(data){
			 data =eval(data); 

			   se =document.getElementById( 'id_grelha' );  			    
			   op =''; 
			  op +='<option style="cursor:pointer" value="'+ data[0]['id'] +'">'+ data[0]['gDesc'] +'</option>';	
		    			
		    se.innerHTML =op; 
		}, async: false		
	});		
}

function Gerar_code(){
  var dat ={ accion: "get_numT"                 ,
			periodo: $('#tPeriodo').val()       ,
			  curso: $('#id_curso').val()       ,
			   anoA: $('#anoAcademico').val()   ,
			    ano: $('#tAno_curricular').val() };
	
  	 $.ajax({ type:"POST", url: _url, data:{accion:"get_codC", curso:$('#id_curso').val()}, success: function(data){ codC = eval(data); }, async: false });
  	 $.ajax({ type:"POST", url: _url, data:dat, success: function(data){ numT = eval(data); }, async: false });
 	 	
     if (numT[0][0] != null){ 
		 num = parseInt(numT[0][0])+parseInt(1);
											
		 num ='0'+num;
		 
		 $( '#tNum'  ).val( num );
	 } 
	  else 
		 $( '#tNum'  ).val('01');
	
	 $( '#tDesc' ).val(codC[0][0] +'.'+ $('#tAno_curricular').val() +'.'+ $('#tNum').val() +'.'+ $('#tPeriodo').val()[0]);   
}


function __SAVE_(){ 	
  var dat ={ accion:"_SAVE"						,
			 t_name:"turma"						,
			  _form:$('#_view').serializeArray() };
	
    ___SAVE_(dat, 'tDesc', '_view', '../_php/__all_view.php');
	Gerar_code();
}//---------------------------------------------------------------
function __DELL_( id ){	var dat ={ accion:"_DELETE", t_name:"turma", id:id };	
        ___DELL_(dat, '_view', '../_php/__all_view.php');
 }
//-------------------------------

var dt_data;
function __LOAD_(){   
   $.ajax({ type:"POST", url:_url, data:{accion:"load", curso:$('#id_curso').val(), ano:$('#anoAcademico').val()}, async:false,      
		 success: function(data){
			 
			 var i =0;
			 dt_data =eval(data); 			  
			       $('#_list').DataTable({ "destroy": true,
											  "data": dt_data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "tDesc"          },												   																											   
													   {   "data": "cDesc"          },												   																											   
													   {   "data": "tAno_curricular"},												   																											   
													   {   "data": "tPeriodo"       },												   																											   
													   {   "data": "gDesc"          },												   																											   
													   {   "data": "div"             ,
														 "render": function ( data, type, row ) { 
																	   return '<div align="right"><img id="'+i+'" onClick="___Full_Form_(this.id,\'_view\')"  src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																	                             '<img id ="'+row.id+'" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>';							
													   }}         
													  ],"language": dt_idioma
										  });
			                              		  
   }});	
}