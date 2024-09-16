<?php
include("header.php");
include("connection.php");
?>
<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">Workday Bites Edit <i class="fa-solid fa-pen-to-square"></i></h1>
    </div>
    <br><br>
    <div class="row mx-auto">
        <div class="col-lg-12">
            <div class="form-group">
                <div class="tile">
                    <form method="POST">
                        <?php
                        $ID = $_GET["id"];
                        $sql = "SELECT * FROM menu WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('i', $ID);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($rows = $result->fetch_assoc()) {
                        ?>
                        <label class="text-primary" for="menu">Menu</label>
                        <input type="text" name="menu" class="form-control" value="<?php echo htmlspecialchars($rows['menu'], ENT_QUOTES); ?>" placeholder="Update your menu">
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
    $menu = $_POST['menu'];
    $stmt = $conn->prepare("UPDATE menu SET menu = ? WHERE id = ?");
    $stmt->bind_param('si', $menu, $ID); 
    if ($stmt->execute()) {
        echo "<script> 
        swal('Good job!', 'Menu Updated Successfully!', 'success')
        .then(() => {
            window.location.href='menu.php';
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
