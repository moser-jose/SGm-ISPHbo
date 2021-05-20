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
                        <td colspan="3" align="center"><h5 style="margin:4px; color:#000"><b>GESTÃO PROFESSOR</b></h5></td>
                      </tr>                                        
					</table> 
                     <br />                                            
                    
	             <table width="60%"> 
				 <tr>
                   <td width="20%" align="right"  scope="row"><strong>Nome:</strong></td>
                   <td width="27%"><input name="nome" type="text" id="nome" />
                     <font color="#FF0000">*</font></td>
                   <td align="right"><strong>Província:</strong></td>
                   <td><select name="id_prov" type="text" id="id_prov">
                   </select></td>
                   </tr> 
                 <tr>
                   <td width="20%" align="right"  scope="row"><strong>BI/Passaporte:</strong></td>
                   <td width="27%"><input name="bi" type="text" id="bi" />
                     <font color="#FF0000">*</font></td>
                   <td width="27%" align="right"><strong>Municipio:</strong></td>
                   <td width="27%"><select name="id_municipio" type="text" id="id_municipio">
                   </select>
                     <font color="#FF0000">*</font></td>
                 </tr>
                 <tr>
                   <td align="right"  scope="row"><strong>Departamento:</strong></td>
                   <td><select name="id_dpto" type="text" id="id_dpto">
                     </select></td>
                   <td width="27%" align="right"><strong>Telefone:</strong></td>
                   <td><input name="tel" type="text" id="tel" maxlength="9" /></td>
                 </tr>
                 <tr>
                   <td align="right"  scope="row"><strong>Cargo:</strong></td>
                   <td><input name="cargo" type="text" id="cargo" /></td>
                   <td align="right"><strong>Email:</strong></td>
                   <td><input name="email" type="text" id="email" /></td>
                 </tr>
                 <tr>
                   <td align="right"><strong>Género:</strong></td>
                   <td>
					   <select name="genero" type="text" id="genero">					    
					    <option value="Femenino">Femenino</option>
						<option value="Masculino">Masculino</option>
					   </select></td>
                   <td align="right"><strong>Estado Civil:</strong></td>
                   <td><select name="estado_civil" type="text" id="estado_civil">
                     <option value="Soltero">Soltero</option>
                     <option value="Casado">Casado</option>
                   </select></td>
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
                          <h5><b>LISTA PROFESSORES</b></h5>
                          <table class="display compact" id="_list">
														<thead><tr>														  
														  <th style="width: 3em">No.</th>														        														  			
														  <th>Nome</th>			  														  
														  <th>BI/Passaporte</th>			  														  
														  <th>Genero</th>			  														  
														  <th>Cargo</th>			  														  
														  <th>Dpto.</th>			  														  														  
														  <th>Municipio.</th>			  														  														  
														  <th style="width: 8em"></th>														
														  </tr>
														</thead>
														<tfoot><tr>														  
														  <th>No.</th>														        														  			
														  <th>Nome</th>			  														  
														  <th>BI/Passaporte</th>			  														  
														  <th>Genero</th>			  														  
														  <th>Cargo</th>			  														  
														  <th>Dpto.</th>			  														  														  
														  <th>Municipio.</th>				  														  
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


