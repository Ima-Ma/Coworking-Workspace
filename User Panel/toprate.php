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
 <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0 ">Kaam Ka کاروان</h5>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <!-- <a href="./extra_ser.php" class="nav-item nav-link ">Services</a> -->
            <a href="contact.php" class="nav-item nav-link ">Contact Us</a>
            <a href="./toprate.php" class="nav-item nav-link active">Top Rate</a>
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
        <div class="container-fluid bg-primary py-5 bg-header8" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Discover More About Our Workspace</h1>
                    <a href="" class="h5 text-white"><img src="./b.png" alt="" height="40px"> Kaam ka کاروان</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mx-auto">
    <h1 class="mt-5  animated slideInLeft">Workspace made simple</h1>
    <p class=" animated slideInLeft">Whatever your budget or need, we make finding the perfect workspace easy. From flexible memberships to move-in ready offices, we give you the space and solutions to do your best work.</p>
    <p class=" animated slideInLeft">Give your real estate portfolio more flexibility while saving on costs by combining our turnkey offices, coworking spaces, and space management technology.</p>
    <h5 class=" animated slideInLeft">Introducing our space management technology</h5>
    <p class=" animated slideInLeft">Create a seamless booking experience across your portfolio, help employees collaborate in person, and make smarter real estate decisions with real-time data—all under one platform.</p>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-lg-6 h-100 wow slideInLeft" data-wow-delay="0.3s" >
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img h-100 w-100" src="./pictures/pic1.png" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded w-50" href="./ourteam.php"><h4 class="text-white">Join Our Team</h4></a>
                            </div>
                            
                    </div>
                </div>
            </div>
            <div class="col-lg-6 h-100 wow slideInLeft" data-wow-delay="0.3s" >
                    <div class="team-item bg-light rounded overflow-hidden h-100">
                        <div class="team-img position-relative overflow-hidden h-100">
                            <img class="img h-100 w-100" src="./pictures/pic2.png" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded w-50" href="./service.php"><h4 class="text-white">Find Job</h4></a>
                            </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
 <!-- About Start -->
 <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Work trends and insights</h5>
                        <h1 class="mb-0">Ideas by Kaam Ka کاروان </h1>
                    </div>
                    <p class="mb-4">At Kaam Ka کاروان,Accelerated by the pandemic, companies and employees have reached an inflection point in redefining our world of work. The days when companies required their office employees to gather in a central place five days a week are disappearing. As we navigate the adoption of hybrid work models, it’s inarguable that the needs and expectations of both employers and employees are changing rapidly. These demands, amplified by tight labor markets, are forcing employers to act urgently. At the same time, as organizations quickly assess new hybrid models, they want to retain the inherent business value a traditional office environment provides: the chance to be creative, collaborate, mentor, learn—to build culture together and more.</p>
                    <a href="./contact.php" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Contact Us</a>
                </div>
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="https://t4.ftcdn.net/jpg/05/14/20/47/360_F_514204772_mT0EpTdZkScyiRPn2PInaKaqd88QGrzE.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- About End -->
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title position-relative w-100 pb-3 mb-5">
                        <h1 class="mb-0 w-100"></h1>
                    </div>
                </div>
                
            </div>
            
        </div>

</div>
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
            <h1 class="mb-0">What Our Clients Say About Our Digital Services</h1>
        </div>
        
<div class="owl-carousel testimonial-carousel">
            <?php
            // Fetch all records from the database
            $sql = "SELECT * FROM review";
            $result = mysqli_query($conn, $sql);

            // Check if there are any records
            if (mysqli_num_rows($result) > 0) {
                // Loop through each record and generate a card
                while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="testimonial-item bg-light my-4">
                        <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                            <img class="img-fluid rounded" src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI=" style="width: 60px; height: 60px;" alt="Client Image">
                            <div class="ps-4">
                                <h4 class="text-primary mb-1"><?php echo htmlspecialchars($rows['name']); ?></h4>
                                <small class="text-uppercase"><?php echo htmlspecialchars($rows['rate']); ?></small>
                            </div>
                        </div>
                        <div class="pt-4 pb-5 px-5">
                            <?php echo htmlspecialchars($rows['message']); ?>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No records found.</p>";
            }
            ?>
           
        </div>
