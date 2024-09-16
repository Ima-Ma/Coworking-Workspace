<?php
    include("header.php");
    include("connection.php");
?>
<main class="app-content">
  <div class="app-title"><h1 class="display-3 text-primary"><i class="fa-solid fa-user-tie"></i> Admin Details</h1></div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover " id="sampleTable">
                <thead>
                  <tr class="text-primary">
                    <th>Id</th>
                    <th>Admin Name</th>
                    <th>Admin Email</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      $sql = "select * from login";
                      $result = mysqli_query($conn, $sql);
                      while($rows = mysqli_fetch_assoc($result)){
                    ?>
                      <td><?php echo $rows['id'];?></td>
                      <td><?php echo $rows['username'];?></td>
                      <td><?php echo $rows['email'];?></td>
                      <td><a href="admin_update.php?id=<?php echo $rows['id'];?>" class="mx-5 text-primary"> <i  class="fa-solid fa-pen-to-square"></i></a></td>
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