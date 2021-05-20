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
                        <td colspan="3" align="center"><h5 style="margin:4px; color:#000"><b>GESTÃO PROFESSOR/DISCIPLINA</b></h5></td>
                      </tr>                                        
					</table> 
                     <br />                                            
                    
	             <table width="40%"> 
				 <tr>
				   <td align="right"  scope="row"><strong>Departamento:</strong></td>
				   <td><select name="id_dpto" type="text" id="id_dpto">
				     </select></td>
                   </tr> 
                 <tr>
                   <td align="right"  scope="row"><strong>Professor:</strong></td>
                   <td><select name="id_professor" type="text" id="id_professor">
                     </select>
                     <font color="#FF0000">*</font><br />
					 <font size="2" color="#FF0000" id="UE" style="display: none">...O professor já está vinculado na turma actual...</font>
				   </td>
                   </tr>
                 <tr>
                   <td align="right"><strong>Grelha:</strong></td>
                   <td><select name="grelha" type="text" id="grelha">
</select></td>
                   </tr>
                 <tr>
                   <td align="right"><strong>Disciplina:</strong></td>
                   <td><select name="id_disciplina" type="text" id="id_disciplina">
</select>
                     <font color="#FF0000">*</font></td>
                   </tr>
                 <tr>
                   <td align="right"><strong>Data:</strong></td>
                   <td><input type="date" name="data" id="data" /><font color="#FF0000">*</font></td>
                   </tr>
                 <tr>
                   <td align="right"><strong>Turma:</strong></td>
                   <td><select name="id_turma" type="text" id="id_turma">
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
                          <h5><b>LISTA PROFESSORES/DISCIPLINA</b></h5>
                          <table class="display compact" id="_list">
														<thead><tr>														  
														  <th style="width: 3em">No.</th>														        														  			
														  <th>Nome</th>			  														  
														  <th>Disciplina</th>			  														  
														  <th>Data</th>			  														  
														  <th>Turmas</th>			  														  														 	  
														  <th style="width: 8em"></th>														
														  </tr>
														</thead>
														<tfoot><tr>														  
														  <th>No.</th>														        														  			
														  <th>Nome</th>			  														  
														  <th>Disciplina</th>			  														  
														  <th>Data</th>			  														  
														  <th>Turmas</th>					  														  
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
  <!--footer--><? include("../_includes/footer.php"); $f = new cFooter(); $f -> __printFooter(); ?>
</footer>

</div>


</body></html>     


