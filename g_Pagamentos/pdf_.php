<?php
session_start(); 
require('../_f_PDF/fpdf.php');
include ("../_php/__Manager.php");

$txt = "SELECT 
			  factura.*,
			  estudante.cNome,
			  estudante.bi_passaporte,
			  tipo_pagamento.nome,
			  forma_pagamento.ffpNome,
			  curso.cDesc
			FROM
			  factura
			  INNER JOIN estudante ON (factura.id_estudante = estudante.id)
			  INNER JOIN forma_pagamento ON (factura.id_modo_pagamento = forma_pagamento.id)
			  INNER JOIN tipo_pagamento ON (factura.id_tipo_pagamento = tipo_pagamento.id)
			  INNER JOIN curso ON (estudante.id_curso = curso.id)
			WHERE
			  (factura.id = '".$_GET["id_Ma"]."')";

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
   $pdf->Cell(0,6,'Recibo de Pagamento - '.utf8_decode($query[0]['nome']) ,0,0, 'C');

$pdf->Ln(15);
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(23,6,'Estudante: ' ,0,0, 'L');        
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(100,6, utf8_decode($query[0]['cNome']) ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(28,6,'' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, ''   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(33,6,'Data Pagamento: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(90,6, utf8_decode($query[0]['data'])   ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(20,6,'' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6,''   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(30,6,'Nº. Identificação: '      ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(93,6, $query[0]['bi'] ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(27,6,'' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, ''   ,0,0, 'L');

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
$pdf->Cell(0,6, utf8_decode($query[0]['nome']) ,0,0, 'C', true);

$pdf->Ln();
//$pdf->Cell(0);
$pdf->Cell(10,6,'Nº'  	  ,1,0, 'C');
$pdf->Cell(155,6,'Curso'  ,1,0, 'C');
$pdf->Cell(25,6,'Valor'   ,1,0, 'C');

$pdf->Ln();
$pdf->SetFont('Arial','',10);
//$cant =0;
//for($i = 0; $i < count($query); $i++){
	$pdf->Cell(10,6, 1							             ,1,0, 'C');
	$pdf->Cell(155,6, utf8_decode($query[0]["cDesc"])        ,1,0, 'C');	
	$pdf->Cell(25,6, utf8_decode($query[0]["valor_final"]) ,1,0, 'C');
	
//}
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,''                         ,0,0, 'C');
$pdf->Cell(125,6,''                        ,0,0, 'C');
$pdf->Cell(30,6,'Total' 	               ,1,0, 'R');
$pdf->Cell(25,6,$query[0]["valor_final"] ,1,0, 'C');

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
   $pdf->Image('../images/logo.png',91,150,26);    
    
   $pdf->Ln(25);
   //Titulo
   $pdf->SetFont('Arial','B',14);
   $pdf->Cell(0,6,'Universidade José Eduardo dos Santos'      ,0,0, 'C'); 
   $pdf->Ln(); 
   $pdf->Cell(0,6,'Instituto Superior Politécnico do Huambo' ,0,0, 'C');    
   $pdf->Ln(8);
   $pdf->Cell(0,6,'Recibo de Pagamento - '.utf8_decode($query[0]['nome']) ,0,0, 'C');

$pdf->Ln(15);
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(23,6,'Estudante: ' ,0,0, 'L');        
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(100,6, utf8_decode($query[0]['cNome']) ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(28,6,'' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, ''   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(33,6,'Data Pagamento: ' ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(90,6, utf8_decode($query[0]['data'])   ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(20,6,'' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6,''   ,0,0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial','B',10);   
      $pdf->Cell(30,6,'Nº. Identificação: '      ,0,0, 'L');
$pdf->SetFont('Arial','',10);   
      $pdf->Cell(93,6, $query[0]['bi'] ,0,0, 'L');

$pdf->SetFont('Arial','B',10);
      $pdf->Cell(27,6,'' ,0,0, 'L');
$pdf->SetFont('Arial','',10);
      $pdf->Cell(0,6, ''   ,0,0, 'L');

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
$pdf->Cell(0,6, utf8_decode($query[0]['nome']) ,0,0, 'C', true);

$pdf->Ln();
//$pdf->Cell(0);
$pdf->Cell(10,6,'Nº'  	  ,1,0, 'C');
$pdf->Cell(155,6,'Curso'  ,1,0, 'C');
$pdf->Cell(25,6,'Valor'   ,1,0, 'C');

$pdf->Ln();
$pdf->SetFont('Arial','',10);
//$cant =0;
//for($i = 0; $i < count($query); $i++){
	$pdf->Cell(10,6, 1							             ,1,0, 'C');
	$pdf->Cell(155,6, utf8_decode($query[0]["cDesc"])        ,1,0, 'C');	
	$pdf->Cell(25,6, utf8_decode($query[0]["valor_final"]) ,1,0, 'C');
	
//}
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,''                         ,0,0, 'C');
$pdf->Cell(125,6,''                        ,0,0, 'C');
$pdf->Cell(30,6,'Total' 	               ,1,0, 'R');
$pdf->Cell(25,6,$query[0]["valor_final"] ,1,0, 'C');

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