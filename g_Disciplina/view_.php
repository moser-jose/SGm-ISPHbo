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
        <script src="../_User_Gestion/js_by_login.js"></script>
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
                <td width="58%" align="center">
                    
<form id="_view" name="_view" method="post">  
<input type="text" value="-" name="id" id="id" style="display: none" />
 
                                   
                    <table width="100%">
                      <tr class="tr_color" >
                        <td colspan="3" align="center"><h5 style="margin:4px; color:#000"><b>GESTÃO DISCIPLINAS</b></h5></td>
                      </tr>                                        
					</table> 
                     <br />                                            
                    <table width="57%">
					  <tr>
                        <td width="20%" align="right"  scope="row"><strong>Disciplina:</strong></td>
                        
                        <td width="27%">
                          <input type="text" id="dDesc" name="dDesc" />
                        <font color="#FF0000">*</font></td>
                       </tr>
                       <tr>
                        <td width="20%" align="right"  scope="row"><strong>Carga Horária:</strong></td>
                        
                        <td width="27%">
                          <input type="text" id="dCarga_h" name="dCarga_h" />
                         <font color="#FF0000">*</font>                        </td>
                       </tr>                      

                                            
						   <tr align="right" >
							 <td scope="row"><strong>Tipo:</strong></td>
							 <td align="left" ><select id="id_tipo" name="id_tipo">
						   </select>
						   <font color="#FF0000">*</font></td>
						  </tr> 
                <tr align="right" >
							 <td scope="row"><strong>Ano Curricular:</strong></td>
							 <td align="left" >
							   <select id="dAno_curricular" name="dAno_curricular">
							     <option value="1">1°</option>
							     <option value="2">2°</option>
							     <option value="3">3°</option>
							     <option value="4">4°</option>
							     <option value="5">5°</option>
						     </select>
						     <font color="#FF0000">*</font></td>
						  </tr>
                 <tr align="right" >
							 <td scope="row"><strong>Semestre:</strong></td>
							 <td align="left" >
							   <select id="dSemestre" name="dSemestre"></select>
						   <font color="#FF0000">*</font></td>
					  </tr> 
                 <tr align="right" >
							 <td scope="row"><strong>Grelha:</strong></td>
							 <td align="left" ><select id="id_grelha" name="id_grelha" >
						   </select>
						   <font color="#FF0000">*</font></td>
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
                                   <a class="art-button" style="cursor:pointer; display:none"  href="javascript:__DELL_(document.getElementById('id').value)" id="_dell">Eliminar</a>
                                   <a class="art-button" style="cursor:pointer"                href="javascript:__RESET_('_view')"  id="_clear">Limpar</a>
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
                          <h5><b>LISTA DISCIPLINAS</b></h5>                          
													<table class="display compact" id="_list">
														<thead><tr>														  
														  <th>No.</th>
														  <th style="width: 250px">Disciplina</th>       														  			
														  <th>Tipo</th>             
													      <th>Semest.</th>          			
													      <th>A. Curricular</th>    			
													      <th>Grelha</th>           			
													      <th>C. Horária</th> 			  
														  <th style="width: 80px"></th>														
														  </tr>
														</thead>
														<tfoot><tr>														  
														  <th>No.</th>
														  <th style="width: 250px">Disciplina</th>       														  			
														  <th>Tipo</th>             
													      <th>Semest.</th>          			
													      <th>A. Curricular</th>    			
													      <th>Grelha</th>           			
													      <th>C. Horária</th> 			  
														  <th style="width: 80px"></th>														
														  </tr>
														</foot>
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


