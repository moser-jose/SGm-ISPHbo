<? session_start();
  if (!isset($_SESSION["usser"]))
{?> <script>location.href = "../_Index/index.php";</script><? }?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
          include('../_includes/head.php');
           $h  = new cHead();   $h  -> __print_Head();
		 ?>
       
      <script src="../_User_Gestion/js_by_login.js"></script>

	  <!--<script src="g_Rebusca/js.js"></script>-->
	  <script src="js.js"></script>
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

    <!------------------------------------------------------------------------->
				  <!----FORM GRANDE GESTION------------------->
				      <div role="tabpanel">
						 <ul class="nav nav-tabs" role="tablist">
						   <li role="presentation" class="active"><a href="#home1" data-toggle="tab" role="tab" aria-controls="tab1" onClick="bSaveControl('')" >Matrícula Ano Curricular</a></li>

						 </ul>

						  <div id="tabContent1" class="tab-content">
							   <div role="tabpanel" class="tab-pane fade in active" id="home1">

									 <!--***************************-->
									 <!--***************************-->
									 <!--form de matriculas-->
									    <table width="100%">
										  <tr class="tr_color" >
											<td colspan="3" align="center"><h5 style="margin:4px; color:#000"><b>GESTÃO MATRÍCULAS</b></h5></td>
										  </tr>
										</table>
									    <br />


									  <table width="100%">
									    <tr>
								    	  <td width="50%" style="vertical-align: top">

								    	      <form id="_view" name="_view" method="post">
    										  <input name="id" type="text" id="id" style="display: none" value="-" />
											  <!--para tener una referencia del user-->
											  <input type="hidden" value="<?= $_SESSION["id_u"];?>" id="id_U_">

									    		<table width="100%">
												<tr>
													<td align="right"><strong>BI/Passaporte:</strong></td>
													<td>
														<input name="bi" type="text" required="required" id="bi">
														<strong> <span style="color: #D50C10">*</span></strong>
														<br />
														<font size="2" color="#FF0000" id="UE" style="display: none">...Erro: Matrícula Duplicada...</font>
													</td>
													<td align="right"><strong>Semestre:</strong></td>
													<td><select name="semestre" required="required" id="semestre" style="width: 110px"></select>
													<font color="#FF0000">*</font></td>
													</tr>
												<tr>
												  <td align="right"><strong>Nome:</strong></td>
												  <td><input type="text" name="nome" id="nome" readonly>
													<input name="idE" type="text" id="idE" style="display: none" value="-"></td>
												  <td align="right"><strong>Data:</strong></td>
												  <td><input name="dataM" type="date" id="dataM"  style="width: 110px;">
                                                  <strong> <span style="color: #D50C10">*</span></strong></td>
												  </tr>
												<tr>
												  <td align="right"><strong>Período:</strong></td>
												  <td>
													<select name="periodo" required="required" id="periodo">
													  <option value="Regular">Regular</option>
													  <option value="Poslaboral">Pós-laboral</option>
													</select>
												  <font color="#FF0000">*</font></td>
												  <td align="right"><strong>Vez Matrícula:</strong></td>
												  <td><input type="number" id="vez" name="vez" max="3" min="1" required style="width: 110px">

												    <strong> <span style="color: #D50C10">*</span></strong></td>
												  </tr>
												<tr>
												  <td align="right"><strong>Curso:</strong></td>
												  <td><select name="curso" required="required" id="curso" style="width: 165px">
													</select>
												  <font color="#FF0000">*</font></td>
												  <td align="right"><strong>Valor total:</strong></td>
												  <td><input name="valor" type="text" required="required" id="valor" style="width: 110px" min="0">
												    <strong> <span style="color: #D50C10">*</span></strong></td>
												  </tr>
												<tr>
												  <td align="right"><strong>Ano Curricular:</strong></td>
												  <td>
													   <select name="ano" required="required" id="ano">
														   <option value="1">1°</option>
														   <option value="2">2°</option>
														   <option value="3">3°</option>
														   <option value="4">4°</option>
														   <option value="5">5°</option>
													  </select>
												  <font color="#FF0000">*</font></td>
												  <td align="right"><strong>Observações:</strong></td>
												  <td rowspan="2"><textarea id="obs" name="obs" style="height: 20px; width: 150px" placeholder="a sinalar!"></textarea></td>
												  </tr>
												<tr>
												  <td align="right"><strong>Turma:</strong></td>
												  <td><select name="turma" required="required" id="turma" style="width: 165px">
													</select>
												  <font color="#FF0000">*</font></td>
												  <td align="right">&nbsp;</td>

												  </tr>
											  </table>
										  </form>
								    	  </td>
									    	<td width="50%" align="center" valign="top">
						    	          	 		<table width="100%">
						    	          	 			<tr valign="top" style="background-color: #E0E0E0">
						    	          	 				<td width="50%" align="center">

						    	          	 				     <form method="post" nome="gc_A" id="gc_A">
						    	          	 				         <p style="height: 10px"><strong>Grelha Curricular Ano</strong></p>
						    	          	 				         <div id="td_grelha"></div>
						    	          	 				     </form>
						    	          	 				</td>
						    	          	 				<td width="50%" align="center">
				    	          	 				              <form method="post" nome+"gc_R" id="gc_R">
					    	          	 				              <p style="height: 10px"><strong>Grelha Curricular Rebusca</strong>
						    	          	 				          <select id="anoGR" name="anoGR" style="width: 40px"></select></p>
						    	          	 				          <div id="td_grelha_R"></div>
						    	          	 				      </form>
						    	          	 			    </td>
						    	          	 			</tr>
						    	          	 		</table>

								    	    </td>
									    </tr>
									  </table>

									       <!--area de botton-->
									       <table width="100%" cellpadding="0" cellspacing="0">
											   <tr><td colspan="8" height="10px"></td></tr>
											   <tr align="right" class="tr_color">
													<td colspan="8">

													   <div id="error" align="left" style="float:left; margin-top:7px;"></div>

													   <div id="_panel_b">

															<div class="learn-button" id="UE" style="margin-right:37%">
															   <a class="art-button" style="cursor:pointer;"                 href="javascript: __SAVE_();" id="save_">Guardar</a>
															   <a class="art-button" style="cursor:pointer"                  href="javascript:__RESSET_('_view')"  id="_clear">Limpar</a>
															   <a class="art-button" style="cursor:pointer; display: none" target="_blank" href="" id="fac">Comprovativo</a>
															</div>

													   </div>
													  <!--current-menu-item-->
												 </td>
												</tr>
						                     </table>

											   <!--***************************************-->
											   <!--***************************************-->
											   <!--ACA SE CREA EL FORM SEGUN EL MENU Y ROL-->
												  <br />
												   <div style="width: 99.5%; margin-left: 2.5px" align="center">
													<!--bloque pag-->
														<article class="box" >
														  <h5 class="cabezalho"><b>HISTÓRICO DE MATRÍCULAS</b></h5>

															<table id="_list" class="display compact" style="width:100%">
																<thead>
																	<tr>
																		<th>No</th>
																		<th>BI</th>
																		<th style="width: 200px">Nome/Apelidos</th>
																		<th>Sexo</th>																		
																		<th style="width: 300px">Curso</th>
																		<th>Data</th>
																		<th>Vez</th>
																		<th>Turma</th>
																		<th>Semestre</th>
																		<th>Valor</th>
																		<th style="width: 50px"></th>
																		<th style="width: 20px"></th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th>No</th>
																		<th>BI</th>
																		<th style="width: 200px">Nome/Apelidos</th>
																		<th>Sexo</th>																		
																		<th style="width: 300px">Curso</th>
																		<th>Data</th>
																		<th>Vez</th>
																		<th>Turma</th>
																		<th>Semestre</th>
																		<th>Valor</th>
																		<th style="width: 50px"></th>
																		<th style="width: 20px"></th>
																	</tr>
																</tfoot>
															</table>
														</article>
													<!--end bloque pag-->
												   </div>
									 <!--form de matriculas-->
									 <!--***************************-->
									 <!--***************************-->

							   </div>
					    </div>


						 </div>
				  <!------------------------->

    <!------------------------------------------------------------------------->

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
