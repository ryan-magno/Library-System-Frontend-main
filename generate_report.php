<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentMonth = date('F');
    $currentYear = date('Y');

    // Fetch data from the database
    // Modify the query according to the database schema
    $query = "
    SELECT DATE_FORMAT(borrow_date, '%M %e, %Y') AS date, COUNT(*) AS count
    FROM borrow_records
    WHERE DATE_FORMAT(borrow_date, '%Y-%m') = ?
    GROUP BY DATE_FORMAT(borrow_date, '%Y-%m-%d')    
    ";
    $monthStr = date('Y-m');
    $stmt = $conn->prepare($query); // Use $conn instead of $pdo
    $stmt->bind_param('s', $monthStr);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Create PDF
        require_once('tcpdf/tcpdf.php'); // Include TCPDF library

        // Extend TCPDF with custom header and footer
        class MYPDF extends TCPDF {
            public function Header() {
                // Header content
                $this->Image('header.jpg', 10, 10, 50);
            }
        }

        // Create new PDF document
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle("$currentMonth $currentYear Report");
        $pdf->SetSubject("$currentMonth $currentYear Report");
        $pdf->SetKeywords('Library, Report, Statistics');

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Title
        $pdf->Cell(0, 10, "Library Statistics for the Month of $currentMonth", 0, 1, 'C');

        // Output table header
        $pdf->Ln();
        $pdf->Cell(60, 10, 'Date', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Number of Books Borrowed', 1, 1, 'C');

        // Output data rows
        foreach ($data as $row) {
            $pdf->Cell(60, 10, $row['date'], 1, 0, 'C');
            $pdf->Cell(60, 10, $row['count'], 1, 1, 'C');
        }

        // Generate bar chart
        $pdf->Ln();
        foreach ($data as $row) {
            // Determine the length of the bar based on the count
            $barLength = $row['count'] * 10;
            $pdf->Cell(60, 10, '', 0, 0);
            $pdf->Cell($barLength, 10, '', 1, 1, 'C', true);
        }

        // Add legend
        $pdf->Ln();
        $pdf->Cell(0, 10, 'Legend:', 0, 1, 'L');
        $pdf->Cell(0, 10, '- Blue bars represent the number of books borrowed on each day', 0, 1, 'L');

        // Define the filename for the PDF report
        $pdfFileName = "$currentMonth $currentYear Report.pdf";

        // Construct the full file path using __DIR__
        $pdfFilePath = __DIR__ . "/$pdfFileName";

        // Close and output PDF document
        $pdf->Output($pdfFilePath, 'F');

        // Display success message
        echo '<div id="message">Report generated successfully. <a href="' . $pdfFilePath . '">Download PDF</a></div>';

        // Redirect back to the admin page
        exit;
    } else {
        // Handle the case where the query fails
        echo "Error executing the query: " . $conn->error;
    }
}
?>
