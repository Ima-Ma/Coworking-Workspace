<?php
include("header.php");
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Header and Navigation -->

    <div class="container-fluid bg-primary py-5 bg-header2">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Job Application Form</h1>
                <a href="" class="h5 text-white">Kaam Ka کاروان</a>
            </div>
        </div>
    </div>
    
    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- Job Application Form Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Job Application</h3>
                        </div>
                        <?php
                            $ID = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
                            $sql = "SELECT * FROM ourteam WHERE id = $ID";
                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($result);
                        ?>
                        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="jobApplicationForm">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input name="email" type="email" class="form-control bg-white border-0" placeholder="Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="date" class="form-control bg-white border-0" name="start_date" placeholder="When can you start?" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" name="phone" placeholder="Contact Number" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control bg-white border-0" name="cv" placeholder="Attach Your CV" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <button name="submit" class="mt-3 btn btn-primary w-100 py-3" type="submit">Send Application</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">About This Job</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <?php
                            if ($rows) {
                                echo '<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>' . htmlspecialchars($rows['title']) . '</a>';
                                echo '<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>' . htmlspecialchars($rows['description']) . '</a>';
                                echo '<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>' . htmlspecialchars($rows['gender']) . '</a>';
                                echo '<a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i>' . htmlspecialchars($rows['qualification']) . '</a>';
                                echo '<img src="../admin Panel/admin/ourteam/' . htmlspecialchars($rows['image']) . '" height="200px" width="250px">';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Job Application Form End -->
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $start_date = $_POST['start_date'];
        $phone = $_POST['phone'];
        $file_name = $_FILES['cv']['name'];
        $file_tmp = $_FILES['cv']['tmp_name'];
        
        // Validate required fields
        if (empty($name) || empty($email) || empty($start_date) || empty($phone) || empty($file_name)) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Please fill out all required fields.'
                    }).then(() => {
                        window.location.href = 'ourteam.php';
                    });
                  </script>";
            exit; // Prevent further execution
        }

        $upload_directory = "upload_us/";
        move_uploaded_file($file_tmp, $upload_directory . $file_name);

        $sql = "INSERT INTO ourteam_job (name, email, start_date, phone, cv)
                VALUES ('$name', '$email', '$start_date', '$phone', '$file_name')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank You!',
                        text: 'Your Job Application Is Successfully Delivered!'
                    }).then(() => {
                        window.location.href = 'ourteam.php';
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Failed to submit job application.'
                    }).then(() => {
                        window.location.href = 'ourteam.php';
                    });
                  </script>";
        }
    }
    ?>

    <!-- Footer -->
    <?php include("footer.php"); ?>



    <!-- Your Custom Script -->
    <script>
        function validateForm() {
            var name = document.forms["jobApplicationForm"]["name"].value;
            var email = document.forms["jobApplicationForm"]["email"].value;
            var startDate = document.forms["jobApplicationForm"]["start_date"].value;
            var phone = document.forms["jobApplicationForm"]["phone"].value;
            var cv = document.forms["jobApplicationForm"]["cv"].value;

            if (name == "" || email == "" || startDate == "" || phone == "" || cv == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Please fill out all required fields.'
                });
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
