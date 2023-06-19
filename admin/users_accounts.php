<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}
/* Delete users account and its data */
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_user = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete_user->execute([$delete_id]);
   $delete_orders = $conn->prepare("DELETE FROM `orders` WHERE user_id = ?");
   $delete_orders->execute([$delete_id]);
   $delete_messages = $conn->prepare("DELETE FROM `messages` WHERE user_id = ?");
   $delete_messages->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:users_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users accounts</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="accounts" style="padding-bottom: 32rem;">

   <h1 class="heading">user accounts</h1>

   <div class="box-container">
   <!--Display user profile-->
   <?php
      $select_accounts = $conn->prepare("SELECT * FROM `users`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>
   <div class="box">
      <p> user id : <span><?= $fetch_accounts['id']; ?></span> </p>
      <p> username : <span><?= $fetch_accounts['name']; ?></span> </p>
      <p> email : <span><?= $fetch_accounts['email']; ?></span> </p>
      <a href="users_accounts.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('delete this account? the user related information will also be delete!')" class="delete-btn">delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no accounts available!</p>';
      }
   ?>

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