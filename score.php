<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location: login_form.php');
    exit();
}

$score = isset($_GET['score']) ? $_GET['score'] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quiz Score</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="manifest" href="manifest.json">

</head>

<body>

   <div class="container">

      <div class="content">
         <h3>hi, <span>STUDENT</span></h3>
         <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
         <p>this is a STUDENT page</p>

         <a href="logout.php" class="btn">logout</a>

         <h2>Quiz Score</h2>
         <p>Your score: <?php echo $score; ?></p>
      </div>

   </div>

</body>

</html>
