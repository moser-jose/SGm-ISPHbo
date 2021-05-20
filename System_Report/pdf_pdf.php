<?php
session_start(); 
require('../_f_PDF/fpdf.php');
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


// Creación del objeto de la clase heredada
$pdf = new FPDF();

//$pdf->AliasNbPages();
$pdf->AddPage();

   // Logo
   $pdf->Image('../images/logo.png',95,15,15);    
    
   $pdf->Ln(20);
   //Titulo
   $pdf->SetFont('Arial','B',12);
   $pdf->Cell(0,6,'Universidade José Eduardo dos Santos'      ,0,0, 'C');    $pdf->Ln(); 
   $pdf->Cell(0,6,'Instituto Superior Politécnico do Huambo'  ,0,0, 'C');    $pdf->Ln(5);
   
   $pdf->Cell(30);
   $pdf->SetFont('Arial','',8);
   
   $pdf->Cell(12,6,'Visto'                 		,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->Cell(12,6,'____/____/________'         ,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->Cell(12,6,'A Vice-Decana para os' 		,0,0, 'C');                        $pdf->Ln(3);  $pdf->Cell(30);
   $pdf->Cell(12,6,'Assuntos Académicos'   		,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->Cell(12,6,'________________________'   ,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->SetFont('Arial','B',8);
   $pdf->Cell(12,6,'Bernacia Zita Benguela Msc' ,0,0, 'C');                        $pdf->Ln(4);  $pdf->Cell(30);
   $pdf->SetFont('Arial','',8);
   $pdf->Cell(12,6,'= Professora Auxiliar ='    ,0,0, 'C');                        $pdf->Ln(3);  

   
if ($query != null){   
	$pdf->Ln(3);
	$pdf->Cell(23);
	$pdf->SetFont('Arial','B',10);
	   
	$pdf->Cell(23,6,'ANO LECTIVO: '.Date('Y') ,0,0, 'L');                                                                $pdf->Ln(5);  $pdf->Cell(23);
	$pdf->Cell(23,6,'CURSO: '.utf8_decode($query[0]["cDesc"]).' - '.$query[0]["maAno_curricular"].'º ANO' ,0,0, 'L');    $pdf->Ln(5);  $pdf->Cell(23);

	($_GET["sem"] % 2 == 0) ? $sem =2 : $sem =1;	
	$t =explode('.', $query[0]["tDesc"]);	
	
	$pdf->Cell(23,6,'TURMA: '.$t[1].$t[2].' - '.$sem.'º SEMESTRE' ,0,0, 'L');                        					 $pdf->Ln(6); $pdf->Cell(45);
	$pdf->Cell(0,6,'RELAÇÃO NOMINAL DE ESTUDANTES MATRÍCULADOS' ,0,0, 'L');                                              $pdf->Ln();


	$pdf->SetFont('Arial','',10);

	for($i = 0; $i < count($query); $i++){
		$pdf->Cell(23); 
		$pdf->Cell(10,5, $i +1							        ,1,0, 'C');
		$pdf->Cell(130,5, utf8_decode(mb_strtoupper($query[$i]["cNome"], 'UTF-8'))      ,1,0, 'L');
		$pdf->Ln();	
	}

	$pdf->SetFont('Arial','',8);
	$pdf->Ln(2);
	$pdf->Cell(0,6,'O Chefe do Departamento de Assuntos Académicos' ,0,0, 'C');                        
	$pdf->Ln(2); 
	$pdf->Cell(0,6,'_______________________________________________' ,0,0, 'C');   
	$pdf->Ln(4); 
	$pdf->Cell(0,6,'José Domingos Sassoquele' ,0,0, 'C');

}
          header("Content-Type: application/xls");
          header("Content-Disposition: attachment; filename = Lista.xls");
          $pdf->Output();   

         // echo $pdf;
?> 