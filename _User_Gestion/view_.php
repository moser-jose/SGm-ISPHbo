<?php session_start();
  if (!isset($_SESSION["usser"]))
{?> <script>location.href = "../_Index/index.php";</script><? }?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
        <?php
          include('../_includes/head.php');
           $h  = new cHead();   $h  -> __print_Head();
		 ?>

        <script src="js.js"></script>
        <script src="js_by_login.js"></script>


        <script type="text/javascript" src="../_jQuery_Entropizer/lib/entropizer.js"></script>
		<!--<script type="text/javascript" src="../_jQuery_Entropizer/lib/demo/bootstrap.min.js"></script>-->
		<script type="text/javascript" src="../_jQuery_Entropizer/dist/js/jquery-entropizer.min.js"></script>
        <link type="text/css" rel="stylesheet" href="../_jQuery_Entropizer/dist/css/jquery-entropizer.min.css" />


        <script>
			 $(document).ready(function(e) {
			//for validate files
			$( '#nome'    ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error').val_text();
			$( '#users'   ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
			$( '#id_roll' ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
			$( '#pass2'   ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
			$( '#pass'    ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');

			//for load the rols of form
			__load_rol();
			__load_Profe();

		    //for load all users
			__LOAD_();

			/*for checked the user and pass before insert*/
			$( '#users' ).keyup (function (e){ __Checked_User(); });
			//$( '#pass1' ).keyup (function (e){ __Checked_Pass(); });
			//$( '#pass2' ).keyup (function (e){ __Checked_Pass(); });

			$( '#viewGU' ).css('display', 'none');

			/*****************************/
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
			/********************/
			/********************/

		  });
	    </script>


	    <style>
	       #meter .entropizer-track {
				background-color: #e8e8e8;
				border-radius: 2px;
				height: 4px;
			}
			#meter .entropizer-bar { height: 4px; }
	    </style>
  </head>

<body>
<div id="art-main">

<header class="art-header clearfix">
    <!--banner------><? include("../_includes/banner.php"); $bn = new cBanner(); $bn -> __printBanner_(); ?>
    <!--ul----------><? include("../_includes/UL.php");     $ul = new cUL();     $ul -> __printUL('true'); ?>
</header>
<div class="art-sheet clearfix">
<div class="art-layout-wrapper clearfix">
<div class="art-content-layout">
<div class="art-content-layout-row"><!--menu---><? include("../_includes/menu.php"); $mn = new cMenu(); $mn -> __printMenu_(); ?>
<div class="art-layout-cell art-content clearfix">

    <table width="100%">
               <tr>
                <td width="58%" align="center" >



<form id="_view" name="_view" method="post">
<input type="hidden" value="-" name="id" id="id" />


                    <table width="100%">
                      <tr class="tr_color" >
                        <td colspan="3" align="center"><h5 style="margin:4px; color:#000"><b>GESTÃO USUÁRIOS</b></h5></td>
                      </tr>


<tr align="right"><td colspan="3"><hr size="1px" width="100%" /></td></tr>
					  <tr>
                        <td width="45%" align="right"  scope="row"><strong>Nome/Apelido:</strong></td>

                        <td width="55%">
                          <input list="name" id="nome" name="nome"/>
						  <datalist id="name"></datalist>
                          <font color="#FF0000">*</font><br/>
                        </td>
                       </tr>
                       <tr>
                        <td width="45%" align="right"  scope="row"><strong>Usuário:</strong></td>

                        <td width="55%">
                          <input type="text" id="users" name="users" />
                          <font color="#FF0000">*</font><br/>
                          <font size="2" color="#FF0000" id="UE" style="display: none">...Este usuário já existe...</font>
                        </td>
                       </tr>


                   <tr align="right" >
                        <td align="right"  scope="row"><strong>Senha:</strong></td>

                      <td align="left" ><input type="password" id="pass" name="pass" />
                      <font color="#FF0000">*</font>
                      <div style="width: 165px;" id="meter"></div>
                      </td>
                      </tr>
                      <tr align="right" >
                       <td align="right" scope="row"><strong>Confirmar Senha:</strong></td>

                       <td align="left" ><input type="password" id="pass2" name="pass2" />
                       <font color="#FF0000">*</font><br/>
                       <font color="#FF0000" size="2" id="cp" style="display: none">Erro de Senha!</font>

                       </td>
                      </tr>

<tr><td colspan="3"><hr size="1px" width="100%" style="margin: 5px 0px 5px 0px"/></td></tr>
                               <tr>
                                <td align="right" scope="row"><strong>Nível Acceso:</strong></td>

                                <td >
                                  <select id="id_roll" name="id_roll" style="width:165px"></select>
                                  <font color="#FF0000">*</font></td>
                               </tr>

						<tr align="right" >
						   <td align="right" scope="row"><strong></strong></td>

						   <td align="left" ><input type="checkbox" id="activo" name="activo" checked/>&nbsp; <b>Activar/Desactivar</b></td>
                       </tr>

                       <tr><td colspan="3">&nbsp;</td></tr>
                      <tr align="right" class="tr_color">
                        <td colspan="3">

                           <div id="error" align="left" style="float:left; margin-top:7px;"></div>

                           <div id="_panel_b">

                                <div class="learn-button" id="UE" style="margin-right:37%">
                                   <a class="art-button" style="cursor:pointer" href="javascript: __SAVE_();" id="save_">Guardar</a>
                                   <a class="art-button" style="cursor:pointer; display:none"  href="javascript:__DELL_(document.getElementById('id').value)" id="_dell">Eliminar</a>
                                   <a class="art-button" style="cursor:pointer"                href="javascript:__RESET_('_view'); _Rst_barForza();"  id="_clear">Limpar</a>
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
					   <div style="width: 95%;" >
						<!--bloque pag-->
							<article class="box" >
							  <h5><b>LISTA USUÁRIOS</b></h5>
							  <table id="_list" class="display compact" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nome</th>
										<th>Usuario</th>
										<th>Nível</th>
										<th>Activo</th>
										<th style="width: 8em"></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nome</th>
										<th>Usuario</th>
										<th>Nível</th>
										<th>Activo</th>
										<th  style="width: 8em"></th>
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
  <!--footer--><? include("../_includes/footer.php"); $f = new cFooter(); $f -> __printFooter(); ?>
</footer>

</div>


</body></html>
