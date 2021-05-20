function _Rst_barForza(){
	$('#meter').html('');
	        
	/*****validate pass***********/				 				 
		 $('#meter').entropizer({
			target: '#pass, #pass2',
			update: function(data, ui){ 
										ui.bar.css({ 'background-color': data.color,	
													  'width': data.percent + '%'	
												   });				       
			__Checked_Forza_(data.color);	
			__Checked_Pass();
			}
		 });	
}

function __SAVE_(){ 	
	($( '#activo' ).attr('checked') =='checked') ? act =1 : act =0;
	 arr =[];
	 arr.push ({"name":"id",      "value":$('#id'     ).val() });
	 arr.push ({"name":"nome",    "value":$('#nome'   ).val() });
	 arr.push ({"name":"users",   "value":$('#users'  ).val() });
	 arr.push ({"name":"pass",    "value":$('#pass'   ).val() });
	 arr.push ({"name":"id_roll", "value":$('#id_roll').val() });
	 arr.push ({"name":"activo",  "value":act                 });				  
 var dat ={ accion:"SAVE", _form:arr };	
		
	
	   $.ajax({ type:"POST", url:"php.php", data:dat, async:false })
		.done(function(data){          
					__LOAD_(); 				
					__RESET_('_view');		
					__BUTTON_();
					 _Rst_barForza();  

					$( '#error' ).html('<font color="#000"><img width="18" height="18" src="../images/mono-icons/check32.png" />Operação com sucesso!</font>');				
					$( '#error' ).fadeIn('slow');

					$( "#users" ).focus(function(e1){
					$( '#error' ).fadeOut('fast', function(e2){ $('#error > font.font_v').remove(); }); 				 															 
				  });			
			       						
	  	   });
}//---------------------------------------------------------------
function __DELL_( id ){	var dat ={ accion:"_DELETE", t_name:"users", id:id };	
        ___DELL_(dat, '_view', '../_php/__all_view.php');
 }
//-------------------------------

function __Mudar_Senha_(){ 
       $.confirm({
			  title: false,
			  content: 'Atenção: a sua senha será mudada de forma permanentemente!',
			  confirmButton: 'Aceitar',
			  autoClose: 'cancel|6000',
		      keyboardEnabled: true,
			  confirmKeys: [13, 32],
              cancelKeys: [27],
			  theme: 'black',			 			  
			  animation: 'scalex',
			  confirm: function () {
				  
				      $.confirm({
							  title: false,
							  content: 'Atenão: a senha foi mudada con sucesso, a sua sessão vai ser encerrada!',
							  confirmButton: false,
							  cancelButton: false,
							  autoClose: false,
						      backgroundDismiss: false,
							  theme: 'black',			 			  
							  animation: 'scalex',
							  onClose: function () { 
	
								             arr =[];
											 arr.push ({"name":"id",      "value":$('#id'     ).val() });
											 arr.push ({"name":"pass",    "value":$('#pass'   ).val() });			  
										 var dat ={ accion:"mudarSenha", _form:arr };									  
											 
											   $.ajax({ type:"POST", url: "php.php", data:dat, async: false                     });
											   $.ajax({ type:"POST", url: "../_User_Gestion/php.php", data: { accion: "Close" } }) 
												.done(function() { location.href = "../index.html";                             });
								   }});
    }});				  
}

var dt_data;
function __LOAD_(){ 
	
	$.ajax({ type:"POST", url:'php.php', data: { accion:"LOAD" }, async: false,
          success: function( data ) {		 
			var i =0;
			dt_data =eval(data);
			       $('#_list').DataTable({ "destroy": true,
											  "data": dt_data, 
										   "columns": [
													   {   "data": "",
														 "render": function (data, type, row){ i++; return i;																		                     
													   }},
													   {   "data": "nome" },
													   {   "data": "users" },
													   {   "data": "roll" },														
													   {   "data": "font",
														 "render": function (data, type, row){
																			(row["activo"] == 1) ? act ='<font color="#004000">Habilitado</font>' 
																								 : act ='<font color="#800000">Deshabilitado</font>'; return act;															 
													   }},
													   { "data"   : "div",
														 "render" : function ( data, type, row ) { 
																	   return '<div align="right"><img id="'+i+'" onClick="__Full_Form_(this.id)" src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />'+
																								 '<img id="'+row.id+'" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" />'											
													   }}         
													  ],"language": dt_idioma
										  });			
		}}); 	
	}

function __Full_Form_( i ){ 
  ___Full_Form_(i,'_view');
	
    $('#pass2').val( dt_data[i -1].pass ); 
	(dt_data[i -1].activo ==1) ? $( '#activo' ).attr('checked', true) : $( '#activo' ).attr('checked', false);   
 
			/*****validate pass***********/		              
				$('#meter').html('');             
				$('#meter').entropizer({ 
								target: '#pass, #pass2', 
								update: function(data, ui){ 
															ui.bar.css({ 'background-color': data.color,	
																		  'width': data.percent + '%'	
																	   });				       
								__Checked_Forza_(data.color);	
								__Checked_Pass();
								}
							 });
			/********************/	 	
}
//-------------------------------------------------------------------------------/
function getNivel( id ){
  r = new Array();
  $.ajax({ type:"POST", url: "php.php", data: { accion:"getNivel", u:id }, async: false,
       success: function(data){
			 data = eval(data); 
			   r[0] =data[0]["id"];
			   r[1] =data[0]["nivel"];
				 
			 }});	
	return r;
}

function __Checked_User(){    
	
   $.ajax({ type:"POST", url: "php.php", data: { accion:"chek_user", user:$( "#users" ).val() }, async: false,
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

var pForza ='Devil';
function __Checked_Forza_( val ){ (val != '#e13') ? pForza ='Forte' : pForza ='Devil'; }

function __Checked_Pass( ){  	
  if (($( "#pass" ).val() != $( "#pass2" ).val()) || (pForza == 'Devil'))
   { 
	  if (($( "#pass" ).val() != '') || ($( "#pass2" ).val() != '')) $( "#cp" ).fadeIn('slow');
	  if (($( "#pass" ).val() == '') && ($( "#pass2" ).val() == '')) $( "#cp" ).fadeOut('slow');
	   
	  $( "#_panel_b" ).fadeOut('slow'); 
   }
    else{	 
		  $( "#cp" ).fadeOut('slow'); 		   
		  $( "#_panel_b" ).fadeIn('slow'); 	
        }
}

/****************NOMENCLADOR************/
function __load_rol(){   
   $.ajax({ type:"POST", url: "php.php", data: { accion:"load_rol" }, async: false,
     success: function(data){ 
			data = eval(data); 
  
			 se   = document.getElementById("id_roll");  			    
			    op = ''; 
				op = '<option value="">--Seleccione--</option>';
				
			$.each(data, function(i, dat){
				if (i >0)
			    op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["roll"] +'</option>';	
		    });		
			
		    se.innerHTML = op; 
				
		}}); 

}

function __load_Profe(){   
   $.ajax({ type:"POST", url: "php.php", data: { accion:"load_profe" }, async: false,
     success: function(data){ 
			data = eval(data); 
  
			 se  = document.getElementById("name");  			    
			  op = ''; 
				
			$.each(data, function(i, dat){
			    op += '<option style="cursor:pointer" value="'+ dat["nome"] +'">'+ dat["nome"] +'</option>';	
		    });		
			
		    se.innerHTML = op; 
				
		}}); 

}
/***************END NOMENCLADOR************/


