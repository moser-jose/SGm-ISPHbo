<?
 class cMenu{
	 function __printMenu_(){ ?>
       <!-- MENU -->
       <div class="art-layout-cell art-sidebar1 clearfix">
       <div class="art-vmenublock clearfix">
        <!--------------------------------------------------------->
			<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
			
		<? if ($_SESSION["rolCode"] == '1'){ ?>				
	 	    <div class="panel panel-default">
				<div class="panel-heading" role="tab">
				     <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1"><strong>Opções Primarias</strong></a></h4>
				</div>
					<div id="collapseOne1" class="panel-collapse collapse in">
					  <div class="panel-body">
						  <ul class="art-vmenu">
						     <li id="viewGU" ><a href="../_User_Gestion/view_.php?bmenu=-collapseOne1"    ><img src="../images/menu/Users.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Usuário</a></li>
						     <li id="viewMS" ><a href="../_User_Gestion/view_MS.php?bmenu=-collapseOne1"  ><img src="../images/menu/Users.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp;Mudar Senha</a></li>
						     <li id="viewGE" ><a href="../g_Estudante/view_.php?bmenu=-collapseOne1"      ><img src="../images/menu/5.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Ficha do Estudante</a></li>
						     <li id="viewGM" ><a href="../g_Matricula/view_.php?bmenu=-collapseOne1"      ><img src="../images/menu/5.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Matrículas</a></li>
						     <li id="viewGF" ><a href="../g_Professor/view_.php?bmenu=-collapseOne1"     	   ><img src="../images/menu/new.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Professor</a></li>
						     <li id="viewGPD"><a href="../g_Professor_Disciplina/view_.php?bmenu=-collapseOne1"><img src="../images/menu/new.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Prof.-Disciplina</a></li>
						     <li id="viewPDE"><a href="../g_Prof_Eval_Disc/view_.php?bmenu=-collapseOne1"	   ><img src="../images/menu/new.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Prof.-Disc.-Eval.</a></li>
						     <li id="viewPDN"><a href="../g_set_notes/view_.php?bmenu=-collapseOne1"	       ><img src="../images/menu/new.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Notas</a></li>
						     <li id="viewPPP"><a href="../g_Pagamentos/view_.php?bmenu=-collapseOne1"	       ><img src="../images/menu/new.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Pagamentos</a></li>
						  </ul>
						</div>
					</div>
		    </div>
		    <!----->				
			<div class="panel panel-default">
			<div class="panel-heading">
			  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1"><strong>Relátorios Tabulados</strong></a></h4>
			</div>
				<div id="collapseTwo1" class="panel-collapse collapse">
				  <div class="panel-body">
						<ul class="art-vmenu">
							<li id="report_ET" ><a href="../System_Report/_view_Listados_M.php?bmenu=-collapseTwo1"      ><img src="../images/menu/7.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Estudantes x Turma</a></li>
							<li id="report_EN" ><a href="../System_Report/_view_Listados_Notas.php?bmenu=-collapseTwo1"  ><img src="../images/menu/new.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Notas x Turma</a></li>
							<li id="report_PT" ><a href="../System_Report/_view_Pauta_G.php?bmenu=-collapseTwo1"         ><img src="../images/menu/new.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Pauta x Turma</a></li>
							<li id="report_AT" ><a href="../System_Report/_view_Aprovechamento.php?bmenu=-collapseTwo1"  ><img src="../images/menu/new.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Aprovechamento x Turma</a></li>
							<li id="report_PP" ><a href="../System_Report/_view_Propina.php?bmenu=-collapseTwo1"  ><img src="../images/menu/new.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Pagamentos x Tipo</a></li>
							
							<li id="report_ED" ><a href="../System_Report/_view_Listados_D.php?bmenu=-collapseTwo1"      ><img src="../images/menu/7.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Estudantes x Disciplinas</a></li>
							<li id="report_MF" ><a href="../System_Report/_view_Matriculas_fecha.php?bmenu=-collapseTwo1"><img src="../images/menu/4.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Matrículas x Anos</a></li>
							<li id="report_RB" ><a href="../System_Report/_view_Rebusca.php?bmenu=-collapseTwo1"		 ><img src="../images/menu/4.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Rebuscas x Curso</a></li>
							<li id="report_T_est" ><a href="../System_Report/_view_Traza_Est.php?bmenu=-collapseTwo1"    ><img src="../images/menu/6.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Manejo Estudantes Ano</a></li>
							<li id="report_T_Dat" ><a href="../System_Report/_view_Traza_Est_dia.php?bmenu=-collapseTwo1"><img src="../images/menu/6.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Manejo Matrículas x Data</a></li>
							<li id="report_T_mat" ><a href="../System_Report/_view_Traza_Matr.php?bmenu=-collapseTwo1"   ><img src="../images/menu/6.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Manejo Matrículas</a></li>
							<li id="report_T_not" ><a href="../System_Report/_view_Traza_Not.php?bmenu=-collapseTwo1"    ><img src="../images/menu/new.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp;Manejo Notas</a></li>
						</ul>
				  </div>
				</div>
			</div>
			<!----->
		    <div class="panel panel-default">
			<div class="panel-heading">
			   <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1"><strong>Relátorios Gráficos</strong></a></h4>
			</div>
				<div id="collapseThree1" class="panel-collapse collapse">
				  <div class="panel-body">
					  <ul class="art-vmenu">
					   <!--<li><a href="javascript: ___Grafic_View_('___G1', 'Matrículas x Curso-Semestre')"><img src="../images/menu/G.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp; Matrículas x Curso-Semestre</a></li>-->
					   <li><a href="javascript: ___Grafic_View_( 'Matrículas x Curso-Semestre', ___iFrame_Select_(1))"><img src="../images/menu/G.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp; Matrículas-Curso-Semestre</a></li>
					   <li><a href="javascript: ___Grafic_View_( 'Valores x Matrículas-Cursos', ___iFrame_Select_(2))"><img src="../images/menu/G.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp; Valores-Matrículas-Cursos</a></li>
					   <li><a href="javascript: ___Grafic_View_( 'Matrículas Feitas x Usuário', ___iFrame_Select_(3))"><img src="../images/menu/G.ico" width="20px" height="20px" style="vertical-align:middle" />&nbsp; Matrículas x Usuários</a></li>
					   <li><a href="javascript: ___Grafic_View_( 'Pagamentos Feitos x Ano'    , ___iFrame_Select_(4))"><img src="../images/menu/G.ico" width="20px" height="20px" style="vertical-align:middle" />&nbsp; Pagamentos x Ano</a></li>
					  </ul>   
				  </div>
				</div>
			</div>
	 <? }
				   
		  if ($_SESSION["rolCode"] == '2'){ ?>				
	 	    <div class="panel panel-default">
				<div class="panel-heading" role="tab">
				     <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1"><strong>Opções Primarias</strong></a></h4>
				</div>
					<div id="collapseOne1" class="panel-collapse collapse in">
					  <div class="panel-body">
						  <ul class="art-vmenu">
						     <li id="viewMS" ><a href="../_User_Gestion/view_MS.php?bmenu=-collapseOne1" ><img src="../images/menu/Users.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp;Mudar Senha</a></li>
							 <li id="viewGS" ><a href="../g_Escola/view_.php?bmenu=-collapseOne1"        ><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão Escolas Médias</a></li>
							 <li id="viewGO" ><a href="../g_Opcao/view_.php?bmenu=-collapseOne1"         ><img src="../images/menu/2.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão Opção</a></li>
							 <li id="viewGC" ><a href="../g_Curso/view_.php?bmenu=-collapseOne1"         ><img src="../images/menu/5.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão Cursos</a></li>
							 <li id="viewGG" ><a href="../g_Grelha/view_.php?bmenu=-collapseOne1"        ><img src="../images/menu/5.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão Grelhas</a></li>
							 <li id="viewGD" ><a href="../g_Disciplina/view_.php?bmenu=-collapseOne1"    ><img src="../images/menu/5.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão Disciplinas</a></li>
							 <li id="viewGT" ><a href="../g_Turma/view_.php?bmenu=-collapseOne1"         ><img src="../images/menu/5.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão Turmas</a></li>
				          </ul>
						</div>
					</div>
		    </div>
		    <!----->
			<div class="panel panel-default">
			<div class="panel-heading">
			  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1"><strong>Relátorios Tabulados</strong></a></h4>
			</div>
				<div id="collapseTwo1" class="panel-collapse collapse">
				  <div class="panel-body">
						<ul class="art-vmenu">
                            <li id="report_ET" ><a href="../System_Report/_view_Listados_M.php?bmenu=-collapseTwo1"      ><img src="../images/menu/7.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Estudantes x Turma</a></li>
							<li id="report_ED" ><a href="../System_Report/_view_Listados_D.php?bmenu=-collapseTwo1"      ><img src="../images/menu/7.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Estudantes x Disciplinas</a></li>
							<li id="report_MF" ><a href="../System_Report/_view_Matriculas_fecha.php?bmenu=-collapseTwo1"><img src="../images/menu/4.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Matrículas x Anos</a></li>
							<li id="report_RB" ><a href="../System_Report/_view_Rebusca.php?bmenu=-collapseTwo1"		 ><img src="../images/menu/4.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Rebuscas x Curso</a></li>
						</ul>
				  </div>
				</div>
			</div>
			<!----->
		    <div class="panel panel-default">
			<div class="panel-heading">
			   <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1"><strong>Relátorios Gráficos</strong></a></h4>
			</div>
				<div id="collapseThree1" class="panel-collapse collapse">
				  <div class="panel-body">
					  <ul class="art-vmenu">
					     <li><a href="javascript: ___Grafic_View_( 'Matrículas x Curso-Semestre', ___iFrame_Select_(1))"><img src="../images/menu/G.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp; Matrículas-Curso-Semestre</a></li>
					     <li><a href="javascript: ___Grafic_View_( 'Valores x Matrículas-Cursos', ___iFrame_Select_(2))"><img src="../images/menu/G.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp; Valores-Matrículas-Cursos</a></li>
					     <li><a href="javascript: ___Grafic_View_( 'Matrículas Feitas x Usuário', ___iFrame_Select_(3))"><img src="../images/menu/G.ico" width="20px" height="20px" style="vertical-align:middle" />&nbsp; Matrículas x Usuários</a></li>
					  </ul>
				  </div>
				</div>
			</div>
	 <? }
							 
       if ($_SESSION["rolCode"] == '3'){ ?>				
	 	    <div class="panel panel-default">
				<div class="panel-heading" role="tab">
				     <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1"><strong>Opções Primarias</strong></a></h4>
				</div>
					<div id="collapseOne1" class="panel-collapse collapse in">
					  <div class="panel-body">
						  <ul class="art-vmenu">
						      <li id="viewMS" ><a href="../_User_Gestion/view_MS.php?bmenu=-collapseOne1" ><img src="../images/menu/Users.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp;Mudar Senha</a></li>
							  <li id="viewGE" ><a href="../g_Estudante/view_.php?bmenu=-collapseOne1"     ><img src="../images/menu/5.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Ficha do Estudante</a></li>
							  <li id="viewGM" ><a href="../g_Matricula/view_.php?bmenu=-collapseOne1"     ><img src="../images/menu/5.ico"  width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Matrículas</a></li>

				          </ul>
						</div>
					</div>
		    </div>
		    <!----->
			<div class="panel panel-default">
			<div class="panel-heading">
			  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1"><strong>Relátorios Tabulados</strong></a></h4>
			</div>
				<div id="collapseTwo1" class="panel-collapse collapse">
				  <div class="panel-body">
						<ul class="art-vmenu">
							
							<li id="report_MF" ><a href="../System_Report/_view_Matriculas_fecha.php?bmenu=-collapseTwo1"><img src="../images/menu/4.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Matrículas x Anos</a></li>
					    </ul>
				  </div>
				</div>
			</div>
			<!----->
		    <div class="panel panel-default">
			<div class="panel-heading">
			   <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1"><strong>Relátorios Gráficos</strong></a></h4>
			</div>
				<div id="collapseThree1" class="panel-collapse collapse">
				  <div class="panel-body">
					  <ul class="art-vmenu">
						 <li><a href="javascript: ___Grafic_View_( 'Matrículas x Curso-Semestre', ___iFrame_Select_(1))"><img src="../images/menu/G.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp; Matrículas-Curso-Semestre</a></li>
					     <li><a href="javascript: ___Grafic_View_( 'Matrículas Feitas x Usuário', ___iFrame_Select_(3))"><img src="../images/menu/G.ico" width="20px" height="20px" style="vertical-align:middle" />&nbsp; Matrículas x Usuários</a></li>
					  </ul>
				  </div>
				</div>
			</div>
	    <? }
		   
		 if ($_SESSION["rolCode"] == '4'){ ?>					 	    		   
			<div class="panel panel-default">
			<div class="panel-heading">
			  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1"><strong>Relátorios Tabulados</strong></a></h4>
			</div>
				<div id="collapseTwo1" class="panel-collapse collapse">
				  <div class="panel-body">
						<ul class="art-vmenu">
							<li id="report_ET" ><a href="../System_Report/_view_Listados_M.php?bmenu=-collapseTwo1"      ><img src="../images/menu/7.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Estudantes x Turma</a></li>
							<li id="report_ED" ><a href="../System_Report/_view_Listados_D.php?bmenu=-collapseTwo1"      ><img src="../images/menu/7.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Estudantes x Disciplinas</a></li>
							<li id="report_MF" ><a href="../System_Report/_view_Matriculas_fecha.php?bmenu=-collapseTwo1"><img src="../images/menu/4.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Matrículas x Anos</a></li>						
							<li id="report_RB" ><a href="../System_Report/_view_Rebusca.php?bmenu=-collapseTwo1"		     ><img src="../images/menu/4.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Rebuscas x Curso</a></li>
							<li id="report_T_est" ><a href="../System_Report/_view_Traza_Est.php?bmenu=-collapseTwo1"    ><img src="../images/menu/6.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Manejo Estudantes Ano</a></li>
							<li id="report_T_Dat" ><a href="../System_Report/_view_Traza_Est_dia.php?bmenu=-collapseTwo1"><img src="../images/menu/6.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Manejo de Matrículas x Data</a></li>
							<li id="report_T_mat" ><a href="../System_Report/_view_Traza_Matr.php?bmenu=-collapseTwo1"   ><img src="../images/menu/6.ico"   width="18px" height="18px" style="vertical-align:middle" />&nbsp;Manejo de Matrículas</a></li>
				    	</ul>
				  </div>
				</div>
			</div>
			<!----->
		    <div class="panel panel-default">
			<div class="panel-heading">
			   <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1"><strong>Relátorios Gráficos</strong></a></h4>
			</div>
				<div id="collapseThree1" class="panel-collapse collapse">
				  <div class="panel-body">
					  <ul class="art-vmenu">
					     <li><a href="javascript: ___Grafic_View_( 'Matrículas x Curso-Semestre', ___iFrame_Select_(1))"><img src="../images/menu/G.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp; Matrículas-Curso-Semestre</a></li>
					     <li><a href="javascript: ___Grafic_View_( 'Valores x Matrículas-Cursos', ___iFrame_Select_(2))"><img src="../images/menu/G.ico" width="18px" height="18px" style="vertical-align:middle" />&nbsp; Valores-Matrículas-Cursos</a></li>
					     <li><a href="javascript: ___Grafic_View_( 'Matrículas Feitas x Usuário', ___iFrame_Select_(3))"><img src="../images/menu/G.ico" width="20px" height="20px" style="vertical-align:middle" />&nbsp; Matrículas x Usuários</a></li>
					 </ul>
				  </div>
				</div>
			</div>
	 <? }
							 
		if ($_SESSION["rolCode"] == '7'){ ?>				
	 	    <div class="panel panel-default">
				<div class="panel-heading" role="tab">
				     <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1"><strong>Opções Primarias</strong></a></h4>
				</div>
					<div id="collapseOne1" class="panel-collapse collapse in">
					  <div class="panel-body">
						  <ul class="art-vmenu">						    
						     <li id="viewPDE"><a href="../g_Prof_Eval_Disc/view_.php?bmenu=-collapseOne1"	    ><img src="../images/menu/new.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Prof.-Disc.-Eval.</a></li>
						     <li id="viewDA" ><a href="../g_Professor_Disciplina/view_2.php?bmenu=-collapseOne1"><img src="../images/menu/new.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Disciplinas Asociadas</a></li>
							 <li id="viewPDN"><a href="../g_set_notes/view_.php?bmenu=-collapseOne1"	       ><img src="../images/menu/new.ico"     width="18px" height="18px" style="vertical-align:middle" />&nbsp;Gestão de Notas</a></li>
						  </ul>
						</div>
					</div>
		    </div>
	 <? }
							 
	    include('../g_Erros/view_.php'); _set_FORM();			
	  ?> 
</div>
</div>
</div>

      <!--GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS----->
      <!--GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS----->
      <!--GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS---GRAFICS----->
     <script>
function ___iFrame_Select_( punter ){

			switch (punter){
				case 1: { txt ='<div><iframe src="../_Grafics/Graficas/___view_cs_.php" frameborder="0" width="100%" height="530px"></iframe>';  break}
				case 2: { txt ='<div><iframe src="../_Grafics/Graficas/___view_cv_.php" frameborder="0" width="100%" height="490px"></iframe>';  break}
				case 3: { txt ='<div><iframe src="../_Grafics/Graficas/___view_um_.php" frameborder="0" width="100%" height="470px"></iframe>';  break}
				case 4: { txt ='<div><iframe src="../_Grafics/Graficas/___view_cr_.php" frameborder="0" width="100%" height="470px"></iframe>';  break}
			   }
			  return txt;
			}
$(function() {
	//$( "#Checkboxes1" ).buttonset(); 
});
     </script>
     <!--Colocar los view_ en txt
         para poner las graficas en popues, function ___iFrame_Select_()
         para poner las graficas en popus antiguos, los codigos  comentados abajo.
      -->
  	 <!--<div id="___G1" style="display:none; z-index:200px"><iframe src="../_Grafics/Graficas/___view_cs_.php" frameborder="0" width="100%" height="530px"></iframe></div>-->
     <?
       /* if ($t == "true"){ ?>
       <!--nomencladores-->
       <div id="M" style="display:none; z-index:200px"><iframe src="../_Nomencladores/municipio.php" frameborder="0" width="100%" height="550px"></iframe></div>
       <div id="U" style="display:none; z-index:200px"><iframe src="../_Nomencladores/Areas.php"     frameborder="0" width="100%" height="550px"></iframe></div>
	 <? }     */
  }
}?><!--end class-end class->
