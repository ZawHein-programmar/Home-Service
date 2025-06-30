
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
    <div class="auth-wrapper">
        <form class="rounded translucent-form" action="register.php" method="POST" enctype="multipart/form-data">
            <h1 class="text-center pb-3">Sign Up</h1>
            <div class="row g-2"> <!-- start row -->
                <!-- Name -->
                <div class="col-md-12 position-relative">
                    <i class="ri-user-fill form_icon"></i>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
                </div>
                <!-- Email -->
                <div class="col-md-12 position-relative">
                    <i class="ri-mail-fill form_icon"></i>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <!-- Phone -->
                <div class="col-md-12 position-relative">
                <i class="ri-phone-fill form_icon"></i>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number">
                </div>
                <!-- Role -->
                <div class="col-md-12 position-relative custom-select">
                <select name="role" class="form-select custom-no-arrow" id="role" required>
                    <option value="">Please Choose Your Role</option>
                    <option value="customer">Customer</option>
                    <option value="service_provider">Service Provider</option>
                </select>
                <i class="ri-arrow-down-double-line custom-select-icon"></i>
                </div>
                <!-- Home No -->
                <div class="col-md-6 position-relative">
                <i class="ri-home-4-fill form_icon"></i>
                <input type="text" class="form-control" id="home_no" name="home_no" placeholder="Home No" required>
                </div>
                <!-- Street -->
                <div class="col-md-6 position-relative">
                <i class="ri-road-map-fill form_icon"></i>
                <input type="text" class="form-control" id="street" name="street" placeholder="Street" required>
                </div>
                <!-- Ward -->
                <div class="col-md-12 position-relative">
                <i class="ri-building-4-fill form_icon"></i>
                <input type="text" class="form-control" id="ward" name="ward" placeholder="Ward" required>
                </div>
                <!-- Township -->
                <div class="col-md-12 position-relative custom-select">
                <select name="township_id" class="form-select custom-no-arrow" id="township_id" required>
                    <option value="">Please Choose Your Township</option>
                    <option value="1">Township A</option>
                    <option value="2">Township B</option>
                    <!-- Replace with PHP loop -->
                </select>
                <i class="ri-community-line custom-select-icon"></i>
                </div>
                <!-- Password -->
                <div class="col-md-6 position-relative password_fill">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
                <i class="ri-eye-fill eye-icon"></i>
                </div>
                <!-- Confirm Password -->
                <div class="col-md-6 position-relative password_fill">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                <i class="ri-eye-fill eye-icon"></i>
                </div>
                <!-- Submit Button -->
                <div class="col-12 d-grid">
                <button type="submit" class="btn btn-warning" name="submit">Sign Up</button>
                </div>
                <!-- Login Redirect -->
                <div class="col-12 text-center pt-2 fw-bold final-line">
                <p>Have an account already? <a href="./login.php">Log in</a></p>
                </div>
            </div>
        </form>
    </div>
</body>
    <script src="./js/function.js"></script>
    <script src="./Bootstrap/bootstrap.min.js"></script>
</html>