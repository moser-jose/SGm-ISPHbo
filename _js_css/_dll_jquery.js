function _year(){
   return ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Septembro", "Outubro", "Novembro", "Decembro"];
}

function _set_YearBox( id ){ 
	   var y =new Date();
		   y =y.getFullYear() -5;
		  se =document.getElementById( id ); 
		  op ='';
		   i =0;

	while(i < 6){  
		 op +='<option style="cursor:pointer" value="'+ y +'">'+ 'ano '+y +'</option>';
		 y++;
		 i++;
	 }

	se.innerHTML = op;

	$( '#'+id ).val(y -1);
	//***************//
}

function _week(){
	return [ "Dom.", "Mar.", "Jue.", "Lun.", "Mier.", "Vier.", "Sab." ];
}

/************************************/
/***********************************/
///////Clear the form///////////////
function __RESET_(form){

	$('#'+form).find(':input').each(function(){
	   switch(this.type){
		  case 'password':
		  case 'select-multiple':
		  case 'select-one':
		  case 'text':
		  case 'number':
		  case 'textarea':
		  case 'date':
		  case 'time':
	   $(this).val(''); break;

		 case 'checkbox':
		 case 'radio':
	   this.checked = false;
	  }
	});

  $( '#id').attr("value", '-');
  __BUTTON_();

}
/////////////////////////
function _back(){
    window.history.back();
}

function __BUTTON_(){
 $( '#_dell' ).fadeOut('slow');
}


function __TIME_OFF(){
    d   = new Date();
    day =_week()[d.getDay()];

	m2 = d.getMonth() + 1;
	//year.arrYear = (m2 < 10) ? '0' + m2 : m2;
	mes = _year()[d.getMonth()];

	fecha = mes+' '+d.getDate()+', '+d.getFullYear()+', '+day;

	return fecha;
	//$( '#tOff' ).html( fecha );
}

function __DATA_OFF(){
    d   = new Date();
    day =_week()[d.getDay()];

	m2 = d.getMonth() + 1;
	//year.arrYear = (m2 < 10) ? '0' + m2 : m2;
	mes = _year()[d.getMonth()];

	fecha = mes+' '+d.getDate()+', '+d.getFullYear();

	return fecha;
	//$( '#tOff' ).html( fecha );
}

function __HORA_OFF(){

	var t = new Date();
	var h = t.getHours();
	var m = t.getMinutes();
	var s = t.getSeconds();

	var ampm = h >= 12 ? 'pm' : 'am';
		   h = h % 12;
		   h = h ? h : 12; // the hour '0' should be '12'
		   m = m < 10 ? '0'+m : m;


	ht = h +':'+ m +':'+ s +' '+ ampm;

	return ht;
	//$( '#hOff' ).html( ht );
	//setTimeout('__HORA_OFF()', 1000);
}

//-----------------------------------------------------
function _form_Load_(f, t){

    $("#"+f ).dialog("destroy");
	$("#"+f ).dialog({
			  title: t,
			  show: "drop",
			  width: 850,		  	  hide: "drop",
			  modal: true,		      resizable: false,
			  closeOnEscape:false,    autoOpen:  false

	});


	$("#"+f ).dialog("open");
	$("#"+f ).slideDown("fast");
}
//****************************************************************************************************************************//
/*for to load message delete*/
/*function __popUp_del_(id){
    $( '#id_'   ).attr("value", id);
    $( '#text_' ).html('¿Está usted seguro de que desea eliminar el Registro actual?');

	$("#dialog-confirm").dialog("destroy");
	$("#dialog-confirm").dialog({
			title: "Confirmación de Eliminación!",
			show: "drop",
			width: 300,			  hide: "drop",
			modal: true,		  resizable: false,
			closeOnEscape:false,  autoOpen: false

	});
	$("#dialog-confirm").dialog("open");
	$("#dialog-confirm").slideDown("fast");
}*/

//****************************************************************************************************************************//
/*for to load message*/
function __popUp_Messager_(id){

	$( "#"+id ).dialog("destroy");
	$( "#"+id ).dialog({
			title: "",
			show: "drop",
			width: 350,			  hide: "drop",
			modal: true,		  resizable: false,
			closeOnEscape:false,  autoOpen: false

	});
	$( "#"+id ).dialog("open");
	$( "#"+id ).slideDown("fast");
}
/****************************************************************************************************************************/
function ___Grafic_View_(_title, _Conteudo){
	$.alert({
		      backgroundDismiss: false,
		      confirmButtonClass: 'btn-info',
		      columnClass: 'col-md-12',
			  title: _title,
			  content: _Conteudo,
			  confirmButton: 'Aceitar',
			  theme: 'white',			 
			  icon: 'fa fa-question-circle',
			  animation: 'scalex',
			  cancel: function(){
				   //___Grafic_View_(_title, _Conteudo);

			  }
		  });
}

//function ___Grafic_View_(f, tle){
    //$("#"+f ).dialog("destroy");
//	$("#"+f ).dialog({
//			title: tle,
//			show: "scalex",
//			width: 1000,	      hide: "drop",
//			modal: true,		  resizable: false,
//			closeOnEscape:false,  autoOpen:  false
//
//	});
//	$("#"+f ).dialog("open");
//	$("#"+f ).slideDown("fast");
//}
/****************************************************************************************************************************/
function clearRangeStart_( id ) {
                          document.getElementById( id ).value = "";
                          LEFT_CAL.args.min = null;
                          LEFT_CAL.redraw();
}
/****************************************************************************************************************************/
