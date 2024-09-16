<?php
include("header.php");
include("connection.php");

$ID = isset($_GET["id"]) ? intval($_GET["id"]) : 0; // Sanitize ID

$sql = "SELECT * FROM ourteam_job WHERE id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>

<main class="app-content">
<div class="content-body">
    <div class="container">
        <div class="card text-dark">
            <div class="card-header">
                <h3 class="text-primary text-center">Send Messages <i class="fa-solid fa-message"></i></h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($rows['name']); ?>" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($rows['email']); ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($rows['phone']); ?>" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inter_time" class="form-label">Timing</label>
                            <input type="text" name="inter_time" id="inter_time" placeholder="Enter Interview Timing" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="selection" class="form-label">Selection</label>
                            <select name="selection" id="selection" class="form-control mt-2" required>
                                <option value="" disabled selected>Select an option</option>
                                <option value="Selected">Selected</option>
                                <option value="Not Selected">Not Selected</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inter_date" class="form-label">Interview Date</label>
                            <input type="date" name="inter_date" id="inter_date" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Generate Report</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

<?php
if (isset($_POST['submit'])) {
    // Sanitize input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $status = mysqli_real_escape_string($conn, $_POST['selection']);
    $date = mysqli_real_escape_string($conn, $_POST['inter_date']);
    $time = mysqli_real_escape_string($conn, $_POST['inter_time']);

    // Insert into job_report table
    $insertSql = "INSERT INTO job_report (name, email, phone, selection, inter_date, inter_time) VALUES ('$name', '$email', '$phone', '$status', '$date', '$time')";
    if (mysqli_query($conn, $insertSql)) {
        // Update the status in the ourteam_job table
        $updateSql = "UPDATE ourteam_job SET status = 1 WHERE id = $ID";
        if (mysqli_query($conn, $updateSql)) {
            echo "<script>
            alert('Report generated  successfully!');
            window.location.href='job.php';
            </script>";
        } else {
            echo "<script>
            alert('Report generated but status update failed.');
            </script>";
        }
    } else {
        echo "<script>
        alert('Error: Could not execute query.');
        </script>";
    }
}
?>

<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
