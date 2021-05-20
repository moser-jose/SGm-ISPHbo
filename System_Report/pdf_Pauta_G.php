<?php
session_start(); 
require('../_f_PDF/fpdf.php');
include ("../_php/__Manager_.php");

$txt = "SELECT 
			  estudante.cNome,
			  estudiante_notas.tipo_eval,
			  estudiante_notas.nota,
			  estudiante_notas.data,
			  professor.nome,
			  turma.tAno_curricular,
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
	
	for($i = 0; $i < count($query); $i++){
		if ($query[$i]['tipo_eval'] == 7) $dataEx =$query[$i]['data']; 		
		if ($query[$i]['tipo_eval'] == 8) $dataRe =$query[$i]['data']; 		
	} 									  $prof   =$query[0]['nome']; 
	
	$pdf->Ln();
	$pdf->Cell(123,4,'CURSO: '.utf8_decode($query[0]["cDesc"]).' - '.$query[0]["tAno_curricular"].'º ANO' ,0,0, 'L');     $pdf->Ln();
	$pdf->Cell(123,4,'DISCIPLINA: '.utf8_decode($query[0]["dDesc"])                                       ,0,0, 'L');     
	$pdf->Cell(23,4,'PROFESSOR: '.utf8_decode($prof)                                                      ,0,0, 'L');  	  $pdf->Ln(); 
	$pdf->Cell(123,4,'Data de Realização do Exame: '.utf8_decode($dataEx)                                 ,0,0, 'L');
	$pdf->Cell(23,4,'ANO LECTIVO: '.$_GET['ano']                                        				  ,0,0, 'L');     $pdf->Ln(); 
	$pdf->Cell(123,4,'Data de Realização do Recurso: '.utf8_decode($dataRe)                               ,0,0, 'L');     $pdf->Ln(); 
	
    $pdf->Ln();
	
	$pdf->SetFont('Arial','B',8);
	
	$t =explode('.', $query[0]["tDesc"]);	
	$pdf->Cell(80,5,'TURMA: '.$t[1].$t[2]    ,1,0, 'L');
	$pdf->Cell(54,5,'Resultados da Avaliação',1,0, 'L');
	$pdf->Cell(9,10,'M.'                  ,1,0, 'L');
	$pdf->Cell(14,10,'Resul.'                 ,1,0, 'L');
	$pdf->Cell(10,10,'Recur.'                 ,1,0, 'L');
	$pdf->Cell(9,10,'M.'                  ,1,0, 'L');	
	$pdf->Cell(15,5 ,''                       ,1,0, 'L');	
		
	$pdf->Ln();	
	$pdf->Cell(7 ,5, "No."             ,1,0, 'C');
	$pdf->Cell(73,5, "Nome e Apelidos" ,1,0, 'L');
	$pdf->Cell(9,5, "1ª P."           ,1,0, 'L'); 
	$pdf->Cell(9,5, "2ª P."           ,1,0, 'L'); 
	$pdf->Cell(9,5, "M."              ,1,0, 'L'); 
	$pdf->Cell(9,5, "40%"             ,1,0, 'L'); 
	$pdf->Cell(9,5, "Ex."             ,1,0, 'L'); 
	$pdf->Cell(9,5, "60%"             ,1,0, 'L'); 
	$pdf->Cell(42,5, ""               ,0,0, 'L'); 
	$pdf->Cell(15,5,'Resul.'          ,1,0, 'L');
	$pdf->SetFont('Arial','',8);
	$pdf->Ln();	
	
	
	$name ='';
	$k =0;
	
	$aprov =0;
	$reprov=0;
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
 
  		 if($medF <=9.4) $res ='Recurso'; else { $res ='Aprovado'; $aprov++; }
		 if($res  != 'Aprovado'){
  		 if($medR <=9.4) { $rer ='Reprovado'; $reprov++; } else { $rer ='Aprovado';	$aprov++;}
		 }else{
		        $rer  ='';	
			    $medR ='';
		 }
		$pdf->Cell(7,5, $k 							       				      ,1,0, 'C');
		$pdf->Cell(73,5, utf8_decode(mb_strtoupper($query[$i]["cNome"]))      ,1,0, 'L');
		$pdf->Cell(9,5, $ra   ,1,0, 'L'); 
		$pdf->Cell(9,5, $da   ,1,0, 'L'); 
		$pdf->Cell(9,5, $med  ,1,0, 'L'); 
		$pdf->Cell(9,5, $p40  ,1,0, 'L'); 
		$pdf->Cell(9,5, $ex   ,1,0, 'L'); 
		$pdf->Cell(9,5, $p60  ,1,0, 'L'); 		
		$pdf->Cell(9,5, $medF ,1,0, 'L'); 		
		$pdf->Cell(14,5,$res  ,1,0, 'L');
		$pdf->Cell(10,5,$re   ,1,0, 'L');
		$pdf->Cell(9 ,5,$medR ,1,0, 'L');
		$pdf->Cell(15,5,$rer  ,1,0, 'L');
		$pdf->Ln();	
			
		}	
		
	}
}
$pdf->Cell(191,5, 'REBUSCAS'      ,1,0, 'C');   $pdf->Ln(); 
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,5,  '',1,0, 'C');
		$pdf->Cell(73,5, '',1,0, 'L');
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 		
		$pdf->Cell(9,5,  '',1,0, 'L'); 		
		$pdf->Cell(14,5, 'Aprov.',1,0, 'L');
		$pdf->Cell(10,5, $aprov,1,0, 'L');
		$pdf->Cell(9 ,5, '',1,0, 'L');
		$pdf->Cell(15,5, '',1,0, 'L');
		$pdf->Ln();	
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,5,  '',1,0, 'C');
		$pdf->Cell(73,5, '',1,0, 'L');
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 
		$pdf->Cell(9,5,  '',1,0, 'L'); 		
		$pdf->Cell(9,5,  '',1,0, 'L'); 		
		$pdf->Cell(14,5, 'Reprov.',1,0, 'L');
		$pdf->Cell(10,5, $reprov,1,0, 'L');
		$pdf->Cell(9 ,5, '',1,0, 'L');
		$pdf->Cell(15,5, '',1,0, 'L');
		$pdf->Ln(10);	


$pdf->SetFont('Arial','',8);
	$pdf->Ln(2);
	$pdf->Cell(98,6,'O Chefe do Departamento'    ,0,0, 'C');  $pdf->Cell(0,6,'O Chefe professor da disciplina' ,0,0, 'C'); $pdf->Ln(2);  
	$pdf->Cell(98,6,'__________________________' ,0,0, 'C');  $pdf->Cell(0,6,'__________________________'      ,0,0, 'C'); $pdf->Ln(4); 
	$pdf->Cell(98,6,'Felisberto Fato,  Msc.'     ,0,0, 'C');  $pdf->Cell(0,6, utf8_decode($prof)          ,0,0, 'C');

    $pdf->Output();     

?> 