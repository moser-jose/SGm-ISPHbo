<? session_start();
if (!isset($_SESSION["usser"])) { ?> <script>
    location.href = "../_Index/index.php";
  </script><? } ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
  <?php
  include('../_includes/head.php');
  $h  = new cHead();
  $h->__print_Head();
  ?>

  <script src="js.js"></script>
  <script src="../_User_Gestion/js_by_login.js"></script>
</head>

<body>
  <div id="art-main">

    <header class="art-header clearfix">
      <!--banner------><? include("../_includes/banner.php");
                        $bn = new cBanner();
                        $bn->__printBanner_(); ?>
      <!--ul----------><? include("../_includes/UL.php");
                        $ul = new cUL();
                        $ul->__printUL('true'); ?>
    </header>


    <div class="art-sheet clearfix">
      <div class="art-layout-wrapper clearfix">
        <div class="art-content-layout">
          <div class="art-content-layout-row">
            <!--menu---><? include("../_includes/menu.php");
                        $mn = new cMenu();
                        $mn->__printMenu_(); ?>
            <div class="art-layout-cell art-content clearfix">

              <table width="100%">
                <tr>
                  <td width="58%" align="center">

                    <input type="text" value="<?= $_SESSION["id_u"] ?>" name="func" id="func" style="display: none" />

                    <!-- INICIO DO FORMULÁRIO -->
                    <form id="_view" name="_view" method="post">
                      <input type="text" value="-" name="id" id="id" style="display: none" />



                      <table width="100%">
                        <tr class="tr_color">
                          <td colspan="3" align="center">
                            <h5 style="margin:4px; color:#000"><b>GESTÃO PAGAMENTOS</b></h5>
                          </td>
                        </tr>
                      </table>
                      <br />

                      <table width="60%">
                        <tr>
                          <td align="right"><strong>BI/Passaporte:</strong></td>
                          <td><input name="bi" type="text" id="bi" value="007251946LA041">
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>
                        <tr>
                          <td align="right"><strong>Estudante:</strong></td>
                          <td><select name="estudante" type="text" id="estudante">
                            </select>
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>
                        <tr>
                          <td align="right"><strong>Tipo Pagamento:</strong></td>
                          <td><select name="tipo_pagamento" type="text" id="tipo_pagamento">
                            </select>
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>

                        <tr id="val_e" style="display: none;">
                          <td align="right"><strong>Valor:</strong></td>
                          <td><span id="valor_emulumentos" class="valor-em">
                            </span>
                          </td>
                        </tr>

                        <tr id="prop" style="display: none">
                          <td align="right"><strong>Mes Pago:</strong></td>
                          <td><select name="mes" id="mes"></select>
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>
                        <tr id="exam" style="display: none">
                          <td align="right"><strong>Disciplinas:</strong></td>
                          <td>
                            <select name="disc" id="disc"></select>
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>
                        <tr>
                          <td align="right"><strong>Banco:</strong></td>
                          <td><select name="banco" type="text" id="banco" class="nomeBanco"> 
                            </select>
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>
                        <tr>
                          <td align="right"><strong>Modo Pagamento:</strong></td>
                          <td><select name="modo_pagamento" type="text" id="modo_pagamento" class="contaBanco">
                            </select>
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>
                        <tr>
                          <td align="right"><strong>Conta:</strong></td>
                          <td><select name="conta" type="text" id="conta">
                            </select>
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>
                        <tr>
                          <td align="right" scope="row"><strong>Multa:</strong></td>
                          <td><input name="imposto" value="0" type="text" id="imposto" />
                            <font color="#FF0000">*</font>
                          </td>
                        </tr>
                        <tr>
                          <td align="right" scope="row"><strong>Desconto:</strong></td>
                          <td><input name="desconto" value="0" type="text" id="desconto" />
                          </td>
                        </tr>
                        <tr>
                          <td align="right" scope="row"><strong>Valor Final:</strong></td>
                          <td><input name="valor_final" value="0" type="text" id="valor_final" readonly />
                          </td>
                        </tr>
                      </table>

                      <br />
                      <table width="100%">
                        <tr align="right" class="tr_color">
                          <td colspan="15">

                            <div id="error" align="left" style="float:left; margin-top:7px;"></div>

                            <div id="_panel_b">

                              <div class="learn-button" id="UE" style="margin-right:37%">
                                <a class="art-button" style="cursor:pointer" href="javascript: __SAVE_();" id="save_">Guardar</a>
                                <a class="art-button" style="cursor:pointer; display:none" href="javascript:__DELL_(document.getElementById('id').value)" id="_dell">Eliminar</a>
                                <a class="art-button" style="cursor:pointer" href="javascript:__RESET_('_view')" id="_clear">Limpar</a>
                                <a class="art-button" style="cursor:pointer; display: none" target="_blank" href="" id="fac">Comprovativo</a>
                              </div>

                            </div>
                            <!--current-menu-item-->

                          </td>
                        </tr>
                      </table>
                    </form>

                  </td>
                </tr>
                <tr>
                  <td align="center">
                    <!--***************************************-->
                    <!--***************************************-->
                    <!--ACA SE CREA EL FORM SEGUN EL MENU Y ROL-->
                    <br />
                    <div style="width: 95%;">
                      <!--bloque pag-->
                      <article class="box">
                        <h5><b>LISTA PAGAMENTOS</b></h5>
                        <table class="display compact" id="_list">
                          <thead>
                            <tr>
                              <th style="width: 3em">No.</th>
                              <th>Nome</th>
                              <th>BI/Passaporte</th>
                              <th>Tipo Pagamento</th>
                              <th>Modo Pagamento</th>
                              <th>Valor</th>
                              <th>Data</th>
                              <th style="width: 8em"></th>
                              <th style="width: 4em"></th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>No.</th>
                              <th>Nome</th>
                              <th>BI/Passaporte</th>
                              <th>Tipo Pagamento</th>
                              <th>Modo Pagamento</th>
                              <th>Valor</th>
                              <th>Data</th>
                              <th></th>
                              <th></th>
                            </tr>
                          </tfoot>
                        </table>
                      </article>
                      <!--end bloque pag-->
                    </div>
                  </td>
                </tr>
              </table>

            </div>




          </div>
        </div>
      </div>
    </div>

    <footer class="art-footer clearfix">
      <!--footer--><? include("../_includes/footer.php");
                    $f = new cFooter();
                    $f->__printFooter(); ?>
    </footer>

  </div>


</body>

</html>