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
			 $( '#report_TR' ).css('display', 'none');
			  __GET_COMBOXS_('curso',  'load', 'cDesc', '../g_Curso/php.php' );		
			  _set_YearBox( 'data' );
			 __get_Turma();
			  
			  __get_Lista_Estudante( );			  
			  			  
			  $( '#curso' ).change(function(){ __get_Turma()           ; __get_Lista_Estudante(); });
			  $( '#turma' ).change(function(){ __get_Lista_Estudante() ; 						  });
			  $( '#data'  ).change(function(){ __get_Lista_Estudante() ; 						  });
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
                   <br />
					<div align="right" style="margin-right: 2.6em">
				             <b>Curso:</b>&nbsp;<select id="curso"></select> <br />
					         <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
				             
					         <b>Turma:</b>&nbsp;<select id="turma"></select><br />
					         <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
				             
					         <b>  Ano:</b>&nbsp;<select id="data"></select>
				             
				         </div>					    
                   <div style="width: 99.5%" >                                      
                    <!--bloque pag-->                      
                        <article class="box" > 
                          <h5><b>LISTA ESTUDANTES x TURMA</b></h5><br />                          
							 						<table class="display compact" id="_list">
														 <thead><tr>
														  <th>No.</th>
														  <th>BI/Passaporte</th>   
														  <th style="width: 220px">Nome</th>            
														  <th>Sexo</th>  			 
														  <th>Telefone</th>  		 
														  <th style="width: 250px">Curso</th>  		
														  <th>Data Matrícula</th> 
														</tr></thead>
														 <tfoot><tr>
														  <th>No.</th>
														  <th>BI/Passaporte</th>   
														  <th style="width: 220px">Nome</th>            
														  <th>Sexo</th>  			 
														  <th>Telefone</th>  		 
														  <th style="width: 250px">Curso</th>  		
														  <th>Data Matrícula</th> 
														</tr></tfoot>
							                          </table>
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


