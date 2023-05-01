<?php
require('fpdf.php');
$d=date('d_m_Y');

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('Helvetica','',20);
	$this->SetFontSize(40);
    //Move to the right
    $this->Cell(80);
    //Line break
    $this->Ln();
}

//Page footer
function Footer()
{
 
}

//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{ 

$this->SetFillColor(255,255,255);
//$this->SetDrawColor(255, 0, 0);
$w=array(25,20,30,20,20,55);
	
	
	//Header
	$this->SetFont('Arial','B',9);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'L',true);
	$this->Ln();
	
	//Data
	
	$this->SetFont('Arial','',7);
	foreach ($data as $eachResult) 
	{ //width
		$this->Cell(10);
		$this->Cell(25,6,$eachResult["order_id"],1);
		$this->Cell(20,6,$eachResult["username"],1);
		$this->Cell(30,6,$eachResult["price"],1);
		$this->Cell(20,6,$eachResult["status"],1);
		$this->Ln();
		 	 	 	 	
	}
}

//Better table
}



$pdf=new PDF();

	

$header=array('order_id','username','price', 'status');
//Data loading
//*** Load MySQL Data ***//
$objConnect = mysqli_connect("localhost","root","","farmer");
$strSQL = "SELECT order_id, username, price, status FROM `order` WHERE status ='approved'";
$objQuery = mysqli_query($objConnect, $strSQL);
$resultData = array();
while ($result = mysqli_fetch_array($objQuery)) {
	array_push($resultData,$result);
}
//************************//


//*** Table 1 ***//
$pdf->AddPage();
$pdf->Image('farmer.JPG', 85, 10, 30);
	$pdf->SetFont('Helvetica','',14);
	$pdf->Cell(70);

	$pdf->Write(65, 'APPROVED ORDERS');
	
	$pdf->Ln();
	
	$pdf->Cell(22);
	$pdf->SetFontSize(8);
	$pdf->Cell(57);
	$result=mysqli_query($objConnect, "SELECT date_format(now(), '%
W, %M %d, %Y') as date");
	while( $row=mysqli_fetch_array($result) )

	{
		$pdf->Write(5,$row['date']);
	}
	$pdf->Ln();
	
	//count total numbers of visitors
	$result=mysqli_query($objConnect, "Select * from `order` where status ='approved'") or die ("Database query failed: " . mysqli_error($objConnect));

	
	$count = mysqli_num_rows($result);
	$pdf->Cell(0);
	$pdf->Write(5, '             Total users: '.$count.'');
	$pdf->Ln();

	$pdf->Ln(5);

$pdf->Ln(0);
$pdf->Cell(10);
$pdf->BasicTable($header,$resultData);
//forme();
//$pdf->Output("$d.pdf","F");
$pdf->Output();

?> 