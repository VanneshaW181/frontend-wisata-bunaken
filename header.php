<div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="" class="helpline-box">

          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <div class="wrapper">
            <p class="helpline-title">Contact For More :</p>

            <p class="helpline-number">(currently unavailable)</p>
          </div>

        </a>

        <a href="#" class="logo">
          <img src="asset/logo.png" alt="logo">
        </a>

        <div class="header-btn-group">

          <button class="search-btn" aria-label="Search">
            <ion-icon name="search"></ion-icon>
          </button>

          <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

      </div>
    </div>

    <div class="header-bottom">
      <div class="container">

        <ul class="sub-navbar-list">

          <li>
            <a href="https://www.facebook.com/bunaken.manado.184?mibextid=ZbWKwL" class="sub-navbar-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://twitter.com/wonderfulid/status/658610031626072065" class="sub-navbar-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://youtu.be/3AGwLONO8B8" class="sub-navbar-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="asset/logo.png" alt="Tourly logo">
            </a>

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

            <ul class="navbar-list">

                <li>
                  <a href="index.php#home" class="navbar-link" data-nav-link>home</a>
                </li>
                
                <li>
                  <a href="index.php#package" class="navbar-link" data-nav-link>Penginapan</a>
                </li>
                
                <li>
                  <a href="index.php#gallery" class="navbar-link" data-nav-link>Gallery</a>
                </li>
                
                <li>
                  <a href="index.php#team" class="navbar-link" data-nav-link>Team</a>
                </li>
                
            </ul>

        </nav>
        
        <?php
        		if(!isset($_SESSION)) 
                { 
                    session_start(); 
                }
        
                if (!isset($_SESSION['username'])) {
                    echo "<ul class='sub-navbar-list'>";
                    echo "<li><a href='login.php'><button class='btn btn-primary'>Login</button></a></li>";
                	echo "</ul>";
                }else {
                	echo "<ul class='sub-navbar-list'>";
                	echo "<li><a href='input-penginapan.php'><button class='btn btn-primary'>+ Penginapan</button></a></li>";
                	echo "<li><a href='input-galeri.php'><button class='btn btn-primary'>+ Galeri</button></a></li>";
                	echo "<li><a href='logout.php'><button class='btn btn-primary'>Logout</button></a></li>";
                	echo "</ul>";
                }
        ?>

    </div>
</div>