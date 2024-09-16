<?php
include("header.php");
include("connection.php");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">
            <i class="fa-solid fa-building-user"></i> Meeting Space
        </h1>
    </div>

    <!-- MODAL WORK START -->
    <div class="p-md-0 justify-content-sm-end mt-2 d-flex">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add Meeting Office
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary fw-bold" id="exampleModalLabel">Add Meeting Office</h3>
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
                                <label class="text-primary" for="about">About:</label>
                                <input type="text" id="about" name="about" class="form-control" placeholder="Enter About!" required>
                            </div>
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="price">Price:</label>
                                <input type="text" id="price" name="price" class="form-control" placeholder="Enter Price per month" required>
                            </div>
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="image">Image:</label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="Add Image" required>
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
                        $about = mysqli_real_escape_string($conn, $_POST['about']);
                        $price = mysqli_real_escape_string($conn, $_POST['price']);
                        $image = $_FILES['image']['name'];
                        $image_tmp = $_FILES['image']['tmp_name'];
                        $upload_directory = "image_meeting/";

                        if (!empty($image)) {
                            move_uploaded_file($image_tmp, $upload_directory . $image);
                        }

                        $sql = "INSERT INTO meeting_office (title, about, image, price) VALUES ('$title', '$about', '$image', '$price')";

                        if (mysqli_query($conn, $sql)) {
                            echo "<script>
                            swal('Good job!', 'Meeting Office Added successfully!', 'success')
                                setTimeout(function(){
                                    window.location.href='meeting_room.php';
                                }, 3000);
                                </script>";
                        } else {
                            echo "<script>
                            swal('Oops!', 'Error adding Meeting Office!', 'error');
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
                                <th>About</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM meeting_office";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['title']; ?></td>
                                    <td><?php echo $rows['about']; ?></td>
                                    <td><img src="image_meeting/<?php echo $rows['image']; ?>" height="100px" width="100px"></td>
                                    <td><?php echo $rows['price']; ?></td>
                                    <td>
                                        <a href="meeting_room_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="meeting_room_edit.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
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

<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
