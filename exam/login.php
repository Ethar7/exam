<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
include "header.php";
include "navbar.php";
include "logout.php";
?>
<?php
session_start();
$Email = isset($_POST['Email']) ? htmlspecialchars(trim($_POST['Email'])) : '';
$password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';

if (isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
} else {
    echo "No data found.";
    exit();
}
?>



<div class="card-body px-5 py-5" style="background-color:darkgray;">
  <h3 class="card-title text-left mb-3">Login</h3>
  <form action="index.php" method="post">
    <div class="form-group">
      <label>email *</label>
      <input type="email" class="form-control p_input" value="<?php echo htmlspecialchars($password); ?>">
    </div>
    <div class="form-group">
      <label>password *</label>
      <input type="password" class="form-control p_input" value="<?php echo htmlspecialchars($password); ?>">
    </div>
    <div class="form-group d-flex align-items-center justify-content-between">
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input"> Remember me </label>
        </div>
        <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
      </div>
      <div class="d-flex">
        <button class="btn btn-facebook me-2 col">
          <i class="mdi mdi-facebook"></i> Facebook </button>
          <button class="btn btn-google col">
            <i class="mdi mdi-google-plus"></i> Google plus </button>
          </div>
          <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
        </form>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- row ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<?php include "footer.php" ?>


</body>
</html>
  <!-- //table user, product, cart ,, review comment , rating  = session -->