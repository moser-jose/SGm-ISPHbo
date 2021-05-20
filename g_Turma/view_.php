<? session_start(); 
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
                        <td colspan="3" align="center"><h5 style="margin:4px; color:#000"><b>GESTÃO TURMA</b></h5></td>
                      </tr>                                        
					</table> 
                     <br />                                            
                    <table width="57%">
					    <tr>
                        <td width="20%" align="right"  scope="row"><strong>Ano Académico:</strong></td>
                        
                        <td width="27%">
							 <select id="anoAcademico" name="anoAcademico"></select>
                         <font color="#FF0000">*</font>                        </td>
                       </tr>
						
                       <tr>
                        <td width="20%" align="right"  scope="row"><strong>Período:</strong></td>
                        
                        <td width="27%">
							<select id="tPeriodo" name="tPeriodo">
							  <option value="Regular">Regular</option>
							  <option value="Poslaboral">Poslaboral</option>
							</select>
                         <font color="#FF0000">*</font>                        </td>
                       </tr>                      

                                            
						   <tr align="right" >
							 <td scope="row"><strong>Curso:</strong></td>
							 <td align="left" ><select id="id_curso" name="id_curso">
						   </select>
						   <font color="#FF0000">*</font></td>
						  </tr>
                 <tr align="right" >
							 <td scope="row"><strong>Ano Curricular:</strong></td>
							 <td align="left" >
							   <select id="tAno_curricular" name="tAno_curricular">
							       <option value="1">1°</option>
								   <option value="2">2°</option>
								   <option value="3">3°</option>
								   <option value="4">4°</option>
								   <option value="5">5°</option>
						      </select> 
						   <font color="#FF0000">*</font></td>
					  </tr> 
                 <tr align="right" >
							 <td scope="row"><strong>Grelha:</strong></td>
							 <td align="left" ><select id="id_grelha" name="id_grelha" >
						   </select>
						   <font color="#FF0000">*</font></td>
					  </tr>
                 <tr>
                   <td align="right"  scope="row"><strong>Num. Turma:</strong></td>
                   <td><input type="text" id="tNum" name="tNum" readonly />
                     <font color="#FF0000">*</font></td>
                 </tr>
                 <tr>
                   <td colspan="2" align="right"  scope="row"><hr size="1px" width="100%" style="margin: 5px 0px 0px 0px" /></td>
                   </tr>
                 <tr>
                   <td align="right"  scope="row"><strong>Nome Turma:</strong></td>
                   <td><input name="tDesc" type="text" id="tDesc" readonly />
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
                          <h5><b>LISTA TURMAS</b></h5>
                          <table class="display compact" id="_list">
														<thead><tr>														  
														  <th style="width: 3em">No.</th>														        														  			
														  <th>Nome</th>			  														  
														  <th  style="width: 20em">Curso</th>			  														  
														  <th>A. Curricular</th>			  														  
														  <th>Período</th>			  														  
														  <th>Grelha</th>			  														  
														  <th style="width: 8em"></th>														
														  </tr>
														</thead>
														<tfoot><tr>														  
														  <th>No.</th>														        														  			
														  <th>Nome</th>			  														  
														  <th  style="width: 20em">Curso</th>			  														  
														  <th>A. Curricular</th>			  														  
														  <th>Período</th>			  														  
														  <th>Grelha</th>			  														  
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


