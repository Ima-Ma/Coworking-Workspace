<?php
include("header.php");
include("connection.php");
?>
<style>
    
.container-fluid {
    background-color: #f9f9f9;
}

.section-title h5 {
    color: #28a745; 
    font-weight: bold;
    text-transform: uppercase;
}

.section-title h4 {
    font-size: 24px;
    margin: 0;
    color: #333;
}

.form-control {
    border-radius: 25px;
    border: 1px solid #28a745;
}

.btn-primary, .btn-success {
    border-radius: 25px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-success:hover {
    background-color: #218838;
}
.table {
    border-collapse: separate;
    border-spacing: 0;
}

.table th, .table td {

    text-align: center;
}

.table th {
    background-color: #007bff; 
    color: #fff;
    font-weight: bold;
}

.table td {
    vertical-align: middle;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
    padding: 6px 12px; 
    border-radius: 0; 
    font-size: 14px; 
}

.btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

.btn-success:focus, .btn-success.focus {
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
}
.btn-custom-small {
        padding: 0.25rem 0.5rem; 
        font-size: 0.75rem; 
    }
    .bg-custom-blue {
        background-color: #0056b3; 
    }
</style>
<div class="container-fluid bg-primary py-5 bg-header7">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">From Your Doorstep to Our Workspace!</h1>
            <a href="" class="h5 text-white">Kaam Ka کاروان</a>
        </div>
    </div>
</div>

<?php
if (isset($_POST['find'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $results = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
    $stmt->close();
}
?>

<!-- PICK N DROP SECTION START -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">High-End Pick & Drop Service</h1>
        </div>
        <div class="row">
        <div class="col-lg-6">
    <div class="section-title position-relative pb-3 mb-5">
        <h5 class="fw-bold text-success text-uppercase">Your Journey, Elevated</h5>
        <h4 class="mb-0">Kaam Ka کاروان offers a premium pick-and-drop service with luxury cars and bikes, ensuring a comfortable and stylish journey.</h4>
    </div>
    <p class="mb-4">At Kaam Ka کاروان, our pick and drop service features luxury cars and bikes with air conditioning, ensuring a comfortable and stylish journey. Enjoy hassle-free travel with our premium transportation options designed for your convenience.</p>
    <div class="d-flex flex-wrap">
    <div class="d-flex align-items-center mb-4 me-4">
        <div class="bg-custom-blue d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
        <i class="fa fa-taxi text-white"></i>

        </div>
        <div class="ps-3">
            <h5 class="mb-2">Luxury Pick & Drop Service</h5>
            <p class="mb-0">Travel in style with our luxury cars and bikes</p>
        </div>
    </div>
    <div class="d-flex align-items-center mb-4 me-4">
        <div class="bg-custom-blue d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
            <i class="fa fa-phone-alt text-white"></i>
        </div>
        <div class="ps-3">
            <h5 class="mb-2">Call to ask any question</h5>
            <h4 class="mb-0">+3112033680</h4>
        </div>
    </div>
</div>


</div>
 <div class="col-lg-6">
                <img src="https://res.cloudinary.com/jerrick/image/upload/d_642250b563292b35f27461a7.png,f_jpg,fl_progressive,q_auto,w_1024/64ae7830ad7795001d3abd30.jpg" alt="Healthy Snacks" class="img-fluid rounded shadow-sm">
            </div>
        </div>
    </div>
</div>
<!-- PICK N DROP SECTION END -->

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Search Form -->
            <div class="section-title position-relative pb-3 mb-5 text-center">
                <h5 class="fw-bold text-primary text-uppercase">Locate Your Booking Data</h5>
                <h6 class="mb-4">Enter your email to access the details of the services you’ve booked for your office space at Kaam Ka کاروان.</h6>
            </div>
            <form action="" method="post" class="shadow-sm p-4 rounded bg-light">
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Enter Your email" class="form-control" required>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary w-100" name="find">Find Your Record</button>
                </div>
            </form>

            <!-- Display Results -->
            <?php if (isset($results)): ?>
    <div class="mt-5">
        <?php if (!empty($results)): ?>
            <table class="table table-hover table-bordered table-striped text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Room </th>
                        <th>N.O.D</th>
                        <th>Payment</th>
                        <th>Card </th>
                        <th>Workday Bites</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                        <td><?php echo htmlspecialchars($row["email"]); ?></td>
                                            <td><?php echo htmlspecialchars($row["name"]); ?></td>
                                            <td><?php echo htmlspecialchars($row["title"]); ?></td>
                                            <td><?php echo htmlspecialchars($row["days"]); ?></td>
                                            <td><?php echo htmlspecialchars($row["price"]); ?></td>
                                            <td><?php echo htmlspecialchars($row["card_company"]); ?></td>
                                            <td>
                                                <button class="btn btn-success btn-sm" style="border-radius: 10px;">
                                                    <a href="pickndrop_add.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="text-white">Add Pick n Drop</a>
                                                </button>
                                            </td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-warning text-center">No records found for this email.</p>
        <?php endif; ?>
    </div>
<?php endif; ?>

        </div>
    </div>
</div>

       
        </div>
    </div>
</div>
<!-- Blog End -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php include("footer.php"); ?>
