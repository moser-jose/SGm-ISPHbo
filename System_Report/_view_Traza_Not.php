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
			 $( '#report_T_not' ).css('display', 'none');
			    __GET_COMBOXS_('disciplina', 'get_DISC', 'dDesc', '../g_set_notes/php.php'); 
			    __GET_COMBOXS_('tipo_eval', 'get_EVAL&id='+$('#disciplina').val(), 'tipo' , '../g_set_notes/php.php'); 
	
	
				_getGrelha_();	
				__GET_COMBOXS_('id_turma', 'get_TURMA&grelha='+$('#grelha').val(), 'tDesc', '../g_Professor_Disciplina/php.php');
				$('#grelha').change(function (){ __GET_COMBOXS_('id_turma'     , 'get_TURMA&grelha='+$('#grelha').val(), 'tDesc', '../g_Professor_Disciplina/php.php'); });


				$('#disciplina').change(function (){ __GET_COMBOXS_('tipo_eval', 'get_EVAL&id='+$('#disciplina').val(), 'tipo' , '../g_set_notes/php.php'); __get_Traza_Not();	 });	
				$('#tipo_eval, #grelha, #id_turma').change(function (){ __get_Traza_Not(); });
				__get_Traza_Not();		
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
																		<b>Disciplinas associadas:</b><select id="disciplina"></select> <br />
					                                                    <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
																	    <b>Tipo evaluação:</b><select id="tipo_eval"></select> <br />
					                                                    <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
																		<b>Grelha:</b><select id="grelha"></select>
					                                                    <hr size="1px" color="#CCC" width="35%" style="margin: 1.5px 0 0.5px 0" />
																		<b>Turma:</b><select id="id_turma"></select>
					     </div>         
                   <div style="width: 99.5%;" >                                      
                    <!--bloque pag-->                      
                        <article class="box" > 
                          <h5><b>LISTA MANIPULAÇÃO NOTAS</b></h5><br />
                                                  <table id="_list" class="display compact"><thead><tr>
														  <th>No.</th> 		     
														  <th>Estudante</th>   														 
														  <th>Nota antiga</th>  			 
														  <th>Nota Nova</th>  		 	 
														  <th>Data</th>  	 	 
														  <th>Hora</th>  	 	 
														  <th>Usuário</th>  	 	 
														  </thead>
													      <tfoot><tr>
													      <th>No.</th> 		     
														  <th>Estudante</th>   														 
														  <th>Nota antiga</th>  			 
														  <th>Nota Nova</th>  		 	 
														  <th>Data</th>	 	 
														  <th>Hora</th>	 
														  <th>Usuário</th>  	 	 
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


