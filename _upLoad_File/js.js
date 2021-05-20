function _upload(){
	var carpeta = '../ispace/Pictures/';	//direccion de la carpeta destino		 	   

	$.each(document.getElementById("newFile").files, function(i, nimg){ 
	  id =  $( '#bi'  ).attr("value");

		var url = "../_upLoad_File/php.php?&accion=addFile&carpeta="+carpeta +"&id="+id;				 
		var data = new FormData();	
	    data.append('archivo', nimg);

	    $.ajax({
			  url:url, type:'POST', contentType:false, data:data, processData:false, cache:false,
			  success: function(data){
				data = eval(data);
				  /*switch (data[0].tipo){
					 case "existe": if(confirm('Desea remplazar : '+data[0].texto)) remplazarFile(); else eliminarelFile(); break;
					 case "error": alert(data[0].texto); break;
					 default : break;					
				  }*/		
				//------------------------------------
				$("#newFile").attr("value", "");
			  }, async: false
		  });	
	});	
}	
