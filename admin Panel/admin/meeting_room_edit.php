<?php
include("connection.php");
include("header.php");

$ID = $_GET["id"];
$sql = "select * from meeting_office where id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<main class="app-content"> 
<div class="main-panel">
<div class="app-title">
        <h1 class="display-3 text-primary">
             Meeting Rooms Edit <i class="fa-solid fa-pen-to-square"></i>
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
                                        <label class="text-primary" for="">About:</label>
                                        <input type="text" value="<?php echo $rows['about'] ?>" name="about" class="form-control" placeholder="Enter Your About">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Price:</label>
                                        <input type="text" value="<?php echo $rows['price'] ?>" name="price" class="form-control" placeholder="Enter Price">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Image:</label>
                                        <input type="file" name="image" class="form-control">
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
    $sql = "SELECT * FROM meeting_office WHERE id = $ID";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
} else {
    // Handle case where no ID is provided in URL
    exit("ID not provided");
}

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $about = $_POST['about'];
    $price = $_POST['price'];

    // File upload handling
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_directory = "image_meeting/";

    if(!empty($image)) {
        move_uploaded_file($image_tmp, $upload_directory . $image);
    } else {
        // Handle case where no new image is uploaded (optional)
        // You can choose to keep the existing image path in the database if no new image is uploaded.
    }

    $id = $_GET['id'];
    $sql = "UPDATE meeting_office SET title = '$title', about = '$about', price = '$price', image = '$image' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('Meeting Office updated successfully!');</script>";
        echo "<script>window.location.href='meeting_room.php';</script>";
    } else {
        echo "<script>alert('Error occurred while updating Meeting Office');</script>";
    }
}

include("footer.php");
?>