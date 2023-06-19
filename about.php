<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>
<div class="background-image"></div>
<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/kezp.png" alt="">
      </div>

      <div class="content">
         <h3>ROGEUY - Republic of Gamers EUY</h3>
         <p>Sebuah kesenangan dan kebahagiaan bisa didapat dengan kerja keras, namun jika kita mencoba untuk menyadari bahwa hal tersebut sudah ada didepan kita, maka sebuah kesenangan sejati akan tercipta.</p>
         <p>ROGEUY hadir dalam bentuk device permainan untuk memberikan kesenangan terhadap para Gamers berdompet tebal. Website kami dibuat dengan tujuan LAST EXAM of the Semester, dengan harapan memberikan kami sebagai tim developer sebuah kesenangan dan kebahagiaan atas kerja keras kami.</p>
         <p>"Nothing comes out without an effort, even the smallest thing require the smallest ammount of energy"</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">client's reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="images/kris.png" alt="">
         <p>"Laptopnya nyaman dipakai sama kyk dia nyaman di hati.. tapi tolong jangan buat nyaman kalo ga serius"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Kristanto</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/riz.png" alt="">
         <p>"Setelah saya membeli laptop dengan spek bagus harga rakyat disini, spek otak saya juga ikut terupgrade. Laptop lancar, otak pun encer"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Rizka</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/vito.png" alt="">
         <p>"Percaya atau Tidak.. Jika anda membeli Laptop ROG, status anda menjadi sangat amat SLEBEWWWWW" &#x1F976;&#x1F976;&#x1F976;</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Vito</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-4.png" alt="">
         <p>Tak percaya ! ternyata laptop ini bisa beradu dengan SUPER KOMPUTER !</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Rafly</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-5.png" alt="">
         <p>Dibandingin sama laptop kentang uing, ini ROGEUY kek Dewa turun dari Khayangan!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Julpan</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/doggo.png" alt="">
         <p>"woof woofwoof woooffff wooff wooofffff woof woofwoof woooffff wooff wooofffff woof woofwoof woooffff wooff wooofffff"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lil bud</h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>