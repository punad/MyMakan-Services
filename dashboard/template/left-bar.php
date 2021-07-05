<aside id="sidebar-left" class="sidebar-left">
				
	<div class="sidebar-header">
		<div class="sidebar-title"><i class="fa fa-home" aria-hidden="true"></i>   Menu Utama
			
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li class="nav-active">
						<a href="index.php">
							<i class="" aria-hidden="true"></i>
							<span>Tempahan</span>
						</a>
					</li>
					<?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == 1)){ ?>
					<li class="nav-parent">
						<a>
							<i class="" aria-hidden="true"></i>
							<span>Meja</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="table-add.php">
									<span class="pull-right label label-primary"></span>
									<i class="fa fa-plus-square" aria-hidden="true"></i>
									<span>Tambah Meja</span>
								</a>
							</li>
							<li>
								<a href="table-list.php">
									<span class="pull-right label label-primary"></span>
									<i class="fa fa-plus-square" aria-hidden="true"></i>
									<span>Senarai Meja</span>
								</a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == 1)){ ?>
					<li class="nav-parent">
						<a>
							<i class="" aria-hidden="true"></i>
							<span>Menu</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="menu-add.php">
									<span class="pull-right label label-primary"></span>
									<i class="fa fa-plus-square" aria-hidden="true"></i>
									<span>Tambah Menu</span>
								</a>
							</li>
							<li>
								<a href="menu-list.php">
									<span class="pull-right label label-primary"></span>
									<i class="fa fa-plus-square" aria-hidden="true"></i>
									<span>Senarai Menu</span>
								</a>
							</li>
						</ul>
					</li>
					<?php } ?>
					<?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == 1)){ ?>
					<li class="nav-parent">
						
							</li>
						</ul>
					</li>
					<?php } ?> 
				</ul>
			</nav>

			<hr class="separator" />
		</div>

	</div>

</aside>