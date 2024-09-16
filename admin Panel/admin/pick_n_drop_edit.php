<?php
include("connection.php");
include("header.php");

$ID = $_GET["id"];
$sql = "select * from pick_n_drop where id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>

<main class="app-content">
<div class="app-title">
        <h1 class="display-3 text-primary">
        Pick N Drop Edit <i class="fa-solid fa-pen-to-square"></i>
        </h1>
    </div>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
        <div  class="content-body">
            
            <div class="container-fluid mt-5 col-lg-12">
                                <div class="tile">
                                <div class="basic-form">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-grp">
                                        <label class="text-primary" for="">Category:</label>
                                        <input type="text" value="<?php echo $rows['name'] ?>" name="name" class="form-control" placeholder="Enter New Name">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Rent:</label>
                                        <input type="text" value="<?php echo $rows['rent'] ?>" name="rent" class="form-control" placeholder="Enter Your About">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Image:</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <button type="submit" name="update" class="btn mt-3 btn-primary">Update!</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
include("connection.php");


if(isset($_GET["id"])) {
    $ID = $_GET["id"];
    $sql = "SELECT * FROM pick_n_drop WHERE id = $ID";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
} else {
    // Handle case where no ID is provided in URL
    exit("ID not provided");
}

if(isset($_POST['update'])){
    $title = $_POST['name'];
    $about = $_POST['rent'];
    // File upload handling
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_directory = "image_pick_n_drop/";

    if(!empty($image)) {
        move_uploaded_file($image_tmp, $upload_directory . $image);
    } else {
        // Handle case where no new image is uploaded (optional)
    }

    $id = $_GET['id'];
    $sql = "UPDATE pick_n_drop SET name = '$title', rent = '$about', image = '$image' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>swal('Good job!', 'Service Updated Successfully!', 'success').then(() => {
                window.location.href = 'pickndrop.php';
            });
</script>";
    } else {
        echo "<script> swal('Oops!', 'Error occurred while updating   Service ', 'error');</script>";
    }
}

include("footer.php");
?>
