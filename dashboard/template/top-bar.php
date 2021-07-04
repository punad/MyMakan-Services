
<header class="header">
				<div class="logo-container">
				
					<a href="index.php" class="logo">
						
						<h4>MyMakan Services Sdn Bhd</h4>
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
					
					<span class="separator"></span>
			
					
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/resowner.jpg" alt="Chef" class="img-circle" data-lock-picture="assets/images/resowner.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="MyMakan" data-lock-email="mymakanmalaysiaservices.com">
								<span class="name"><?php echo $_SESSION['name']; ?></span>
								<span class="role">Pemilik Restoran</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="profile.php"><i class="fa fa-user"></i>Profil</a>
								</li>
					<!-- 			<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li> -->
								<li>
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i>Log Keluar</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>