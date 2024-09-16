<?php
include("connection.php"); 
include("header.php");
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    // File upload paths
    $pdf_dir = 'female_driver/pdf/';
    $image_dir = 'female_driver/image/';
    $pdf_file = $pdf_dir . basename($_FILES['pdf']['name']);
    $image_file = $image_dir . basename($_FILES['image']['name']);

    // Check if fields are empty
    if (empty($name) || empty($email) || empty($age) || empty($_FILES['pdf']['name']) || empty($_FILES['image']['name'])) {
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js' integrity='sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
              <script>
                swal('Oops!', 'Please fill out all required fields.', 'error');
              </script>";
    } else {
        // Move uploaded files
        if (move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_file) && move_uploaded_file($_FILES['image']['tmp_name'], $image_file)) {
            // Insert data into database
            $sql = "INSERT INTO female (name, email, pdf, image, age) VALUES ('$name', '$email', '$pdf_file', '$image_file', '$age')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js' integrity='sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
                      <script>
                        swal('Thank You!', 'Your Request has been submitted successfully.', 'success')
                        .then((value) => {
                            window.location.href = window.location.href; // Refresh page
                        });
                      </script>";
            } else {
                // Log query error
                error_log("Database insert error: " . mysqli_error($conn));
                echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js' integrity='sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
                      <script>
                        swal('Oops!', 'Something went wrong. Please try again later.', 'error');
                      </script>";
            }
        } else {
            // Log file upload error
            error_log("File upload error: PDF - " . $_FILES['pdf']['error'] . ", Image - " . $_FILES['image']['error']);
            echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js' integrity='sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
                  <script>
                    swal('Oops!', 'Failed to upload files. Please try again.', 'error');
                  </script>";
        }
    }
}
?>

    <div class="container">
        <h3 class="text-center fw-bold mt-5">Are you a dedicated and reliable female driver seeking a rewarding role? We’re excited to invite you to apply for our driver positions!</h3>
        <div class="col-lg-10 mt-5 bg-primary p-5 mx-auto">
            <form action="" method="post" onsubmit="return validateForm()" name="contactForm" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="" class="text-white">Name:</label>
                        <input type="text" name="name" class="form-control border-0 bg-light px-4" placeholder="Name" style="height: 55px;">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="text-white">Email:</label>
                        <input type="email" name="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="text-white">Age:</label>
                        <input type="text" name="age" class="form-control border-0 bg-light px-4" placeholder="Your Age" style="height: 55px;">
                    </div>
                    <div class="col-12">
                        <label for="" class="text-white">Driving License:</label>
                        <input type="file" name="pdf" class="form-control border-0 bg-light px-4" style="height: 55px;">
                    </div>
                    <div class="col-12">
                        <label for="" class="text-white">Your Image:</label>
                        <input type="file" name="image" class="form-control border-0 bg-light px-4" style="height: 55px;">
                    </div>
                    <div class="col-12">
                        <button name="submit" class="btn btn-dark w-100 mt-3 py-3" type="submit">Send Request</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function validateForm() {
            var name = document.forms["contactForm"]["name"].value;
            var email = document.forms["contactForm"]["email"].value;
            var age = document.forms["contactForm"]["age"].value;
            var pdf = document.forms["contactForm"]["pdf"].value;
            var image = document.forms["contactForm"]["image"].value;

            if (name == "" || email == "" || age == "" || pdf == "" || image == "") {
                swal('Oops!', 'Please fill out all required fields.', 'error');
                return false;
            }
            return true;
        }
    </script>
<?php
    include("footer.php");
?>