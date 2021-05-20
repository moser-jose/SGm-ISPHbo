<?php
session_start(); 
require('../_f_PDF/fpdf.php');
include ("../_php/__Manager_.php");

$txt = "SELECT 
			  estudante.cNome,
			  estudante.cGenero,
			  estudiante_notas.tipo_eval,
			  estudiante_notas.nota,
			  estudiante_notas.data,
			  professor.nome,
			  turma.tAno_curricular,
			  turma.tPeriodo,
			  curso.cDesc,
			  turma.anoAcademico,
			  turma.tDesc,
			  disciplina.dDesc

			FROM
			  estudiante_notas
			  INNER JOIN estudante ON (estudiante_notas.estudiante = estudante.id)
			  INNER JOIN turma ON (estudiante_notas.turma = turma.id)
			  INNER JOIN curso ON (turma.id_curso = curso.id)
			  INNER JOIN disciplina ON (estudiante_notas.disciplina = disciplina.id)
			  INNER JOIN professor_disciplina ON (estudiante_notas.disciplina = professor_disciplina.id_disciplina)
			  INNER JOIN professor ON (professor_disciplina.id_professor = professor.id)
			WHERE
			  (estudiante_notas.disciplina = '".$_GET["id_D"]."') AND 
			  (estudiante_notas.turma      = '".$_GET["id_T"]."')
			GROUP BY
			  estudante.cNome,
			  estudante.cGenero,
			  estudiante_notas.tipo_eval,
			  estudiante_notas.data,
			  professor.nome,
			  estudiante_notas.nota
			ORDER BY
			  estudante.cNome,
			  estudiante_notas.tipo_eval"; 

$query =__LOAD_( $txt ); 


// Creación del objeto de la clase heredada
$pdf = new FPDF();

