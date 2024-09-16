<?php
    include("header.php");
    include("connection.php");
    use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mushtaqueimama@gmail.com';
        $mail->Password   = 'llfegxrlynyzregx'; // Consider using environment variables for security
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('mushtaqueimama@gmail.com', 'Kaam Ka Caravan');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Membership Card';
        $mail->Body    = "
        Your Kaam Ka Caravan membership card has just made its way to your WhatsApp inbox!Get ready to embark on a journey of exclusive perks and exciting opportunities. Thanks for being part of our community—let’s hit the road to success together! ";
        $mail->send();

        // Update the status in the database
        $updateSql = "UPDATE membership SET status = 1 WHERE id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        echo "<script>
            window.location.href='membership.php';
        </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<main class="app-content">
  <div class="app-title"><h1 class="display-3 text-primary"><i class="fa-solid fa-user-tie"></i> Membership Request</h1></div>
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
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Card Num</th>
                    <th>Amount</th>
                    <th>Email</th>
                    <th>Card</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      $sql = "select * from membership where status = 0";
                      $result = mysqli_query($conn, $sql);
                      while($rows = mysqli_fetch_assoc($result)){
                    ?>
                      <td><?php echo $rows['id'];?></td>
                      <td><?php echo $rows['name'];?></td>
                      <td><?php echo $rows['email'];?></td>
                      <td><?php echo $rows['dob'];?></td>
                      <td><?php echo $rows['phone'];?></td>
                      <td><?php echo $rows['address'];?></td>
                      <td><?php echo $rows['gender'];?></td>
                      <td><?php echo $rows['card_number'];?></td>
                      <td><?php echo $rows['amount'];?></td>
                      <td>
                      <i class="mx-5 fa-solid text-primary fa-user-check accept" data-bs-toggle="modal" data-bs-target="#exampleModal" data-email="<?php echo $rows['email']; ?>" data-id="<?php echo $rows['id']; ?>"></i>
                      </td>
                      <td><a href="id_card.php?id=<?php echo $rows['id'];?>" class=" text-primary"><i class="fa-regular fa-address-card"></i></a></td>
                  


                  </tr>
                   <?php } ?>
                   <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const icons = document.querySelectorAll('.accept');
        const nameInput = document.getElementById('name');
        const userIdInput = document.getElementById('user_id');

        icons.forEach(icon => {
            icon.addEventListener('click', function() {
                const clickedId = this.getAttribute('data-id');
                const email = this.getAttribute('data-email');

                nameInput.value = email;
                userIdInput.value = clickedId;
            });
        });
    });
</script>                        
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Modal Work Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fw-bold text-primary" id="exampleModalLabel">Send Verification Code!</h3>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-grp">
                            <label class="text-primary" for="name">Email:</label>
                            <input type="text" class="form-control" name="email" id="name">
                        </div>
                        <button type="submit" name="send" class="btn mt-3 btn-primary fw-bold">Send Approval Code!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Work End -->
<?php
    include("footer.php");
?>