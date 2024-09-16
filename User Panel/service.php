<?php
    include("header.php");
    include("connection.php");
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
                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="about.php" class="nav-item nav-link ">About</a>
                    <a href="contact.php" class="nav-item nav-link ">Contact Us</a>
                    <a href="./toprate.php" class="nav-item nav-link ">Top Rate</a>
                    <a href="./event.php" class="nav-item nav-link ">Events</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Co-Working</a>
                        <div class="dropdown-menu m-0">
                        <a href="./meeting.php" class="dropdown-item ">Meeting Room</a>
                            <a href="./office.php" class="dropdown-item ">Office Space</a>
                            <a href="./virtual.php" class="dropdown-item ">Virtual Office</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Service</a>
                        <div class="dropdown-menu m-0">
                        <a href="service.php" class="dropdown-item active">Find Job</a>
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

<div class="container-fluid bg-primary py-5 bg-header5" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Apply For Jobs</h1>
                    <a href="" class="h5 text-white"><img src="./b.png" alt="" height="40px"> Kaam Ka کاروان</a>
               
                </div>
            </div>
        </div>
    </div>



    <!-- Service Start -->
<!-- Job Vacancies Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Job Vacancies</h5>
            <h1 class="mb-0">Jobs now available in Karachi. Office Aide, Receptionist and more on Kaam ka کاروان.</h1>
        </div>

        <!-- Job Category Selection -->
        <div class="my-5">
            <h4>Find Job From These Categories</h4>
            <?php
            // Fetch job titles from the database for the dropdown
            $sql = "SELECT DISTINCT job_title FROM vacancies";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="row">
                <div class="col-lg-8">
                    <select name="job_title" id="job_title" class="w-100 form-control">
                        <option value="">Select Job Title</option>
                        <?php
                        while ($rows = mysqli_fetch_assoc($result)) {
                            // Output an option for each job title
                            echo '<option value="' . htmlspecialchars($rows['job_title']) . '">' . htmlspecialchars($rows['job_title']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <button style="align-items: right;" class="btn btn-primary w-100 px-4" onclick="filterJobs()">Search Now <i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>

        <!-- Vacancies Display -->
        <div class="row mt-5" id="vacancies-container">
            <?php
            // SQL query to fetch vacancies
            $sql = "SELECT * FROM vacancies";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-lg-4 col-md-6 mb-4 vacancy-card" data-job-title="<?php echo htmlspecialchars($rows['job_title']); ?>">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-between text-center" style="height: 100%;">
                        <div class="service-icon mb-3">
                            <i class="fa fa-shield-alt text-white"></i>
                        </div>
                        <div class="content" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                            <h4 class="mb-3"><?php echo htmlspecialchars($rows['job_title']); ?></h4>
                            <p class="m-0"><?php echo htmlspecialchars($rows['about']); ?></p>
                            <p><i class="fas fa-briefcase"></i> <?php echo htmlspecialchars($rows['experience']); ?></p>
                            <p><i class="fas fa-building"></i> <?php echo htmlspecialchars($rows['office_name']); ?></p>
                        </div>
                        <button class="w-100 btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                            <a href="interested.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="text-white">Interested</a>
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

<script>
    function filterJobs() {
        // Get the selected job title
        var selectedTitle = document.getElementById('job_title').value.toLowerCase();
        
        // Get all vacancy cards
        var vacancyCards = document.querySelectorAll('.vacancy-card');
        
        // Loop through the cards and show/hide based on the selected job title
        vacancyCards.forEach(function(card) {
            var jobTitle = card.getAttribute('data-job-title').toLowerCase();
            if (selectedTitle === "" || jobTitle === selectedTitle) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }
</script>



<script>
                $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: true,
        dots: true
    });
});

            </script>
<!-- Testimonial Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
            <h1 class="mb-0">What Our Clients Say About Our Digital Services</h1>
        </div>
        
        <!-- Testimonial Carousel Start -->
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
        <!-- Testimonial Carousel End -->
    </div>
</div>
<!-- Testimonial End -->

  </div>
 </div>
            </div>
        </div>
    </div>
<?php
    include("footer.php");
?>