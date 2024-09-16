<?php
include("connection.php");
include("header.php");
?>
<style>
.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}


.service-item {
    background: linear-gradient(135deg, #3498db 0%, #8e44ad 100%);
    color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    animation: fadeInUp 1s ease;
    position: relative;
}

.service-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.service-item h4 {
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.service-item p {
    font-size: 1rem;
    margin: 5px 0;
}


.service-icon {
    font-size: 3rem;
    background-color: #fff;
    color: #3498db;
    padding: 15px;
    border-radius: 50%;
    margin-bottom: 20px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, color 0.3s ease;
}

.service-item:hover .service-icon {
    background-color: #3498db;
    color: #fff;
}


@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


#payment-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

#payment-form:hover {
    background-color: #f1f1f1;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #ccc;
    padding: 10px;
    transition: all 0.2s ease;
}

.form-control:focus {
    border-color: #ff9800;
    box-shadow: 0 0 5px rgba(255, 152, 0, 0.8);
}


#payBtn {

    border: none;
    padding: 10px 20px;
    border-radius: 8px;
  
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

#payBtn:hover {

    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}


#rent, #total {
    background-color: #e9ecef;
    border: none;
}

#vehicleImage {
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#vehicleImage:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}


input[type="radio"] {
    margin-right: 10px;
}

textarea {
    border-radius: 8px;
    resize: none;
    transition: border-color 0.2s ease;
}

textarea:focus {
    border-color: #ff9800;
    box-shadow: 0 0 5px rgba(255, 152, 0, 0.8);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.container, .service-item, .form-control, #payment-form {
    animation: fadeInUp 1s ease;
} 


</style>

<div class="container mt-5">
<div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
        <h1 class="mb-0">Smart Pick and Drop:</h1>
    </div>
    <?php
    $ID = $_GET["id"];
    $sql = "SELECT * FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();
    ?>
    <div class="row">
    <div class="col-lg-4">
    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-between text-center" style="height: 100%;">
        <div class="service-icon mb-3">
            <i class="fa fa-shield-alt text-white"></i>
        </div>
        <div class="content" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
        <p><i class="fas fa-user"></i> Your Name: <?php echo htmlspecialchars($rows['name']); ?></p>
            <p><i class="fa fa-door-open"></i> Room Title is <?php echo htmlspecialchars($rows['title']); ?></p>
            <p><i class="fa fa-envelope"></i> Booking Email is <?php echo htmlspecialchars($rows['email']); ?></p>
            <p><i class="fa fa-money-bill-wave"></i> Total Amount Paid For Room is <?php echo htmlspecialchars($rows['price']); ?></p>
            <p><i class="fa fa-calendar-alt"></i> Room Booked For <?php echo htmlspecialchars($rows['days']); ?> days</p>
        </div>
    </div>
</div>

        <div class="col-lg-8 mt-5">
    <form action="" method="POST" id="payment-form">
        <div class="form-group">
            <label for="card-element">Credit or debit card</label>
            <div id="card-element" class="form-control"></div>
            <div id="card-errors" role="alert" class="text-danger"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="vehicleCategory" class="form-label">Select Your Vehicle Categories</label>
                <select name="vehicleCategory" id="vehicleCategory" class="form-control" onchange="updateRentAndImage()">
                    <option value="">Select Your Vehicle Categories</option>
                    <?php
                    $sql = "SELECT * FROM pick_n_drop";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '" data-rent="' . $row['rent'] . '" data-image="' . $row['image'] . '">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
                <br>
            </div>

            <div class="col-lg-3">
                <label for="rent" class="form-label">Rent per day</label>
                <input type="text" name="rent" id="rent" class="form-control" readonly>
            </div>

            <div class="col-lg-3">
                <label for="image" class="form-label">Image</label><br>
                <img id="vehicleImage" src="" height="100px" alt="">
            </div>
        </div>

        <div class="col-lg-8">
            <label for="total" class="form-label">Your Total Amount For These Services in PKR:</label>
            <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($rows['email']); ?>">
            <input type="hidden" name="room_title" value="<?php echo htmlspecialchars($rows['title']); ?>">
            <input type="text" name="total" id="total" class="form-control" readonly>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4">
                <label for="">Driver Gender:</label><br>
                <input type="radio" name="driver_gender" value="Male" id="male"> Male <br>
                <input type="radio" name="driver_gender" value="Female" id="female"> Female <br>
            </div>

            <div class="col-lg-8">
                <label for="">Message: <b>Optional</b></label>
                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Provide any additional precautions or special requests..."></textarea>
            </div>
        </div>

        <input type="submit" id="payBtn" class="btn btn-primary mt-5" value="Submit">
        <input type="hidden" name="stripeToken" id="stripeToken">
        <input type="hidden" name="cardLast4" id="cardLast4">
        <input type="hidden" name="cardBrand" id="cardBrand">
    </form>
