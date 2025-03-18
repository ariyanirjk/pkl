<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FontAwesome JS-->
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="<?= base_url('assets/css/portal.css') ?>">

</head>

<body class="app">
	<header class="app-header fixed-top">
		<div class="app-header-inner">
			<div class="container-fluid py-2">
				<div class="app-header-content">
					<div class="row justify-content-between align-items-center">

						<div class="col-auto">
							<a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
									role="img">
									<title>Menu</title>
									<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
										stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
								</svg>
							</a>
						</div><!--//col-->
						<div class="search-mobile-trigger d-sm-none col">
							<i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
						</div><!--//col-->
						<div class="app-search-box col">
							<form class="app-search-form">
								<input type="text" placeholder="Search..." name="search"
									class="form-control search-input">
								<button type="submit" class="btn search-btn btn-primary" value="Search"><i
										class="fa-solid fa-magnifying-glass"></i></button>
							</form>
						</div><!--//app-search-box-->

						
					</div><!--//row-->
				</div><!--//app-header-content-->
			</div><!--//container-fluid-->
		</div><!--//app-header-inner-->
		<div id="app-sidepanel" class="app-sidepanel">
			
			<div class="sidepanel-inner d-flex flex-column">
				
				<div class="app-branding">
    <a class="app-logo" href="index.html">
        <img class="logo-icon me-2" src="<?= base_url('assets/images/ut.jpg') ?>" alt="logo">
        <span class="logo-text" style="font-size: 18px;">United Tractors</span>
    </a>
</div><!--//app-branding-->

				
				<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
					<ul class="app-menu list-unstyled accordion" id="menu-accordion">
					<li class="nav-item">
    <a href="<?= base_url('/dashboard'); ?>" class="nav-link">
        <span class="nav-icon">
            <!-- Ikon Rumah dari Bootstrap Icons -->
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                <path fill-rule="evenodd"
                    d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
            </svg>
        </span>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <!-- Link Utama untuk Halaman Akun -->
    <a class="nav-link" href="<?= base_url('/akun'); ?>">
        <span class="nav-icon">
            <!-- Ikon Akun dari Bootstrap Icons -->
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M8 9a5 5 0 0 0-5 5 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5 5 5 0 0 0-5-5z"/>
            </svg>
        </span>
        <span class="nav-link-text">Akun</span>
    </a>
</li>
<a class="nav-link" href="<?= base_url('/Pegawai'); ?>">
    <span class="nav-icon">
        <!-- Ikon Pegawai (Person Badge) dari Bootstrap Icons -->
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.5 2a1 1 0 0 1 2 0V3h-2V2z"/>
            <path fill-rule="evenodd" d="M4.5 3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H10v1a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V3H4.5zm3.5 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm-3 5a3 3 0 0 1 6 0H5z"/>
        </svg>
    </span>
    <span class="nav-link-text">Pegawai</span>
</a>

	
	<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/PerjalananDinas'); ?>">
        <span class="nav-icon">
            <!-- Ikon Koper dari Bootstrap Icons -->
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-briefcase-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M6.5 0a1 1 0 0 0-1 1V2h-2A1.5 1.5 0 0 0 2 3.5v10A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 12.5 2h-2V1a1 1 0 0 0-1-1h-3zm3 2V1h-3v1h3z"/>
            </svg>
        </span>
        <span class="nav-link-text">Perjalanan Dinas</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/Pengajuan'); ?>">
        <span class="nav-icon">
            <!-- Ikon Dokumen dari Bootstrap Icons -->
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.5 7a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                <path fill-rule="evenodd" d="M5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h6.5a2 2 0 0 1 2 2v11.5a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10.5 0H4a1 1 0 0 0-1 1v11.5a1 1 0 0 0 1 1h6.5a1 1 0 0 0 1-1V2z"/>
            </svg>
        </span>
        <span class="nav-link-text">Pengajuan Dinas</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/Biaya'); ?>">
        <span class="nav-icon">
            <!-- Ikon Dompet dari Bootstrap Icons -->
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-wallet2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H3zm0-1h10a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3z"/>
                <path d="M13 5V4H3v1h10z"/>
            </svg>
        </span>
        <span class="nav-link-text">Biaya</span>
    </a>
</li>
								</a><!--//nav-link-->
								<li class="nav-item">
    <a class="nav-link" href="<?= base_url('/logout'); ?>">
        <span class="nav-icon">
            <!-- Ikon Logout dari Bootstrap Icons -->
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.146 11.354a.5.5 0 0 1 0-.708L12.793 8 10.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                <path fill-rule="evenodd"
                    d="M4.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5z"/>
                <path fill-rule="evenodd"
                    d="M4 1.5A1.5 1.5 0 0 1 5.5 0h7A1.5 1.5 0 0 1 14 1.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 0 12.5 1h-7A.5.5 0 0 0 5 1.5v13a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 12.5 16h-7A1.5 1.5 0 0 1 4 14.5v-13z"/>
            </svg>
        </span>
        <span class="nav-link-text">Log Out</span>
    </a>
</li>
						</ul><!--//footer-menu-->
					</nav>
				</div><!--//app-sidepanel-footer-->
			</div><!--//sidepanel-inner-->
		</div><!--//app-sidepanel-->
        </div>
	</header><!--//app-header-->
    <div class="app-wrapper">
	
	    <div class="app-content pt-3 p-md-3 p-lg-4">
        <main id ="main" class= "main">
            <?= $this->renderSection('Content'); ?>
    </main><!--End Main -->
    </div>
    </div>
    
    <footer class="app-footer">
	    </footer><!--//app-footer-->
    </div><!--//app-wrapper-->    				
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 
</body>
</html> 


        