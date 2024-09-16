<?php
require_once __DIR__ . '/vendor/autoload.php';

// Check if ID parameter is provided and is numeric
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $ID = intval($_GET["id"]); // Ensure ID is an integer

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

    $sql = "SELECT * FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $ID); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rows = $result->fetch_assoc();

        // Initialize MPDF
        try {
            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        } catch (\Mpdf\MpdfException $e) {
            die("MPDF initialization error: " . $e->getMessage());
        }

        // Set current date and time
        $currentDateTime = date('Y-m-d H:i:s');

        // HTML template for the PDF content
        $html = '
        <div style="text-align: center; background-color: #f2f2f2; color: #333; padding: 30px;">
            <h1 style="font-family: \'Georgia\', serif; font-size: 28px; color: #1a73e8;">Kaam Ka Caravan</h1>
            <p style="font-family: \'Verdana\', sans-serif; font-size: 16px; color: #555;">Generated on: ' . $currentDateTime . '</p>
            <hr style="border: 1px solid #ddd;">
            <h2 style="font-family: \'Georgia\', serif; font-size: 24px; color: #333; margin-bottom: 20px;">Booking Details</h2>
            <div style="text-align: left; margin: 0 auto; width: 80%; font-family: \'Arial\', sans-serif; font-size: 16px; color: #444;">
                <p><strong style="font-size: 18px;">Name:</strong> ' . htmlspecialchars($rows['name']) . '</p>
                <p><strong style="font-size: 18px;">Email:</strong> ' . htmlspecialchars($rows['email']) . '</p>
                <p><strong style="font-size: 18px;">Room Title:</strong> ' . htmlspecialchars($rows['title']) . '</p>
                <p><strong style="font-size: 18px;">Total Amount Paid:</strong> ' . htmlspecialchars($rows['price']) . '</p>
                <p><strong style="font-size: 18px;">Card Number:</strong> ' . htmlspecialchars($rows['card_number']) . '</p>
                <p><strong style="font-size: 18px;">Number Of Days:</strong> ' . htmlspecialchars($rows['days']) . '</p>
                <p><strong style="font-size: 18px;">Card Company:</strong> ' . htmlspecialchars($rows['card_company']) . '</p>
                <hr style="border: 1px solid #ddd; margin: 20px 0;">
                <h3 style="font-family: \'Comic Sans MS\', cursive, sans-serif; font-size: 20px; color: #4caf50;">Booking Confirmed </h3>
                <p style="font-family: \'Verdana\', sans-serif; font-size: 16px; color: #555; margin-top: 10px;">Thank you for booking with us! Your reservation is confirmed, and we look forward to serving you. If you have any questions, please contact us.</p>
            </div>
        </div>
        ';

        // Output PDF
        $mpdf->WriteHTML($html);

        // Save PDF to file and offer it for download
        $file = "booking_detail.pdf";
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
