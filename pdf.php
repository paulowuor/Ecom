<?php
require('print/fpdf.php');

// Create new FPDF object
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', '', 14);

// Output table data
$html = '<table>';
$html .= '<tr><th>Order ID</th><th>Username</th><th>ID</th><th>Price</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>' . $row['order_id'] . '</td>';
    $html .= '<td>' . $row['username'] . '</td>';
    $html .= '<td>' . $row['id'] . '</td>';
    $html .= '<td>' . $row['price'] . '</td>';
    $html .= '</tr>';
}
$html .= '</table>';

// Write the HTML content to the PDF
$pdf->WriteHTML($html);

// Output the PDF
$pdf->Output('example.pdf', 'D');
?>
