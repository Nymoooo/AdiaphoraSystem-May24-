<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['first_name'] . ' ' . $row['last_name'];
         header('location:admin_page.php');
      }
      elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['first_name'] . ' ' . $row['last_name'];
         header('location:user_page.php');
      }
     
   }else{
      $error[] = 'Incorrect email or password!';
   }

   // forgot password
} elseif(isset($_POST['forgot_submit'])) {
   header('Location: forgot_password.php');
   exit();


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
   
      <h3>Login Now</h3>
      <img src="images/aslogo.png" >
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
      <p><a href="forgot_password.php">Forgot Password?</a></p>
   </form>

</div>

</body>
</html>