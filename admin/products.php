<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};
/* Insert new product to the shop and add it into database */
if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);
   $processor = $_POST['processor'];
   $processor = filter_var($processor, FILTER_SANITIZE_STRING);
   $graphic_card = $_POST['graphic_card'];
   $graphic_card = filter_var($graphic_card, FILTER_SANITIZE_STRING);
   $ram = $_POST['ram'];
   $ram = filter_var($ram, FILTER_SANITIZE_STRING);
   $display = $_POST['display'];
   $display = filter_var($display, FILTER_SANITIZE_STRING);
   $storage = $_POST['storage'];
   $storage = filter_var($storage, FILTER_SANITIZE_STRING);

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = '../uploaded_img/'.$image_02;

   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = '../uploaded_img/'.$image_03;

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'product name already exist!';
   }else{

      $insert_products = $conn->prepare("INSERT INTO `products`(name, details, price, processor, graphic_card, ram, display, storage, image_01, image_02, image_03) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
      $insert_products->execute([$name, $details, $price, $processor, $graphic_card, $ram, $display, $storage, $image_01, $image_02, $image_03]);

      if($insert_products){
         if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            move_uploaded_file($image_tmp_name_03, $image_folder_03);
            $message[] = 'new product added!';
         }

      }

   }  

};
/* Delete product from the shop and remove it from database */
if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
   unlink('../uploaded_img/'.$fetch_delete_image['image_02']);
   unlink('../uploaded_img/'.$fetch_delete_image['image_03']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:products.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">add product</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>product name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
         </div>
         <div class="inputBox">
            <span>product price (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
         </div>
         <div class="inputBox">
            <span>product processor (required)</span>
            <input type="text" class="box" required maxlength="50" placeholder="enter product processor" name="processor">
         </div>
         <div class="inputBox">
            <span>product graphic card (required)</span>
            <input type="text" class="box" required maxlength="50" placeholder="enter product graphic card" name="graphic_card">
         </div>
         <div class="inputBox">
            <span>product ram (required)</span>
            <input type="text" class="box" required maxlength="50" placeholder="enter product ram" name="ram">
         </div>
         <div class="inputBox">
            <span>product display (required)</span>
            <input type="text" class="box" required maxlength="50" placeholder="enter product display" name="display">
         </div>
         <div class="inputBox">
            <span>product storage (required)</span>
            <input type="text" class="box" required maxlength="50" placeholder="enter product storage" name="storage">
         </div>
        <div class="inputBox">
            <span>image 01 (required)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 02 (required)</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>image 03 (required)</span>
            <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
         <div class="inputBox">
            <span>product details (required)</span>
            <textarea name="details" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      
      <input type="submit" value="add product" class="btn" name="add_product">
   </form>

</section>

<section class="show-products">

   <h1 class="heading">products added</h1>

   <div class="box-container">
   <!--Displays added product-->
   <?php
      $select_products = $conn->prepare("SELECT * FROM `products`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="price">Rp<span><?= formatRupiah($fetch_products['price']); ?></span></div>
      <div class="coverspecs">
      <div class="specss"><span><?= $fetch_products['processor']; ?></span></div>
      <div class="specss"><span><?= $fetch_products['graphic_card']; ?></span></div>
      <div class="specss"><span><?= $fetch_products['ram']; ?></span></div>
      <div class="specss"><span><?= $fetch_products['display']; ?></span></div>
      <div class="specss"><span><?= $fetch_products['storage']; ?></span></div>
      </div>
      <div class="details"><span><?= $fetch_products['details']; ?></span></div>
      <div class="flex-btn">
         <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">Delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>
   
   </div>

</section>


<footer class="footer">

   <section class="grid">

   <div class="box">
         <h3>Website</h3>
         <a href="../home.php"> <i class="fas fa-angle-right"></i>Home</a>
         <a href="../about.php"> <i class="fas fa-angle-right"></i>About</a>
         <a href="../shop.php"> <i class="fas fa-angle-right"></i>Shop</a>
         <a href="../contact.php"> <i class="fas fa-angle-right"></i>Contact</a>
      </div>

      <div class="box">
         <h3>User</h3>
         <a href="../user_login.php"> <i class="fas fa-angle-right"></i>Login</a>
         <a href="../user_register.php"> <i class="fas fa-angle-right"></i>Register</a>
         <a href="../cart.php"> <i class="fas fa-angle-right"></i>Cart</a>
         <a href="../orders.php"> <i class="fas fa-angle-right"></i>Orders</a>
      </div>

      <div class="box">
         <h3>Contact Us</h3>
         <a href="mailto:email@gmail.com"><i class="fas fa-envelope"></i> mahasiswa@unikom.com</a>
         <a href="https://www.google.com/myplace"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Jawa Barat, Bandung. <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Jl. Tubagus Ismail , <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Kampus UNIKOM</a>
      </div>

   </section>

   <div class="credit">&copy; copyright @ <?= date('Y'); ?> by <span>insertcode</span> | all rights reserved!</div>

</footer>





<script src="../js/admin_script.js"></script>
   
</body>
</html>