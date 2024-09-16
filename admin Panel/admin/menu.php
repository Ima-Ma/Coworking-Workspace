<?php
include("header.php");
include("connection.php");

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">
            <i class="fa-solid fa-building-user"></i>  Workspace Private Dining 
        </h1>
    </div>

    <!-- MODAL WORK START -->
    <div class="p-md-0 justify-content-sm-end mt-2 d-flex">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Menu
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary fw-bold" id="exampleModalLabel">Add Menu</h3>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST">
                            <div class="form-grp mt-3">
                                <label class="text-primary" for="menu">Menu:</label>
                                <input type="text" id="menu" name="menu" class="form-control" placeholder="Add Menu" required>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i> Add!
                            </button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL WORK END -->

    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover" id="sampleTable">
                        <thead>
                            <tr class="text-primary">
                                <th>Id</th>
                                <th>Menu</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM menu";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($rows['id']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['menu']); ?></td>
                                    <td>
                                        <a href="menu_delete.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="menu_edit.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
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
        <a  style="text-decoration: none;"  href="./workday_bites.php">
                            <div class="card bg-primary text-white"> 
                                <div class="stat-widget-two card-body">
                                    <div class="stat-content">
                                        <h3>Workday Bites Record</h3>
                                            <div class="stat-digit">
                                            <i class="fa-solid fa-calendar-check"></i>
                                            </div>
                                    </div>
                                    <div class="description">
                                        <p>keep track of reservations for your hotel ensuring a smooth operation. This book use to manage all your reservations easily.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
        </div>
    </div>
</main>

<?php
include("footer.php");
?>
  <?php
                    if (isset($_POST['submit'])) {
                        $menu = mysqli_real_escape_string($conn, $_POST['menu']);
                        $sql = "INSERT INTO menu (menu) VALUES ('$menu')";

                        if (mysqli_query($conn, $sql)) {
                            echo "<script>
                            swal('Good job!', 'Menu successfully!', 'success')
                                setTimeout(function(){
                                    window.location.href='menu.php';
                                }, 3000);
                                </script>";
                        } else {
                            echo "<script>
                            swal('Oops!', 'Error adding Menu!', 'error');
                                </script>";
                        }
                    }
                    ?>