</div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
var stripe = Stripe('pk_test_51PjLicJcUaLVsrNDDlPQYktZZjquKqJGfQd1t7RdfRiyMWQHV52KvYJIGSjV1bN6axmrz00v0uCer3LJhaU7BrWA00Voigy2Ly');
var elements = stripe.elements();

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

var card = elements.create('card', { style: style });
card.mount('#card-element');

card.on('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            stripeTokenHandler(result.token);
        }
    });
});

function stripeTokenHandler(token) {
    var form = document.getElementById('payment-form');
    document.getElementById('stripeToken').value = token.id;
    document.getElementById('cardLast4').value = token.card.last4;
    document.getElementById('cardBrand').value = token.card.brand;
    form.submit();
}

function updateRentAndImage() {
    var select = document.getElementById("vehicleCategory");
    var selectedOption = select.options[select.selectedIndex];
    var rent = selectedOption.getAttribute("data-rent");
    var image = selectedOption.getAttribute("data-image");
    
    document.getElementById("rent").value = rent ? rent : ''; 
    document.getElementById("vehicleImage").src = image ? "../admin Panel/admin/image_pick_n_drop/" + image : ''; 
    
    var days = <?php echo $rows['days']; ?>;
    var totalAmount = rent ? days * parseFloat(rent) : 0;
    document.getElementById("total").value = totalAmount ? totalAmount.toFixed(2) : ''; 
}
</script>


<?php 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $vehicleCategory = mysqli_real_escape_string($conn, $_POST['vehicleCategory']);
    $room_title = mysqli_real_escape_string($conn, $_POST['room_title']);
    $rent = mysqli_real_escape_string($conn, $_POST['rent']);
    $stripeToken = $_POST['stripeToken'];
    $cardLast4 = $_POST['cardLast4'];
    $cardBrand = $_POST['cardBrand'];
    $driver_gender = mysqli_real_escape_string($conn, $_POST['driver_gender']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

  

    require_once('stripe-php/init.php');
    \Stripe\Stripe::setApiKey('sk_test_51PjLicJcUaLVsrNDtw5ftCtsoDq1uxhcpHnuhYVzqSwGGnLXH0bETpRnnQt5jvGfSiQKr3ucUGcgpOZFvgVvi0nM00lHD2KHvd'); 

    try {
        $charge = \Stripe\Charge::create([
            'amount' => round($rent * 100), // Convert PKR to smallest unit
            'currency' => 'usd',
            'source' => $stripeToken,
            'description' => 'Vehicle Booking',
        ]);

        $sql_booking = "INSERT INTO pick_n_drop_record (email, vehicleCategory, room_title, rent, card_number, card_company , driver_gender , message) 
                        VALUES ('$email', '$vehicleCategory', '$room_title', '$rent', '$cardLast4', '$cardBrand' , '$driver_gender' , '$message')";
        if (mysqli_query($conn, $sql_booking)) {
            echo "<div class='alert alert-success'>Thank you for booking with us. Your pickup is scheduled, and our driver will be there on time to assist you!</div>";
        } else {
            echo "<div class='alert alert-danger'>Failed to store payment details.</div>";
        }
    } catch (\Stripe\Exception\CardException $e) {
        handleStripeError($e);
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
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
            echo "Error: Insufficient funds.";
            break;
        default:
            echo "Error: " . $e->getMessage();
            break;
    }
}


include("footer.php");
?>