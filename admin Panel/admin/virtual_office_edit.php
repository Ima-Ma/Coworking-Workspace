<?php
include("connection.php");
include("header.php");

$ID = $_GET["id"];
$sql = "SELECT * FROM virtual_office WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $ID);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_assoc();
?>

<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">
            Virtual Office Edit <i class="fa-solid fa-pen-to-square"></i>
        </h1>
    </div>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="content-body">
                    <div class="container-fluid mt-5 col-lg-12">
                        <div class="basic-form">
                            <div class="tile">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-grp">
                                        <label class="text-primary" for="">Title:</label>
                                        <input type="text" value="<?php echo htmlspecialchars($rows['title'], ENT_QUOTES); ?>" name="title" class="form-control" placeholder="Enter New Name">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">About:</label>
                                        <input type="text" value="<?php echo htmlspecialchars($rows['about'], ENT_QUOTES); ?>" name="about" class="form-control" placeholder="Enter Your About">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Price:</label>
                                        <input type="text" value="<?php echo htmlspecialchars($rows['price'], ENT_QUOTES); ?>" name="price" class="form-control" placeholder="Enter Price">
                                    </div>
                                    <div class="form-grp mt-3">
                                        <label class="text-primary" for="">Image:</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <button type="submit" name="update" class="btn btn-primary mt-3">Update!</button>
                                </form>
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
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $about = $_POST['about'];
    $price = $_POST['price'];
    
    // File upload handling
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_directory = "image_virtual/";

    if (!empty($image)) {
        move_uploaded_file($image_tmp, $upload_directory . $image);
    } else {
        // If no new image is uploaded, use the old image name
        $image = $rows['image'];
    }

    // Prepare and execute the update query
    $sql = "UPDATE virtual_office SET title = ?, about = ?, price = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssii', $title, $about, $price, $image, $ID);

    if ($stmt->execute()) {
        echo "<script>
            swal('Good job!', 'Virtual Office Updated Successfully!', 'success')
            .then(() => {
                window.location.href = 'virtual_office.php';
            });
        </script>";
    } else {
        echo "<script>
            swal('Oops!', 'Error occurred while updating Virtual Office', 'error');
        </script>";
    }
    
    $stmt->close();
}

include("footer.php");
?>
