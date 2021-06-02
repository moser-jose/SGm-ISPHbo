//url general para el js.
var _url = '../g_Pagamentos/php.php';

$(document).ready(function(e) {


    __LOAD_();
    $('#viewPPP').css('display', 'none');
    $('#bi').clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
    $('#estudante').clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
    $('#tipo_pagamento').clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
    $('#modo_pagamento').clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
    $('#conta').clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('double');
    $('#imposto').clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('double');
    $('#desconto').clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_num('double');

    __GET_COMBOXS_('tipo_pagamento', 'getTP', 'nome', _url);

    __GET_COMBOXS_('banco', 'getBanco', 'bancNome', _url);
    __GET_COMBOXS_('modo_pagamento', 'getfPag', 'ffpNome', _url);



    //Para mudar a conta do banco de acordo ao banco
    __GET_COMBOXS_('conta', 'getConta&b=' + $('#banco').val(), 'contNumero', _url);

    $("select.nomeBanco").change(function() {
        var idBanco = $(this).attr('value');
        __GET_COMBOXS_('conta', 'getConta&b=' + idBanco, 'contNumero', _url);

    });
    //============================




    // // aNTERIOR CARREGAMENTO DA GRELHA
    // _getGrelha_();
    // __GET_COMBOXS_('disc', 'load&grelha=' + $('#grelha').val(), 'dDesc', '../g_Disciplina/php.php');
    // _set_mounthBox('mes');



    //CARREGAMENTO DA GRELHA de disciplinas de acordo ao BI
    // _getGrelha_();
    $('#bi').keyup(function(e) {
        if (e.keyCode == 13) {
            __GET_COMBOXS_('disc', 'loadDiscCurso&grelha=' + $('#bi').val(), 'dDesc', '../g_Disciplina/php.php');
        }
    });
    //============================





    //Carregamento do valor em função do tipo de emolumeto seleccionado 
    var cb;
    $('#bi').keyup(function(e) {
        if (e.keyCode == 13) {
            _get_EST_()
        }
    });

    $('#tipo_pagamento').change(function() {
        set_detalhe();
        if ($('#tipo_pagamento').val() > 0) {
            cb = _PEGARDADOS_('val_e', $('#tipo_pagamento').val(), 'getTP', 'valor_emulumentos', _url);
            $('#valor_final').val(cb)
        } else {
            $('#val_e').css({
                'display': 'none'
            });

        }

    });

    //=====




    $('#imposto, #desconto').keyup(function() {
        if ($('#desconto').val() == '') {
            $('#desconto').val(0)
        }
        if ($('#imposto').val() == '') {
            $('#imposto').val(0)
        }
        if ($('#desconto').val() != '')
            parseFloat($('#valor_final').val(parseFloat($('#valor_emulumentos').text()) + ((parseFloat($('#valor_emulumentos').text()) * $('#imposto').val()) / 100) - ((parseFloat($('#valor_emulumentos').text()) * $('#desconto').val()) / 100)));
        else
            $('#valor_final').val($('#imposto').val());

    });




    // $('#grelha').change(function() {
    //     __GET_COMBOXS_('disc', 'load&grelha=' + $('#grelha').val(), 'dDesc', '../g_Disciplina/php.php');
    // });


});

function __SAVE_() {
    arr = [];
    arr.push({ "name": "id", "value": $('#id').val() });
    arr.push({ "name": "data", "value": __DATA_OFF() });
    arr.push({ "name": "bi", "value": $('#bi').val() });
    arr.push({ "name": "id_estudante", "value": $('#estudante').val() });
    arr.push({ "name": "id_tipo_pagamento", "value": $('#tipo_pagamento').val() });
    arr.push({ "name": "id_modo_pagamento", "value": $('#modo_pagamento').val() });
    arr.push({ "name": "id_conta", "value": $('#conta').val() });
    arr.push({ "name": "imposto", "value": $('#imposto').val() });
    arr.push({ "name": "desconto", "value": $('#desconto').val() });
    arr.push({ "name": "valor_final", "value": $('#valor_final').val() });
    arr.push({ "name": "id_funcionario", "value": $('#func').val() });

    //Analisa o valor pego do tipo de pagamento
    tp = $('#tipo_pagamento').val();

    if (tp == 2 || tp == 4)
        mes = $('#mes').val();

    else if (tp == 3 || tp == 5 || tp == 8 || tp == 10)
        disc = $('#disc').val();

    console.log("valor da disciplina____" + disc);


    var dat = {
        accion: "_SAVE",
        t_name: "factura",
        _form: arr
    };

    ___SAVE_(dat, 'bi', '_view', '../_php/__all_view.php');


    //buscar o último id inserido para depois inserir na tabela
    //
    $.ajax({
        type: "POST",
        //vai to arquivo g_pagamentos e localiza o post correspondente
        //para pegar o ultimo Id da factura do estudante seleccionado
        url: _url,
        //concatena o palavra get_id + idE (que recebe o BI)
        data: "accion=get_id&idE=" + dat._form[2].value,




        //entendi que pega o valor máximo e efectua uma comparação
        success: function(data) { id_Max = eval(data); },
        async: false
    });

    //para guardar id da fatura na tabela_emolumento correspondente aos omolumentos normais
    if (tp == 1 || tp == 6 || tp == 7 || tp == 9 || tp == 11 || tp == 12 || tp == 13 || tp == 14 || tp == 15 || tp == 16 || tp == 17 || tp == 18 || tp == 19 || tp == 20 || tp == 21 || tp == 22 || tp == 24 || tp == 23 || tp == 25) {
        arr1 = [];
        arr1.push({ "name": "id", "value": '-' });
        arr1.push({ "name": "id_factura", "value": id_Max[0][0] });
        tb = 'factura_emolumento';

    }

    //para guardar id da fatura na tabela o do que é relacionado a propinas correspondente

    if (tp == 2 || tp == 4) {
        arr1 = [];
        arr1.push({ "name": "id", "value": '-' });
        arr1.push({ "name": "mes_pago", "value": mes });

        arr1.push({ "name": "id_factura", "value": id_Max[0][0] });

        tb = 'factura_propina';
    }
    //para guardar id da fatura de tudo que é relacionado a exames correspondente
    if (tp == 3 || tp == 5 || tp == 8 || tp == 10) {

        arr1 = [];
        arr1.push({ "name": "id", "value": '-' });
        arr1.push({ "name": "id_disciplina", "value": disc });
        arr1.push({ "name": "id_factura", "value": id_Max[0][0] });
        tb = 'factura_exame';
    }

    // if (tp != 1) {
    var dat1 = {
        accion: "_SAVE",
        t_name: tb,
        _form: arr1
    };







    //Salva os outros detalhes das outras tabelas relacionadas com faturas
    ___SAVE_(dat1, 'bi', '_view', '../_php/__all_view.php');





    __Faturar(id_Max[0][0]);



}
//---------------------------------------------------------------

