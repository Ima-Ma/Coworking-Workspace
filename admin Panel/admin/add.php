<?php
include("header.php");
include("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">
            <i class="fa-solid fa-building-user"></i> Job Vacancies
        </h1>
    </div>

    <!-- MODAL WORK START -->
    <div class="p-md-0 justify-content-sm-end mt-2 d-flex">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Vacancies
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary fw-bold" id="exampleModalLabel">Add Vacancies</h3>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-grp">
                                <label class="text-primary" for="title">Title:</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title!" required>
                            </div>
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="description">Description:</label>
                                <input type="text" id="description" name="description" class="form-control" placeholder="Enter description!" required>
                            </div>
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="gender">Gender:</label>
                                <input type="text" id="gender" name="gender" class="form-control" placeholder="Enter gender!" required>
                            </div>
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="qualification">Qualification:</label>
                                <input type="text" id="qualification" name="qualification" class="form-control" placeholder="Enter qualification!" required>
                            </div>

                            <div class="form-grp mt-3">
                                <label class="text-primary" for="image">Image:</label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="Add Image" required>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i> Add!
                            </button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL WORK END -->

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover" id="sampleTable">
                        <thead>
                            <tr class="text-primary">
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Qualification</th>
                                <th>Gender</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM ourteam";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($rows['id']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['title']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['description']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['qualification']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['gender']); ?></td>
                                    <td><img src="ourteam/<?php echo htmlspecialchars($rows['image']); ?>" height="100px" width="100px" alt="Image"></td>
                                    <td>
                                        <a href="add_delete.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="add_edit.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include("footer.php");

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_directory = "ourteam/";

    if (!empty($image)) {
        move_uploaded_file($image_tmp, $upload_directory . $image);
    }

    $sql = "INSERT INTO ourteam (title, description, gender, qualification, image) VALUES ('$title', '$description', '$gender', '$qualification', '$image')";

    if (mysqli_query($conn, $sql)) {
        // Send email notification
        $result = mysqli_query($conn , "SELECT user_email FROM user_login");

        if ($result) {
            $mail = new PHPMailer(true);
            
            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'mushtaqueimama@gmail.com';
                $mail->Password   = 'llfegxrlynyzregx'; // Consider using environment variables for security
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                $mail->setFrom('mushtaqueimama@gmail.com', 'Kaam Ka Caravan');
                $mail->isHTML(true);
                $mail->Subject = 'New Vacancies Posted on Our Site!';
                $mail->Body    = "We are excited to inform you that new vacancies have been posted on our site. Please visit our website to check out the latest opportunities.<br><br>Best regards,<br>Kaam Ka Caravan";
                
                // Loop through the result set and send email to each address
                while ($row = mysqli_fetch_assoc($result)) {
                    $mail->addAddress($row['user_email']);
                }

                // Send the email
                $mail->send();
                echo "<script>
                swal('Good job!', 'Vacancy Added and Emails Sent successfully!', 'success')
                    .then(() => {
                        window.location.href='add.php';
                    });
                    </script>";
            } 
            catch (Exception $e) {
                echo "<script>
                swal('Oops!', 'Error sending emails! Mailer Error: {$mail->ErrorInfo}', 'error');
                    </script>";
            }
        } else {
            echo "<script>
            swal('Oops!', 'Error fetching emails from database!', 'error');
                </script>";
        }
    } else {
        echo "<script>
        swal('Oops!', 'Error adding vacancy!', 'error');
            </script>";
    }
}
?>
