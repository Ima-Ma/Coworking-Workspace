<?php
include("header.php");
include("connection.php");

$ID = $_GET["id"];
$sql = "SELECT * FROM event_contact WHERE id = $ID";
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
                                    <div class="form-grp mt-3">
                                        <label for="" class="text-primary">User Message:
                                        </label>
                                        <input type="text" name="user_message" class="form-control" value="<?php echo htmlspecialchars($rows['message']); ?>">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label for="" class="text-primary">Message:
                                        </label>
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
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

<!-- Email work -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $message = $_POST['message'];
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
        $mail->Subject = 'In Response to Your Inquiry!';
        $mail->Body    = htmlspecialchars($message);
        $mail->send();
        echo "<script>
            window.location.href='int_event.php';
        </script>";
    } catch (Exception $e) {
        echo "";
    }
}
?>
