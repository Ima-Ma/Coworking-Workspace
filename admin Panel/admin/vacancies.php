<?php
include("header.php");
include("connection.php");
?>

<main class="app-content">
    <div class="app-title">
        <h1 class="text-primary"><i class="fa-solid fa-circle-check"></i> All Vacancies</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover" id="sampleTable">
                        <thead>
                            <tr class="text-primary">
                                <th>Id</th>
                                <th>Office Name</th>
                                <th>Job Title</th>
                                <th>Experience</th>
                                <th>About</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM vacancies";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['office_name']; ?></td>
                                    <td><?php echo $rows['job_title']; ?></td>
                                    <td><?php echo $rows['experience']; ?></td>
                                    <td><?php echo $rows['about']; ?></td>
                                    <td>
                                        <img src="image/<?php echo $rows['image']; ?>" height="100px" width="100px">
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