function __Faturar(id) {
    //$('#fac').html('<a id="_fac" href="pdf_.php?id_Ma='+id+'" target="_blank"></a>');
    $('#fac').attr('href', 'pdf_.php?id_Ma=' + id);
    // $("#fac").();
    document.getElementById("fac").click();
}

function __DELL_(id) {
    var dat = { accion: "_DELETE", t_name: "factura", id: id };
    ___DELL_(dat, '_view', '../_php/__all_view.php');
}
//-----------------------------
function full_form_(i) {
    $('#bi').val(dt_data[i - 1]['bi']);
    _get_EST_();
    $('#tipo_pagamento').val(dt_data[i - 1]['id_tipo_pagamento']);


    // para aparecer a combobox de disciplina

    set_detalhe();

    $('#_view').find(':input').each(function() {
        $(this).val(dt_data[i - 1][$(this).attr('name')]);
    });

    $('#_dell').fadeIn('slow');
}


var dt_data;

function __LOAD_() {
    $.ajax({
        type: "POST",
        url: _url,
        data: { accion: "load" },
        async: false,
        success: function(data) {
            var i = 0;
            dt_data = eval(data);
            $('#_list').DataTable({
                "destroy": true,
                "data": dt_data,
                "columns": [{
                        "data": "",
                        "render": function(data, type, row) {
                            i++;
                            return i;
                        }
                    },
                    { "data": "cNome" },
                    { "data": "bi_passaporte" },
                    { "data": "nome" },
                    { "data": "ffpNome" },
                    { "data": "valor_final" },
                    { "data": "data" },
                    {
                        "data": "div",
                        "render": function(data, type, row) {
                            return '<div align="right"><img id="' + i + '" onClick="full_form_(this.id)"  src="../images/mono-icons/notepencil32.png" width="20px" height="20px" style="cursor: pointer" />' +
                                '<img id ="' + row.id + '" onClick="__DELL_(this.id)" src="../images/mono-icons/usersminus32.png" width="20px" height="20px" style="cursor: pointer" /></div>';
                        }
                    },
                    {
                        "data": "a",
                        "render": function(data, type, row) {
                            return '<a href="pdf_.php?id_Ma=' + row.id + '" target="_blank"><img src="../images/menu/7.ico"  width="18px" height="18px" style="vertical-align:middle" /></a>';
                        }
                    }
                ],
                "language": dt_idioma
            });

        }
    });
}

function _get_EST_() {
    $.ajax({
        type: "POST",
        url: "../g_Matricula/php.php",
        data: "accion=get_EST&BI=" + $('#bi').val(),
        success: function(data) {
            data = eval(data);

            if (data != '') {
                /**********/
                se = document.getElementById('estudante');
                op = '<option style="cursor:pointer" value="' + data[0]["id"] + '">' + data[0]['cNome'] + '</option>';
                se.innerHTML = op
                _set_mounthBox('mes', 'meses_pagos&est=' + data[0]["id"], _url);
            }

        },
        async: false
    });

}

//Para apresentar as comboxs de acordo aos valores seleccionados
function set_detalhe() {
    tp = $('#tipo_pagamento').val();
    if (tp == 2 || tp == 4) {
        $('#exam').fadeOut('fast');
        $('#prop').fadeIn('fast');

    } else if (tp == 3 || tp == 5 || tp == 8 || tp == 10) {

        $('#exam').fadeIn('fast');
        $('#prop').fadeOut('fast');
    } else {
        $('#exam').fadeOut('fast');
        $('#prop').fadeOut('fast');
    }
}
//NOva alteracao
function _getGrelha_() {
    $('#grelha').html('');

    $.ajax({
        type: "POST",
        url: '../g_Grelha/php.php',
        data: { accion: "load" },
        success: function(data) {
            data = eval(data);

            se = document.getElementById('grelha');
            op = '';

            $.each(data, function(i, dat) {
                op += '<option style="cursor:pointer" value="' + dat["id"] + '">' + dat["gDesc"] + ' (' + dat['cDesc'] + ')' + '</option>';
            });

            se.innerHTML = op;
        },
        async: false
    });
}