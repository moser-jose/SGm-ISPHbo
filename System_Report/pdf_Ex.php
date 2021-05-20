<?php
session_start(); 

include ("../_php/__Manager_.php");

if (($_GET["sem"] == 10) && ($_GET["id_T"] == 22))  
	$cnd ="(matricula_ano.maData LIKE '".'%'.$_GET["ano"].'-07%'."') AND ((matricula_ano.maSemestre = 10) OR (matricula_ano.maSemestre = 9))";
else
	$cnd ="(matricula_ano.maData  LIKE '".'%'.$_GET["ano"].'%'."')   AND
		   (matricula_ano.maSemestre = '".$_GET["sem"]."')";

$txt = "SELECT 
			  estudante.cNome, `curso`.cDesc, `turma`.tDesc, matricula_ano.maAno_curricular
			FROM
			  matricula_ano
			  INNER JOIN estudante ON (matricula_ano.id_estudante = estudante.id)
			  INNER JOIN `turma`   ON (matricula_ano.id_turma     = `turma`.id)
			  INNER JOIN `curso`   ON (`turma`.id_curso           = `curso`.id)
			WHERE
			   (matricula_ano.id_turma = '".$_GET["id_T"]."')    AND
			   ".$cnd."
		 ORDER BY
		      estudante.cNome"; 

$query =__LOAD_( $txt ); 

///////////////////////////////////////////
$ex  ='<meta charset = "UTF-8">
<table>
<tr><td></td>
    <td></td>
	<td></td>
    <td><img src="file:///C|/wamp64/www/SGm-ISPHbo/images/logo.png" /></td></tr>
	<td></td>
	<td></td>	
</tr>	
<tr><td colspan="8"></td></tr>
<tr><td colspan="8"></td></tr>
</table> 
         <table> 
			   <tr align="center"><td colspan="7"><b><font size="12px" style="font-family: Arial">'.utf8_encode("Universidade José Eduardo dos Santos").    '</font></b></td></tr>
			   <tr align="center"><td colspan="7"><b><font size="12px" style="font-family: Arial">'.utf8_encode("Instituto Superior Politécnico do Huambo").'</font></b></td></tr>
			
			   <tr align="center"><td colspan="3"><font size="8px" style="font-family: Arial">Visto                  			 </font></td></tr> 
			   <tr align="center"><td colspan="3"><font size="8px" style="font-family: Arial">____/____/________       		     </font></td></tr>
			   <tr align="center"><td colspan="3"><font size="8px" style="font-family: Arial">A Vice-Decana para os <br/>                                         			  
			                                                                    '.utf8_encode("Assuntos Académicos").'                  <br/>
																				               ________________________							     </font></td></tr>
			   <tr align="center"><td colspan="3"><font size="8px" style="font-family: Arial"><b>Bernacia Zita Benguela Msc      </font></td></tr>
			   <tr align="center"><td colspan="3"><font size="8px" style="font-family: Arial">= Professora Auxiliar = 			 </font></td></tr>';  

if ($query != null){ 			   
			  $ex.='<tr align="left"><td></td><td colspan="7"><b><font size="12px" style="font-family: Arial">'.utf8_encode("ANO LECTIVO: ".$_GET["ano"]).'</font></b>       
				    <tr align="left"><td></td><td colspan="7"><b><font size="12px" style="font-family: Arial">'.utf8_encode("CURSO: ".utf8_decode($query[0]["cDesc"])." - ".$query[0]["maAno_curricular"]."º ANO").'</font></b>'; 


				($_GET["sem"] % 2 == 0) ? $sem =2 : $sem =1;	
				 $t =explode('.', $query[0]["tDesc"]);	

			$ex .='<tr align="left"  ><td></td><td colspan="7"><b><font size="12px" style="font-family: Arial">'.utf8_encode("TURMA: ".$t[1].$t[2]." - ".$sem."º SEMESTRE").'</font></b></td></tr>                
			       <tr align="center"><td></td><td colspan="6"><b><font size="12px" style="font-family: Arial">'.utf8_encode("RELAÇÃO NOMINAL DE ESTUDANTES MATRÍCULADOS"). '</font></b></td></tr>      
		</table>   
	 <tbody>';
    
    $ex .='<table><tr><td></td><td colspan="6">
           <table border="1">';
	for($i = 0; $i < count($query); $i++){
		$ex .= '<tr><td><font size="12px" style="font-family: Arial">'. ((int)$i +1) .'</font></td>
		            <td colspan="5"><font size="12px" style="font-family: Arial">'.utf8_encode(mb_strtoupper($query[$i]["cNome"], 'UTF-8')).'</font></td></tr>';	
	}
    $ex .='</td></tr></table></table> 
         
		<p>  
		<table>
			<tr align="center"><td colspan="8"><font size="9px" style="font-family: Arial">'.utf8_encode("O Chefe do Departamento de Assuntos Académicos").'</font></td></tr>                
			<tr align="center"><td colspan="8"><font size="9px" style="font-family: Arial">'.utf8_encode("______________________________________________").'</font></td></tr>                
			<tr align="center"><td colspan="8"><font size="9px" style="font-family: Arial">'.utf8_encode("José Domingos Sassoquele")                      .'</font></td></tr>                
		</table> 
    
    </tbody>'; 
	
}/*O if de validar null*/ //else $ex .='</table>';


          header("Content-Type: application/xls");
          header("Content-Disposition: attachment; filename = ".$t[1].$t[2].'-'.$query[0]['cDesc'].".xls");
          echo $ex;
     
?> 