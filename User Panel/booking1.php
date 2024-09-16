<?php
include("header.php");
include("connection.php");
?>
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
$sql = "SELECT * FROM office_space WHERE id = $ID";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">Office Space</h5>
                    <h1 class="mb-0"><?php echo htmlspecialchars($rows['title']); ?></h1>
                </div>
                <p class="mb-4"><?php echo htmlspecialchars($rows['about']); ?></p>
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
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <h2 class="text-white">$</h2>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Price Per Month</h5>
                        <h4 class="text-primary mb-0"><?php echo htmlspecialchars($rows['price']); ?></h4>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-wow-delay="0.9s">Book Now</a>
            </div>
            <div class="col-lg-5">
                <div class="position-relative">
                    <?php echo "<img src=\"../admin Panel/admin/image_office/{$rows['image']}\" height=\"400px\" width=\"450px\">"; ?>
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
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-credit-card me-2"></i>  Booking Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="payment-form">
                    <div class="form-group">
                        <label for="card-element">Credit or debit card</label>
                        <div id="card-element" class="form-control"></div>
                        <div id="card-errors" role="alert" class="text-danger"></div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark mt-3" for="title">Title</label>
                        <input type="text" name="title" value="<?php echo htmlspecialchars($rows['title']); ?>" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="days">Days</label>
                        <input type="text" class="form-control" id="days" placeholder="Enter days" name="days" required>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Price Per Month</h5>
                        <p name="price"><?php echo htmlspecialchars($rows['price']); ?></p>
                    </div>
                    <button type="submit" id="payBtn" class="btn btn-primary">Submit</button>
                    <!-- Stripe Token Hidden Field -->
                    <input type="hidden" name="stripeToken" id="stripeToken">
                    <input type="hidden" name="cardLast4" id="cardLast4">
                    <input type="hidden" name="cardBrand" id="cardBrand">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Set your publishable key
    var stripe = Stripe('pk_test_51Pjd5PP9xEb2XtZWLE0jYBQtB4cY3LphQNF1r4ylQP3XWAqEyRTCnXGOl6e5PqkCXHR6knt3R4ByhtoWJvgxG7sQ00qGRBPzUW');
    var elements = stripe.elements();

    // Custom styling for the card element
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element
    var card = elements.create('card', { style: style });

    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID
    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.getElementById('stripeToken');
        hiddenInput.setAttribute('value', token.id);

        document.getElementById('cardLast4').value = token.card.last4;
        document.getElementById('cardBrand').value = token.card.brand;
        // Submit the form
        form.submit();
    }
</script>

<?php include("footer.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $days = (int)$_POST['days'];
    $stripeToken = $_POST['stripeToken'];
    
    $cardLast4 = $_POST['cardLast4'];
    $cardBrand = $_POST['cardBrand'];
    // Fetch the room price from the database based on the title
    $sql_room = "SELECT price FROM office_space WHERE title = '$title'";
    $result_room = mysqli_query($conn, $sql_room);

    if ($result_room && mysqli_num_rows($result_room) > 0) {
        $room = mysqli_fetch_assoc($result_room);
        $price_per_day = (float)$room['price'];
        
        // Calculate the total price based on the number of days
        $total_price_pkr = $price_per_day * $days;

        // Convert price to USD for Stripe (ensure correct conversion rate)
        $conversion_rate = 0.01; // Example conversion rate: 1 PKR = 0.01 USD
        $total_price_usd = $total_price_pkr * $conversion_rate;

        // Proceed with Stripe payment processing
        require_once('stripe-php/init.php');
        \Stripe\Stripe::setApiKey('sk_test_51Pjd5PP9xEb2XtZW8SL9P1oH7zS2JgbMi8z03IqDn4wxTvVGeptxeuooSJFFXD0cLYzfOUa2Gy1VM0cdEHPxaw2600y0bBWTS6'); // Replace with your actual secret key

        try {
            $charge = \Stripe\Charge::create([
                'amount' => round($total_price_usd * 100), // Amount in cents
                'currency' => 'usd',
                'source' => $stripeToken,
                'description' => 'Meeting Room Booking',
            ]);

            // Payment successful, now insert booking into the database
            $sql_booking = "INSERT INTO bookings (name, email, title, days, price,card_number,card_company) VALUES ('$name', '$email', '$title', '$days', '$total_price_pkr','$cardLast4','$cardBrand')";
            if (mysqli_query($conn, $sql_booking)) {
                echo "
                <script>
                swal('Good job!', 'Booking  and payment successful.', 'success')
                </script>
                ";
            } else {
                echo "Error: Booking added to database but there was an issue: " . mysqli_error($conn);
            }
        } catch (\Stripe\Exception\CardException $e) {
            // Handle different card errors
            $error = $e->getJsonBody();
            $errorCode = $error['error']['code'];

            switch ($errorCode) {
                case 'card_declined':
                    echo "Error: Your card was declined.";
                    break;
                case 'expired_card':
                    echo "Error: Your card has expired.";
                    break;
                case 'insufficient_funds':
                    echo "Error: Your card has insufficient funds.";
                    break;
                case 'incorrect_cvc':
                    echo "Error: The card's security code is incorrect.";
                    break;
                case 'processing_error':
                    echo "Error: An error occurred while processing the card.";
                    break;
                default:
                    echo "Error: " . $e->getMessage();
                    break;
            }
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            echo "Error: Network communication with Stripe failed.";
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            echo "Error: Invalid parameters were supplied to Stripe's API.";
        } catch (\Stripe\Exception\AuthenticationException $e) {
            echo "Error: Authentication with Stripe's API failed.";
        } catch (\Stripe\Exception\ApiErrorException $e) {
            echo "Error: An error occurred with Stripe's API.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: Room not found.";
    }
}
?>
<!-- SweetAlert2 CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


