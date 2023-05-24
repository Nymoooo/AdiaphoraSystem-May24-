<?php
@include 'config.php';

if(isset($_POST['forgot_submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);

   // Perform the necessary operations for password recovery
   // ...

   // Display a success message or redirect to a success page
   // ...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Forgot Password</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Forgot Password</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="submit" name="forgot_submit" value="Reset Password" class="form-btn">
   </form>

</div>

</body>
</html>
