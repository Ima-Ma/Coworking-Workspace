<?php
include("header.php");
include("connection.php");
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1 class="text-primary"><i class="fa fa-th-list"></i> Users Details</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover" id="sampleTable">
                        <thead>
                            <tr class="text-primary">
                                <th>Id</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Password</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM user_login";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['username']; ?></td>
                                    <td><?php echo $rows['user_email']; ?></td>
                                    <td>**************</td>
                                    <td>
                                        <a href="users_delete.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
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
