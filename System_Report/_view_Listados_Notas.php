<? session_start(); 
  if (!isset($_SESSION["usser"] ))
{?> <script>location.href = "../index/index.php";</script><? }?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
        <?php  
          include('../_includes/head.php');
           $h  = new cHead();   $h  -> __print_Head();		       
		 ?>
        
        <script src="js.js"></script>
        <script src="../_User_Gestion/js_by_login.js"></script>
        
       <script>
	      $(document).ready(function (){
			 $( '#report_EN' ).css('display', 'none');
			  
			  _set_YearBox( 'data' );
			  
			  __GET_COMBOXS_('disciplina', 'get_DISC', 'dDesc', '../g_set_notes/php.php'); 
			  __GET_COMBOXS_('tipo_eval', 'get_EVAL&id='+$('#disciplina').val(), 'tipo' , '../g_set_notes/php.php'); 
			  
			  GETT( );			  
			  			  
			  $( '#data, #disciplina, #tipo_eval' ).change(function(){ GETT( ); });			  			  
		  });
	   </script>
        
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
               
               <!--***************************************-->
               <!--***************************************-->
               <!--ACA SE CREA EL FORM SEGUN EL MENU Y ROL--> 
                   <br /><div align="right" style="margin-right: 2.6em">					         
				             <b>  Ano:</b>&nbsp;<select id="data"></select><br/>	
					         <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
				             <b>Disciplinas associadas:</b>&nbsp;<select id="disciplina"></select><br/>
					         <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
				             <b>Tipo evaluação:</b>&nbsp;<select id="tipo_eval"></select>				             
				         </div>         
                   <div style="width: 99.5%;" >                                      
                    <!--bloque pag-->                      
                        <article class="box" > 
                          <h5 ><b>LISTA DAS TURMAS</b></h5><br />
                          <table class="display compact" id="_list">													
													      <thead><tr>							     
															  <th>No.</th>            
															  <th>Turma</th>           
															  <th>Ano Curricular</th>  
															  <th style="width: 150em">Periodo</th>  	     
															  
															  <th style="width: 2em"></th>  	 
															  <th style="width: 2em"></th>  	 														  
														  </tr></thead>							 
													      <tfoot><tr>								 
															  <th>No.</th>    
															  <th>Turma</th>           
															  <th>Ano Curricular</th>  
															  <th style="width: 150em">Periodo</th>  	     
															  
															  <th style="width: 2em"></th>  	 
															  <th style="width: 2em"></th>  	 														  
														  </tr></tfoot></table> 
                        </article>
                    <!--end bloque pag--> 
                   </div>
                   <br /> 
                                      
                  
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


