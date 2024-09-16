<!DOCTYPE html>
<html>
	<head>
		<title> Stripe Payment Gateway Integration in PHP </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/stripe.css">
	</head>

	<div class="container">
		<h2 style="text-align: center; color: blue;">Stripe Payment Gateway Integration in PHP </h2>
		<h4 style="text-align: center;">This is - Stripe Payment Success URL </h4>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="status">
					<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
				
					<h4 class="heading">Payment Information - </h4>
					<br>
					<p><b>Reference ID:</b> <strong><?php echo $id; ?></strong></p>
					<p><b>Transaction ID:</b> <?php echo $paymentid; ?></p>
					<p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?> ($<?php echo $price;?>.00)</p>
					<p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
					<h4 class="heading">Product Information - </h4>
					<br>
					<p><b>Name:</b> <?php echo $title; ?></p>
					<p><b>Price:</b> <?php echo $price.' '.$currency; ?> ($<?php echo $price;?>.00)</p>
				</div>
				<a href="index.php" class="btn-continue">Back to Home</a>
			</div>
		</div>
	</div>
</html>



<form action="stripe_payment.php" method="POST" name="cardpayment" id="payment-form">
<?php
        $ID = $_GET["id"];
        $sql = "SELECT * FROM meeting_office WHERE id = $ID";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result);
    ?>
  
  <div class="mb-3 mt-3">
	 <label for="email">Name:</label>
	 <input type="text" class="form-control" id="email" placeholder="Enter name" name="name">
   </div>
 
   <div class="mb-3 mt-3">
	 <label for="email">Email:</label>
	 <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
   </div>
  
   <div class="mb-3 mt-3">
	 <label for="email">Course:</label>
	 <input type="text" class="form-control" id="email" placeholder="Enter course" name="course">
   </div>
   
	 <div class="mb-3 mt-3">
	 <label for="email">Fees Amount:</label>
	 <input type="text" class="form-control" id="email" placeholder="Enter course" name="amount">
   </div>
   
	<div class="row">
								   <div class="col-xs-12">
									   <div class="form-group">
										   <label for="cardNumber">CARD NUMBER</label>
										   <div class="input-group">

											   <input type="text" class="form-control" name="card_number" placeholder="Valid Card Number" autocomplete="cc-number" id="card_number" maxlength="16" data-stripe="number" required />
											   <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
										   </div>
									   </div>                            
								   </div>
							   </div>
							   <div class="row">

								   <div class="col-xs-4 col-md-4">
									   <div class="form-group">
										   <label for="cardExpiry"><span class="visible-xs-inline">MON</span></label>
										   <select name="card_exp_month" id="card_exp_month" class="form-control" data-stripe="exp_month" required>
											   <option>MON</option>
											   <option value="01">01 ( JAN )</option>
											   <option value="02">02 ( FEB )</option>
											   <option value="03">03 ( MAR )</option>
											   <option value="04">04 ( APR )</option>
											   <option value="05">05 ( MAY )</option>
											   <option value="06">06 ( JUN )</option>
											   <option value="07">07 ( JUL )</option>
											   <option value="08">08 ( AUG )</option>
											   <option value="09">09 ( SEP )</option>
											   <option value="10">10 ( OCT )</option>
											   <option value="11">11 ( NOV )</option>
											   <option value="12">12 ( DEC )</option>
										   </select>
									   </div>
								   </div>

								   <div class="col-xs-4 col-md-4">
									   <div class="form-group">
										   <label for="cardExpiry"><span class="visible-xs-inline">YEAR</span></label>
										   <select name="card_exp_year" id="card_exp_year" class="form-control" data-stripe="exp_year">
											   <option>Year</option>
											   <option value="20">2020</option>
											   <option value="21">2021</option>
											   <option value="22">2022</option>
											   <option value="23">2023</option>
											   <option value="24">2024</option>
											   <option value="25">2025</option>
											   <option value="26">2026</option>
											   <option value="27">2027</option>
											   <option value="28">2028</option>
											   <option value="29">2029</option>
											   <option value="30">2030</option>
											   <option value="31">2031</option>
											   <option value="32">2032</option>
											   <option value="33">2033</option>
											   <option value="34">2034</option>
											   <option value="35">2035</option>
										   </select>
									   </div>
								   </div>
								   <div class="col-xs-4 col-md-4 pull-right">
									   <div class="form-group">
										   <label for="cardCVC">CV CODE</label>
										   <input type="password" class="form-control" name="card_cvc" placeholder="CVC" autocomplete="cc-csc" id="card_cvc" required />
									   </div>
								   </div>
							   </div>
  
  
   <button type="submit" id="payBtn" class="btn btn-primary">Submit</button>
 </form>



 <!-- correct stripe code  -->
 <?php
