<?
   function __D_PROFESSIONAL_(){ ?>
	    
             
		      
			     <table width="100%" cellpadding="0" cellspacing="0">
		           <tr class="tr_color" >
                        <td align="center"><h5 style="margin:4px; color:#000"><b>CONTROLO DADOS PROFESSIONAIS</b></h5></td>
				   </tr>                                                                                                         
				 </table>
                                                                                                                    
               <table width="60%" cellpadding="0" cellspacing="0" align="center"> 	
						  <tr>
							  <td align="right"><strong>Trabalhador:</strong></td>
							  <td><select id="trabajador" name="trabajador" >
						         <option value="2">Não</option>
						        <option value="1">Sim</option>
							    
                              </select>	
                              </td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Organismo Tutela:</strong></td>
							  <td><select name="tutela" disabled id="tutela" ></select></td>
			     </tr>
							<tr>
							  <td align="right"><strong>Profissão:</strong></td>
							  <td><select name="profesion" disabled id="profesion" ></select>							   </td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Local de Trabalho:</strong></td>
							  <td>				              
				              <input name="local" type="text" disabled id="local" /></td>
						    </tr>
							<tr>
							  <td align="right"><strong>Tipo Instituição:</strong></td>
								<td><select name="inst" disabled id="inst" >
						              <option value="1">-</option>	
						              <option value="2">Privada</option>	
							          <option value="3">Pública</option>								      							      
								    </select></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Cargo:</strong></td>
							  <td>
							    <input name="cargo" type="text" disabled="disabled" id="cargo" />
							  </td>
						    </tr>
				  <tr>
							  <td align="right"><strong>Atleta:</strong></td>
							  <td><input type="checkbox" name="atleta" id="atleta" /> </td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Dirigente:</strong></td>
							  <td><input type="checkbox" name="dirigente" id="dirigente" /> </td>
				  </tr>
							<tr>
							  <td align="right"><strong>Militar ou Polícia:</strong></td>
							  <td><input type="checkbox" name="militar" id="militar" /></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Mulher Grávida:</strong></td>
							  <td><input type="checkbox" name="mg" id="mg" /></td>
				  </tr>
				      </table> 
			       <!------------------------------------------------------>  
			       <!--***************************************-->             
				   <!--***************************************-->
				   <!--ACA SE CREA EL FORM SEGUN EL MENU Y ROL--> 
                 <br />    
                  <div style="width: 98%; margin-left: 10px" >                   
                    <!--bloque pag-->                      
                        <article class="box"> 
                          <h5 style="margin:4px" align="center" class="cabezalho"><b>LISTA DADOS PROFESSIONAIS</b></h5>                          
                                                   
                       		<table id="_list_PRO" class="display compact" style="width:100%">
								<thead>
									<tr>
										<th>No</th>									
										<th>BI</th>									
										<th style="width: 300px">Nome/Apelidos</th>									
										<th>Trab.</th>									
										<th>Professão</th>									
										<th>Instituição</th>
										<th>Tutela</th>										
										<th>Local</th>										
										<th style="width: 100px">Cargo</th>										
										<th style="width: 50px"></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>									
										<th>BI</th>									
										<th style="width: 300px">Nome/Apelidos</th>									
										<th>Trab.</th>									
										<th>Professão</th>									
										<th>Instituição</th>
										<th>Tutela</th>										
										<th>Local</th>										
										<th style="width: 100px">Cargo</th>										
										<th style="width: 50px"></th>
									</tr>
								</tfoot>
							</table> 			  
                        </article>
                    <!--end bloque pag--> 
               </div>
                    
			      
 <?  }
?>