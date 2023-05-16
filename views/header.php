
<header class="flx py-1 px-2">
  <div class="row flx">
    <div class="lang bbn flx">
      <select name="" id="" class="">
        <option value="EN">EN</option>
        <option value="FR">FR</option>
        <option value="AR">AR</option>
      </select>
    </div>
    <button class="mode  bbn flx">
      <span></span>
    </button>
    <div action="" class="search flx"> 
      <input class=" text-center search-country"type="text" name="">
      <button class="go flx " value="search"><i class="fa fa-solid fa-magnifying-glass"></i></button>
      <div class="results flx">
        <div class="container scroll">
        </div>
      </div>
    </div>
  </div>
  <div class="profile row flx ">
    <div class="pic">
      <?php if($stat):?>
      <img src="<?php echo $_SESSION["user"]["avatar"]; ?>" alt="">
      <?php else: ?>
        <img src="assets/avatars/user.png" alt="">
      <?php endif;?>
    </div>
    <i class="chevron fa fa-chevron-down" aria-hidden="true"></i>
    <div class="expand px-1 py-1 flx flx-c">
      <?php if($stat):?>
        <ul class="opt">
        <li><i class="fa fa-solid fa-user-alt"></i><span><?php echo $_SESSION["user"]["username"] ?></span></li>
        <li onclick="document.getElementById('settings').click();"><i class="fa fa-solid fa-gear"></i><span>Settings</span></li>
        <li onclick="logOut()"><i class="fa fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span></li>
      </ul>
      <?php else: ?>
      <div class="login-btn"><i class="fa fa-solid fa-arrow-right-to-bracket"></i><span>Login</span></div>
      <?php endif;?>
    </div>
  </div>
</header>