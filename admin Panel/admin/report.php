<?php
require_once __DIR__ . '/vendor/autoload.php';

// Check if ID parameter is provided and is numeric
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $ID = $_GET["id"];

    // Initialize database connection (replace with your credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aptech_project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM job_report WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ID); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rows = $result->fetch_assoc();

        // Initialize MPDF
        $mpdf = new \Mpdf\Mpdf(['format'=>'A4-L']);

        // Set current date and time
        $currentDateTime = date('Y-m-d H:i:s');

        // HTML template for the PDF content
        $html = '
        <div style="text-align: center; background-color: white; color: black; padding: 20px;">
            <h1 style="font-family: Arial, sans-serif; font-size: 24px; color: black;">Kaam Ka Caravan</h1>
            <p style="font-family: Arial, sans-serif; font-size: 16px; color: bblack;">Generated on: ' . $currentDateTime . '</p>
            <hr style="border: 1px solid #fff;">
            <h2 style="font-family: Arial, sans-serif; font-size: 20px; margin-bottom: 20px; color: black;">Job Application Report</h2>
            <div style="text-align: left; margin-bottom: 20px;">
                <p><strong>Name:</strong> ' . htmlspecialchars($rows['name']) . '</p>
                <p><strong>Email:</strong> ' . htmlspecialchars($rows['email']) . '</p>
                <p><strong>Phone:</strong> ' . htmlspecialchars($rows['phone']) . '</p>
                <p><strong>Selection Status:</strong> ' . htmlspecialchars($rows['selection']) . '</p>
                <p><strong>Interview Date:</strong> ' . htmlspecialchars($rows['inter_date']) . '</p>
                <p><strong>Interview Time:</strong> ' . htmlspecialchars($rows['inter_time']) . '</p>
            </div>
        </div>
    ';

        // Output PDF
        $mpdf->WriteHTML($html);

        // Save PDF to file and offer it for download
        $file = "job_report.pdf";
        $mpdf->Output($file, 'D'); // 'D' for download, 'I' for inline display

        // Close statement and connection
        $stmt->close();
        $conn->close();
        exit;
    } else {
        echo "No records found for ID: " . htmlspecialchars($ID);
    }
} else {
    echo "Invalid or missing ID parameter.";
}
?>
