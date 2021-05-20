<?
   function __D_ACADEMICOS_(){ ?>
	    
             
		      
			      <table width="100%" cellpadding="0" cellspacing="0">
		           <tr class="tr_color" >
                        <td align="center"><h5 style="margin:4px; color:#000"><b>CONTROLO DADOS ACADÉMICOS</b></h5></td>
				   </tr>                                                                                                         
				  </table>
                                                                                                                    
               <table width="60%" cellpadding="0" cellspacing="0" align="center"> 
						  <tr>
							  <td align="right"><strong>País de Formação:</strong></td>
							  <td><select id="pais" name="pais" ></select>	
                              </td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>
							    <label id="tdl">Curso de Ensino Médio:</label>
							    </strong></td>
							  <td><select name="opcion" id="opcion" >
							    </select></td>
						    </tr>
							<tr>
							  <td align="right"><strong>Província:</strong></td>
							  <td><select name="provA" id="provA" >
							    </select></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Ano Conclusão:</strong></td>
							  <td><input name="ano" type="text" id="ano" value="<?= date('Y'); ?>" />
							    <font color="#FF0000">*</font></td>
						    </tr>
							<tr>
							  <td align="right"><strong>Habilitação Literária:</strong></td>
							  <td><select name="hl" id="hl" >
							    </select></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Média:</strong></td>
							  <td><input name="media" type="text" id="media" />
							    <font color="#FF0000">*</font></td>
						    </tr>
							<tr>
							  <td align="right"><strong>Escola  Ensino Médio:</strong></td>
							  <td><select name="escola" id="escola" >
							    </select></td>
							  <td>&nbsp;</td>
							  <td align="right">&nbsp;</td>
							  <td>&nbsp;</td>
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
                          <h5 style="margin:4px" align="center" class="cabezalho"><b>LISTA DADOS ACADÉMICOS</b></h5>                          
                        
							<table id="_list_ACA" class="display compact" style="width:100%">
								<thead>
									<tr>
										<th>No</th>									
										<th>BI</th>									
										<th style="width: 300px">Nome/Apelidos</th>									
										<th>Pais</th>									
										<th>Prov.</th>									
										<th style="width: 150px">H.L.</th>
										<th>Meia</th>					
										<th style="width: 50px"></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>									
										<th>BI</th>									
										<th style="width: 300px">Nome/Apelidos</th>									
										<th>Pais</th>									
										<th>Prov.</th>									
										<th style="width: 150px">H.L.</th>
										<th>Meia</th>					
										<th style="width: 50px"></th>
									</tr>
								</tfoot>
							</table>
                       					  
                        </article>
                    <!--end bloque pag--> 
                   </div>
                    
			      
 <?  }
?>