include("connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $days = (int)$_POST['days'];
    $card_number = $_POST['card_number'];

    // Fetch the room price from the database based on the title
    $sql_room = "SELECT price FROM meeting_office WHERE title = '$title'";
    $result_room = mysqli_query($conn, $sql_room);

    if ($result_room && mysqli_num_rows($result_room) > 0) {
        $room = mysqli_fetch_assoc($result_room);
        $price_per_day = (float)$room['price'];
        
        // Calculate the total price based on the number of days
        $total_price = $price_per_day * $days;

        // Convert price to USD (assuming 1 unit of local currency = 0.01 USD for example)
        $total_price_in_usd = $total_price * 0.01;

        // Insert user into the database if not exists
        // $sql_user = "INSERT INTO users (name, email) VALUES ('$name', '$email') ON DUPLICATE KEY UPDATE name = '$name'";
        // mysqli_query($conn, $sql_user);
        // $user_id = mysqli_insert_id($conn) ? mysqli_insert_id($conn) : mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'")->fetch_assoc()['id'];

        // Get room ID based on title
        // $sql_room_id = "SELECT id FROM meeting_office WHERE title = '$title'";
        // $room_result = mysqli_query($conn, $sql_room_id);
        // if ($room_result && mysqli_num_rows($room_result) > 0) {
        //     $room_id = mysqli_fetch_assoc($room_result)['id'];
        // } else {
        //     die("Error: Room not found.");
        // }

        // Insert booking into the database
        $sql_booking = "INSERT INTO bookings (name , email , title, days, price, card_number) VALUES ('$name','$email','$title', '$days', '$total_price_in_usd', '$card_number')";
        if (mysqli_query($conn, $sql_booking)) {
            echo "Booking successfully added to the database.";
        } else {
            echo "Error: " . $sql_booking . "<br>" . mysqli_error($conn);
        }

        // Proceed with Stripe payment processing
        require_once('stripe-php/init.php');
        \Stripe\Stripe::setApiKey('sk_test_51Pjd5PP9xEb2XtZW8SL9P1oH7zS2JgbMi8z03IqDn4wxTvVGeptxeuooSJFFXD0cLYzfOUa2Gy1VM0cdEHPxaw2600y0bBWTS6'); // Replace with your actual secret key

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $total_price_in_usd * 100, // Amount in cents
                'currency' => 'usd',
                'source' => $_POST['stripeToken'],
                'description' => 'Meeting Room Booking',
            ]);
            echo "Payment successful.";
        } catch (\Stripe\Exception\CardException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: Room not found.";
    }
}
?>



<!-- booking correct code -->
<?php
include("header.php");
include("connection.php");
?>
<style>
    .modal-header {
  background-color: #007bff;
  color: white;
  border-bottom: 1px solid #007bff;
}

.modal-content {
  border-radius: 10px;
  overflow: hidden;
}

.modal-body {
  padding: 20px;
}

.form-control {
  border-radius: 5px;
}

.form-select {
  border-radius: 5px;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  border-radius: 5px;
}

.btn-close {
  background-color: white;
  border: none;
}

.input-group-text {
  background-color: #007bff;
  color: white;
}

</style>
<div class="container-fluid bg-primary py-5 bg-header2">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Book Your Flexible Workspace</h1>
                    <a href="" class="h5 text-white">Kaam Ka کاروان</a>
               
                </div>
            </div>
        </div>
    </div>

    
    <!-- About Start -->
    <?php
                            $ID = $_GET["id"];
                            $sql = "select * from  meeting_office where id = $ID";
                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($result);
                        ?>
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Meeting Room</h5>
                        <h1 class="mb-0"><?php echo $rows ['title'] ?></h1>
                    </div>
                    <p class="mb-4"><?php echo $rows ['about'] ?></p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Free WIFI</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staff</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Support</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;"> <h2 class="text-white">$</h2>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Price Per Month</h5>
                            <h4 class="text-primary mb-0"><?php echo $rows ['price'] ?></h4>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-3 wow zoomIn"  data-bs-toggle="modal" data-bs-target="#exampleModal"  data-wow-delay="0.9s">Book Now</a>
                </div>
                <div class="col-lg-5" >
                    <div class="position-relative" >
                    <?php
             echo "<img  src=\"image_meeting/{$rows['image']}\" height=400px width=450px>"
                 ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="stripe_payment.php" method="POST" name="cardpayment" id="payment-form">
