<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Starting project</title>
  <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
  <link rel="stylesheet" type="text/css" href="src/hamburger.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">


  </style>

</head>

<body>
  <?php include_once "menubar.php"; 
  ?>

<div class="ui container segment">
<div class="ui  segment">
    <div class="ui  breadcrumb">
        <p class="section">Home</p>
</div></div>

<div class="ui hidden divider"></div>

<div class="ui container">
<!-- <?php //include_once "slidebar.php";?> -->

</div>
<?php include_once "item.php";?>

</div>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="src/semantic.min.js"></script>
  <script src="src/hamburger.js"></script>
  <script src="src/sticky.js"></script>
  <script src='https://cdn.jsdelivr.net/jquery.glide/1.0.6/jquery.glide.min.js'></script>
<script>$('.slider').glide({
  autoplay: false,
  arrowsWrapperClass: 'slider-arrows',
  arrowRightText: '',
  arrowLeftText: ''
});</script>
</body>

</html>