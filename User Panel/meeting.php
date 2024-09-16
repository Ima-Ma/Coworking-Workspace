<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
    include("header.php");
    include("connection.php");
    
  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Basic server-side validation
    if(empty($name) || empty($rate) || empty($message)) {
        echo "<script>
                swal('Oops!', 'Please fill out all required fields.', 'error');
                </script>";
    } else {
        $sql = "INSERT INTO review (name, rate, message) VALUES ('$name', '$rate', '$message')";
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
            <h1 class="m-0">Kaam Ka کاروان</h5>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="about.php" class="nav-item nav-link ">About</a>
                    <a href="contact.php" class="nav-item nav-link ">Contact Us</a>
                    <a href="./toprate.php" class="nav-item nav-link ">Top Rate</a>
                    <a href="./event.php" class="nav-item nav-link ">Events</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Co-Working</a>
                        <div class="dropdown-menu m-0">
                        <a href="./meeting.php" class="dropdown-item active">Meeting Room</a>
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

                if(!isset($_SESSION['username'])){
                    echo '<a href="./login.php" class="btn btn-primary py-2 px-4 ms-3">Sign In Here</a>';
                } else {
                    echo '<a href="./logout.php" class="btn btn-primary py-2 px-4 ms-3">' . htmlspecialchars('Welcome '.$_SESSION['username']) . '</a>';
                }
                ?>
            </div>
 </nav>
 <div class="container-fluid bg-primary py-5 bg-header7" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Flexible Meeting Rooms</h1>
                    <a href="" class="h5 text-white"><img src="./b.png" alt="" height="40px"> Kaam Ka کاروان</a>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


<!-- Pricing Plan Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Pricing Plans</h5>
            <h1 class="mb-0">Meeting Room</h1>
        </div>
        <div class="row g-3">
            <?php 
            // Fetch all records from the database
            $sql = "SELECT * FROM meeting_office";
            $result = mysqli_query($conn, $sql);
            
            // Check if there are any records
            if (mysqli_num_rows($result) > 0) {
                // Loop through each record and generate a card
                while ($rows = mysqli_fetch_assoc($result)) {
                    // Determine the card's status
                    $status = $rows['status'];
                    // Set card classes and messages based on status
                    $cardClass = $status == 0 ? 'bg-white' : 'bg-danger text-white';
                    $statusMessage = $status == 0 ? '' : '<h5 class="text-warning">This room is currently booked</h5>';
                    ?>
                    <div class="col-lg-4 d-flex">
                        <div class="card rounded shadow position-relative flex-fill <?php echo $cardClass; ?>" style="height: 100%;">
                            <div class="border-bottom py-4 px-5 mb-4">
                                <h4 class="text-primary mb-1"><?php echo htmlspecialchars($rows['title']); ?></h4>
                                <small class="text-uppercase"><?php echo htmlspecialchars($rows['about']); ?></small>
                            </div>
                            <div class="p-5 pt-0">
                                <h1 class="display-5 mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">PKR</small>
                                    <?php echo htmlspecialchars($rows['price']); ?>
                                    <small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                                </h1>
                                <div class="d-flex justify-content-between mb-3">
                                    <span>Layout</span><i class="fa fa-check text-primary pt-1"></i>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <img src="<?php echo '../admin Panel/admin/image_meeting/' . htmlspecialchars($rows['image']); ?>" alt="<?php echo htmlspecialchars($rows['title']); ?>" class="img-fluid" style="object-fit: cover; height: 200px; width: 100%;">
                                </div>
                                <?php echo $statusMessage; ?>
                                <a href="booking.php?id=<?php echo $rows['id']; ?>" class="btn btn-primary py-2 px-4 mt-4 w-100 <?php echo $status == 0 ? '' : 'disabled'; ?>">Book Now</a>
                            </div>
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
<!-- Pricing Plan End -->

<style>
    .card {
        /* Ensure the card takes full height within its column */
        display: flex;
        flex-direction: column;
    }
    .card img {
        /* Adjust image to cover the space */
        object-fit: cover;
    }
</style>

<!-- Pricing Plan End -->

    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Send Your Review</h5>
                        <h1 class="mb-0">Your review should be a fair reflection of your experience.</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Reply within 24 hours</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>24 hrs telephone support</h5>
                        </div>
                    </div>
                    <p class="mb-4">We provide our members with high-speed internet with redundant connection, meeting rooms and fresh coffee. We strive to make our workspace a place where you can be productive and feel inspired.</p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+3112033680</h4>
                        </div>
                    </div>
                </div>
        <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                <form action="" method="post" onsubmit="return validateForm()" name="reviewform">
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" name="name" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select name="rate" id="" placeholder="Rate Our Site" class=" my-3 form-control" style="height: 55px;">
                                        <option value="">Rate Our site</option>
                                        <option value="⭐">⭐</option>
                                        <option value="⭐⭐">⭐⭐</option>
                                        <option value="⭐⭐⭐">⭐⭐⭐</option>
                                        <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
                                        <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</option>
                                </div>
                            
                                <div class="col-12">
                                    <textarea name="message" class="form-control bg-light border-0" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button name="submit" class="btn btn-dark w-100 py-3"> Send Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


<?php
    include("footer.php");
?>

<!-- SweetAlert2 CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


