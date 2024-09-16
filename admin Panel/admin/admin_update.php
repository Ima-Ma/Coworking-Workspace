<?php
include("header.php");
include("connection.php");
?>
<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">Admin Details Edit <i class="fa-solid fa-pen-to-square"></i></h1>
    </div>
    <br><br>
    <div class="row mx-auto">
        <div class="col-lg-12">
            <div class="form-group">
                <div class="tile">
                    <form method="POST">
                        <?php
                        $ID = $_GET["id"];
                        $sql = "SELECT * FROM login WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('i', $ID);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($rows = $result->fetch_assoc()) {
                        ?>
                        <label class="text-primary" for="name">Admin Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($rows['username'], ENT_QUOTES); ?>" placeholder="Update your name">
                        <br>
                        <label class="text-primary" for="email">Admin Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($rows['email'], ENT_QUOTES); ?>" placeholder="Update your email">
                        <br>
                        <?php } ?>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
if (isset($_POST['update'])) {
    $ID = $_GET["id"];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("UPDATE login SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param('ssi', $name, $email, $ID);
    if ($stmt->execute()) {
        echo "<script> 
        swal('Good job!', 'Admin Updated Successfully!', 'success')
        .then(() => {
            window.location.href='admin.php';
        });
        </script>";
    } else {
        echo "<script> 
        swal('Oops!', 'Something went wrong!', 'error');
        </script>";
    }
    $stmt->close();
}
include("footer.php");
?>
