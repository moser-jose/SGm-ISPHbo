___url ="../php.php";
//---------------------------------------------------------------------------------------------------------------------------/
function ___Grafic_cs__(){		
	   r  =new Array();	    	 	
        
i =1; while(i <= 10){	  
			$.ajax({ type:"POST", url: ___url, data: "accion=___Grafic_cs__&curso="+$( '#curso' ).val() +"&semt="+i +"&ano="+$( '#ano' ).val(),      
			 success: function(data){
							   data =eval(data); 
							   r[i-1] =data[0];
			  }, async: false						
			 }); 
			
		i++;
	  }		   
	return r;     	
}
//---------------------------------------------------------------------------------------------------------------------------/
function __get_curso__(){	 
	  id =new Array();	
	   c =new Array();	
	  _r =new Array();	
         	  
			$.ajax({ type:"POST", url: '../../g_Estudante/_forms_subModules/D_pessonais/php.php', data: "accion=getCU",      
			 success: function(data){
				     
				     data =eval(data);  
				 if (data != '')
				 $.each(data, function(i, dat){ id[i] =dat['id']; 
											     c[i] =dat['cDesc'];
											  });
			  }, async: false						
			 }); 
	
		   _r[0] =id; 	
		   _r[1] =c; 	
	return _r;     	
}
function ___Grafic_cv__(){	 
    _r =new Array();
	c =new Array();
	c =__get_curso__()[0];
        
       $.each(c, function(i, dat){   
			$.ajax({ type:"POST", url: ___url, data: "accion=___Grafic_cv__&ano="+$( '#ano' ).val() +"&curso="+dat,      
			 success: function(data){
							   data =eval(data); 
				       (data[0][0] != null) ? _r[i] =Math.round(data[0]['valorT'], 0) : _r[i] =0;
			  }, async: false						
			 });
	   });
		   
	return _r;     	
}
//---------------------------------------------------------------------------------------------------------------------------/
function __get_Usuario__(){	 
	  id =new Array();	
	   c =new Array();	
	  _r =new Array();	
         	  
			$.ajax({ type:"POST", url: ___url, data: "accion=getUserAct",      
			 success: function(data){
				     
				     data =eval(data);  
				 if (data != '')
				 $.each(data, function(i, dat){  id[i] =dat['id']; 
												  c[i] =dat['users'];				                                
											  });
			  }, async: false						
			 }); 
	
		   _r[0] =id; 	
		   _r[1] =c; 	
	return _r;     	
}
function ___Grafic_um__(){	 
    _f =new Array();
    _m =new Array();
	c =new Array();
	c =__get_Usuario__()[0]; 
        
	
       $.each(c, function(i, dat){   
			$.ajax({ type:"POST", url: ___url, data: "accion=___Grafic_um__&us=" +dat +"&ano="+$('#ano').val(),      
			 success: function(data){
					           data =eval(data); 
				       (data[0][0] != null) ? _f[i] =Math.round(data[0][0], 0) : _f[i] =0;
				       (data[0][1] != null) ? _m[i] =Math.round(data[0][1], 0) : _m[i] =0;
			  }, async: false						
			 });
	   });
		   
	       _r[0] =_f; 	
		   _r[1] =_m;
	return _r;     	
}


function ___Grafic_cr__(){		
    _r =new Array();
 
			$.ajax({ type:"POST", url: ___url, data: "accion=___Grafic_cr__&ano="+$( '#ano' ).val(),      
			 success: function(data){			 
				 
				 data =eval(data);  
				 if (data != '')
				     $.each(data, function(i, dat){ _r[i] =Math.round(dat.valorT); });
				 
			  }, async: false						
			 });
		   
	return _r;    	
}
