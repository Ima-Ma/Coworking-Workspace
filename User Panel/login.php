<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <link rel="stylesheet" href="login.css"> -->
</head>
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
            transform: scale(1.1);
            color: white;
        }
</style>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <h1>Welcome to Kaam Ka کاروان! Your Workspace Awaits, Log In Now!</h1>
    <div class="fadeIn first">
    </div>
    <!-- Login Form -->
    <form method="post" action="">
    <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="text" id="login" name="email" placeholder="Email" required style="width: 100%;">
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="Password" required style="width: 100%;">
      </div>
      <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
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

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user_login WHERE user_email = ? AND user_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if($data) {
        $_SESSION['username'] = $data['username'];
        echo "<script>
                swal('Login successful!', 'You are now logged in.', 'success').then(() => {
                    window.location.href='index.php';
                });
              </script>";
    } else {
        echo "<script>
                swal('Login failed', 'Invalid email or password', 'error');
              </script>";
    }
}
?>
</body>
</html>
