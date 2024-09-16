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
                        <a href="service.php" class="dropdown-item ">Find Job</a>
                            <a href="./ourteam.php" class="dropdown-item active" >Join Us</a>
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

<div class="container-fluid bg-primary py-5 bg-header9" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Join Our Workspace</h1>
            <a href="" class="h5 text-white"><img src="./b.png" alt="" height="40px"> Kaam ka کاروان</a>
        </div>
    </div>
</div>


<div class="container mx-auto">
    <div class="row mx-auto">
        <div class="col-lg-6 wow zoomIn" data-wow-delay="0.3s">
            <div class="section-title position-relative pb-3 mb-5">
                <h5 class="fw-bold text-primary text-uppercase">Join Us</h5>
                <h1 class="mb-0">Kaam Ka کاروان</h1>
            </div>
            <p class="mb-4">At Kaam Ka کاروان, we understand the importance of a productive workspace. Our co-working space offers a range of membership options to suit your needs, from hot desks to private offices.</p>
            <div class="row g-0 mb-3"></div>
            <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fa fa-phone-alt text-white"></i>
                </div>
                <div class="ps-4">
                    <h5 class="mb-2">Call to ask any question</h5>
                    <h4 class="text-primary mb-0">+3112033680</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-6 bg-primary wow zoomIn" data-wow-delay="0.3s">
            <img class="img-fluid mx-auto w-100 h-100" src="./ourteambg.png" alt="">
        </div>
    </div>
</div>

<div class="container">
    <div class="my-5">
        <h4>Find Job From These Categories</h4>
        <?php
        // Fetch job titles from the database for the dropdown
        $sql = "SELECT DISTINCT title FROM ourteam";
        $result = mysqli_query($conn, $sql);
        ?>
        <div class="row">
            <div class="col-lg-8">
                <select name="title" id="title" class="w-100 form-control">
                    <option value="">Select Job Title</option>
                    <?php
                    while ($rows = mysqli_fetch_assoc($result)) {
                        // Output an option for each job title
                        echo '<option value="' . htmlspecialchars($rows['title']) . '">' . htmlspecialchars($rows['title']) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-4">
                <button class="btn btn-primary w-100 px-4" onclick="filterJobs()">Search Now <i class="bi bi-search"></i></button>
            </div>
        </div>
    </div>
</div>
        
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-5" id="vacancies-container">
                <?php
                // SQL query to fetch vacancies
                $sql = "SELECT * FROM ourteam";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-6 mt-5 vacancy-card p-3" data-job-title="<?php echo htmlspecialchars($rows['title']); ?>">
                        <div class="service-item bg-light rounded d-flex flex-column" style="height: 100%;">
                            <div class="service-icon mb-3">
                                <i class="fa fa-shield-alt text-white"></i>
                            </div>
                            <div class="content" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                                <h4 class="mb-3"><?php echo htmlspecialchars($rows['title']); ?></h4>
                                <p class="m-0"><?php echo htmlspecialchars($rows['description']); ?></p>
                                <p><i class="fas fa-briefcase"></i> <?php echo htmlspecialchars($rows['gender']); ?></p>
                                <p><i class="fas fa-building"></i> <?php echo htmlspecialchars($rows['qualification']); ?></p>
                            </div>
                            <button class="w-100 btn btn-primary my-5 py-md-3 px-md-5 me-3 animated slideInLeft">
                                <a href="ourteam_job.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="text-white">Interested</a>
                            </button>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- Static card -->
                <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                        <h3 class="text-white mb-3">Call Us For Quote</h3>
                        <p class="text-white mb-3">Make a home for your business with Regus private office space in Pakistan.</p>
                        <h2 class="text-white mb-0">+3112033680</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 h-100 wow slideInLeft" data-wow-delay="0.3s" >
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img h-100 w-100" src="./pictures/pic4.png" alt="">
                                <div class="team-social">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded w-50" href="./ourteam.php"><h4 class="text-white">
                                    Membership</h4></a>
                                </div>
                            </div>
                        </div>
            </div>
        <div class="col-lg-6 h-100 wow slideInLeft" data-wow-delay="0.3s" >
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Membership</h5>
                        <h1 class="mb-0">Get A MemberShip</h1>
                    </div>
                    <p class="mb-4">At Kaam Ka کاروان,All Access is a monthly coworking membership to beautifully designed spaces near home or around the world.</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Conference hall</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Parking</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>WiFi</h5>

                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Events</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Security</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Printing and scanning</h5>

                        </div>
                    </div>
        </div>
           
                </div>
        </div>
</div>
<div class="container py-5">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h1 class="mb-0">Coworking is an arrangement in which workers for different companies share an office space.</h1>
    </div>
</div>

<div class="container wow fadeInUp" data-wow-delay="0.1s">
    <div class="row">
        <?php 
        $sql = "SELECT * FROM virtual_office";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-lg-3 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="pt-0">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Layout</span><i class="fa fa-check text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <img src="<?php echo '../admin Panel/admin/image_virtual/' . htmlspecialchars($rows['image']); ?>" alt="<?php echo htmlspecialchars($rows['title']); ?>" style="height: 250px; width: 250px;">
                            </div>
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
<div class="container wow zoomIn" data-wow-delay="0.1s">
    <div class="row">
        <?php 
        $sql = "SELECT * FROM office_space";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="pt-0">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Layout</span><i class="fa fa-check text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <img src="<?php echo '../admin Panel/admin/image_office/' . htmlspecialchars($rows['image']); ?>" alt="<?php echo htmlspecialchars($rows['title']); ?>"style="height: 250px; width: 250px;">
                            </div>
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
<div class="container wow zoomIn" data-wow-delay="0.1s">
    <div class="row">
        <?php 
        $sql = "SELECT * FROM meeting_office";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="pt-0">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Layout</span><i class="fa fa-check text-primary"></i>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <img src="<?php echo '../admin Panel/admin/image_meeting/' . htmlspecialchars($rows['image']); ?>" alt="<?php echo htmlspecialchars($rows['title']); ?>"style="height: 250px; width: 250px;">
                            </div>
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

<?php
include("footer.php");
?>

<script>
function filterJobs() {
    // Get the selected job title
    var selectedTitle = document.getElementById('title').value.toLowerCase();
    
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
