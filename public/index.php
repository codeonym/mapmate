<?php
session_start();
var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAPMATE</title>
  <!-- THUMB ICON -->
  <link rel="icon" href="./assets/logos/mapmate5.png" type="image/icon type">
  <!-- SLTYLESHEETS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- THEME -->
  <link rel="stylesheet" href="css/theme/light.css">
  <!-- CSS LIB -->
  <link rel="stylesheet" href="css/libs/all.min.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
</head>
<body class="flx">
  <!-- MODALS POPUPS -->
    <!-- LOGIN POP UP -->
    <?php include_once __DIR__."/../views/loginpopup.php";?>
    <!-- ALTER COUNTRY POP UP -->
    <?php include_once __DIR__."/../views/updatepopup.php";?>
  <!-- END POP UPS -->
  <!-- START MAIN CONTAINER -->
  <div class=" main-container flx">
    <!-- START DASHBOARD -->
    <?php include_once __DIR__."/../views/dashboard.php";?>
    <!-- END DASHBOARD -->
    <!-- START CONTENT -->
    <div class="row content py-1 px-2">
      <!-- START HEADER -->
      <?php include_once __DIR__."/../views/header.php";?>
      <!-- END HEADER -->
      <!-- START SECTIONS -->
      <div class="flx sections my-1 scroll">
      <!-- START WORLD MAP SECTION -->
      <?php include_once __DIR__."/../views/worldmap.php";?>
      <!-- END WORLD MAP SECTION -->
      <!-- START NAVIGATION SECTION -->
      <?php include_once __DIR__."/../views/navigation.php";?>
      <!-- END NAVIGATION SECTION -->
      <!-- START COUNTRIES -->
      <?php include_once __DIR__."/../views/countries.php";?>
      <!-- END COUNTRIES -->
      <!-- START STATISTICS-->
      <?php include_once __DIR__."/../views/zoom.php";?>
      <!-- END STATISTICS -->
      <!-- START SETTINGS-->
      <?php include_once __DIR__."/../views/settings.php";?>
      <!-- END SETTINGS -->
      <!-- START ABOUT US-->
      <?php include_once __DIR__."/../views/aboutus.php";?>
      <!-- END ABOUT US -->
      <!-- START CONTACT US-->
      <?php include_once __DIR__."/../views/contactus.php";?>
      <!-- END CONTACT US -->
      </div>
      <!-- END SECTIONS -->
    </div>
    <!-- END CONTENT -->
  </div>
  <!-- END MAIN CONTENT -->
  <!-- START SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/main.js"></script>
  <!-- END SCRIPTS -->
</body>
</html>