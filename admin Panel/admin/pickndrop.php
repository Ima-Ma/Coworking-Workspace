<?php
include("header.php");
include("connection.php");
?>

<!-- Include necessary scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">
            <i class="fa-solid fa-building-user"></i> Workspace Pick N Drop 
        </h1>
    </div>

    <!-- Add Service Details Button -->
    <div class="p-md-0 justify-content-sm-end mt-2 d-flex">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Service Details
        </button>
    </div>

    <!-- Modal for Adding Service Details -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary fw-bold" id="exampleModalLabel">Add Service Details</h3>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <label class="text-primary" for="name">Vehicle Category Name:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Category Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="text-primary" for="name">Vehicle Rent:</label>
                                <input type="text" id="rent" name="rent" class="form-control" placeholder="Rent" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="text-primary" for="image">Vehicle Category Image:</label>
                                <input type="file" id="image" name="image" class="form-control" required>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i> Add!
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vehicle Categories Table -->
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover" id="sampleTable">
                        <thead>
                            <tr class="text-primary">
                                <th>Id</th>
                                <th>Vehicle Categories</th>
                                <th>Image</th>
                                <th>Rent</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM pick_n_drop";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['name']; ?></td>
                                    <td><img src="image_pick_n_drop/<?php echo $rows['image']; ?>" height="80px" width="100px"></td>
                                    <td><?php echo $rows['rent']; ?></td>

                                    <td>
                                        <a href="pick_n_drop_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="pick_n_drop_edit.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a style="text-decoration: none; height:500px;" href="./detail.php">
                <div class="card bg-primary text-white"> 
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <h3>Pick N Drop Record</h3>
                            <div class="stat-digit">
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                        </div>
                        <div class="description">
                            <p>Keep track of reservations for your hotel ensuring a smooth operation. This book helps manage all your reservations easily.</p>
                        </div>
                    </div>
                </div>
            </a>
            <div class="row">
                <div class="col-lg-6">
                 <a href="./female.php">
                 <div class="card mt-3 bg-white "> 
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <h5 class="text-primary">Female Driver</h3>
                            </div>
                            <div class="description">
                            <img class="img-fluid w-100" src="https://cdn-icons-png.flaticon.com/512/81/81392.png" alt="">
                                
                            </div>
                        </div>
                    </div>
                 </a>
                </div>
                <div class="col-lg-6">
                    <a href="./male.php">
                    <div class="card mt-3 bg-white "> 
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <h5 class="text-primary">Male Driver</h5>
                                
                            </div>
                            <div class="description">
                            <img class="img-fluid w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3HdBqVDU45zUIDYvJbH1QE2kosJ0VrH0KEXee3n33PnskjPbyvDAUWYrChTGjCXHA2cc&usqp=CAU" alt="">

                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include("footer.php");
?>

<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rent = mysqli_real_escape_string($conn, $_POST['rent']);

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_directory = "image_pick_n_drop/";

    // Ensure the upload directory exists
    if (!is_dir($upload_directory)) {
        mkdir($upload_directory, 0777, true);
    }

    // Check if image is selected
    if (!empty($image)) {
        $image_path = $upload_directory . basename($image);
        // Move uploaded file to target directory
        if (move_uploaded_file($image_tmp, $image_path)) {
            $sql = "INSERT INTO pick_n_drop (name, image , rent) VALUES ('$name', '$image', '$rent')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>
                    swal('Good job!', 'Category added successfully!', 'success')
                    .then(() => window.location.href = 'pickndrop.php');
                    </script>";
            } else {
                echo "<script>swal('Oops!', 'Error adding category!', 'error');</script>";
            }
        } else {
            echo "<script>swal('Oops!', 'Failed to upload image!', 'error');</script>";
        }
    } else {
        echo "<script>swal('Warning!', 'Please select an image to upload!', 'warning');</script>";
    }
}
?>
