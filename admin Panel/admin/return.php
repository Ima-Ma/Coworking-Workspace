<?php
    include("header.php");
    include("connection.php");
?>
<main class="app-content">
  <div class="app-title"><h1 class="display-3 text-primary"><i class="fa-solid fa-user-tie"></i>Return Policy</h1></div>
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      $sql = "select * from bookings";
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