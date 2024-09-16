<?php
include("header.php");
include("connection.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<main class="app-content">
<div class="content-body">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="text-primary text-center">Set Interviews<i class="fas fa-calendar-check"></i></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-container text-center">
                                <table class=" table table-responsive-sm mx-auto text-center">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Interview Date</th>
                                            <th>Interview Time</th>
                                            <th>Selection</th>
                                            <th>Download</th>
                                            <th>Send Email / Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class=" text-dark">
                                        <?php
                                        $sql = "SELECT * FROM job_report ";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        while ($rows = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($rows['id']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['name']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['email']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['phone']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['inter_date']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['inter_time']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['selection']); ?></td>
                                            <td>
                                                <a href="report.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="text-primary">
                                                    <i class="fa-solid fa-download"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <i class="mx-5 text-primary fa-solid fa-user-check accept" data-bs-toggle="modal" data-bs-target="#exampleModal" data-email="<?php echo htmlspecialchars($rows['email']); ?>" data-id="<?php echo htmlspecialchars($rows['id']); ?>"></i>
                                                <a href="job_app_delete.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <script>
                                    document.addEventListener('DOMContentLoaded', () => {
                                        const icons = document.querySelectorAll('.accept');
                                        const emailInput = document.getElementById('name');
                                        const userIdDisplay = document.getElementById('user_id');

                                        icons.forEach(icon => {
                                            icon.addEventListener('click', function() {
                                                const clickedId = this.getAttribute('data-id');
                                                const email = this.getAttribute('data-email');

                                                emailInput.value = email;
                                                userIdDisplay.value = clickedId;
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TABLE END -->

        <!-- Modal work start -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fw-bold text-primary" id="exampleModalLabel">Send An Email!</h3>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="name"><strong>Email:</strong></label>
                                    <input type="text" class="form-control" name="email" id="name">
                                    <input type="hidden" name="id" id="user_id">
                                </div>
                                <button type="submit" name="send" class="btn btn-primary mt-3 fw-bold">Send Job Application Status!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal work end -->

        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require 'vendor/autoload.php';

        if (isset($_POST['send'])) {
            $email = $_POST['email'];
            $id = $_POST['id'];
            $reportLink = "report_app.php?id=$id";

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
                $mail->Subject = 'Your Job Application Status';
                $mail->Body    = "Your Interview is set by Kaam ka Caravan We've successfully sent your  pdf report to your WhatsApp contact number.  or Click the link to view your report: <a href='$reportLink'>Report Link</a>  ";
                $mail->send();
                echo "<script>
                    window.location.href='job.php';
                </script>";
            } catch (Exception $e) {
                echo "<script>
                    alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
                </script>";
            }
        }
        ?>
    </div>
</div>z
</main>

<?php
include("footer.php");
?>
