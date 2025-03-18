<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= base_url('assets/css/portal.css') ?>><!-- Ganti dengan path CSS Anda -->
</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="app-auth-body mx-auto">	
            <h2 class="auth-heading text-center mb-4">Perjalanan Dinas United Tractor TBK Banjarmasin</h2>
            <h2 class="auth-heading text-center mb-3" style="font-size: 20px;">LOG IN</h2>

                <div class="auth-form-container text-start">
                    <form action="<?= site_url('LoginView/authenticate'); ?>" method="post">
                    
                    
                        <?= csrf_field() ?> <!-- Ini untuk keamanan CSRF -->
                        <div class="username mb-3">
                            <label class="sr-only" for="signin-username">Username</label>
                            <input id="signin-username" name="signin-username" type="text" class="form-control" placeholder="Username" required>
                        </div><!--//form-group-->
                        <div class="password mb-3">
                            <label class="sr-only" for="signin-password">Password</label>
                            <input id="signin-password" name="signin-password" type="password" class="form-control" placeholder="Password" required>
                        </div><!--//form-group-->
                        <div class="text-center">
                            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                        </div>
                    </form>
                    <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.html">here</a>.</div>
                </div><!--//auth-form-container-->	
            </div><!--//app-auth-body-->
        </div><!--//auth-main-col-->
        
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder"></div>
            <div class="auth-background-mask"></div>
        </div> 
    </div><!--//row-->
</body>

</html>