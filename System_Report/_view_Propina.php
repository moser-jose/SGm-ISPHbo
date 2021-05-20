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
			 $( '#report_PP' ).css('display', 'none');
	
				_getGrelha_();	
				__GET_COMBOXS_('id_turma', 'get_TURMA&grelha='+$('#grelha').val(), 'tDesc', '../g_Professor_Disciplina/php.php');
				__GET_COMBOXS_( 'pagamento', 'getTP', 'nome'    , '../g_Pagamentos/php.php'); 
			    $('#grelha').change(function (){ __GET_COMBOXS_('id_turma', 'get_TURMA&grelha='+$('#grelha').val(), 'tDesc', '../g_Professor_Disciplina/php.php'); });

				$('#grelha, #id_turma, #pagamento').change(function (){ __get_CR(); });
				__get_CR();		
		  });
		   
		   function _getGrelha_(){ 
				$( '#grelha' ).html(''); 

			   $.ajax({ type:"POST", url:'../g_Grelha/php.php', data:{accion:"load"}, 
					 success: function(data){ 
						data = eval(data); 

						se   = document.getElementById( 'grelha' );  			    
							op = ''; 				

						$.each(data, function(i, dat){  
							op += '<option style="cursor:pointer" value="'+ dat["id"] +'">'+ dat["gDesc"]+' ('+dat['cDesc']+')' +'</option>';	
						});		

						se.innerHTML = op; 
					}, async: false		
				});		
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
               
               <!--***************************************-->
               <!--***************************************-->
               <!--ACA SE CREA EL FORM SEGUN EL MENU Y ROL--> 
                   <br /><div align="right" style="margin-right: 2.6em;">
																		<b>Grelha:</b><select id="grelha"></select>
					                                                    <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
																		<b>Turma:</b><select id="id_turma"></select>
					                                                    <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
																		<b>Tipo Pagamento:</b><select id="pagamento"></select>
					     </div>         
                   <div style="width: 99.5%;" >                                      
                    <!--bloque pag-->                      
                        <article class="box" > 
                          <h5><b>LISTA PROPINAS PAGADAS</b></h5><br />
                                                  <table id="_list" class="display compact"><thead><tr>
														  <th>No.</th> 		     
														  <th>Nome</th>			  														  
														  <th>BI/Passaporte</th>			  														  														  
														  <th>Modo Pagamento</th>			  														  
														  <th>Valor</th>			  														  														  
														  <th>Data</th>			 	 
														  </thead>
													      <tfoot><tr>
													      <th>No.</th> 		     
														  <th>Nome</th>			  														  
														  <th>BI/Passaporte</th>			  														  														  
														  <th>Modo Pagamento</th>			  														  
														  <th>Valor</th>			  														  														  
														  <th>Data</th>		 	 	 
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


