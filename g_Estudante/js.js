var dt_data;
$(document).ready(function(e) {
	//__upDateDATA ();
	//__upDateNOME();
	$( '#viewGE' ).css('display', 'none');
	
	__LOAD_();
	//load 
		__LOAD_PER_( dt_data );
		__LOAD_PRO_( dt_data );
	    __LOAD_ACA_( dt_data );
		__LOAD_CNT_( dt_data );
	
	$( '#Acurso' ).change(function (){  if ($( '#id' ).val() == '-'){
		                                       __LOAD_();
											   __LOAD_PER_( dt_data );
											   __LOAD_PRO_( dt_data );
											   __LOAD_ACA_( dt_data );
											   __LOAD_CNT_( dt_data );
									      }
									 });
   
			$('#_list_M tbody'  ).on( 'click', 'tr', function () { $(this).toggleClass('selected');  }); 	
			$('#_list_ACA tbody').on( 'click', 'tr', function () { $(this).toggleClass('selected');  });
			$('#_list_CNT tbody').on( 'click', 'tr', function () { $(this).toggleClass('selected');  });
			$('#_list_PRO tbody').on( 'click', 'tr', function () { $(this).toggleClass('selected');  });
	
});

function __LOAD_(){ 
	$.ajax({ type:"POST", url:"php.php", data:{accion:"loadEst", id_curso:$('#Acurso').val()}, async: false,
	         success: function( data ){ 
		              dt_data =eval( data ); 		
	} });
}

function bSaveControl( p ){
	(p == 'c') 
		? $('#save_M').fadeIn('slow') 
	    : $('#save_M').fadeOut('slow');
}

function __SAVE_M(){ 
   /*saver data of personales*/ b = __SAVE_PER(); 
	                            if (b == 'Successfull INS'){	
									
								   id_C = getID( $( '#BIpass').val() );  //get id curren del candidato
								   
	      /*saver data of profesionals*/_Sabe_DL_PRO( id_C );	
	   	    /*saver data of academicos*/_Sabe_DL_ACA( id_C );
									          op ='Insert';
									} else {  op ='upDate';
											 _Sabe_DL_PRO( $( '#id' ).val() );	//update data profesionals
											 _Sabe_DL_ACA( $( '#id' ).val() );  //update data academic
										   }
	
	//guardar la traza de la operacion (insert/update)
	var dat ={ accion: "save_act"        , 
			      biP: $('#BIpass').val(), 
			     desc: $('#nome').val()  , 
			    curso: $('#Acurso').val(), 
			       op: op                , 
			     data: __TIME_OFF()      , 
			     hora: __HORA_OFF()       };
	
	  $.ajax({ type:"POST", url:"php.php", data: dat, async: false }) 	     
	   .done(function(){ 
		/**LOAD*///
			__LOAD_();
			__LOAD_PER_( dt_data );
			__LOAD_PRO_( dt_data );
			__LOAD_ACA_( dt_data );
			__LOAD_CNT_( dt_data );

		//restar valor the id
			 __RESET_('_view_M');	
			 __BUTTON_();
		   /***/
	
				$( '#error' ).html('<font color="#000"><img width="18" height="18" src="../images/mono-icons/check32.png" />Operação com Sucesso!</font>');	
				$( '#error' ).fadeIn('slow');
				$( '#nome'  ).focus(function(){
				$( '#error' ).fadeOut('fast', function(){ $('#error > font.font_v').remove(); }); });
		  });
	                            
}

function getID( BI ){ 
	$.ajax({ type:"POST", url:"php.php", data:{accion:"getID", BI:BI}, async: false }) 	     
	 .done(function(data){  
				 data = eval(data); 				
				   ID = data;	 
				 }
		   ); 
	return ID;
}

function __DELL_E( i ){ 	
     $.confirm({
			  title: false,
			  content: 'Atenção: está tentado apagar um registro, os dados se perderão permanentemente!',
			  confirmButton: 'Aceitar',
			  autoClose: 'cancel|6000',
		 	  keyboardEnabled: true,
			  confirmKeys: [13, 32],
              cancelKeys: [27],
			  theme: 'black',			 			  
			  animation: 'scalex',
			  confirm: function () {				  
				  
				    //guardar la traza de la operacion (insert/update)	 
				   	var arr =[];
					    arr.push ({"name":"aIdentify",  "value":dt_data[i -1].bi_passaporte});
					    arr.push ({"name":"aDesc",      "value":dt_data[i -1].cNome        });
					    arr.push ({"name":"id_curso",   "value":dt_data[i -1].id_curso     });
					    arr.push ({"name":"aOperation", "value":"Delete"                   });
					    arr.push ({"name":"aData", 		"value":__TIME_OFF()               });
					    arr.push ({"name":"aHora", 		"value":__HORA_OFF()               });				  
				    var dat ={ accion:"save_act", _form:arr };				  
				  
					  $.ajax({ type:"POST", url:"php.php", data: dat, async: false }) 	     
					   .done(function(){  
				            
						    __DELL_ACA( dt_data[i -1].escola_id, dt_data[i -1].universidad_id );
							__DELL_PRO( dt_data[i -1].id );
				  										    
			                      __LOAD_();
								  __LOAD_PER_( dt_data );
								  __LOAD_PRO_( dt_data );
								  __LOAD_ACA_( dt_data );
								  __LOAD_CNT_( dt_data );
						
						    __RESET_('_view_M');
							__BUTTON_();     						
		  					});
		  			
			  }
		  });    
}

function __Full_Form_G( i ){		
	__Full_Form_P(      dt_data[i -1] );
	__Full_Form_PRO(    dt_data[i -1] );
	__Full_Form_ACA( i, dt_data[i -1] );
	__Full_Form_CNT(    dt_data[i -1] );
}