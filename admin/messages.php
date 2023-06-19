<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};
/* Delete message */
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location:messages.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="contacts">

<h1 class="heading">messages</h1>

<div class="box-container" style="padding-bottom:16rem ;">
   <!--Display incoming messages-->
   <?php
      $select_messages = $conn->prepare("SELECT * FROM `messages`");
      $select_messages->execute();
      if($select_messages->rowCount() > 0){
         while($fetch_message = $select_messages->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
   <p> user id : <span><?= $fetch_message['user_id']; ?></span></p>
   <p> name : <span><?= $fetch_message['name']; ?></span></p>
   <p> email : <span><?= $fetch_message['email']; ?></span></p>
   <p> number : <span><?= $fetch_message['number']; ?></span></p>
   <p> message : <span><?= $fetch_message['message']; ?></span></p>
   <a href="messages.php?delete=<?= $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no messages</p>';
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