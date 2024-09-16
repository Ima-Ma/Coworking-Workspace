<?php
    include("header.php");
    include("connection.php");
?>

<main class="app-content">
  <div class="app-title"><h1 class="display-3 text-primary"><i class="fa-solid fa-user-tie"></i> Membership </h1></div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover " id="sampleTable">
                <thead>
                  <tr class="text-primary">
                    <th>Id</th>
                    <th> Name</th>
                    <th> Email</th>
                    <th>Date Of Birth</th>
                    <th>Phone</th>
                    <th>Post Code</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Card Num</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      $sql = "select * from membership
                      ";
                      $result = mysqli_query($conn, $sql);
                      while($rows = mysqli_fetch_assoc($result)){
                    ?>
                      <td><?php echo $rows['id'];?></td>
                      <td><?php echo $rows['name'];?></td>
                      <td><?php echo $rows['email'];?></td>
                      <td><?php echo $rows['dob'];?></td>
                      <td><?php echo $rows['phone'];?></td>
                      <td><?php echo $rows['post_code'];?></td>
                      <td><?php echo $rows['address'];?></td>
                      <td><?php echo $rows['gender'];?></td>
                      <td><?php echo $rows['card_number'];?></td>
                      <td><?php echo $rows['amount'];?></td>

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