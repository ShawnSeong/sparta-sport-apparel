<?php

require('fpdf184/fpdf.php');//fpdf path
include_once('session_connect.php');// my db connection

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

		$pdf->Image('assets/img/admin_logo.png',10,8,33);
		$pdf->SetFont('times','B',20);
		$pdf->SetXY(50, 10);
		$pdf->Cell(0,30,'Sparta Sport Appparel Sales Report',0,2,'C');
		$pdf->Ln();


		$pdf->SetLeftMargin(24);
//Now show the 3 columns
$pdf->SetFont('times','B',10);
$pdf->Cell(20,5,'Order ID',1);
$pdf->Cell(23,5,'Customer ID',1);
$pdf->Cell(75,5,'Product Name',1);
$pdf->Cell(20,5,'Quantity',1);
$pdf->Cell(30,5,'Total',1);

$pdf->Ln();
$result=mysqli_query($connect,"SELECT * FROM cart
JOIN product ON cart.product_id = product.product_id 
JOIN product_detail ON product.product_detail_id = product_detail.product_detail_id 
JOIN customer_order ON customer_order.order_id = cart.payment_status
");

while($table = mysqli_fetch_assoc($result))
{
	$order_id = $table['order_id'];
	$customer = $table['customer_id'];
	$product = $table['product_name'];
	$qty = $table['product_quantity'];
	$subtotal = $table['cart_subtotal'];

	
	$pdf->Cell(20,5,$table['order_id'],1);
	$pdf->Cell(23,5,$table['customer_id'],1);
	$pdf->Cell(75,5,$table['product_name'],1);
	$pdf->Cell(20,5,$table['product_quantity'],1);
	$pdf->Cell(30,5,"RM ".$table['cart_subtotal'],1);

	$pdf->Ln();

}



	  $pdf->SetXY(150,260);
      $pdf->SetFont('Helvetica','I',10);
      $pdf->Cell(0,10,'Page '.$pdf->PageNo(),0,0,'C');

	  
	  $pdf->Output('sales-report.pdf','D');
?>