<?php
        $ID = $_GET["id"];
        $sql = "SELECT * FROM meeting_office WHERE id = $ID";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($result);
    ?>
  
  <div class="mb-3 mt-3">
	 <label for="email">Name:</label>
	 <input type="text" class="form-control" id="email" placeholder="Enter name" name="name">
   </div>
 
   <div class="mb-3 mt-3">
	 <label for="email">Email:</label>
	 <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
   </div>
   <div class="form-grp">
        <label class="text-dark mt-3" for="title">Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($rows['title']); ?>" id="title" class="form-control" required>
    </div>
   
	 <div class="mb-3 mt-3">
	 <label for="email">Days</label>
	 <input type="text" class="form-control"  placeholder="Enter course" name="days">
   </div>
   
	<div class="row">
								   <div class="col-xs-12">
									   <div class="form-group">
										   <label for="cardNumber">CARD NUMBER</label>
										   <div class="input-group">

											   <input type="text" class="form-control" name="card_number" placeholder="Valid Card Number" autocomplete="cc-number" id="card_number" maxlength="16" data-stripe="number" required />
											   <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
										   </div>
									   </div>                            
								   </div>
							   </div>
							   <div class="row">

								   <div class="col-xs-4 col-md-4">
									   <div class="form-group">
										   <label for="cardExpiry"><span class="visible-xs-inline">MON</span></label>
										   <select name="card_exp_month" id="card_exp_month" class="form-control" data-stripe="exp_month" required>
											   <option>MON</option>
											   <option value="01">01 ( JAN )</option>
											   <option value="02">02 ( FEB )</option>
											   <option value="03">03 ( MAR )</option>
											   <option value="04">04 ( APR )</option>
											   <option value="05">05 ( MAY )</option>
											   <option value="06">06 ( JUN )</option>
											   <option value="07">07 ( JUL )</option>
											   <option value="08">08 ( AUG )</option>
											   <option value="09">09 ( SEP )</option>
											   <option value="10">10 ( OCT )</option>
											   <option value="11">11 ( NOV )</option>
											   <option value="12">12 ( DEC )</option>
										   </select>
									   </div>
								   </div>

								   <div class="col-xs-4 col-md-4">
									   <div class="form-group">
										   <label for="cardExpiry"><span class="visible-xs-inline">YEAR</span></label>
										   <select name="card_exp_year" id="card_exp_year" class="form-control" data-stripe="exp_year">
											   <option>Year</option>
											   <option value="20">2020</option>
											   <option value="21">2021</option>
											   <option value="22">2022</option>
											   <option value="23">2023</option>
											   <option value="24">2024</option>
											   <option value="25">2025</option>
											   <option value="26">2026</option>
											   <option value="27">2027</option>
											   <option value="28">2028</option>
											   <option value="29">2029</option>
											   <option value="30">2030</option>
											   <option value="31">2031</option>
											   <option value="32">2032</option>
											   <option value="33">2033</option>
											   <option value="34">2034</option>
											   <option value="35">2035</option>
										   </select>
									   </div>
								   </div>
								   <div class="col-xs-4 col-md-4 pull-right">
									   <div class="form-group">
										   <label for="cardCVC">CV CODE</label>
										   <input type="password" class="form-control" name="card_cvc" placeholder="CVC" autocomplete="cc-csc" id="card_cvc" required />
									   </div>
								   </div>

                   <div class="form-grp">
        <label class="text-dark mt-3" for="title">Price</label>
        <input type="text" name="price" value="<?php echo htmlspecialchars($rows['price']); ?>" id="price" class="form-control" required>
    </div>
							   </div>
  
  
   <button type="submit" id="payBtn" class="btn btn-primary">Submit</button>
 </form>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey('pk_test_51Pjd5PP9xEb2XtZWLE0jYBQtB4cY3LphQNF1r4ylQP3XWAqEyRTCnXGOl6e5PqkCXHR6knt3R4ByhtoWJvgxG7sQ00qGRBPzUW');

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#payBtn').removeAttr("disabled");
            $(".payment-status").html('<p>' + response.error.message + '</p>');
        } else {
            var form$ = $("#payment-form");
            var token = response.id;
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            form$.get(0).submit();
        }
    }

    $(document).ready(function() {
        $("#payment-form").submit(function() {
            $('#payBtn').attr("disabled", "disabled");

            Stripe.createToken({
                number: $('#card_number').val(),
                exp_month: $('#card_exp_month').val(),
                exp_year: $('#card_exp_year').val(),
                cvc: $('#card_cvc').val()
            }, stripeResponseHandler);

            return false;
        });
    });
</script>
<?php

include("footer.php")
?>