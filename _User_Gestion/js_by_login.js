$(document).ready(function (e){ 
	if ($('#_x').val() == '_x'){
		_load_Form_onPopups();
		$( '#usuario, #pass' ).keypress(function(e){ if (e.keyCode == 13) __login(); });
	}
});

function __printFL(){ 
  d =new Date();
  d =d.getFullYear();
	
  txt = '<div id="fAutenticar" align="center">'+
						 
				'<table width="40%" align="center" bgcolor="#FFF">'+
				'			<tr><td colspan="4" align="center">Para acessar insera usuário e senha<br/><spam id="temp"></spam></td></tr>'+
	            '</table>'+          
	  
	                            '<table width="100%" align="center" bgcolor="#FFF">'+
								'<tr><td colspan="4"><hr size="1px" width="97%" /></td></tr> '+
								'</table>'+		
	  
	            '<table width="40%" style="margin-left: 3em" bgcolor="#FFF">'+
				'		<tr height="35px" >'+
				'		<td rowspan="2" align="right" width="30%"><img src="../images/titlee.png" width="60px"></td>'+
				'		<td width="5px">&nbsp;</td>'+
				'		<td>'+
				'		<input type="text" style="color: #000" name="usuario" id="usuario" placeholder="USUÁRIO" />        '+				
				'		</td>        '+
				'		</tr>'+
			
				'	<tr>'+				
				'	<td width="5px">&nbsp;</td>'+
				'	<td>'+
	  
	            '<table><tr><td>'+
				'	 <input type="password" style="color: #000" name="pass" id="pass" placeholder="SENHA" />        '+				
	            '</td><td>'+
	            '<div class="learn-button" style="margin-left: 5px" id="saveB">'+	  				
				'  <img style="cursor:pointer" onClick="__login();" src="../images/arrows.png" id="save_" width="24px">'+
				'</div> '+
	            '</td></tr></table>'+
	  
	  		    '	</td>'+
				'	</tr>'+
	          '</table>'+	
		      
					'<table  width="100%" align="center" bgcolor="#FFF">'+
					'<tr><td colspan="4" ><hr size="1px" width="97%" /></td></tr>'+
					'</table>'+  	       
	                                      
                     ' <div style="color:#FFF; font-size: 11px; margin-left: 15px" align="left">'+ 
                     '                                 <b>'+   
                     									'Este sistema está protegido contra ataques ou tentativas de acesso '+
	  													'não autorizadas, qualquer problema dirija-se ao ADMINISTADOR <br />'+
                     '                                  Huambo-Angola                  <br />'+
                     '                                  ISPHbo &copy; '+d+' Tudos os Direitos Reservados'+  
                     '                                   </p>'+
					 '	  						      </b>'+ 
                     '</div>'+  
		   '</div>';
		   
	return txt;
}

function _load_Form_onPopups(){
   	    $.confirm({
			  title: '<div align="center">Sistema G-Matrículas</div>',
			  content: __printFL(),			  
			  theme: 'black',
			  columnClass: 'col-md-12',
			  animation: 'scalex',			  
			  cancelButton: false,
			  confirmButton: false,
			  closeIcon: false,
			  cancel: function(){ 
				  
				  _load_Form_onPopups(); 
				  $( '#usuario, #pass' ).keypress(function(e){ if (e.keyCode == 13) __login(); });
				  
				  if (atack == 3) { $( '#usuario, #pass' ).attr( 'disabled', true );	
								    $( '#saveB' 		 ).show( 'scalex');
								  }
			  } 
		  });
}

var atack =0;
function __login(){	  
    user = $( '#usuario' ).val();  
    pass = $( '#pass'    ).val();    
    t = true;	
	var options = {};	
    
	if (user == ''){ 
	      $( "#usuario" ).css(  "border", "1px dashed #FF0048");   t = false; 
		  $( "#usuario" ).show( 'pulsate', options, 800, null );
		} 
	else  $( "#usuario" ).css( "border", "1px solid #ABADB3"  ); 		    
	
	if (pass == ''){ 
	      $( "#pass" ).css(  "border", "1px dashed #FF0048"	  );   t = false; 
		  $( "#pass" ).show( 'pulsate', options, 800, null    );
	   } 
	 else $( "#pass" ).css( "border", "1px solid #ABADB3"     );    
	   
	
	
	if (t) 
	$.ajax({ type:"POST", url: "../_User_Gestion/php.php", async: false, data: { accion:"LOGIN_", user:user, pass:pass }, 
	     success: function(data){ 
			data =eval(data); 
			 
			 if     (data == "Operación Exitosa") location.href ="../_Pag_Rols/view_.php";  									  else
			   if   (data == "User Disabled")     _txt ='seu usuário foi desativado por segurança, dirija-se ao administrador!';  else
				 if (data == "Erro") { 
					                 atack++;
									 _txt ='o seu usuário ou a sua senha esta errada, no. de intentos restantes ' + parseInt(3-atack);                  
									 
					 				 $( '#usuario, #pass' ).css( 'border', '1px dashed #FF0048' );  
									 $( '#usuario, #pass' ).show( 'pulsate', options, 800, null );					   
				   	                 
					 
						 if (atack == 3) _txt ='número de tentativas vencidas, espere 30 seg. para tentar de novo!';
			         
			             if (_txt != null){
								$.alert({
								  title: 'Atenção',
								  content: _txt,
								  confirmButton: 'Aceitar',					  
								  theme: 'black',
								  columnClass: 'col-md-6 col-md-offset-3',
								  backgroundDismiss: false,                                  
								  animation: 'scalex',
								  confirm: function () { b =0; $( '#pass' ).focus(); }});
                                 
							     if (atack == 3){
									 $( '#usuario, #pass' ).attr( "disabled", true );
									 $( '#saveB'          ).hide('scalex');
									 setTimeout(__active_, 32000);
									 intF =setInterval(__segundos, 1000);
								 }}
			          }			         			
		}});
}
var seg =30;
function __segundos(){
	
	$('#temp').html(seg);
	seg--;
}
function __active_(){	
	atack =0;
	  seg =30;
	
	$( '#usuario, #pass' ).attr( 'disabled', false );
	$( '#saveB' 		 ).show( 'scalex');
	clearInterval(intF);
	$('#temp').html('');
    
}


function __Close_Session(){
	$.confirm({
			  title: false,
			  content: 'Atenção: está tentando encerrar a sessão actual!',
			  confirmButton: 'Aceitar',
			  autoClose: 'confirm|5000',
			  theme: 'black',
		      keyboardEnabled: true,
			  confirmKeys: [13, 32],
              cancelKeys: [27],
			  icon: 'fa fa-question-circle',
			  animation: 'scalex',
			  confirm: function () {				  
				   $.ajax({ type:"POST", url: "../_User_Gestion/php.php", data: { accion: "CLOSE" } }) 
                    .done(function(){ location.href = "../index.html"; });
			  }
		  });
}

function __loadForm_logo(){ 
	$("#fAutenticar").dialog("destroy");
	$("#fAutenticar").dialog({
			title: "Acceso al Sistema!", 
			show: "drop",
			width: 300,			  hide: "drop",
			modal: true,		  resizable: false,
			closeOnEscape:false,  autoOpen: false

	});
	$("#fAutenticar").dialog("open");		
	$("#fAutenticar").slideDown("fast");	
}