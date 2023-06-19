<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}
/* Update payment status from pending to completed */
if (isset($_POST['update_payment'])) {
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';
}
/* Delete placed order */
if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Placed Orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>

   <section class="orders">

      <h1 class="heading">Placed Orders</h1>

      <div class="box-container" style="padding-bottom: 40rem;">
         <!--Displays placed orders-->
         <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders`");
         $select_orders->execute();
         if ($select_orders->rowCount() > 0) {
            while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <div class="box">
                  <p> Placed on &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span><?= $fetch_orders['placed_on']; ?></span> </p>
                  <p> Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span><?= $fetch_orders['name']; ?></span> </p>
                  <p> Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span><?= $fetch_orders['number']; ?></span> </p>
                  <br>
                  <p> Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span> <br> <?= $fetch_orders['address']; ?></span> </p>
                  <br>
                  <p> Total Products : <span> <br><?= $fetch_orders['total_products']; ?></span> </p>
                  <br>
                  <p> Total Price &nbsp;&nbsp;&nbsp;&nbsp; : <span>Rp<?= formatRupiah($fetch_orders['total_price']); ?></span> </p>
                  <br>
                  <p> Payment method : <span><?= $fetch_orders['method']; ?></span> </p>
                  <form action="" method="post">
                     <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                     <select name="payment_status" class="select">
                        <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
                        <option value="Cending">Pending</option>
                        <option value="Completed">Completed</option>
                     </select>
                     <div class="flex-btn">
                        <input type="submit" value="update" class="option-btn" name="update_payment">
                        <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">Delete</a>
                     </div>
                  </form>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">no orders placed yet!</p>';
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
   </section>












   <script src="../js/admin_script.js"></script>

</body>

</html>