//$pdf->AliasNbPages();
$pdf->AddPage();

   // Logo
   $pdf->Image('../images/logo.png',91,15,26);    
    
   $pdf->Ln(32);
   //Titulo
   $pdf->SetFont('Arial','B',12);
   $pdf->Cell(0,6,'Universidade José Eduardo dos Santos'      ,0,0, 'C');    $pdf->Ln(); 
   $pdf->Cell(0,6,'Instituto Superior Politécnico do Huambo'  ,0,0, 'C');    $pdf->Ln(8);
   
   $pdf->Cell(30);
   $pdf->SetFont('Arial','',8);
   
   $pdf->Cell(12,6,'Visto'                 		,0,0, 'C');                        $pdf->Ln(5);  $pdf->Cell(30);
   $pdf->Cell(12,6,'____/____/________'         ,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->Cell(12,6,'A Vice-Decana para os' 		,0,0, 'C');                        $pdf->Ln(3);  $pdf->Cell(30);
   $pdf->Cell(12,6,'Assuntos Académicos'   		,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->Cell(12,6,'________________________'   ,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(12,6,'Bernacia Zita Benguela Msc' ,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->SetFont('Arial','',8);
   $pdf->Cell(12,6,'= Professora Auxiliar ='    ,0,0, 'C');                        $pdf->Ln(4);  

   
if ($query != null){   	
	$pdf->SetFont('Arial','B',9);
									  
	
	$pdf->Ln();
	$t =explode('.', $query[0]["tDesc"]);
	$pdf->Cell(190,4, utf8_decode($query[0]["cDesc"]) .' '.$t[1].$t[2]. ' ('.$query[0]["tPeriodo"].')' ,1,0, 'C');  $pdf->Ln();
	
	$totalM =0;
	$totalF =0;
	$aprovM =0;
	$aprovF =0;

	$name ='';	
	$k =0;
	for($i = 0; $i < count($query); $i++){
		
		if ($name != $query[$i]["cNome"]){
			$name =$query[$i]["cNome"];
			$k++;
					for($j = 0; $j< count($query); $j++)				
			         if($name ==$query[$j]["cNome"]){
						 if($query[$j]["tipo_eval"] == '4') $ra =$query[$j]['nota'];  else				
						 if($query[$j]["tipo_eval"] == '5') $da =$query[$j]['nota'];  else					
						 if($query[$j]["tipo_eval"] == '7') $ex =$query[$j]['nota'];  else	
						 if($query[$j]["tipo_eval"] == '8') $re =$query[$j]['nota'];  	
					 }
				   
			
		if ($ra != 'F' && $da != 'F') $med = ((double)$ra + (double)$da) /2; else
		if ($ra != 'F' && $da == 'F') $med = ((double)$ra) /2;	else
		if ($ra == 'F' && $da != 'F') $med = ((double)$da) /2;
			
		if ($ex  != 'F')	
		    $p60  =$ex *0.6;
		    $p40  =$med*0.4;						
		    $medF =$p40+$p60;						
		    $medR =($p40+(double)$re)*0.6;						
 
		   ($query[$i]["cGenero"] == "Masculino") ? $totalM++ : $totalF++;
  		 if($medF <=9.4) $res ='Recurso';        else { $res ='Aprovado'; ($query[$i]["cGenero"] == "Masculino") ? $aprovM++ : $aprovF++; }
		 if($res  != 'Aprovado'){
  		 if($medR <=9.4) { $rer ='Reprovado';  } else { $rer ='Aprovado'; ($query[$i]["cGenero"] == "Masculino") ? $aprovM++ : $aprovF++; }
		 }else{
		        $rer  ='';	
			    $medR ='';
		 }
	}
}
	
$pdf->SetFont('Arial','B',8);	
$pdf->Cell(65,10, 'Disciplina'    ,1,0, 'C');   
$pdf->Cell(35,5, 'Inscritos'      ,1,0, 'C');   
$pdf->Cell(45,5, 'Aprovados'      ,1,0, 'C');   
$pdf->Cell(45,5, 'Reprovados'     ,1,0, 'C');   $pdf->Ln(); 
	
$pdf->Cell(65,5, ''      ,0,0, 'C');   
$pdf->Cell(11,5, 'M'     ,1,0, 'C');   
$pdf->Cell(11,5, 'F'     ,1,0, 'C');   
$pdf->Cell(13,5, 'T'     ,1,0, 'C');   
	
$pdf->Cell(11,5, 'M'     ,1,0, 'C');   
$pdf->Cell(11,5, 'F'     ,1,0, 'C');   
$pdf->Cell(11,5, 'T'     ,1,0, 'C'); 
$pdf->Cell(12,5, '%'     ,1,0, 'C'); 
	
$pdf->Cell(11,5, 'M'     ,1,0, 'C');   
$pdf->Cell(11,5, 'F'     ,1,0, 'C');   
$pdf->Cell(11,5, 'T'     ,1,0, 'C'); 	
$pdf->Cell(12,5, '%'     ,1,0, 'C'); 	$pdf->Ln();
	
$total =$k;
$pdf->Cell(65,5, utf8_decode($query[0]["dDesc"])      ,1,0, 'C');   
$pdf->Cell(11,5, $totalM      ,1,0, 'C');   
$pdf->Cell(11,5, $totalF      ,1,0, 'C');   
$pdf->Cell(13,5, $total       ,1,0, 'C');   
	
$taprov =$aprovM +$aprovF;
$pdf->Cell(11,5, $aprovM       ,1,0, 'C');   
$pdf->Cell(11,5, $aprovF       ,1,0, 'C');   
$pdf->Cell(11,5, $taprov       ,1,0, 'C'); 
$pdf->Cell(12,5, $taprov/$total,1,0, 'C'); 
	
$trprov =($totalM -$aprovM) +($totalF -$aprovF);	
$pdf->Cell(11,5, $totalM -$aprovM ,1,0, 'C');   
$pdf->Cell(11,5, $totalF -$aprovF ,1,0, 'C');   
$pdf->Cell(11,5, $trprov          ,1,0, 'C'); 	
$pdf->Cell(12,5, $trprov/$total   ,1,0, 'C'); 	$pdf->Ln();	
       
}

$pdf->SetFont('Arial','',8);
	$pdf->Ln(2);
	$pdf->Cell(98,6,'O Chefe do Departamento'    ,0,0, 'C');  $pdf->Cell(0,6,'O Chefe professor da disciplina' ,0,0, 'C'); $pdf->Ln(2);  
	$pdf->Cell(98,6,'__________________________' ,0,0, 'C');  $pdf->Cell(0,6,'__________________________'      ,0,0, 'C'); $pdf->Ln(4); 
	$pdf->Cell(98,6,'Felisberto Fato,  Msc.'     ,0,0, 'C');  $pdf->Cell(0,6, utf8_decode($query[0]["nome"])   ,0,0, 'C');

    $pdf->Output();     

?> 