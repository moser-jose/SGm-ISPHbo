function __GET_COMBOXS_(idc, action, value, url_) {
	$('#' + idc).html('');
	var costo = 0;
	$.ajax({
		type: "POST", url: url_, data: "accion=" + action,
		success: function (data) {
			data = eval(data);
			se = document.getElementById(idc);

			op = '';
			op = "<option value=" + '0' + ">Selecione --</option>";
			$.each(data, function (i, dat) {
				costo = dat["costo"];
				op += '<option style="cursor:pointer" value="' + dat["id"] + '">' + dat[value] + '</option>';
			});
			console.log(costo);
			se.innerHTML = op;
		}, async: false
	});
}

function _PEGARDADOS_(tr, id, action, campo, url_) {
	tb = document.getElementById(tr);
	se = document.getElementById(campo);
	tb.style.display = "contents";
	$.ajax({
		type: "POST", url: url_, data: "accion=" + action,
		success: function (data) {
			data = eval(data);
			$.each(data, function (i, dat) {
				if (id === dat['id']) {
					se.innerText = dat['costo'];
				}
			});

		}, async: false
	});
}


//-------------------------------------
function _idioma(idioma) {
	switch (idioma) {
		case 'español': {
			var idm = {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Sin resultados encontrados",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
			return idm;
			break;
		}
		case 'portugues': {
			var idm = {
				"decimal": "",
				"emptyTable": "Não tem informação",
				"info": "Mostrando _START_ até _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 até 0 de 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Processando...",
				"search": "Buscar:",
				"zeroRecords": "Sem resultados encontrados",
				"paginate": {
					"first": "Primeiro",
					"last": "Ultimo",
					"next": "Seguinte",
					"previous": "Anterior"
				},
				"buttons": {
					"copy": "Copiar",
					"print": "Imprimir"
				}
			}
			return idm;
			break;
		}
	}
}
//-------------------------------------
function ___SAVE_(dat, cmp, _form, _url_) {
	$.ajax({ type: "POST", url: _url_, data: dat, async: false })
		.done(function (data) {
			console.log(eval(data));

			__LOAD_();
			if (cmp !== 'tDesc') __RESET_(_form);
			__BUTTON_();

			$('#error').html('<font color="#000"><img width="18" height="18" src="../images/mono-icons/check32.png" />Operação com sucesso!</font>');
			$('#error').fadeIn('slow');

			$("#" + cmp).focus(function (e1) {
				$('#error').fadeOut('fast', function (e2) { $('#error > font.font_v').remove(); });
			});

		});
}
function ___Full_Form_(i, _form) {
	$('#' + _form).find(':input').each(function () {
		$(this).val(dt_data[i - 1][$(this).attr('name')]);
	});

	$('#_dell').fadeIn('slow');
}
function ___DELL_(dat, _form, _url_) {
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

			$.ajax({ type: "POST", url: _url_, data: dat, async: false })
				.done(function (data) {
					//poner el alert bonito
					__RESET_(_form);
					__LOAD_();
					__BUTTON_();
				});
		}
	});
}
//-------------------------------------

function _year() {
	return ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Septembro", "Outubro", "Novembro", "Decembro"];
}
function _set_mounthBox(id) {

	se = document.getElementById(id);
	op = '';
	mounth_ = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Septembro", "Outubro", "Novembro", "Decembro"];
	$(mounth_).each(function (i, dat) {
		op += '<option style="cursor:pointer" value="' + dat + '">' + dat + '</option>';
	});

	se.innerHTML = op;
}

function _set_YearBox(id) {
	var y = new Date();
	y = y.getFullYear() - 5;
	se = document.getElementById(id);
	op = '';
	i = 0;

	while (i < 6) {
		op += '<option style="cursor:pointer" value="' + y + '">' + 'ano ' + y + '</option>';
		y++;
		i++;
	}

	se.innerHTML = op;

	$('#' + id).val(y - 1);
	//***************//
}

function _week() {
	return ["Dom.", "Mar.", "Jue.", "Lun.", "Mier.", "Vier.", "Sab."];
}

/************************************/
/***********************************/
///////Clear the form///////////////
function __RESET_(form) {

	$('#' + form).find(':input').each(function () {
		switch (this.type) {
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

	$('#id').attr("value", '-');
	__BUTTON_();

}
/////////////////////////
function _back() {
	window.history.back();
}

function __BUTTON_() {
	$('#_dell').fadeOut('slow');
}


function __TIME_OFF() {
	d = new Date();
	day = _week()[d.getDay()];

	m2 = d.getMonth() + 1;
	//year.arrYear = (m2 < 10) ? '0' + m2 : m2;
	mes = _year()[d.getMonth()];

	fecha = mes + ' ' + d.getDate() + ', ' + d.getFullYear() + ', ' + day;

	return fecha;
	//$( '#tOff' ).html( fecha );
}

function __DATA_OFF() {
	d = new Date();
	day = _week()[d.getDay()];

	m2 = d.getMonth() + 1;
	//year.arrYear = (m2 < 10) ? '0' + m2 : m2;
	mes = _year()[d.getMonth()];

	fecha = mes + ' ' + d.getDate() + ', ' + d.getFullYear();

	return fecha;
	//$( '#tOff' ).html( fecha );
}

function __HORA_OFF() {

	var t = new Date();
	var h = t.getHours();
	var m = t.getMinutes();
	var s = t.getSeconds();

	var ampm = h >= 12 ? 'pm' : 'am';
	h = h % 12;
	h = h ? h : 12; // the hour '0' should be '12'
	m = m < 10 ? '0' + m : m;


	ht = h + ':' + m + ':' + s + ' ' + ampm;

	return ht;
	//$( '#hOff' ).html( ht );
	//setTimeout('__HORA_OFF()', 1000);
}

//-----------------------------------------------------
function _form_Load_(f, t) {

	$("#" + f).dialog("destroy");
	$("#" + f).dialog({
		title: t,
		show: "drop",
		width: 850, hide: "drop",
		modal: true, resizable: false,
		closeOnEscape: false, autoOpen: false

	});


	$("#" + f).dialog("open");
	$("#" + f).slideDown("fast");
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
function __popUp_Messager_(id) {

	$("#" + id).dialog("destroy");
	$("#" + id).dialog({
		title: "",
		show: "drop",
		width: 350, hide: "drop",
		modal: true, resizable: false,
		closeOnEscape: false, autoOpen: false

	});
	$("#" + id).dialog("open");
	$("#" + id).slideDown("fast");
}
/****************************************************************************************************************************/
function ___Grafic_View_(_title, _Conteudo) {
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
		cancel: function () {
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
function clearRangeStart_(id) {
	document.getElementById(id).value = "";
	LEFT_CAL.args.min = null;
	LEFT_CAL.redraw();
}
/****************************************************************************************************************************/
