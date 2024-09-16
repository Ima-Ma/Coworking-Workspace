<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
    include("header.php");
    include("connection.php");

    if(isset($_POST['submit'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
    
        // Basic server-side validation
        if(empty($title) || empty($name) || empty($date) || empty($email) || empty($message)) {
            echo "<script>
                    swal('Oops!', 'Please fill out all required fields.', 'error');
                    </script>";
        } else {
            $sql = "INSERT INTO event_contact (title, name, date, email, message) VALUES ('$title', '$name', '$date', '$email', '$message')";
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
            var title = document.forms["contactForm"]["title"].value;
            var name = document.forms["contactForm"]["name"].value;
            var date = document.forms["contactForm"]["date"].value;
            var email = document.forms["contactForm"]["email"].value;
            var message = document.forms["contactForm"]["message"].value;
    
            if (title == "" || name == "" || date == "" || email == "" || message == "") {
                swal('Oops!', 'Please fill out all required fields.', 'error');
                return false;
            }
            return true;
        }
    </script>


    <!-- Blog Start -->
    <div class="container-fluid wow fadeInUp mt-5" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
          
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                <?php
                            $ID = $_GET["id"];
                            $sql = "select * from  events where id = $ID";
                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($result);
                        ?>         
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">About This Venue</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo $rows ['capacity'] ?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo $rows ['size'] ?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo $rows ['description'] ?></a>
                       
                        </div>
                    </div>
                    <!-- Category End -->
    
                </div>
                <!-- Sidebar End -->
                <div class="col-lg-8">
                    <h1 class="text-primary text-center fw-bold"> <?php echo $rows ['title'] ?></h1>
                    <img class="img-fluid rounded" src="<?php echo '../admin Panel/admin/image_events/' . htmlspecialchars($rows['image1']); ?>" style="width: 420px; height: 320px;" alt="Client Image">
                    <img class="img-fluid rounded" src="<?php echo '../admin Panel/admin/image_events/' . htmlspecialchars($rows['image2']); ?>" style="width: 420px; height: 320px;" alt="Client Image">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center fw-bold ">Do you have questions about our spaces, want to check availability for your conference or event, leave us your details and we’ll get in touch.</h3>
        <div class="col-lg-10  mt-5 bg-primary  p-5 mx-auto ">
        <form action="" method="post" onsubmit="return validateForm()" name="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="" class="text-white"> Title:</label>
                                <input type="text" name="title" class="form-control border-0 bg-light px-4" value="<?php echo $rows ['title'] ?>" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <label for=""class="text-white" >Name:</label>
                                <input type="text" name="name" class="form-control border-0 bg-light px-4" placeholder=" Name" style="height: 55px;">
                            </div>
                            <div class="col-md-12">
                                <label for=""class="text-white" >Email:</label>
                                <input type="email" name="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <label for="" class="text-white"> Prefferred Event Date:</label>
                            <div class="col-md-12">
                                <input type="date" name="date" class="form-control border-0 bg-light px-4" placeholder="Your Prefferred Event Date" style="height: 55px;">
                            </div>
                           <label for="" class="text-white" >Message:</label>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message" name="message"></textarea>
                            </div>
                            <div class="col-12">
                                <button name="submit" class="btn btn-dark w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
    <!-- Blog End -->


<?php


include("footer.php");
?>