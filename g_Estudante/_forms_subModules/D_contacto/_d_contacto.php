<?
   function __D_CONTACTO_(){ ?>
	    
             
		      
			  <table width="100%" cellpadding="0" cellspacing="0">
		           <tr class="tr_color" >
                        <td align="center"><h5 style="margin:4px; color:#000"><b>CONTROLO DADOS ENDEREÇO/CONTACTO</b></h5></td>
                   </tr>   
              </table>
                                                                                                                    
               <table width="50%" cellpadding="0" cellspacing="0" align="center">  
						  <tr>
							  <td align="right"><strong>País:</strong></td>
							  <td><select id="paisC" name="paisC" ></select>	
                              </td>
							  <td>&nbsp;</td>
							  <td align="right"></td>
							  <td></td>
						    </tr>
							<tr>
							  <td align="right"><strong>Província:</strong></td>
							  <td><select name="provC" id="provC" ></select></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Telefone:</strong></td>
							  <td><input name="tele" type="text" id="tele" />
							  <font color="#FF0000">*</font></td>
						    </tr>
							<tr>
							  <td align="right"><strong>Município:</strong></td>
								<td><select name="municC" id="municC" ></select></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>E-mail:</strong></td>
							  <td><input name="email" type="text" id="email" />
							  </td>
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
                          <h5 style="margin:4px" align="center" class="cabezalho"><b>LISTA DADOS ENDEREÇO/CONTACTO</b></h5>
                                                                             
                       		<table id="_list_CNT" class="display compact" style="width:100%">
								<thead>
									<tr>
										<th>No</th>									
										<th>BI</th>									
										<th style="width: 300px">Nome/Apelidos</th>									
										<th>Pais</th>									
										<th>Província</th>									
										<th>Munícipio.</th>
										<th>Telefone</th>					
										<th style="width: 100px">E-mail</th>					
										<th style="width: 50px"></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>									
										<th>BI</th>									
										<th style="width: 300px">Nome/Apelidos</th>									
										<th>Pais</th>									
										<th>Província</th>									
										<th>Munícipio.</th>
										<th>Telefone</th>					
										<th style="width: 100px">E-mail</th>					
										<th style="width: 50px"></th>
									</tr>
								</tfoot>
							</table>			  
                        </article>
                    <!--end bloque pag--> 
                   </div>
                      
			      
 <?  }
?>