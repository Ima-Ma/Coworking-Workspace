<?php
    include("header.php");
    include("connection.php");

    $ID = intval($_GET["id"]);  // Ensure ID is an integer to prevent SQL injection

    // Prepare and execute the query to fetch the username
    $stmt = $conn->prepare("SELECT username FROM office_req WHERE id = ?");
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $usernameData = $result->fetch_assoc();
    
    if ($usernameData) {
        $username = $usernameData['username'];

        // Prepare and execute the query to fetch all vacancies for the office
        $stmt = $conn->prepare("SELECT * FROM vacancies WHERE office_name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Fetch all rows
        $vacancies = $result->fetch_all(MYSQLI_ASSOC);
        
        // Prepare and execute the query to fetch office profile information
        $stmt = $conn->prepare("SELECT * FROM profile_office WHERE office_name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $officeProfile = $result->fetch_assoc();
    } else {
        echo "No data found.";
        exit;
    }
?>
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn"><?php echo htmlspecialchars($username); ?></h1>
            <a href="" class="h5 text-white">Kaam Ka کاروان</a>
        </div>
    </div>
</div>
<!-- Navbar End -->

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="mb-5">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Available Vacancies</h3>
                    </div>
                    <?php if (!empty($vacancies)): ?>
                        <?php foreach ($vacancies as $row): ?>
                           <a href="./service.php">
                           <div class="d-flex mb-4">
                                <img src="images/<?php echo htmlspecialchars($row['image']); ?>" height="100" width="90" alt="Vacancy Image">
                                <div class="ps-3">
                                    <h6><a href="./service.php"><?php echo htmlspecialchars($row['job_title']); ?></a></h6>
                                    <p><?php echo htmlspecialchars($row['about']); ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <p>No vacancies available at the moment.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
    
         <!-- Sidebar Start -->
<div class="col-lg-4">
    <!-- Category Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0">Information</h3>
        </div>
        <div class="link-animated d-flex flex-column justify-content-start">
            <?php if ($officeProfile): ?>
                <?php if (!empty($officeProfile['location'])): ?>
                    <a class="h6 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo htmlspecialchars($officeProfile['location']); ?></a>
                <?php else: ?>
                    <p>Location information is currently not available.</p>
                <?php endif; ?>

                <?php if (!empty($officeProfile['timing'])): ?>
                    <a class="h6 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo htmlspecialchars($officeProfile['timing']); ?></a>
                <?php else: ?>
                    <p>Timing information is currently not available.</p>
                <?php endif; ?>

                <?php if (!empty($officeProfile['links'])): ?>
                    <a class="h6 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo htmlspecialchars($officeProfile['links']); ?></a>
                <?php else: ?>
                    <p>Links information is currently not available.</p>
                <?php endif; ?>

                <?php if (!empty($officeProfile['contact'])): ?>
                    <a class="h6 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo htmlspecialchars($officeProfile['contact']); ?></a>
                <?php else: ?>
                    <p>Contact information is currently not available.</p>
                <?php endif; ?>
            <?php else: ?>
                <p>No additional information available.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Category End -->
    
    <!-- Tags Start -->
    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0">Keywords</h3>
        </div>
        <div class="d-flex flex-wrap m-n1">
            <?php if (!empty($officeProfile['keyword1'])): ?>
                <a href="" class="btn btn-light m-1"><?php echo htmlspecialchars($officeProfile['keyword1']); ?></a>
            <?php else: ?>
                <a href="" class="btn btn-light m-1">Keyword 1 Not Available</a>
            <?php endif; ?>
            <?php if (!empty($officeProfile['keyword2'])): ?>
                <a href="" class="btn btn-light m-1"><?php echo htmlspecialchars($officeProfile['keyword2']); ?></a>
            <?php else: ?>
                <a href="" class="btn btn-light m-1">Keyword 2 Not Available</a>
            <?php endif; ?>
            <?php if (!empty($officeProfile['keyword3'])): ?>
                <a href="" class="btn btn-light m-1"><?php echo htmlspecialchars($officeProfile['keyword3']); ?></a>
            <?php else: ?>
                <a href="" class="btn btn-light m-1">Keyword 3 Not Available</a>
            <?php endif; ?>
        </div>
    </div>
</div>
        </div>
    <!-- Tags End -->

    <!-- Plain Text Start -->
    <div class="wow slideInUp" data-wow-delay="0.1s">
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0">About Office</h3>
        </div>
        <div class="bg-light text-center" style="padding: 30px;">
            <?php if (!empty($officeProfile['about_office'])): ?>
                <p><?php echo htmlspecialchars($officeProfile['about_office']); ?></p>
            <?php else: ?>
                <p>Information about the office is currently not available.</p>
            <?php endif; ?>
            <a href="./service.php" class="btn btn-primary py-2 px-4">Read More</a>
        </div>
    </div>
    <!-- Plain Text End -->
</div>
<!-- Sidebar End -->

    
    
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
</div>

    <?php
    include("footer.php");
    ?>