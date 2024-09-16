<?php
include("header.php");
include("connection.php");
?>

<main class="app-content">
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                <h3 class="text-primary text-center">Inserted Users<i class="fas fa-users"></i></h1>

                        <h4 class="card-title text-dark"></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-container">
                            <table class="table table-responsive-sm mx-auto text-center">
                                <thead class="text-primary">
                                    <tr >
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Start Date</th>
                                        <th>Phone</th>
                                        <th>CV</th>
                                        <th>Send Message</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM ourteam_job  ";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while ($rows = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($rows['id']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['name']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['email']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['start_date']); ?></td>
                                            <td><?php echo htmlspecialchars($rows['phone']); ?></td>
                                            <td>
                                                <a class="text-dark" href="../../User Panel/../User Panel/upload_us/<?php echo htmlspecialchars($rows['cv']); ?>" target="_blank">
                                                    <i class="text-primary fa-solid fa-download"></i> <?php echo htmlspecialchars($rows['cv']); ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="send_message.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
                                                    <i class="fa-solid fa-message"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="job_delete.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
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
        </div>
    </div>
    

</div>
</main>

<?php
include("footer.php");
?>
