
<div class="row close dashboard flx flx-c px-1 py-2">
  <div  class="closer flx"><i class=" flx fa fa-1x fa-chevron-right"></i></div>
  <div class="logo my-1 flx py-1 px-2">
    <img src="./assets/logos/mapmate4.png" alt="" srcset="">
    <img src="./assets/logos/mapmate5.png" alt="" srcset="">
  </div>
  <div class="list flx flx-c py-1">
    <h4>Main Menu</h4>
    <ul class="links flx flx-c">
      <li data-cap="worldmap" class="flx selected"><i class="fa fa-globe"></i><a href="#">World map</a></li>
      <li data-cap="navigation" class="flx"><i class="fa fa-map-location"></i><a href="#">Explore</a></li>
      <li data-cap="countries" class="flx"><i class="fa fa-solid fa-flag"></i><a href="#">Countries</a></li>
      <li data-cap="statistics" id='zoom-country' class="flx"><i class="fa fa-solid fa-circle-info"></i><a href="#">zoom</a></li>
    </ul>
  <h4>Preferences</h4>
    <ul class="links flx flx-c">
      <?php if($stat):?>
      <li data-cap="settings" id="settings" class="flx"><i class="fa fa-gear"></i><a href="#">Settings</a></li>
      <?php endif;?>
      <li data-cap="aboutus" class="flx"><i class="fa fa-mug-hot"></i><a href="#">About Us</a></li>
      <li data-cap="contactus" class="flx"><i class="fa fa-solid fa-paper-plane"></i><a href="#">Contact Us</a></li>
      <?php if($stat):?>
      <li data-cap="logout" onClick="logOut()" class="flx logout"><i class="fa fa-solid fa-arrow-right-from-bracket"></i><a href="#">Logout</a></li>
      <?php endif;?>
    </ul>
  </div>
</div>