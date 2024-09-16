<?php
include("header.php");
include("connection.php");

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>






<main class="app-content">
  <div class="app-title"><h1 class="display-3 text-primary"><i class="fa fa-pizza-slice"></i>Menu Card</h1></div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover " id="sampleTable">
                <thead>
                  <tr class="text-primary">
                  <th>Id</th>
                                <th>Email</th>
                                <th>Room</th>
                                <th>Menu</th>
                                <th>Total Amount</th>
                                <th>Message</th>
                                <th>Card Number</th>
                                <th>Card Company</th>
                                <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                            <?php
                            $sql = "SELECT * FROM menu_card";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($rows['id']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['email']); ?></td>
                               
                                    <td><?php echo htmlspecialchars($rows['room_title']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['menu']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['total_amount']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['message']); ?></td>

                                    <td><?php echo htmlspecialchars($rows['card_number']); ?></td>
                                    <td><?php echo htmlspecialchars($rows['card_company']); ?></td>



                                    <td>
                                        <a href="menu.delete.php?id=<?php echo htmlspecialchars($rows['id']); ?>" class="mx-5 text-primary">
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
  <?php
                    if (isset($_POST['submit'])) {
                        $menu = mysqli_real_escape_string($conn, $_POST['menu']);
                        $sql = "INSERT INTO menu (menu) VALUES ('$menu')";

                        if (mysqli_query($conn, $sql)) {
                            echo "<script>
                            swal('Good job!', 'Menu successfully!', 'success')
                                setTimeout(function(){
                                    window.location.href='menu.php';
                                }, 3000);
                                </script>";
                        } else {
                            echo "<script>
                            swal('Oops!', 'Error adding Menu!', 'error');
                                </script>";
                        }
                    }
                    ?>