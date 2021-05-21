<?php
session_start();
require('../_f_PDF/fpdf.php');
include("../_php/__Manager.php");

$txt = "SELECT 
			  factura.*,
			  estudante.cNome,
			  estudante.bi_passaporte,
			  tipo_pagamento.nome,
                    tipo_pagamento.costo,
			  forma_pagamento.ffpNome,
			  curso.cDesc,
                    factura_propina.mes_pago,
                    disciplina.dDesc,
                    users.nome as funcionario
			FROM
			  factura
			  INNER JOIN estudante ON (factura.id_estudante = estudante.id)
			  INNER JOIN forma_pagamento ON (factura.id_modo_pagamento = forma_pagamento.id)
			  INNER JOIN tipo_pagamento ON (factura.id_tipo_pagamento = tipo_pagamento.id)
			  INNER JOIN curso ON (estudante.id_curso = curso.id)
                    INNER JOIN factura_propina ON (factura_propina.id_factura = factura.id)
                    INNER JOIN users ON (users.id = factura.id_funcionario)
                    INNER JOIN factura_exame ON (factura_exame.id_factura = factura.id)
                    INNER JOIN disciplina ON (disciplina.id = factura_exame.id_disciplina)
			WHERE
			  (factura.id = '" . $_GET["id_Ma"] . "')";

$query = __LOAD_($txt);


// Creaci�n del objeto de la clase heredada
$pdf = new FPDF();

//$pdf->AliasNbPages();
$pdf->AddPage();

// Logo
$pdf->Image('../images/logo.png', 91, 15, 26);

