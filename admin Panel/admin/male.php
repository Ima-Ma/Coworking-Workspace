<?php
    include("header.php");
    include("connection.php");
?>
<link rel="stylesheet" href="service.css">
<main class="app-content">
    <div class="app-title"><h1 class="display-3 text-primary">
        <i class="fa-solid fa-building-user"></i> Male Driver </h1>
    </div>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 ">
                        <a  style="text-decoration: none;"  href="./driver_req_male.php">
                            <div class="card bg-primary text-white">
                                <div class="stat-widget-two card-body">
                                    <div class="stat-content">
                                        <h3>Driver Request</h3>
                                            <div class="stat-digit">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-8 ">
                    <table class="table table-hover table-bordered"  id="sampleTable">
                        <thead>
                            <tr class="text-primary">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>License pdf</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM male where status = 1 ";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['name']; ?></td>
                                    <td><?php echo $rows['email']; ?></td>
                                    <td><?php echo $rows['age']; ?></td>
                                    <td><a href="../../User Panel/<?php echo $rows['pdf']; ?>" target="_blank">View PDF</a></td>
                                    <td><img src="../../User Panel/<?php echo $rows['image']; ?>" height="80px" width="100px"></td>

                                    <td>
                                        <a href="male_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
                                            <i class="fa-solid fa-trash"></i>
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
