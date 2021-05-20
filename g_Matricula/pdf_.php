<?php
session_start(); 
require('../_f_PDF/fpdf.php');
include ("../_php/__Manager.php");

$txt = "SELECT 
			  estudante.cNome, estudante.bi_passaporte, matricula_ano.*, `curso`.cDesc, `turma`.tPeriodo
		  FROM
			  estudante
			  INNER JOIN matricula_ano ON (estudante.id       = matricula_ano.id_estudante)
			  INNER JOIN `curso`       ON (estudante.id_curso = `curso`.id)
			  INNER JOIN `turma`       ON (`curso`.id         = `turma`.id_curso) 
	     WHERE 
		     (matricula_ano.id = '".$_GET["id_Ma"]."')";

$query =__LOAD_( $txt ); 


// Creación del objeto de la clase heredada
$pdf = new FPDF();

//$pdf->AliasNbPages();
$pdf->AddPage();

   // Logo
   $pdf->Image('../images/logo.png',91,15,26);    
    
   $pdf->Ln(32);
   //Titulo
   $pdf->SetFont('Arial','B',14);
   $pdf->Cell(0,6,'Universidade José Eduardo dos Santos'      ,0,0, 'C'); 
   $pdf->Ln(); 
   $pdf->Cell(0,6,'Instituto Superior Politécnico do Huambo' ,0,0, 'C');    
   $pdf->Ln(8);
   $pdf->Cell(0,6,'Recibo de Matrícula' ,0,0, 'C');

$pdf->Ln(15);
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(23,6,'Estudante: ' ,0,0, 'L');        
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(100,6, utf8_decode($query[0]['cNome']) ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(28,6,'Ano Curricular: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, $query[0]['maAno_curricular'].'º'   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(33,6,'Data de Matrícula: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(90,6, $query[0]['maData']   ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(20,6,'Semestre: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, $query[0]['maSemestre'].'º'   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(30,6,'Nº. Identificação: '      ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(93,6, $query[0]['bi_passaporte'] ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(27,6,'Vez Matrícula: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, $query[0]['maVez'].'º'   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(30,6,'Ano Academico: '      ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(0,6, date('Y') ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
$pdf->Ln(8);

$pdf->SetFillColor(23,185,23);
//$pdf->SetTextColor(85,107,47);
$pdf->Cell(0,6, 'Matrícula' ,0,0, 'C', true);

$pdf->Ln();
//$pdf->Cell(0);
$pdf->Cell(10,6,'Nº'  	  ,1,0, 'C');
$pdf->Cell(125,6,'Curso'  ,1,0, 'C');
$pdf->Cell(30,6,'Regime'  ,1,0, 'C');
$pdf->Cell(25,6,'Valor'   ,1,0, 'C');

$pdf->Ln();
$pdf->SetFont('Arial','',10);
//$cant =0;
//for($i = 0; $i < count($query); $i++){
	$pdf->Cell(10,6, 1							             ,1,0, 'C');
	$pdf->Cell(125,6, utf8_decode($query[0]["cDesc"])        ,1,0, 'C');
	$pdf->Cell(30,6, utf8_decode($query[0]["tPeriodo"]) 	 ,1,0, 'C');	
	$pdf->Cell(25,6, utf8_decode($query[0]["maValor_total"]) ,1,0, 'C');
	
//}
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,''                         ,0,0, 'C');
$pdf->Cell(125,6,''                        ,0,0, 'C');
$pdf->Cell(30,6,'Total' 	               ,1,0, 'R');
$pdf->Cell(25,6,$query[0]["maValor_total"] ,1,0, 'C');

$pdf->Ln(10);
$pdf->Cell(90,6,'Assinatura do estudante'   ,0,0, 'C');
$pdf->Cell(100,6,'Assinatura do funcionario' ,0,0, 'C');
$pdf->Ln();
$pdf->Cell(90,6,'---------------------------------------' ,0,0, 'C');
$pdf->Cell(100,6,'---------------------------------------' ,0,0, 'C');

$pdf->Ln(10);
$pdf->Cell(0,6,'---------------------------------------------------------------------------------------------------------------------------------------',0,0, 'C');
$pdf->Ln(15);

   // Logo
   $pdf->Image('../images/logo.png',91,154,26);    
    
   $pdf->Ln(24);
   //Titulo
   $pdf->SetFont('Arial','B',14);
   $pdf->Cell(0,6,'Universidade José Eduardo dos Santos'      ,0,0, 'C'); 
   $pdf->Ln(); 
   $pdf->Cell(0,6,'Instituto Superior Politécnico do Huambo' ,0,0, 'C');    
   $pdf->Ln(8);
   $pdf->Cell(0,6,'Recibo de Matrícula' ,0,0, 'C');

$pdf->Ln(15);
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(23,6,'Estudante: ' ,0,0, 'L');        
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(100,6, utf8_decode($query[0]['cNome']) ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(28,6,'Ano Curricular: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, $query[0]['maAno_curricular'].'º'   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(33,6,'Data de Matrícula: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(90,6, $query[0]['maData']   ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(20,6,'Semestre: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, $query[0]['maSemestre'].'º'   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(30,6,'Nº. Identificação: '      ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(93,6, $query[0]['bi_passaporte'] ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(27,6,'Vez Matrícula: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, $query[0]['maVez'].'º'   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(30,6,'Ano Academico: '      ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(0,6, date('Y') ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
$pdf->Ln(8);

$pdf->SetFillColor(23,185,23);
//$pdf->SetTextColor(85,107,47);
$pdf->Cell(0,6, 'Matrícula' ,0,0, 'C', true);

$pdf->Ln();
//$pdf->Cell(0);
$pdf->Cell(10,6,'Nº'  	  ,1,0, 'C');
$pdf->Cell(125,6,'Curso'  ,1,0, 'C');
$pdf->Cell(30,6,'Regime'  ,1,0, 'C');
$pdf->Cell(25,6,'Valor'   ,1,0, 'C');

$pdf->Ln();
$pdf->SetFont('Arial','',10);
//$cant =0;
//for($i = 0; $i < count($query); $i++){
	$pdf->Cell(10,6, 1							             ,1,0, 'C');
	$pdf->Cell(125,6, utf8_decode($query[0]["cDesc"])        ,1,0, 'C');
	$pdf->Cell(30,6, utf8_decode($query[0]["tPeriodo"]) 	 ,1,0, 'C');	
	$pdf->Cell(25,6, utf8_decode($query[0]["maValor_total"]) ,1,0, 'C');
	
//}
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,''                         ,0,0, 'C');
$pdf->Cell(125,6,''                        ,0,0, 'C');
$pdf->Cell(30,6,'Total' 	               ,1,0, 'R');
$pdf->Cell(25,6,$query[0]["maValor_total"] ,1,0, 'C');

$pdf->Ln(10);
$pdf->Cell(90,6,'Assinatura do estudante'   ,0,0, 'C');
$pdf->Cell(100,6,'Assinatura do funcionario' ,0,0, 'C');
$pdf->Ln();
$pdf->Cell(90,6,'---------------------------------------' ,0,0, 'C');
$pdf->Cell(100,6,'---------------------------------------' ,0,0, 'C');

    //$ruta ="D:/Descargas/Compressed/";
    $nombre_archivo =utf8_decode($query[0]['cNome'].'.pdf');
    $pdf->Output($nombre_archivo, 'I');     

?> 