<div class="container-fluid mt-5">
<div class="row ">
                <div class="col-lg-4">
                    <div class="card wow fadeInUp" data-wow-delay="0.1s" >
                    <img src="https://media.istockphoto.com/id/1027859140/photo/group-of-managers-talking-in-the-business-cente.jpg?s=612x612&w=0&k=20&c=K5WjRHd_9I_WSxV7ENQb3fdXpdb0hsXmI-VwtTD44M0=" class="card-img-top" alt="...">
                        <div class="card-body">
                        <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Introducing our technology</h5>
                        <h1 class="mb-0"></h1>
                    </div>
                            <p class="card-text">Create a seamless booking experience across your portfolio, help employees collaborate in person,.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card wow fadeInUp" data-wow-delay="0.1s" >
                    <img src="https://as1.ftcdn.net/v2/jpg/03/03/76/68/1000_F_303766887_r3mlIYiD4v2sffRacamIQRcqrvRfjgeR.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase"> creative agency went global, fast</h5>
                        <h1 class="mb-0"></h1>
                    </div>
                            <p class="card-text"> Making smarter real estate decisions with real-time data—all under one platform we’re helping our members reimagine the ways they work.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card wow fadeInUp" data-wow-delay="0.1s" >
                    <img src="https://media.istockphoto.com/id/530685719/photo/group-of-business-people-standing-in-hall-smiling-and-talking-together.jpg?s=170667a&w=0&k=20&c=UjDX90p-ewg4Muni2mWtRPhIXA35EYx3kY2C_dHbGzI=" class="card-img-top" alt="...">
                        <div class="card-body">
                        <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">How four founders use WeWork All Access</h5>
                        <h1 class="mb-0"></h1>
                    </div>
                            <p class="card-text">Here’s how four founders use  All Access to find structure, community, and familiarity as they build and expand their companies.</p>
                        </div>
                    </div>
                </div>

            </div>
</div>
    <div class="container mt-5">
        <div class="row mt-5">
        <div class="col-lg-2 mt-5 h-100 wow slideInRight" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img h-100 w-100" src="https://media.licdn.com/dms/image/C560BAQHnbvmW4GCNAg/company-logo_200_200/0/1630596526366/10pearls_logo?e=2147483647&v=beta&t=Rbihc6kTCIVTRUybLmIg9S4aFId_YM9TVGmjRZJCSks" alt="">
                        </div>
                    </div>
            </div>

            <div class="col-lg-2  mt-5 h-100 wow slideInRight" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img h-100 w-100" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRPux-XcmthMgQqm2wOez3QHZ-oqHPImvpqm82VhJES2uTr0QuN" alt="">
                        </div>
                    </div>
            </div>

            <div class="col-lg-2  mt-5 h-100 wow slideInRight" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img h-100 w-100" src="https://media.licdn.com/dms/image/C4E0BAQHoR2H_yaUC2Q/company-logo_200_200/0/1630570854933/q_soft_technologies_logo?e=2147483647&v=beta&t=bePvJsqbg3E0mRtac9IFyft6A11kG20-wwkbj5Tk8bw" alt="">
                        </div>
                    </div>
            </div>
            <div class="col-lg-2  mt-5 h-100 wow slideInRight" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img w-100" src="https://images-platform.99static.com//JOGNf7QrA58FD4x5XV_IPI3A5Tk=/159x0:1127x968/fit-in/500x500/99designs-contests-attachments/67/67433/attachment_67433526" alt="">
                        </div>
                    </div>
            </div>
            <div class="col-lg-2  mt-5 h-100 wow slideInRight" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img w-100" src="./images/5.jpg" alt="">
                        </div>
                    </div>
            </div>
            <div class="col-lg-2  mt-5 h-100 wow slideInRight" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img w-100" src="./images/6.png" alt="">
                        </div>
                    </div>
            </div>
        </div>
    </div>
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

              
    </div>
</div>

<?php
include("footer.php");
?>