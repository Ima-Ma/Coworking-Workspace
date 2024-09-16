<?php
    include("header.php");
    include("connection.php");
?>
<main class="app-content">
  <div class="app-title"><h1 class="display-3 text-primary"><i class="fa-solid fa-user-tie"></i> Send Documents</h1></div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover " id="sampleTable">
                <thead>
                  <tr class="text-primary">
                    <th>Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Room Title</th>
                    <th>Number Of Days</th>
                    <th>Total Amount</th>
                    <th>Card Number</th>
                    <th>Card Company</th>
                    <th>Download</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      $sql = "select * from bookings ";
                      $result = mysqli_query($conn, $sql);
                      while($rows = mysqli_fetch_assoc($result)){
                    ?>
                      <td><?php echo $rows['id'];?></td>
                      <td><?php echo $rows['name'];?></td>
                      <td><?php echo $rows['email'];?></td>
                      <td><?php echo $rows['title'];?></td>
                      <td><?php echo $rows['days'];?></td>
                      <td><?php echo $rows['price'];?></td>
                      <td><?php echo $rows['card_number'];?></td>
                      <td><?php echo $rows['card_company'];?></td>
                      <td>
                        <a href="pdf.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="text-primary">
                        <i class="fa-solid fa-download"></i>
                        </a>
                      </td>
                      <td>
                        <a href="email.php?id=<?php echo $rows['id']; ?>" class="mx-5 text-primary">
                            <i class="fa-solid fa-message"></i>
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