$pdf->Ln(32);
//Titulo
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 6, utf8_decode('Universidade José Eduardo dos Santos'), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(0, 6, utf8_decode('Instituto Superior Politécnico do Huambo'), 0, 0, 'C');
$pdf->Ln(8);
$pdf->Cell(0, 6, 'Recibo de Pagamento - ' . utf8_decode($query[0]['nome']), 0, 0, 'C');

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(23, 6, 'Estudante: ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, utf8_decode($query[0]['cNome']), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(28, 6, '', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, '', 0, 0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(33, 6, 'Data Pagamento: ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 6, utf8_decode($query[0]['data']), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, '', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, '', 0, 0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, utf8_decode('Nº. Identificação: '), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(93, 6, $query[0]['bi'], 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(27, 6, '', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, '', 0, 0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, utf8_decode('Ano Académico: '), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, date('Y'), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, '', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, '', 0, 0, 'L');

/*****************/
if ($query[0]['id_tipo_pagamento'] == 2) {
      $pdf->Ln();
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(23, 6, utf8_decode('Més a Pagar: '), 0, 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(0, 6, utf8_decode($query[0]['mes_pago']), 0, 0, 'L');

      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(20, 6, '', 0, 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(0, 6, '', 0, 0, 'L');
}

if ($query[0]['id_tipo_pagamento'] == 3) {
      $pdf->Ln();
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(23, 6, utf8_decode('Disciplina: '), 0, 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(0, 6, utf8_decode($query[0]['dDesc']), 0, 0, 'L');
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(20, 6, '', 0, 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(0, 6, '', 0, 0, 'L');
}

$pdf->Ln(8);




$pdf->SetFillColor(23, 185, 23);
//$pdf->SetTextColor(85,107,47);
$pdf->Cell(0, 6, utf8_decode($query[0]['nome']), 0, 0, 'C', true);

$pdf->Ln();
//$pdf->Cell(0);
$pdf->Cell(10, 6, utf8_decode('Nº'), 1, 0, 'C');
$pdf->Cell(105, 6, 'Curso', 1, 0, 'C');
$pdf->Cell(25, 6, 'Valor', 1, 0, 'C');
$pdf->Cell(25, 6, 'Multa', 1, 0, 'C');
$pdf->Cell(25, 6, 'Desconto', 1, 0, 'C');


$pdf->Ln();
$pdf->SetFont('Arial', '', 10);
//$cant =0;
//for($i = 0; $i < count($query); $i++){
$pdf->Cell(10, 6, 1, 1, 0, 'C');
$pdf->Cell(105, 6, utf8_decode($query[0]["cDesc"]), 1, 0, 'C');
$pdf->Cell(25, 6, utf8_decode($query[0]["costo"]), 1, 0, 'C');
$pdf->Cell(25, 6, utf8_decode($query[0]["imposto"]), 1, 0, 'C');
$pdf->Cell(25, 6, utf8_decode($query[0]["desconto"]), 1, 0, 'C');

//}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, '', 0, 0, 'C');
$pdf->Cell(75, 6, '', 0, 0, 'C');
$pdf->Cell(30, 6, 'Total', 1, 0, 'R');
$pdf->Cell(75, 6, $query[0]["valor_final"], 1, 0, 'C');

$pdf->Ln(10);
$pdf->Cell(90, 6, 'O Estudante', 0, 0, 'C');
$pdf->Cell(100, 6, utf8_decode('O Funcionário'), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(90, 6, '---------------------------------------', 0, 0, 'C');
$pdf->Cell(100, 6, '---------------------------------------', 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(90, 6, utf8_decode($query[0]["cNome"]), 0, 0, 'C');
$pdf->Cell(100, 6, $query[0]["funcionario"], 0, 0, 'C');

$pdf->Ln(8);
$pdf->Cell(0, 6, '---------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'C');
$pdf->Ln(10);

// Logo
$pdf->Image('../images/logo.png', 91, 150, 26);

$pdf->Ln(22);
//Titulo
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 6, utf8_decode('Universidade José Eduardo dos Santos'), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(0, 6, utf8_decode('Instituto Superior Politécnico do Huambo'), 0, 0, 'C');
$pdf->Ln(8);
$pdf->Cell(0, 6, 'Recibo de Pagamento - ' . utf8_decode($query[0]['nome']), 0, 0, 'C');

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(23, 6, 'Estudante: ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 6, utf8_decode($query[0]['cNome']), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(28, 6, '', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, '', 0, 0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(33, 6, 'Data Pagamento: ', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 6, utf8_decode($query[0]['data']), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, '', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, '', 0, 0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, utf8_decode('Nº. Identificação: '), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(93, 6, $query[0]['bi'], 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(27, 6, '', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, '', 0, 0, 'L');

/*****************/
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, utf8_decode('Ano Académico: '), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, date('Y'), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, '', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, '', 0, 0, 'L');

/*****************/
if ($query[0]['id_tipo_pagamento'] == 2) {
      $pdf->Ln();
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(23, 6, utf8_decode('Més a Pagar: '), 0, 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(0, 6, utf8_decode($query[0]['mes_pago']), 0, 0, 'L');

      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(20, 6, '', 0, 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(0, 6, '', 0, 0, 'L');
}

if ($query[0]['id_tipo_pagamento'] == 3) {
      $pdf->Ln();
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(23, 6, utf8_decode('Disciplina: '), 0, 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(0, 6, utf8_decode($query[0]['dDesc']), 0, 0, 'L');
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(20, 6, '', 0, 0, 'L');
      $pdf->SetFont('Arial', '', 10);
      $pdf->Cell(0, 6, '', 0, 0, 'L');
}

$pdf->Ln(8);




$pdf->SetFillColor(23, 185, 23);
//$pdf->SetTextColor(85,107,47);
$pdf->Cell(0, 6, utf8_decode($query[0]['nome']), 0, 0, 'C', true);

$pdf->Ln();
//$pdf->Cell(0);
$pdf->Cell(10, 6, utf8_decode('Nº'), 1, 0, 'C');
$pdf->Cell(105, 6, 'Curso', 1, 0, 'C');
$pdf->Cell(25, 6, 'Valor', 1, 0, 'C');
$pdf->Cell(25, 6, 'Multa', 1, 0, 'C');
$pdf->Cell(25, 6, 'Desconto', 1, 0, 'C');


$pdf->Ln();
$pdf->SetFont('Arial', '', 10);
//$cant =0;
//for($i = 0; $i < count($query); $i++){
$pdf->Cell(10, 6, 1, 1, 0, 'C');
$pdf->Cell(105, 6, utf8_decode($query[0]["cDesc"]), 1, 0, 'C');
$pdf->Cell(25, 6, utf8_decode($query[0]["costo"]), 1, 0, 'C');
$pdf->Cell(25, 6, utf8_decode($query[0]["imposto"]), 1, 0, 'C');
$pdf->Cell(25, 6, utf8_decode($query[0]["desconto"]), 1, 0, 'C');

//}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, '', 0, 0, 'C');
$pdf->Cell(75, 6, '', 0, 0, 'C');
$pdf->Cell(30, 6, 'Total', 1, 0, 'R');
$pdf->Cell(75, 6, $query[0]["valor_final"], 1, 0, 'C');

$pdf->Ln(10);
$pdf->Cell(90, 6, 'O Estudante', 0, 0, 'C');
$pdf->Cell(100, 6, utf8_decode('O Funcionário'), 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(90, 6, '---------------------------------------', 0, 0, 'C');
$pdf->Cell(100, 6, '---------------------------------------', 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(90, 6, utf8_decode($query[0]["cNome"]), 0, 0, 'C');
$pdf->Cell(100, 6, $query[0]["funcionario"], 0, 0, 'C');
//$ruta ="D:/Descargas/Compressed/";
$nombre_archivo = utf8_decode($query[0]['cNome'] . '.pdf');
$pdf->Output($nombre_archivo, 'I');
