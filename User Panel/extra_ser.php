<?php
include("header.php");
include("connection.php");
?>

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
            <a href="./extra_ser.php" class="nav-item nav-link active">Services</a>
            <a href="contact.php" class="nav-item nav-link">Contact Us</a>
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
            <h1 class="display-4 text-white animated zoomIn">Ensuring Transparency and Trust</h1>
            <a href="" class="h5 text-white">
                <img src="./b.png" alt="" height="40px"> Kaam Ka کاروان
            </a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h1>Table Of The Content</h1>
            <hr>
            <ul>
                <li>
                    <a href="">Workday Bites:</a>
                    <p>For guests seeking an exclusive dining experience, offer Workday Bites rooms or areas where they can enjoy meals in solitude or with select company.</p>
                </li>
                <li>
                    <a href="">Office Pick N Drop:</a>
                    <p>Our Executive Pick & Drop service available for Kaam Ka Caravan. We can provide a car for executive transfer on a monthly basis.</p>
                </li>
               
            </ul>
        </div>
        <div class="col-lg-3 m-5">
            <p class="text-dark fw-bold mt-5">Services For Our Workspaces:
                <ul>
                    <li class="text-dark">Meeting Rooms</li>
                    <li class="text-dark">Office Space</li>
                    <li class="text-dark">Virtual Offices</li>
                </ul>
            </p>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4 vacancy-card" data-job-title="">
            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-between text-center" style="height: 100%;">
                <div class="service-icon mb-3">
                    <i class="fa fa-shield-alt text-white"></i>
                </div>
                <div class="content" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                    <h4 class="mb-3">Workday Bites</h4>
                </div>
                <button class="w-100 btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                    <a href="dining.php" class="text-white">Add Service</a>
                </button>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-4 vacancy-card" data-job-title="">
            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-between text-center" style="height: 100%;">
                <div class="service-icon mb-3">
                    <i class="fa fa-shield-alt text-white"></i>
                </div>
                <div class="content" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                    <h4 class="mb-3">Office Pick N Drop</h4>
                </div>
                <button class="w-100 btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                    <a href="./pickndrop.php" class="text-white">Add Service</a>
                </button>
            </div>
        </div>
       
    </div>
</div>

<div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 h-50 wow slideInLeft" data-wow-delay="0.3s" >
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="" src="https://png.pngtree.com/thumb_back/fw800/background/20240619/pngtree-roofs-of-several-cars-a-lot-of-cars-stand-close-at-image_15798766.jpg" alt="" height="400px">
                                <div class="team-social">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded w-50" data-bs-toggle="modal" data-bs-target="#driver"><h4 class="text-white">
                                    Driver Form</h4></a>
                                </div>
                            </div>
                        </div>
            </div>
        <div class="col-lg-6 h-100 wow slideInLeft" data-wow-delay="0.3s" >
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Driver Position Open at Kaam Ka کاروان!</h5>
                        <h1 class="mb-0">Apply Now to Be a Driver for Kaam Ka کاروان!</h1>
                    </div>
                    <p class="mb-4">Be the Force Behind Our Wheels: Driver Opportunities at Kaam Ka کاروان! Drive for Excellence: Become a Driver at Kaam Ka کاروان!</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Female</h5>

                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Male</h5>

                        </div>
                    </div>
        </div>
           
                </div>
        </div>
</div>
                    
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">What Our Clients Say About Our Digital Services</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php
            $sql = "SELECT * FROM review";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
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
    </div>
</div>

<?php
include("footer.php");
?>
<!-- Modal -->
<div class="modal fade" id="driver" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-modal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply Now to Be a Driver for Kaam Ka کاروان!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
           <a href="./female_form.php">
           <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
              <h2 class="text-white mb-3">Female Drivers</h2>
              <p class="text-white mb-3">Are you a dedicated and reliable female driver seeking a rewarding role? We’re excited to invite you to apply for our driver positions!
                🔹 Requirements:
                Valid driver’s license
                Clean driving record
                Strong communication skills
                Ability to work flexible hours
                Previous driving experience is advantageous
                </p>
            </div>
           </a>
          </div>
          <div class="col-lg-6">
         <a href="./male_form.php">
         <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
              <h2 class="text-white mb-3">Male Drivers</h2>
              <p class="text-white mb-3">Are you a dedicated and reliable female driver seeking a rewarding role? We’re excited to invite you to apply for our driver positions!
                🔹 Requirements:
                Valid driver’s license
                Clean driving record
                Strong communication skills
                Ability to work flexible hours
                Previous driving experience is advantageous
                </p>
            </div>
         </a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<style>
  .custom-modal {
    max-width: 80%; /* Adjust as needed */
    max-height: 80%; /* Adjust as needed */
  }
</style>
