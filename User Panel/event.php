<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 

<?php
include("header.php");
include("connection.php");

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Basic server-side validation
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) || empty($message)) {
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
            <a href="contact.php" class="nav-item nav-link">Contact Us</a>
            <a href="./toprate.php" class="nav-item nav-link">Top Rate</a>
            <a href="./event.php" class="nav-item nav-link active">Events</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Co-Working</a>
                <div class="dropdown-menu m-0">
                    <a href="./meeting.php" class="dropdown-item">Meeting Room</a>
                    <a href="./office.php" class="dropdown-item">Office Space</a>
                    <a href="./virtual.php" class="dropdown-item">Virtual Office</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Service</a>
                <div class="dropdown-menu m-0">
                    <a href="service.php" class="dropdown-item">Find Job</a>
                    <a href="./ourteam.php" class="dropdown-item">Join Us</a>
                    <a href="./membership.php" class="dropdown-item">Membership</a>
                </div>
            </div>
        </div>

        <?php 
        if (!isset($_SESSION['username'])) {
            echo '<a href="./login.php" class="btn btn-primary py-2 px-4 ms-3">Sign In Here</a>';
        } else {
            echo '<a href="./logout.php" class="btn btn-primary py-2 px-4 ms-3">' . htmlspecialchars('Welcome ' . $_SESSION['username']) . '</a>';
        }
        ?>
    </div>
</nav>

<div class="container-fluid bg-primary py-5 bg-header10" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Business Events</h1>
            <a href="" class="h5 text-white">
                <img src="./b.png" alt="" height="40px"> Kaam ka کاروان
            </a>
        </div>
    </div>
</div>


<!-- Full Screen Search End -->

<!-- section start -->
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h1 class="text-primary text-center">Our Venues</h1>
            <p class="fw-bold">
                Kaam Ka Caravan is a dynamic and innovative company specializing in organizing top-notch business events. With a reputation for excellence and a keen eye for detail, Kaam Ka Caravan transforms corporate gatherings into memorable experiences. Whether you're hosting a high-stakes conference, a motivational workshop, or a networking gala, their expert team handles every aspect with precision and creativity.
            </p>
            <a href="./contact.php" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn">Get In Touch</a>
        </div>
        <div class="col-lg-8">
            <div class="owl-carousel testimonial-carousel">
                <?php
                $sql = "SELECT * FROM events";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="testimonial-item bg-light my-4">
                            <div class="d-flex align-items-center border-bottom  pt-5 pb-4 px-5">
                                <img class="img-fluid rounded" src="<?php echo '../admin Panel/admin/image_events/' . htmlspecialchars($rows['image1']); ?>" style="width: 60px; height: 60px;" alt="Client Image">
                                <div class="ps-4">
                                    <h4 class="text-primary mb-1"><?php echo htmlspecialchars($rows['title']); ?></h4>
                                </div>
                            </div>
                            <div class="pt-4 pb-5 px-5">
                                <?php echo htmlspecialchars($rows['capacity']); ?>
                                <?php echo htmlspecialchars($rows['size']); ?>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No records found.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<!-- info start -->
<div class="container">
    <div class="row">
        <!-- Job Vacancies Start -->
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Event Management</h5>
                    <p class="mb-0">
                    Kaam Ka Caravan ensures that every event runs smoothly and achieves its objectives. Their personalized approach means they tailor each event to the unique needs and goals of their clients, creating environments that foster connection, collaboration, and success.
                    </p>
                </div>

                <!-- Vacancies Display -->
                <div class="row mt-5" id="vacancies-container">
                    <?php
                    // SQL query to fetch vacancies
                    $sql = "SELECT * FROM events";
                    $result = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-4 col-md-6 mb-4 vacancy-card" data-job-title="<?php echo htmlspecialchars($rows['title']); ?>">
                            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-between text-center" style="height: 100%;">
                                <div class="service-icon mb-3">
                                    <i class="fa fa-shield-alt text-white"></i>
                                </div>
                                <img class="img-fluid rounded" src="<?php echo '../admin Panel/admin/image_events/' . htmlspecialchars($rows['image1']); ?>" style="width: 200px; height: 120px;" alt="Client Image">
                                
                                <div class="content" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                                    <h4 class="mb-3"><?php echo htmlspecialchars($rows['title']); ?></h4>
                                    <p class="m-0"><?php echo htmlspecialchars($rows['description']); ?></p>
                                    <p><i class="fas fa-briefcase"></i> <?php echo htmlspecialchars($rows['capacity']); ?></p>
                                    <p><i class="fas fa-building"></i> <?php echo htmlspecialchars($rows['size']); ?></p>
                                </div>
                                <button class="w-100 btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                    <a href="event_int.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="text-white">Interested</a>
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Static card -->
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                        <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                            <h3 class="text-white mb-3">Call Us For Quote</h3>
                            <p class="text-white mb-3">Make a home for your business with Regus private office space in Pakistan.</p>
                            <h2 class="text-white mb-0">+3112033680</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Vacancies End -->
    </div>
</div>
<!-- info end -->

<div class="container bg-header5">
    <h1 class="text-center text-white display-3">Let's Talk!</h1>
    <div class="row g-5">
        <div class="col-lg-8 mx-auto wow slideInUp" data-wow-delay="0.3s">
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
                    <div class="col-12 my-5">
                        <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>

