<?php
include("header.php");
include("connection.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">
            <i class="fa-solid fa-building-user"></i> Virtual Office
        </h1>
    </div>
    
    <!-- MODAL WORK START -->
    <div class="p-md-0 justify-content-sm-end mt-2 d-flex">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Add Virtual Office
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary fw-bold" id="exampleModalLabel">Add Virtual Office</h3>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-grp">
                                <label class="text-primary" for="">Title:</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title!">
                            </div>
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="">About:</label>
                                <input type="text" name="about" class="form-control" placeholder="Enter About!">
                            </div>
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="">Price:</label>
                                <input type="text" name="price" class="form-control" placeholder="Enter Price per month">
                            </div>
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="">Image:</label>
                                <input type="file" name="image" class="form-control" placeholder="Add Image">
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i> Add!
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $title = $_POST['title'];
                            $about = $_POST['about'];
                            $price = $_POST['price'];
                            
                            // File upload handling
                            $image = $_FILES['image']['name'];
                            $image_tmp = $_FILES['image']['tmp_name'];
                            $upload_directory = "image_virtual/";
                            
                            if (!empty($image)) {
                                // Move uploaded file to target directory
                                move_uploaded_file($image_tmp, $upload_directory . $image);
                            }
                            
                            // Prepare and execute the insert query
                            $sql = "INSERT INTO virtual_office (title, about, image, price) VALUES (?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param('ssss', $title, $about, $image, $price);
                            
                            if ($stmt->execute()) {
                                echo "<script>
                                swal('Good job!', 'Virtual Office Added successfully!', 'success')
                                    .then(() => {
                                        window.location.href = 'Virtual_office.php';
                                    });
                                </script>";
                            } else {
                                echo "<script>
                                    swal('Oops!', 'Error occurred while adding Virtual Office', 'error');
                                </script>";
                            }
                            
                            $stmt->close();
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- MODAL WORK END -->

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover" id="sampleTable">
                        <thead>
                            <tr class="text-primary">
                                <th>Id</th>
                                <th>Title</th>
                                <th>About</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM virtual_office";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['title']; ?></td>
                                    <td><?php echo $rows['about']; ?></td>
                                    <td><img src="image_virtual/<?php echo $rows['image']; ?>" height="100px" width="100px" alt="Image"></td>
                                    <td><?php echo $rows['price']; ?></td>
                                    <td>
                                        <a href="virtual_office_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="virtual_office_edit.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
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
    </div>
</main>

<?php
include("footer.php");
?>
