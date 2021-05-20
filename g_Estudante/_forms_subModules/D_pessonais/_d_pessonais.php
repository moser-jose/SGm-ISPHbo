<?
   function __D_PESSONAIS_(){ ?>
	    
             
					     
		      <input type="text" id="id" name="id" value="-" style="display: none" />
			  <table width="100%" cellpadding="0" cellspacing="0">
		           <tr class="tr_color" >
                        <td colspan="8" align="center"><h5 style="margin:4px; color:#000"><b>CONTROLO DADOS PESSOAIS</b></h5></td>
                      </tr>                                                                                                         
                   <tr><td colspan="8" height="10px"></td></tr>
                   <!------------------------------------------------------>	             
						<table width="98%" cellpadding="0" cellspacing="0" align="center">	
						  <tr>
						    <td style="background-color: #E0E0E0" align="right"><strong>Curso Actual:</strong></td>
						    <td style="background-color: #E0E0E0"><select name="Acurso" id="Acurso" ></select>
						      <font color="#FF0000">*</font>
						    </td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Género:</strong></td>
							  <td>
							  <select id="genero" name="genero" >
							     <option value="Femenino">Femenino</option>	
							     <option value="Masculino">Masculino</option>	
							  </select>
						      <font color="#FF0000">*</font></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Estado Civil:</strong></td>
							  <td>
								  <select id="estadoC" name="estadoC" >
									  <option value="Casado(a)">Casado(a)</option>
									  <option value="Solteiro(a)">Solteiro(a)</option>
									  <option value="Divorciado(a)">Divorciado(a)</option>
									  <option value="Outros">Outros</option>
								  </select>
						      <font color="#FF0000">*</font></td>
							</tr>
							<tr>
							  <td align="right">&nbsp;</td>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Data Nascimiento:</strong></td>
							  <td>
								<input type="date" id="dataNac" name="dataNac"  />
										<font color="#FF0000">*</font>
								</td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Necessita Educação Especial:</strong></td>
							  <td><select id="nee" name="nee" ></select>
						      <font color="#FF0000">*</font></td>
							</tr>
							<tr>
							  <td align="right"><strong>Nome e Apelido:</strong></td>
							  <td><input type="text" id="nome" name="nome" />
							    <font color="#FF0000">*</font></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Província Nascimiento:</strong></td>
							  <td><select id="prov" name="prov" ></select>
						      <font color="#FF0000">*</font></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>BI/Passaporte</strong></td>
							  <td><input type="text" id="BIpass" name="BIpass"  />
                              <font color="#FF0000">*</font><br />
							  <font size="2" color="#FF0000" id="UE" style="display: none">...Estudante já cadastrado!!!...</font>
							  </td>
							</tr>
							<tr>
							  <td align="right"><strong>Nome Pai:</strong></td>
							  <td><input type="text" id="pai" name="pai" />
							    <font color="#FF0000">*</font></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Município Nascimento:</strong></td>
							  <td><select id="munic" name="munic" ></select>
						      <font color="#FF0000">*</font></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>BI Data Emissão:</strong></td>
							  <td><input type="date" id="dataBIemi" name="dataBIemi"  />
							    <font color="#FF0000">*</font>
								</td>
						    </tr>
							<tr>
							  <td align="right"><strong>Nome Mãe:</strong></td>
							  <td><input type="text" id="mae" name="mae" />							    <font color="#FF0000">*</font>							    <input type="hidden" id="nomes" name="nomes" /></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>Nacionalidade:</strong></td>
							  <td><select id="nacionalidad" name="nacionalidad" ></select>
						      <font color="#FF0000">*</font></td>
							  <td>&nbsp;</td>
							  <td align="right"><strong>BI Local Emissão:</strong></td>
							  <td><input type="text" name="BIprov" id="BIprov"  />
						      <font color="#FF0000">*</font></td>
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
                          <h5 style="margin:4px" align="center" class="cabezalho"><b>LISTA DADOS PESSOAIS</b></h5>
                          
                         <table id="_list_M" class="display compact" style="width:100%">
								<thead>
									<tr>
										<th>No</th>									
										<th>BI</th>									
										<th style="width: 300px">Nome/Apelidos</th>									
										<th>Genero</th>									
										<th>Nacionalidade</th>									
										<th>Província</th>
										<th>Munícipio</th>										
										<th style="width: 50px"></th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>									
										<th>BI</th>									
										<th style="width: 300px">Nome/Apelidos</th>									
										<th>Genero</th>									
										<th style="width: 100px">Nacionalidade</th>									
										<th style="width: 80px">Província</th>
										<th style="width: 80px">Munícipio</th>										
										<th style="width: 50px"></th>
									</tr>
								</tfoot>
							</table> 
                       					  
                        </article>
                    <!--end bloque pag--> 
                   </div>
                      
			       
			
 <?  }
?>