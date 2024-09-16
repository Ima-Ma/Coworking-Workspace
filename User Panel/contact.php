<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
  include("connection.php");
  include("header.php");

  if(isset($_POST['submit'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Basic server-side validation
    if(empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) || empty($message)) {
        echo "<script>
                swal('Oops!', 'Please fill out all required fields.', 'error');
                </script>";
    } else {
        $sql = "INSERT INTO contact (firstname, lastname, email, phonenumber, message) VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$message')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>
                    swal('Thank You!', 'Your message has been submitted successfully.', 'success')
                    .then((value) => {
                        window.location.href = window.location.href; // Refresh page
                    });
                    </script>";
        } else {
            echo "<script>
                    swal('Oops!', 'Something went wrong. Please try again later.', 'error');
                    </script>";
        }
    }
}
?>

<script>
    function validateForm() {
        var firstname = document.forms["contactForm"]["firstname"].value;
        var lastname = document.forms["contactForm"]["lastname"].value;
        var email = document.forms["contactForm"]["email"].value;
        var phonenumber = document.forms["contactForm"]["phonenumber"].value;
        var message = document.forms["contactForm"]["message"].value;

        if (firstname == "" || lastname == "" || email == "" || phonenumber == "" || message == "") {
            swal('Oops!', 'Please fill out all required fields.', 'error');
            return false;
        }
        return true;
    }
</script>
 <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0">Kaam Ka کاروان</h1>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <!-- <a href="./extra_ser.php" class="nav-item nav-link ">Services</a> -->
            <a href="contact.php" class="nav-item nav-link active">Contact Us</a>
            <a href="./toprate.php" class="nav-item nav-link">Top Rate</a>
            <a href="./event.php" class="nav-item nav-link">Events</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Workspace</a>
                <div class="dropdown-menu m-0">
                    <a href="./meeting.php" class="dropdown-item">Meeting Room</a>
                    <a href="./office.php" class="dropdown-item">Office Space</a>
                    <a href="./virtual.php" class="dropdown-item">Virtual Office</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Co-Working</a>
                <div class="dropdown-menu m-0">
                    <a href="service.php" class="dropdown-item">Find Job</a>
                    <a href="./ourteam.php" class="dropdown-item">Join Us</a>
                    <a href="./membership.php" class="dropdown-item">Membership</a>
                </div>
            </div>
        </div>
            <?php 

                if(!isset($_SESSION['username'])){
                    echo '<a href="./login.php" class="btn btn-primary py-2 px-4 ms-3">Sign In Here</a>';
                } else {
                    echo '<a href="./logout.php" class="btn btn-primary py-2 px-4 ms-3">' . htmlspecialchars('Welcome '.$_SESSION['username']) . '</a>';
                }
                ?>
            </div>
 </nav>
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn"> Feel Free To Contact Us </h1>
                    <a href="" class="h5 text-white"><img src="./b.png" alt="" height="40px"> Kaam Ka کاروان</a>
     
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
                <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+3112033680</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Email to get free quote</h5>
                            <h4 class="text-primary mb-0">imama@gmail.com</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Visit our office</h5>
                            <h4 class="text-primary mb-0">123 Street, Karachi, Pakistan</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                <form action="" method="post" onsubmit="return validateForm()" name="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="firstname" class="form-control border-0 bg-light px-4" placeholder="First Name" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="lastname" class="form-control border-0 bg-light px-4" placeholder="Last Name" style="height: 55px;">
                            </div>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" name="phonenumber" class="form-control border-0 bg-light px-4" placeholder="Contact Number" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message" name="message"></textarea>
                            </div>
                            <div class="col-12">
                                <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php
include("footer.php");
?>