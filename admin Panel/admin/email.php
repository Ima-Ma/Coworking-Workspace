<?php
include("header.php");
include("connection.php");

$ID = $_GET["id"];
$sql = "SELECT * FROM bookings WHERE id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>
<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">
            Contact Reply <i class="fa-solid fa-pen-to-square"></i>
        </h1>
    </div>
    
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="content-body">
                    <div class="container-fluid mt-5 col-lg-12">
                        <div class="tile">
                            <div class="basic-form">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 form-grp mt-3">
                                            <label for="" class="text-primary">User Name:
                                            </label>
                                            <input type="text" name="user_name" class="form-control" value="<?php echo htmlspecialchars($rows['name']); ?>">
                                        </div>
                                        <div class="col-lg-6 form-grp mt-3">
                                            <label for=""class="text-primary">User Email:
                                            </label>
                                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($rows['email']); ?>">
                                        </div>
                                    </div>
                                   <div class="row">
                                   <div class="col-lg-6 form-grp mt-3">
                                        <label for="" class="text-primary">Room Title:
                                        </label>
                                        <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($rows['title']); ?>">
                                    </div>
                                    <div class="col-lg-6 form-grp mt-3">
                                        <label for="" class="text-primary">Payment Amount
                                        </label>
                                        <input type="text" name="price" class="form-control" value="<?php echo htmlspecialchars($rows['price']); ?>">
                                    </div>
                                    <div class="col-lg-6 form-grp mt-3">
                                        <label for="" class="text-primary">Number Of Days
                                        </label>
                                        <input type="text" name="days" class="form-control" value="<?php echo htmlspecialchars($rows['days']); ?>">
                                    </div>
                                    <div class="col-lg-12 form-grp mt-3">
                                        <label for="" class="text-primary">Details
                                        </label>
                                        <input type="text" name="message" class="form-control" value="We've successfully sent your booking documents to your WhatsApp contact number. Thank you for choosing our services!">
                                    </div>
                                   </div>
                                    <br>
                                    <button type="submit" name="send" class="btn btn-primary">Send Message!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include("footer.php");
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $message = $_POST['message'];
    $name = $_POST['user_name'];
    $title = $_POST['title'];
    $ID = $_POST['id']; // Ensure you have the booking ID if you need to update it
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mushtaqueimama@gmail.com';
        $mail->Password   = 'llfegxrlynyzregx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('mushtaqueimama@gmail.com', 'Kaam Ka Caravan');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirm!';
        $mail->Body    = htmlspecialchars($message);
        $mail->send();

        // Determine which table to update based on the title
        $tables = ['virtual_office', 'meeting_office', 'office_space'];
        $updated = false;
        
        foreach ($tables as $table) {
            $sql = "SELECT 1 FROM $table WHERE title = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Title found in this table, perform the update
                $updateSql = "UPDATE $table SET status = 1, booked_by = ? WHERE title = ?";
                $stmt = $conn->prepare($updateSql);
                $stmt->bind_param("ss", $name, $title);
                $stmt->execute();
                $updated = true;
                break; // Exit the loop once the table is updated
            }
        }

        echo "<script>
            window.location.href='send.php';
        </script>";
    } catch (Exception $e) {
        // Optionally handle the exception, e.g., log the error or show an error message
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
