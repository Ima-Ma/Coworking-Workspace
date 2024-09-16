<?php
    include("header.php");
    include("connection.php");
?>

<div class="container-fluid bg-primary py-5 bg-header2">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Job Application Form</h1>
                    <a href="" class="h5 text-white">Kaam Ka کاروان</a>
               
                </div>
            </div>
        </div>
    </div>
    
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


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Job Application</h3>
                        </div>
                        <?php
                            $ID = $_GET["id"];
                            $sql = "select * from  vacancies where id = $ID";
                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($result);
                        ?>
                            <form action=""  method="post" enctype="multipart/form-data"  onsubmit="return validateForm()" name="jobApplicationForm">

                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0"  name="office_name" value="<?php echo $rows ['office_name'] ?>" style="height: 55px;">
                                </div>
                               
                                <div class="col-12">
                                    <input name="email" type="email" class="form-control bg-white border-0" placeholder="Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="date" class="form-control bg-white border-0"  name="start_date"  placeholder="When can you start?"  style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0"  name="phone"  placeholder="Contact Number"  style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control bg-white border-0"  name="cv"  placeholder="Attach Your Cv"  style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                <label  for="gender">Gender</label><br />
                                <input  name="gender" type="radio" value="Female"/> Female      
                                <input name="gender" type="radio" value="male" /> Male      
                                <input name="gender" type="radio" value="other" /> Other
                                </div>
                            
                                <div class="col-12">
                                    <button  name="submit" class="mt-3 btn btn-primary w-100 py-3" type="submit">Send Application</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                <?php
                            $ID = $_GET["id"];
                            $sql = "select * from  vacancies where id = $ID";
                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($result);
                        ?>         
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">About This Job</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo $rows ['office_name'] ?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo $rows ['job_title'] ?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo $rows ['about'] ?></a>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="#"><i class="bi bi-arrow-right me-2"></i><?php echo $rows ['experience'] ?></a>
                        </div>
                        <?php
                        echo "<img src=\"images/{$rows['image']}\" height=200px width=250px>"
                 ?>
                    </div>
                    <!-- Category End -->
    
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $start_date = $_POST['start_date'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $office = $_POST['office_name'];
    $file_name = $_FILES['cv']['name'];
    $file_type = $_FILES['cv']['type'];
    $file_size = $_FILES['cv']['size'];
    $file_tmp = $_FILES['cv']['tmp_name'];
    
    // Validate required fields
    if(empty($name) || empty($email) || empty($start_date) || empty($phone) || empty($gender) || empty($file_name)) {
        echo "<script>
                    swal('Oops!', 'Please fill out all required fields.', 'error');

                window.location.href='service.php';
              </script>";
        exit; // Prevent further execution
    }

    $upload_directory = "upload/";
    move_uploaded_file($file_tmp, $upload_directory . $file_name);

    $sql = "INSERT INTO job_application (name, email, start_date, phone, gender, cv, office_name)
            VALUES ('$name', '$email', '$start_date', '$phone', '$gender', '$file_name', '$office')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>
                swal('Thank You!', 'Your Job Application Is Successfully Delivered!.', 'success');
                window.location.href='service.php';
              </script>";
    } else {
        echo "<script>
                    swal('Oops!', 'Failed to submit job application.', 'error');
                window.location.href='service.php';
              </script>";
    }
}
include("footer.php")
?>
<script>
    function validateForm() {
        var name = document.forms["jobApplicationForm"]["name"].value;
        var email = document.forms["jobApplicationForm"]["email"].value;
        var startDate = document.forms["jobApplicationForm"]["start_date"].value;
        var phone = document.forms["jobApplicationForm"]["phone"].value;
        var cv = document.forms["jobApplicationForm"]["cv"].value;
        var gender = document.forms["jobApplicationForm"]["gender"].value;

        if (name == "" || email == "" || startDate == "" || phone == "" || cv == "" || gender == "") {
            swal('Oops!', 'Please fill out all required fields.', 'error');

            return false;
        }
        return true;
    }
</script>