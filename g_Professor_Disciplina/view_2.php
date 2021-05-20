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
        
        <script src="../_User_Gestion/js_by_login.js"></script>
	  
	    <script>
	       $(document).ready(function (e){
			   $( '#viewDA').css('display', 'none');			 	
			   var  id = 0; getID(); LOAD();			   
		   });
			
			function getID(){
				 $.ajax({ type:"POST", url:'../g_Professor_Disciplina/php.php', data:{accion:"getIdProfe"}, async:false,      
					 success: function(data){
						 id =eval(data); 			  							 
			   }});	
			}   
			function LOAD(){   
			   $.ajax({ type:"POST", url:'../g_Professor_Disciplina/php.php', data:{accion:"load2", id:id[0][0]}, async:false,      
					 success: function(data){

						 var i =0;
						 dt_data =eval(data); 			  
							   $('#_list').DataTable({ "destroy": true,
														  "data": dt_data, 
													   "columns": [
																   {   "data": "",
																	 "render": function (data, type, row){ i++; return i;																		                     
																   }},
																   {   "data": "dDesc"     },												   																											   
																   {   "data": "dCarga_h"  },												   																											   
																   {   "data": "tDesc"     },  
																   {   "data": "TUR"       }													            
																  ],"language": dt_idioma
													  });

			   }});	
			}
			
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
                          <h5><b>LISTA DISCIPLINA</b></h5>
                          <table class="display compact" id="_list">
														<thead><tr>														  
														  <th style="width: 3em">No.</th>	
														  <th>Disciplina</th>			  														  
														  <th>Carga</th>			  														  
														  <th>Tipo</th>			  														  
														  <th>Turma</th>	 	  						
														  </tr>
														</thead>
														<tfoot><tr>														  
														  <th>No.</th>														        														  			
														  <th>Disciplina</th>			  														  
														  <th>Carga</th>			  														  
														  <th>Tipo</th>			  														  
														  <th>Turma</th>															  
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


