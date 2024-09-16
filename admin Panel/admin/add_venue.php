<?php
include("header.php");
include("connection.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    .modal-dialog {
        max-width: 80%; /* Adjusts the width of the modal */
    }
</style>
<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">
            <i class="fa-solid fa-building-user"></i> Venues
        </h1>
    </div>
<!-- MODAL WORK START -->
<div class="p-md-0 justify-content-sm-end mt-2 d-flex">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
     Add Venue
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Added modal-lg class for larger size -->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-primary fw-bold" id="exampleModalLabel">Add Venue</h3>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-grp">
                            <label class="text-primary" for="title">Title:</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title!" required>
                        </div>
                        <div class="form-grp mt-3">
                            <label class="text-primary" for="size">Size:</label>
                            <input type="text" id="size" name="size" class="form-control" placeholder="Enter size!" required>
                        </div>
                        <div class="form-grp mt-3">
                            <label class="text-primary" for="description">Description:</label>
                            <input type="text" id="description" name="description" class="form-control" placeholder="Enter description" required>
                        </div>
                        <div class="form-grp mt-3">
                            <label class="text-primary" for="capacity">Capacity:</label>
                            <input type="text" id="capacity" name="capacity" class="form-control" placeholder="Enter capacity" required>
                        </div>
                        <div class="form-grp mt-3">
                            <label class="text-primary" for="image">Image:</label>
                            <input type="file" id="image" name="image1" class="form-control" placeholder="Add Image" required>
                        </div>
                        <div class="form-grp mt-3">
                            <label class="text-primary" for="image">Image:</label>
                            <input type="file" id="image" name="image2" class="form-control" placeholder="Add Image" required>
                        </div>
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i>Add!
                        </button>
                    </form>
                </div>

                <?php
                if (isset($_POST['submit'])) {
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

                    $sql = "INSERT INTO events (title, image1, image2, size , description , capacity) VALUES ('$title', '$image1', '$image2', '$size' , '$description' , '$capacity')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<script>
                        swal('Good job!', 'Venue Added successfully!', 'success')
                            setTimeout(function(){
                                window.location.href='add_venue.php';
                            }, 3000);
                            </script>";
                    } else {
                        echo "<script>
                        swal('Oops!', 'Error adding Venue!', 'error');
                            </script>";
                    }
                }
                ?>
            </div>
            <div class="modal-footer">
            </div>
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
                                <th>Image</th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Description</th>
                                <th>Capacity</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM events";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['title']; ?></td>
                                    <td><img src="image_events/<?php echo $rows['image1']; ?>" height="100px" width="100px"></td>
                                    <td><img src="image_events/<?php echo $rows['image2']; ?>" height="100px" width="100px"></td>

                                    <td><?php echo $rows['size']; ?></td>
                                    <td><?php echo $rows['description']; ?></td>
                                    <td><?php echo $rows['capacity']; ?></td>


                                    <td>
                                        <a href="events_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="events_edit.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
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
