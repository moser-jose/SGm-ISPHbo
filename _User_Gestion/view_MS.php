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
				$( '#pass2'   ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
			    $( '#pass'   ).clearFile('save_', 'true', '../images/mono-icons/paperlock32.png', 'error');
				
				//$( '#pass1' ).keyup (function (e){ __Checked_Pass(); });
				//$( '#pass2' ).keyup (function (e){ __Checked_Pass(); });	
               
				$( '#viewMS' ).css('display', 'none');
				
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
                <td width="58%" align="center">
               
               
                    
<form id="_view" name="_view" method="post">  
<input type="text" value="<?= $_SESSION["id_u"]?>" name="id" id="id" style="display: none" />
 
                                   
                    <table width="100%">
                      <tr class="tr_color" >
                        <td colspan="3" align="center"><h5 style="margin:4px; color:#000"><b>MUDAR SENHA</b></h5></td>
                      </tr>                                        

                                                                 
<tr align="right"><td colspan="3"><hr size="1px" width="100%" /></td></tr>
                       <tr>
                        <td width="45%" align="right"  scope="row"><strong>Usuário:</strong></td>
                        
                        <td width="55%">
                          <input type="text" id="usser" name="usser" value="<?= $_SESSION["usser"] ?>" readonly>
                        </td>
                       </tr>                      

                                            
                   <tr align="right" >
                        <td align="right"  scope="row"><strong>Nova Senha:</strong></td>
                        
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
                      
                       <tr><td colspan="3">&nbsp;</td></tr>                      
                      <tr align="right" class="tr_color">
                        <td colspan="3">
                          
                           <div id="error" align="left" style="float:left; margin-top:7px;"></div>
                           
                           <div id="_panel_b">
                                
                                <div class="learn-button" id="UE" style="margin-right:37%">                                   
                                   <a class="art-button" style="cursor:pointer" href="javascript: __Mudar_Senha_();" id="save_">Mudar Senha</a>                                   
                                </div> 
                                                          
                           </div> 
                          <!--current-menu-item-->
                                           
                        </td>
                      </tr> 
                    </table> 
</form>                   
                  
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


