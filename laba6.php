<?php

define('FPDF_FONTPATH','fpdf/font/');
require_once("fpdf/fpdf.php");
include_once('rotation.php');

class PDF extends PDF_Rotate
{
function RotatedText($x,$y,$txt,$angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
}
}
$pdf = new FPDF();
$textColour = array( 0, 0, 0 );

$reportName = "Генеральный директор Дручевский Денис";
$reportNameYPos = 160;
$logoFile = "fon/d1.jpg";
$logoFile2 = "fon/d2.jpg";
$logoFile3 = "fon/gamb.jpg";

$reportName = iconv("UTF-8", "windows-1251", $reportName);

$pdfName = "Еще нимба не хватает над головой";
$pdfAuthor = "Дада, этот красавчик это я(8 класс)";
$pdfText = "О КАК ОН ПРЕКРАСЕН";
$pdfText2 = "Дада ЧСВ растет";
$pdfRightText = "Вертел я этот ваш";
$pdfLeftText = "пхп на веревочке)";
$pdffooter = "Жиза ведь так ?";
$pdfName = iconv("UTF-8", "windows-1251", $pdfName);
$pdfText2 = iconv("UTF-8", "windows-1251", $pdfText2);
$pdfAuthor = iconv("UTF-8", "windows-1251", $pdfAuthor);
$pdfText = iconv("UTF-8", "windows-1251", $pdfText);
$pdfRightText = iconv("UTF-8", "windows-1251", $pdfRightText);
$pdfLeftText = iconv("UTF-8", "windows-1251", $pdfLeftText);
$pdffooter = iconv("UTF-8", "windows-1251", $pdffooter);

$gambposY = 250;
$pdfNameYPos = 120;
$pdfThemeYPos = 20;
$pdfAuthorYPos = 100;
$imgXPos = 30;
$img1YPos = 10;
$imgWidth = 150;
$img2YPos = 150;
$logoXPos = 50;
$logoYPos = 48;
$logoWidth = 120;
// Конец конфигурации

$pdf = new PDF( 'P', 'mm', 'A4' );

$pdf->AddFont('arial','','arial.php');
$pdf->SetFont('arial','',24);
$pdf->AddPage();
$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
$pdf->Ln( $pdfNameYPos );
$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->Cell( 0, 15, $pdfName, 0, 0, 'C' );
$pdf->SetFont('arial','',14);
$pdf->Ln( $pdfAuthorYPos );
$pdf->Cell( 0, 15, $pdfAuthor, 0, 0, 'R' );
$pdf->AddPage();
$pdf->setFillColor(255, 255, 255); 
$pdf->MultiCell( 0, 15, $pdfText, 0, 1, 'L', 1);
$pdf->MultiCell( 0, 15, $pdfText2, 0, 1, 'L', 1);
$pdf->RotatedText(100, 80, $pdfRightText, -45);
$pdf->RotatedText(120, 120, $pdfLeftText, 65);
$pdf->SetFont('arial','',44);
$pdf->SetFont('arial','',14);
$pdf->Ln();
$pdf->AddPage();
$pdf->Image( $logoFile2, $imgXPos, $img1YPos, $imgWidth);
$pdf->Image( $logoFile3, $imgXPos, $img2YPos, $imgWidth);
$pdf->Ln($gambposY);
$pdf->Cell( 0, 15, $pdffooter, 0, 0, 'C' );

$pdf->Output( "6.pdf", "I" );
?>

