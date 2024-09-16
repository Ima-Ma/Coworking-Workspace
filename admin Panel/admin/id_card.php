<?php 
include("header.php");
include './connection.php';
// BackEnd start
$html = '';
if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $sql = "SELECT * FROM membership WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = htmlspecialchars($row["name"]);
            $address = htmlspecialchars($row['address']);
            $dob = htmlspecialchars($row['dob']);
            $phone = htmlspecialchars($row['phone']);
            $email = htmlspecialchars($row['email']);
            $gender = htmlspecialchars($row['gender']);
            // card start
            $html = "
                <div class='card p-5' id='membership-card' style='border-radius: 10px; background: linear-gradient(to right, #000000d0, #00268d88 );'>
                    <div class='header' style='padding: 10px; text-align: center;'>
                        <div class='row'>
                            <div class='box-1 col-lg-3' style='flex: 1;'>
                                <img src='profile.png' alt='Profile Image' style='width: 100px; height: 100px; border-radius: 50%;'/>
                            </div>
                            <div class='col-lg-9 text-white'>
                                <h2>$name</h2>
                                <p style='font-size: 14px;'>Member Of Kaam Ka کاروان</p>
                            </div>
                        </div>
                    </div>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-lg-3 text-white'>
                                <h6>Address</h6>
                                <p>$address</p>
                            </div>
                            <div class='col-lg-3 text-white'>
                                <h6>Contact Number</h6>
                                <p>$phone</p>
                            </div>
                            <div class='col-lg-3 text-white'>
                                <h6>Gender</h6>
                                <p>$gender</p>
                            </div>
                            <div class='col-lg-3 text-white'>
                                <p style='font-size:12px;'>Signature</p>
                                <p style='font-family: dancing script;'>Kaam Ka Caravan</p>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
    }
}
?>
 <!-- BackEnd end -->
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
<!-- FrontEnd start -->
<main class="app-content">
    <div class="app-title">
        <h1 class="display-3 text-primary">Generate Membership Card</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <?php
                $ID = intval($_GET["id"]);
                $stmt = $conn->prepare("SELECT * FROM membership WHERE id = ?");
                $stmt->bind_param("i", $ID);
                $stmt->execute();
                $result = $stmt->get_result();
                $rows = $result->fetch_assoc();
                ?>
               
                <form class="form" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($rows['name']); ?>">
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($rows['email']); ?>" class="form-control">
                    <br>
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($rows['phone']); ?>" class="form-control">
                    <br>
                    <label for="dob">DOB:</label>
                    <input type="text" name="dob" id="dob" value="<?php echo htmlspecialchars($rows['dob']); ?>" class="form-control">
                    <br>
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($rows['address']); ?>" class="form-control">
                    <br>
                    <button type="submit" name="send" class="btn btn-primary">Generate Card!</button>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Here is your Membership Card</div>
                <div class="card-body" id="mycard">
                    <?php echo $html ?>
                </div>
                <br>
                <button id="download-btn" class="btn btn-primary">Download Card</button>
            </div>
        </div>
    </div>
    <hr>
<!-- FrontEnd end -->

    <script>
    document.getElementById('download-btn').addEventListener('click', function() {
        var node = document.getElementById('membership-card');
        if (!node) {
            console.error('No element found with id "membership-card".');
            return;
        }
        domtoimage.toPng(node)
            .then(function (dataUrl) {
                var link = document.createElement('a');
                link.download = 'membership-card.png';
                link.href = dataUrl;
                document.body.appendChild(link); 
                link.click();
                document.body.removeChild(link); 
            })
            .catch(function (error) {
                console.error('Error generating image:', error);
            });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
