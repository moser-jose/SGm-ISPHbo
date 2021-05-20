<?
 function _set_FORM(){?>
	 <!--form de enviar erro-->
                   <script src="../g_Erros/js.js"></script>
				   <br />
				   <br />
				   <div class="panel panel-default">
					<div class="panel-heading">					  
					  <a style="color: brown" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree2">
						  <img src="../images/mono-icons/warning32.png" width="20px" height="20px" style="vertical-align:sub" />&nbsp;Reportar Erros do sistema</a>
						
					</div>
						<div id="collapseThree2" class="panel-collapse collapse">
						  <div class="panel-body">

							  <form name="erros" id="erros" method="post">
								 <input type="hidden" value="-" id="idErr" name="idErr"/> 
								 <table width="70%" align="center">
								   <tr>
									 <td>
									   <input type="radio" name="sTipo" value="Mal funcionamento" checked>Mal funcionamento <br />
									   <input type="radio" name="sTipo" value="Erro">Erro 			  					    <br />
									   <input type="radio" name="sTipo" value="Sugerencia">Sugerencia
									 </td>
								   </tr>
								   <tr>
									 <td><textarea name="sDesc" autofocus="autofocus" required="required" id="sDesc" placeholder="Descripção, até 90 carácteres." maxlength="90" style="border: 1px solid #867E7E"></textarea></td>
								   </tr>						   
								   <tr>
									 <td align="right"><a class="art-button" style="cursor:pointer;" href="javascript: __SAVE_E();" id="save_E"><img src="../images/menu/Save.ico"  width="15px" height="15px" style="vertical-align:sub" />&nbsp;Enviar</a></td>
								   </tr>						  
								 </table>
						    </form>

						  </div>
						</div>
						</div>
					   <!--end form de enviar erro-->
 <? }?>
   


