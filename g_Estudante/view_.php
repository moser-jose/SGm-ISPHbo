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
          
	  <script src="_forms_subModules/D_pessonais/js.js"></script>
	  <script src="_forms_subModules/D_professionais/js.js"></script>
	  <script src="_forms_subModules/D_academicos/js.js"></script>
	  <script src="_forms_subModules/D_contacto/js.js"></script>

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
    <form id="_view_M" name="_view_M" method="post">    
				  <!----FORM GRANDE GESTION------------------->
				      <div role="tabpanel">
						 <ul class="nav nav-tabs" role="tablist">
						   <li role="presentation" class="active"><a href="#home1" data-toggle="tab" role="tab" aria-controls="tab1" onClick="bSaveControl('')" >Dados Pessonais</a></li>
						   <li role="presentation">               <a href="#home2" data-toggle="tab" role="tab" aria-controls="tab2" onClick="bSaveControl('')" >Dados Profissionais</a></li>           
						   <li role="presentation">               <a href="#home3" data-toggle="tab" role="tab" aria-controls="tab3" onClick="bSaveControl('')" >Dados Académicos</a></li>           
						   <li role="presentation">               <a href="#home4" data-toggle="tab" role="tab" aria-controls="tab4" onClick="bSaveControl('c')">Endereço/Contacto</a></li>
						  </ul>

						  <div id="tabContent1" class="tab-content">
							   <div role="tabpanel" class="tab-pane fade in active" id="home1">
								 <!--FORM NIVELES DE PERSONAL--><? include ("_forms_subModules/D_pessonais/_d_pessonais.php"); __D_PESSONAIS_(); ?>
							   </div>

							   <div role="tabpanel" class="tab-pane fade" id="home2">
								 <!--FORM MODULOS DE PROFESIONAL--><? include ("_forms_subModules/D_professionais/_d_professionais.php"); __D_PROFESSIONAL_(); ?>
							   </div>      

							   <div role="tabpanel" class="tab-pane fade" id="home3">
								 <!--FORM MODULOS DE ACADEMICOS--><? include ("_forms_subModules/D_academicos/_d_academicos.php"); __D_ACADEMICOS_(); ?>
							   </div>  

							   <div role="tabpanel" class="tab-pane fade" id="home4">
								 <!--FORM MODULOS DE CONTACTO--><? include ("_forms_subModules/D_contacto/_d_contacto.php"); __D_CONTACTO_(); ?>
							   </div>     
						  </div>

										   <table width="100%" cellpadding="0" cellspacing="0">       				
											   <tr><td colspan="8" height="10px"></td></tr>		
											   <tr align="right" class="tr_color">
													<td colspan="8">
                                                       <!--para tener una referencia del user-->
														<input type="hidden" value="<?= $_SESSION["id_u"];?>" id="id_U_">
													   <div id="error" align="left" style="float:left; margin-top:7px;"></div>

													   <div id="_panel_b">

															<div class="learn-button" id="UE" style="margin-right:37%">                                   
															   <a class="art-button" style="cursor:pointer; display: none" href="javascript: __SAVE_M();" id="save_M">Guardar</a>
															   <a class="art-button" style="cursor:pointer"                href="javascript:__RESET_('_view_M'); __LOAD_PER_();
																																								 __LOAD_PRO_();
																																								 __LOAD_ACA_();
																																								 __LOAD_CNT_();"  id="_clear">Limpar</a>
															</div> 

													   </div> 
													  <!--current-menu-item-->                                           
												 </td>
											 </tr> 
						</table> 

				     </div>
				  <!------------------------->
				  </form> 
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


