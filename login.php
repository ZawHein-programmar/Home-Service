
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./Bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="auth-page" style="background-image:url('img/bg.png');">
  <div class="container">
      <div class="row justify-content-center my-3">
        <div class="col-10 col-md-6 col-lg-4">
          <form class="pt-3 rounded translucent-form">
            <h1 class="text-center mb-3">Welcome Back</h1>
            <div class="mb-3 position-relative">
                <i class="ri-mail-fill form_icon"></i>
                <input type="text" class="form-control" placeholder="Enter Your Email" id="email" name='email'/>
            </div>
            <div class="mb-3 position-relative password_fill">
                <i class="ri-eye-fill eye-icon"></i>
                <input type="password" class="form-control" placeholder="Enter Your Password" id="password" name='password'/>
            </div>
            <div class="d-grid mb-2">
              <button type="submit" class="btn btn-warning">Login</button>
            </div>
            <div class="text-center pt-2 fw-bold final-line">
              <p>&nbsp;Don't have an account? <a href="./register.php">Sign Up</a></p>
            </div>
          </form>
        </div>
      </div>
  </div>
  <script src="./Bootstrap SG/bootstrap.min.js"></script>
</body>
    <script src="./js/function.js"></script>
</html>