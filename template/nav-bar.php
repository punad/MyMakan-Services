<!-- nav-bar.php -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  	<div class="container">
	    <a class="navbar-brand" href="index.php">MyMakan Services</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="oi oi-menu"></span> Menu
	    </button>

	    <div class="collapse navbar-collapse" id="ftco-nav">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item"><a href="index.php" class="nav-link">Laman Utama</a></li>
	        <?php if(!isset($_SESSION['isLoggedIn'])){ ?>
	         <li class="nav-item"><a href="register.php" class="nav-link">Daftar</a></li>
	       	 <li class="nav-item active"><a href="login.php" class="nav-link">Log Masuk</a></li>
	        <?php }elseif (isset($_SESSION['isLoggedIn'])) { ?>
	        <li class="nav-item"><a href="logout.php" class="nav-link"><?php echo $_SESSION['name']; ?>(Log Keluar)</a></li>
	        <?php } ?>
	      </ul>
	    </div>
  	</div>
</nav>