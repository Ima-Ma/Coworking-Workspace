<?php
include("connection.php");
include("header.php");

$ID = $_GET["id"];
$sql = "select * from events where id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<main class="app-content"> 
<div class="main-panel">
<div class="app-title">
        <h1 class="display-3 text-primary">
             Events Venue Edit <i class="fa-solid fa-pen-to-square"></i>
        </h1>
    </div>
			<div class="content">
				<div class="page-inner">
        <div  class="content-body">
            
            <div class="container-fluid mt-5 col-lg-12">
                <div class="tile">
                                <div class="basic-form">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-grp">
                                        <label class="text-primary" for="">Title:</label>
                                        <input type="text" value="<?php echo $rows['title'] ?>" name="title" class="form-control" placeholder="Enter New Name">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Description:</label>
                                        <input type="text" value="<?php echo $rows['description'] ?>" name="description" class="form-control" placeholder="Enter Your Description">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Capacity:</label>
                                        <input type="text" value="<?php echo $rows['capacity'] ?>" name="capacity" class="form-control" placeholder="Enter Capacity">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Size:</label>
                                        <input type="text" value="<?php echo $rows['size'] ?>" name="size" class="form-control" placeholder="Enter Size">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Image:</label>
                                        <input type="file" name="image1" class="form-control">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Image:</label>
                                        <input type="file" name="image2" class="form-control">
                                    </div>
                                    <button type="submit" name="update"  class="btn btn-primary mt-3">Update!</button>
                                </form>

                                 </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            </div>
</div>
</main>
<?php
include("connection.php");


if(isset($_GET["id"])) {
    $ID = $_GET["id"];
    $sql = "SELECT * FROM events WHERE id = $ID";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
} else {
    // Handle case where no ID is provided in URL
    exit("ID not provided");
}

if(isset($_POST['update'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);

    $image1 = $_FILES['image1']['name'];
    $image_tmp = $_FILES['image1']['tmp_name'];
    $upload_directory = "image_events/";
    if (!empty($image1)) {
        move_uploaded_file($image_tmp, $upload_directory . $image1);
    }
    $image2 = $_FILES['image2']['name'];
    $image_tmp = $_FILES['image2']['tmp_name'];
    $upload_directory = "image_events/";
    if (!empty($image2)) {
        move_uploaded_file($image_tmp, $upload_directory . $image2);
    }


    $id = $_GET['id'];
    $sql = "UPDATE events SET title = '$title', size = '$size', description = '$description', image1 = '$image1' , image2 = '$image2' , capacity = '$capacity' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('Events Venue updated successfully!');</script>";
        echo "<script>window.location.href='add_venue.php';</script>";
    } else {
        echo "<script>alert('Error occurred while updating Events Venue');</script>";
    }
}

include("footer.php");
?>