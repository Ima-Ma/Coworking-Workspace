<?php
include("connection.php");
include("header.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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




.text-center {
    text-align: center;
}


</style>

<div class="container mt-5">
<div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
        <h1 class="mb-0">Healthy, Fresh, and Flavorful Hear from Our Patrons</h1>
    </div>
    <?php
    // Retrieve ID from query string and fetch booking details
    $ID = intval($_GET["id"]); // Ensure ID is an integer to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();
    $stmt->close();
    ?>
    
    <div class="row">
        <div class="col-lg-4">
            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-between text-center" style="height: 100%;">
                <div class="service-icon mb-3">
                    <i class="fa fa-shield-alt text-white"></i>
                </div>
                <div class="content" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                <p><i class="fas fa-user"></i> Your Name: <?php echo htmlspecialchars($rows['name']); ?></p>
<p><i class="fas fa-building"></i> Room Title: <?php echo htmlspecialchars($rows['title']); ?></p>
<p><i class="fas fa-envelope"></i> Booking Email: <?php echo htmlspecialchars($rows['email']); ?></p>
<p><i class="fas fa-money-bill"></i> Total Amount Paid: <?php echo htmlspecialchars($rows['price']); ?></p>
<p><i class="fas fa-calendar"></i> Room Booked For <?php echo htmlspecialchars($rows['days']); ?> days</p>

                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-5">
            <form id="payment-form" action="" method="post">
                <div class="form-group">
                    <label for="card-element">Credit or debit card</label>
                    <div id="card-element" class="form-control"></div>
                    <div id="card-errors" role="alert" class="text-danger"></div>
                </div>
                <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($rows['email']); ?>">
            <input type="hidden" name="room_title" value="<?php echo htmlspecialchars($rows['title']); ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Choose Workday Bites: <b> per selection 500PKR</b></p>
                        <?php
                        $sql = "SELECT menu FROM menu";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $index = 0;
                            echo '<div class="col-md-6">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                $menu_item = htmlspecialchars($row['menu']);
                                if ($index > 0 && $index % 6 == 0) {
                                    echo '</div><div class="col-md-6">';
                                }
                                echo '<div class="form-check">';
                                echo '<input type="checkbox" class="form-check-input menu-item" id="' . $menu_item . '" name="menu[]" value="' . $menu_item . '">';
                                echo '<label class="form-check-label" for="' . $menu_item . '">' . $menu_item . '</label>';
                                echo '</div>';
                                $index++;
                            }
                            echo '</div>'; 
                        } else {
                            echo "Error retrieving menu items.";
                        }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <label for="total-amount">Amount per selection:</label>
                        <input type="number" name="total" placeholder="Total Amount" class="form-control" id="total-amount" readonly>
                        <label for="total" class="form-label">Your Total Amount For These Services in PKR:</label>
                        <input type="text" id="total" name="total_amount" class="form-control" readonly>
                        <label class="mt-3" for="message">Message:<b>Optional</b></label>
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Provide any additional precautions or special requests we should consider for your Workday Bites order or any other needs."></textarea>
                        <input type="submit" id="payBtn" class="btn mt-5 btn-primary" value="Submit">
                        <input type="hidden" name="stripeToken" id="stripeToken">
                        <input type="hidden" name="cardLast4" id="cardLast4">
                        <input type="hidden" name="cardBrand" id="cardBrand">
                    </div>
                </div>
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

    document.addEventListener('DOMContentLoaded', (event) => {
        const checkboxes = document.querySelectorAll('.menu-item');
        const totalAmountInput = document.getElementById('total-amount');
        const totalInput = document.getElementById('total');
        const pricePerSelection = 500;
        const days = <?php echo json_encode($rows['days']); ?>; 

        function updateTotal() {
            let selectedCount = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedCount++;
                }
            });

            const amountPerSelection = selectedCount * pricePerSelection;
            totalAmountInput.value = amountPerSelection;

            const totalAmount = days * amountPerSelection;
            totalInput.value = totalAmount.toFixed(2);
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateTotal);
        });

        updateTotal();
    });
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $room_title = mysqli_real_escape_string($conn, $_POST['room_title']);
    $menu = implode(", ", $_POST['menu']); 
    $total_amount = mysqli_real_escape_string($conn, $_POST['total_amount']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $stripeToken = $_POST['stripeToken'];
    $cardLast4 = mysqli_real_escape_string($conn, $_POST['cardLast4']);
    $cardBrand = mysqli_real_escape_string($conn, $_POST['cardBrand']);

    require_once('stripe-php/init.php');
    \Stripe\Stripe::setApiKey('sk_test_51PjLicJcUaLVsrNDtw5ftCtsoDq1uxhcpHnuhYVzqSwGGnLXH0bETpRnnQt5jvGfSiQKr3ucUGcgpOZFvgVvi0nM00lHD2KHvd');

    try {
        $charge = \Stripe\Charge::create([
            'amount' => round($total_amount * 100),
            'currency' => 'pkr',
            'source' => $stripeToken,
            'description' => 'Booking Payment',
        ]);

       
        $stmt = $conn->prepare("INSERT INTO menu_card (email, room_title, menu, total_amount, card_number, card_company, message) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $email, $room_title, $menu, $total_amount, $cardLast4, $cardBrand, $message);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Thank you for your payment! You're now ready to savor our healthy and flavorful dishes. Hear from our satisfied patrons about their delightful dining experiences!</div>";
        } else {
            echo "<div class='alert alert-danger'>Payemnt Failed.</div>";
        }

        $stmt->close();
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }

    $conn->close();
}
?>

<?php include("footer.php"); ?>
