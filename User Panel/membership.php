<?php
    include("header.php");
    include("connection.php");
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $rate = mysqli_real_escape_string($conn, $_POST['rate']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
    
        // Basic server-side validation
        if(empty($name) || empty($rate) || empty($message)) {
            echo "<script>
                    swal('Oops!', 'Please fill out all required fields.', 'error');
                    </script>";
        } else {
            $sql = "INSERT INTO review (name, rate, message) VALUES ('$name', '$rate', '$message')";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                echo "<script>
                        swal('Thank You!', 'Your message has been submitted successfully.', 'success')
                        .then((value) => {
                            window.location.href = window.location.href; // Refresh page
                        });
                        </script>";
            } else {
                echo "<script>
                        swal('Oops!', 'Something went wrong. Please try again later.', 'error');
                        </script>";
            }
        }
    }
    ?>

<!-- Email work -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mushtaqueimama@gmail.com';
        $mail->Password   = 'llfegxrlynyzregx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('mushtaqueimama@gmail.com', 'Kaam Ka Caravan');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Membership Confirm!';
        $mail->Body    = htmlspecialchars('Thank you for subscribing to our exclusive membership!  We’re thrilled to have you on board. Your membership card is on its way and will soon arrive in your Gmail inbox.
        Stay tuned for exciting updates and perks coming your way. Here’s to new beginnings and endless possibilities with Kaaam Ka Caravan!
        Warm regards,
        The Kaaam Ka Caravan Team ');
        $mail->send();

  
        echo "<script>
            window.location.href='send.php';
        </script>";
    } catch (Exception $e) {
        // Optionally handle the exception, e.g., log the error or show an error message
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0">Kaam Ka کاروان</h1>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="about.php" class="nav-item nav-link ">About</a>
                    <a href="contact.php" class="nav-item nav-link ">Contact Us</a>
                    <a href="./toprate.php" class="nav-item nav-link ">Top Rate</a>
                    <a href="./event.php" class="nav-item nav-link ">Events</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Co-Working</a>
                        <div class="dropdown-menu m-0">
                        <a href="./meeting.php" class="dropdown-item ">Meeting Room</a>
                            <a href="./office.php" class="dropdown-item ">Office Space</a>
                            <a href="./virtual.php" class="dropdown-item ">Virtual Office</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Service</a>
                        <div class="dropdown-menu m-0">
                        <a href="service.php" class="dropdown-item ">Find Job</a>
                            <a href="./ourteam.php" class="dropdown-item " >Join Us</a>
                            <a href="./membership.php" class="dropdown-item active">Membership</a>
                        </div>
                    </div>
                </div>
                <?php 

                if(!isset($_SESSION['username'])){
                    echo '<a href="./login.php" class="btn btn-primary py-2 px-4 ms-3">Sign In Here</a>';
                } else {
                    echo '<a href="./logout.php" class="btn btn-primary py-2 px-4 ms-3">' . htmlspecialchars('Welcome '.$_SESSION['username']) . '</a>';
                }
                ?>
            </div>
 </nav>
    <div class="container-fluid bg-primary py-5 bg-header8" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Get Our Membership Card</h1>
                    <a href="" class="h5 text-white"><img src="./b.png" alt="" height="40px"> Kaam ka کاروان</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 h-100 wow slideInLeft" data-wow-delay="0.3s" >
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img h-100 w-100" src="./member card.PNG" alt="">
                               
                            </div>
                        </div>
            </div>
        <div class="col-lg-6 h-100 wow slideInLeft" data-wow-delay="0.3s" >
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Membership</h5>
                        <h1 class="mb-0">Get A MemberShip</h1>
                    </div>
                    <p class="mb-4">At Kaam Ka کاروان,All Access is a monthly coworking membership to beautifully designed spaces near home or around the world.</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Conference hall</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Parking</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>WiFi</h5>

                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Events</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Security</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Printing and scanning</h5>

                        </div>
                    </div>
                </div>
           
                </div>
        </div>
    </div>

     <!-- Career Launchpad Area -->
     <section class="career-launchpad-area mt-5 section-padding-100-0">
                <div class="container">
                   <div class="row">
                    <div class="col-lg-3">
                        <h2 class="text-primary text-center fw-bold"> All Access Basic membership plan</h2>
                        <a href="./contact.php"><button class="btn btn-primary mt-3 w-100">Contact Us</button></a>
                    </div>
                    <div class="col-lg-9">
                        <h3>Monthly membership to coworking space near you and around the world</h3>
                        <h1>PKR 50,000</h1>
                        <p>
                        Secure a 2-year membership with Kaam Ka Caravan.</p>
                    </div>
                   </div>
                    </div>
                </div>
            </section>
            <div class="container mt-5 p-5 wow zoomIn" style="background-image: url('https://ctfassets.imgix.net/vh7r69kgcki3/16pzkiIwrpItIJlic6zC9a/61f91981f872b1e0287420c553fbc649/Web_150DPI-WeWork_-_Lasalle_-_Chicago-1.jpg?auto=format%20compress&fit=crop&q=50&w=900&h=506'); background-repeat: no-repeat; background-size: cover;">
                <div class="row">
                <div class="col-lg-6 p-3 mx-auto bg-white">
    <form action="" method="post" class="text-black" id="payment-form">
        <h1 class="text-primary text-center fw-bold">Connect with Us</h1>
        <h5 class="text-black text-center fw-bold">Fill out the form below and a member of our team will reach out to learn more about your workplace needs.</h5>

        <div class="form-group">
            <label for="card-element">Credit or debit card</label>
            <div id="card-element" class="form-control"></div>
            <div id="card-errors" role="alert" class="text-danger"></div>
        </div>
        
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        
        <div class="form-group">
            <label for="dob">Date Of Birth:</label>
            <input type="date" name="dob" class="form-control" id="dob" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Contact Number:</label>
            <input type="text" name="phone" class="form-control" id="phone" required>
        </div>
        
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" id="address" required>
        </div>
        
        <div class="form-group">
            <label for="post_code">Post Code:</label>
            <input type="text" name="post_code" class="form-control" id="post_code" required>
        </div>
        
        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" name="gender" class="form-control" id="gender" required>
        </div>

        <!-- Amount field (Hidden) -->
        <input type="hidden" name="amount" value="50000">

        <button type="submit" name="send" class="btn btn-primary w-100 mt-3">Get A Membership</button>
    </form>
</div>
                </div>
            </div>
  <!-- Quote Start -->
       <!-- Vendor Start -->
       <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/vendor-1.jpg" alt="">
                    <img src="img/vendor-2.jpg" alt="">
                    <img src="img/vendor-3.jpg" alt="">
                    <img src="img/vendor-4.jpg" alt="">
                    <img src="img/vendor-5.jpg" alt="">
                    <img src="img/vendor-6.jpg" alt="">
                    <img src="img/vendor-7.jpg" alt="">
                    <img src="img/vendor-8.jpg" alt="">
                    <img src="img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <section class="career-launchpad-area section-padding-100-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="application-process-content mb-100 wow fadeInUp" data-wow-duration="1s" data-wow-delay="100ms">
                                <div class="section-heading">
                                    <div class="line-"></div>
                                    <h2 class="text-center text-primary">
                                    Unleash the Full Potential of Your Membership: Exclusive Facilities Just for You!</h2>
                                </div>
                                    <li class="text-black">As a valued member, you gain access to a comprehensive suite of amenities designed to enhance your experience and convenience. Our membership includes top-notch facilities such as state-of-the-art printing and scanning services, ensuring you can manage your documents with ease. Security is a top priority, with advanced measures in place to protect your personal information and belongings. We also offer a range of engaging events, from workshops to social gatherings, allowing you to connect with fellow members and broaden your horizons. Stay connected with high-speed WiFi throughout our premises, and enjoy hassle-free parking with dedicated spaces for members. These facilities are all part of our commitment to providing a seamless and enriching membership experience.
                                    </li>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <!-- Vendor End -->
  <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Send Your Review</h5>
                        <h1 class="mb-0">Your review should be a fair reflection of your experience.</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Reply within 24 hours</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>24 hrs telephone support</h5>
                        </div>
                    </div>
                    <p class="mb-4">We provide our members with high-speed internet with redundant connection, meeting rooms and fresh coffee. We strive to make our workspace a place where you can be productive and feel inspired.</p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+3112033680</h4>
                        </div>
                    </div>
                </div>
                
        <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                <form action="" method="post" onsubmit="return validateForm()" name="reviewform">
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" name="name" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select name="rate" id="" placeholder="Rate Our Site" class=" my-3 form-control" style="height: 55px;">
                                        <option value="">Rate Our site</option>
                                        <option value="⭐">⭐</option>
                                        <option value="⭐⭐">⭐⭐</option>
                                        <option value="⭐⭐⭐">⭐⭐⭐</option>
                                        <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
                                        <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</option>
                                </div>
                            
                                <div class="col-12">
                                    <textarea name="message" class="form-control bg-light border-0" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button name="submit" class="btn btn-dark w-100 py-3"> Send Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->
  
<!-- Include Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>
<script>
// Stripe elements setup
var stripe = Stripe('pk_test_51Pjd5PP9xEb2XtZWLE0jYBQtB4cY3LphQNF1r4ylQP3XWAqEyRTCnXGOl6e5PqkCXHR6knt3R4ByhtoWJvgxG7sQ00qGRBPzUW');
var elements = stripe.elements();

var card = elements.create('card');
card.mount('#card-element');

// Handle form submission
var form = document.getElementById('payment-form');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token and other data to your server.
            var hiddenInputToken = document.createElement('input');
            hiddenInputToken.setAttribute('type', 'hidden');
            hiddenInputToken.setAttribute('name', 'stripeToken');
            hiddenInputToken.setAttribute('value', result.token.id);
            form.appendChild(hiddenInputToken);

            // You can also add card last 4 digits and card brand here
            var hiddenInputLast4 = document.createElement('input');
            hiddenInputLast4.setAttribute('type', 'hidden');
            hiddenInputLast4.setAttribute('name', 'cardLast4');
            hiddenInputLast4.setAttribute('value', result.token.card.last4);
            form.appendChild(hiddenInputLast4);

            var hiddenInputBrand = document.createElement('input');
            hiddenInputBrand.setAttribute('type', 'hidden');
            hiddenInputBrand.setAttribute('name', 'cardBrand');
            hiddenInputBrand.setAttribute('value', result.token.card.brand);
            form.appendChild(hiddenInputBrand);

            // Submit the form
            form.submit();
        }
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $post_code = mysqli_real_escape_string($conn, $_POST['post_code']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $amount = 50000; 

  
    $stripeToken = isset($_POST['stripeToken']) ? $_POST['stripeToken'] : '';
    $cardLast4 = isset($_POST['cardLast4']) ? $_POST['cardLast4'] : '';


    if (empty($stripeToken) || empty($cardLast4)) {
        echo "Error: Missing card information.";
        exit;
    }

    if ($amount == 50000) {
        // Proceed with Stripe payment processing
        require_once('stripe-php/init.php');
        \Stripe\Stripe::setApiKey('sk_test_51Pjd5PP9xEb2XtZW8SL9P1oH7zS2JgbMi8z03IqDn4wxTvVGeptxeuooSJFFXD0cLYzfOUa2Gy1VM0cdEHPxaw2600y0bBWTS6'); // Replace with your actual secret key

        $conversion_rate = 0.01;
        $amount_usd = $amount * $conversion_rate;

        try {
            $charge = \Stripe\Charge::create([
                'amount' => round($amount_usd * 100), // Amount in cents
                'currency' => 'usd',
                'source' => $stripeToken,
                'description' => 'Membership Payment',
            ]);

            if ($charge->status == 'succeeded') {
                $sql = "INSERT INTO membership (name, email, dob, phone, gender, address, post_code, card_number, amount)
                        VALUES ('$name', '$email', '$dob', '$phone', '$gender', '$address', '$post_code', '$cardLast4',  '$amount')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>
                    swal('Good job!', 'Payment and membership registration successful.!', 'success')
                    </script>";
                } else {
                    echo "Error: Payment successful but failed to register membership: " . mysqli_error($conn);
                }
            } else {
                echo "Error: Payment was not successful.";
            }
        } catch (\Stripe\Exception\CardException $e) {
            // Handle different card errors
            handleStripeError($e);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: Payment failed. The amount must be exactly 50,000 PKR.";
    }
}

function handleStripeError($e) {
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
}
?>

<?php
include("footer.php");
?>