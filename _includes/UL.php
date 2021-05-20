<?php
class cUL{

function __printUL($txt){?>
<!-- Navigation Starts Here ---------->
 <nav class="art-nav clearfix">
    <ul class="art-hmenu">
    
        	   
		<? if ($_SESSION["rolCode"] == '1'){ ?>
		   <li><a>Gestões Secundarias</a>
		     <ul class="art-hmenu">			    
				   <li id="viewGS" ><a href="../g_Escola/view_.php"         ><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Escolas Médias</a></li>						   				 						   
				   <li id="viewGO" ><a href="../g_Opcao/view_.php"          ><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Opção</a></li>						   				 						   
				   <li id="viewGC" ><a href="../g_Curso/view_.php"          ><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Cursos</a></li>				 
				   <li id="viewGG" ><a href="../g_Grelha/view_.php"         ><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Grelhas</a></li>				 
				   <li id="viewGD" ><a href="../g_Disciplina/view_.php"     ><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Disciplinas</a></li>				 
				   <li id="viewGT" ><a href="../g_Turma/view_.php"          ><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Turmas</a></li>				 
				   <li id="viewGP" ><a href="../g_Provincia/view_.php" 		><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Província</a></li>				 
				   <li id="viewGN" ><a href="../g_Municipio/view_.php" 		><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Municipio</a></li>
				   <li id="viewGER"><a href="../g_Erros/view_L.php" 		><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Erros</a></li>
			   </ul>
		   </li>
		   
		<? } 
           if ($txt != ""){?>
           <li><a href="../_Pag_Rols/view_.php">Início</a></li>
           <li><a href="javascript: _back()" >Voltar</a></li><? }
           
			  if (isset($_SESSION["usser"])){ ?>
				<li title="Click fechar sessão" style="margin-right: 18px;"><a href="javascript: __Close_Session()" id="_u" class="active">Terminar (<font color="#2E6DA4"><?= $_SESSION["usser"]?></font>)</a></li>                
			    <input type="hidden" value="<?= $_SESSION["id_u"] ?>" id="_u_id"> 
		      <? }else {?>
				   <li title="Click iniciar sessão"><a href="javascript: _load_Form_onPopups()" class="active">Iniciar Sessão</a></li>                  
			  <? }?>                 
   </ul>       
</nav>
    
     <? } 
	 }
?>
