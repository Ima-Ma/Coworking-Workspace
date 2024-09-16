<?php
    include("header.php");
    include("connection.php");
?>
  
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
            <a href="about.php" class="nav-item nav-link active">About</a>
            <!-- <a href="extra_ser.php" class="nav-item nav-link ">Services</a> -->
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

                if(!isset($_SESSION['username'])){
                    echo '<a href="./login.php" class="btn btn-primary py-2 px-4 ms-3">Sign In Here</a>';
                } else {
                    echo '<a href="./logout.php" class="btn btn-primary py-2 px-4 ms-3">' . htmlspecialchars('Welcome '.$_SESSION['username']) . '</a>';
                }
                ?>
            </div>
 </nav>


    <div class="container-fluid bg-primary py-5 bg-header4" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Discover More About Our Workspace</h1>
                    <a href="" class="h5 text-white"><img src="./b.png" alt="" height="40px"> Kaam ka کاروان</a>
                </div>
            </div>
        </div>
    </div>



    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h1 class="mb-0">Welcome to Kaam Ka کاروان </h1>
                    </div>
                    <p class="mb-4">At Kaam Ka کاروان, we understand the importance of a productive workspace. Our co-working space offers a range of membership options to suit your needs, from hot desks to private offices.</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Virtual Office</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Meeting Rooms</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Apply For Jobs</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Office Space</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+3112033680</h4>
                        </div>
                    </div>
                    <a href="./contact.php" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Contact Us</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="https://co-unity.co.uk/wp-content/uploads/2023/08/Co-Unity-1.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

     <!-- Career Launchpad Area -->
     <section class="career-launchpad-area section-padding-100-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="application-process-content mb-100 wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms">
                                <div class="section-heading">
                                    <div class="line-"></div>
                                    <h2 class="text-center text-primary">The Career Launchpad</h2>
                                </div>
                                <p >Kaam Ka کاروان is the ultimate career launchpad, providing the perfect environment for job seekers and professionals. Our space offers flexible workstations, modern amenities, and access to a network of industry leaders.</p>
                                <ul>
                                    <li><strong>Prepare Your CV:</strong> Create a professional CV highlighting your skills, experiences, and achievements.</li>
                                    <li><strong>Search for Job Ads:</strong> Browse job advertisements on our website and partner job boards to find opportunities that match your qualifications.</li>
                                    <li><strong>Apply for Jobs:</strong> Submit your CV and cover letter to the job positions you are interested in.</li>
                                    <li><strong>Attend Workshops:</strong> Participate in our career development workshops to enhance your skills and improve your job application process.</li>
                                    <li><strong>Network with Employers:</strong> Join our networking events to connect with potential employers and industry leaders.</li>
                                    <li><strong>Interview Preparation:</strong> Use our resources to prepare for interviews, including mock interview sessions and feedback.</li>
                                    <li><strong>Follow Up:</strong> Follow up with employers after your interviews to express your continued interest and to thank them for the opportunity.</li>
                                    <li><strong>Receive Job Offers:</strong> Once you receive job offers, use our consultation services to help you evaluate and negotiate the best terms.</li>
                                    <li><strong>Start Your New Job:</strong> Begin your new role with confidence, knowing you have the support of the Kaam Ka کاروان community behind you.</li>
                                </ul>
                                <a href="./service.php" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
                <h1 class="mb-0"> Our co-working space is tailored to meet the needs of professionals at every stage of their career.</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="https://cdn-icons-png.flaticon.com/512/81/81392.png" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Imama Mushtaq</h4>
                            <p class="text-uppercase m-0">Website leader and idea creator. as well as manages the database and admin panel.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3HdBqVDU45zUIDYvJbH1QE2kosJ0VrH0KEXee3n33PnskjPbyvDAUWYrChTGjCXHA2cc&usqp=CAU" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Asad Ali</h4>
                            <p class="text-uppercase m-0">UI/UX Designer and user panel manager. Asad handles multiple pages and customizations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="https://cdn-icons-png.flaticon.com/512/81/81392.png" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Bushra Shakeel</h4>
                            <p class="text-uppercase m-0">Office portal manager. Bushra ensures smooth operation of the office portal.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

<?php
include("footer.php");
?>