<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
       
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #56baed; 
        }

        .wrapper {
            width: 100%;
            max-width: 540px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

  
        #formContent {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

      
        #formContent h1 {
            margin: 0;
            font-size: 20px; 
            font-weight: 700; 
            color: #333;
            padding: 15px 0; 
            display: inline-block;
            margin-bottom: 15px;
        }

   
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #007bff;
            font-size: 18px;
        }

        .input-group input {
            width: calc(100% - 40px);
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            padding-left: 40px; 
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            text-align: center; 
        }

        .input-group input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
            
        }

  
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

      
        .social-icons {
            margin-top: 20px;
        }

        .social-icon {
            display: inline-block;
            width: 50px;
            height: 50px;
            margin: 0 10px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            line-height: 50px;
            text-align: center;
            font-size: 24px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .social-icon:hover {
            background-color: #0056b3;
            color: white;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<div class="wrapper">
  <div id="formContent">
    <h1>Kaam Ka کاروان Awaits You  Register Here!</h1>

    <!-- Sign Up Form -->
    <form method="post" action="">
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" id="name" name="name" placeholder="Username" required style="width: 100%;">
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="text" id="login" name="email" placeholder="Email" required style="width: 100%;">
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="Password" required style="width: 100%;">
      </div>
      <input type="submit" name="register" value="Sign Up">
    </form>

    <div class="social-icons">
      <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
    </div>
  </div>
</div>

<?php
include("connection.php");

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the email already exists
    $checkEmailSql = "SELECT * FROM user_login WHERE user_email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        echo "<script>
                swal('Email already exists', 'Please use a different email address.', 'error');
              </script>";
    } else {
        // Email is unique, proceed with registration
        $sql = "INSERT INTO user_login (username, user_email, user_password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "<script>
                    swal('Registration successful!', 'You can now log in.', 'success').then(() => {
                        window.location.href='login.php';
                    });
                  </script>";
        } else {
            echo "<script>
                    swal('Registration failed', 'Please try again.', 'error');
                  </script>";
        }
    }

    $stmt->close();
}
?>
</body>
</html>
