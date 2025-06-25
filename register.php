
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Form</title>
    <link rel="stylesheet" href="./Bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="auth-page" style="background-image:url('img/bg.png');">
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-10 col-md-6 col-lg-4">
                <form class="px-4 rounded translucent-form" style="min-height: fit-content;" action="register.php" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center py-3">Sign Up</h1>
                    <div class="mb-3 position-relative ">
                        <i class="ri-user-fill form_icon"></i>
                        <input type="text" autocomplete="off" class="form-control" placeholder="Enter Your Name" id="username" name="username" value="">
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="ri-mail-fill form_icon"></i>
                        <input type="text" class="form-control" placeholder="Enter Your Email" id="email" name='email'/>
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="ri-phone-fill form_icon"></i>
                        <input type="phone" class="form-control" placeholder="Enter Your Phone Number" id="phone" name='phone'/>
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="ri-user-location-fill form_icon"></i>
                        <input type="address" class="form-control" placeholder="Enter Your Address" id="address" name='address'/>
                    </div>
                    <div class="mb-3 position-relative custom-select">
                        <select name="role" class="form-select no-arrow" id="role">
                            <option>Please Choose Your Role</option>
                            <option value="admin" >Admin</option>
                            <option value="user" >Customer</option>
                            <option value="user" >Service Provider</option>
                        </select>
                        <i class="ri-arrow-down-double-line custom-select-icon"></i>
                    </div>
                    <div class="mb-3 position-relative">
                        <div class="password_fill">
                            <input type="password" id="password" class="form-control" placeholder="Enter Password"/>
                            <i class="ri-eye-fill eye-icon"></i>
                        </div>
                    </div>
                    <div class="mb-3 position-relative">
                        <div class="password_fill">
                            <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password"/>
                            <i class="ri-eye-fill eye-icon"></i>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning" name='submit'>Sign Up</button>
                    </div>
                    <div class="text-center pt-2 fw-bold final-line">
                        <p>&nbsp;Have an account already? <a href="./login.php">Log in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
    <script src="./js/function.js"></script>
    <script src="./Bootstrap/bootstrap.min.js"></script>
</html>