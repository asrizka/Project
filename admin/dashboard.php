<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<!--header-->
<?php include '../components/admin_header.php'; ?>

<section class="dashboard" style="padding-bottom:9rem ;">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">
      <!--Displays the total amount of spending on pending orders-->
      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['pending']);
            if($select_pendings->rowCount() > 0){
               while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                  $total_pendings += $fetch_pendings['total_price'];
               }
            }
         ?>
         <h3><span>Rp. </span><?= $total_pendings; ?><span>/-</span></h3>
         <p>total pendings</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>
      <!--Displays the total amount of earning on completed orders-->
      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_completes->execute(['completed']);
            if($select_completes->rowCount() > 0){
               while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                  $total_completes += $fetch_completes['total_price'];
               }
            }
         ?>
         <h3><span>Rp. </span><?= $total_completes; ?><span>/-</span></h3>
         <p>completed orders</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>
      <!--Displays total amount of placed orders-->
      <div class="box">
         <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount()
         ?>
         <h3><?= $number_of_orders; ?></h3>
         <p>orders placed</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>
      <!--Displays total amount of added products on the shop-->
      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>products added</p>
         <a href="products.php" class="btn">see products</a>
      </div>
      <!--Displays total registered users-->
      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><?= $number_of_users; ?></h3>
         <p>normal users</p>
         <a href="users_accounts.php" class="btn">see users</a>
      </div>
      <!--Displays total amount of user's messages-->
      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>new messages</p>
         <a href="messages.php" class="btn">see messages</a>
      </div>

   </div>

</section>


<footer class="footer">

   <section class="grid">

   <div class="box">
         <h3>quick links</h3>
         <a href="../home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="../about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="../shop.php"> <i class="fas fa-angle-right"></i> shop</a>
         <a href="../contact.php"> <i class="fas fa-angle-right"></i> contact</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="../user_login.php"> <i class="fas fa-angle-right"></i> login</a>
         <a href="../user_register.php"> <i class="fas fa-angle-right"></i> register</a>
         <a href="../cart.php"> <i class="fas fa-angle-right"></i> cart</a>
         <a href="../orders.php"> <i class="fas fa-angle-right"></i> orders</a>
      </div>

      <div class="box">
         <h3>contact us</h3>
         <a href="mailto:email@gmail.com"><i class="fas fa-envelope"></i> mahasiswa@unikom.com</a>
         <a href="https://www.google.com/myplace"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Jawa Barat, Bandung. <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Jl. Tubagus Ismail , <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Kampus UNIKOM</a>
      </div>

   </section>

   <div class="credit">&copy; copyright @ <?= date('Y'); ?> by <span>insertcode</span> | all rights reserved!</div>

</footer>









<script src="../js/admin_script.js"></script>
   
</body>
</html>