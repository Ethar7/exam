
<?php
include "header.php";
include "navbar.php";
?>
<?php

session_start();

if(isset($_POST['submit'])) {

    //catch, filter

    $Username = htmlspecialchars(trim($_POST['Username']));
    $Email = htmlspecialchars(trim($_POST['Email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $Phone = htmlspecialchars(trim($_POST['Phone']));
    $Address = htmlspecialchars(trim($_POST['Address']));
    //validation
    $errors = [];
    //USERNAME (required, string, 50, not contain digits)
    if($Username == "") {
        $errors['Username'] = "name is required";
    }else if(!is_string($Username)){
        $errors['Username'] = "name must be a string";
    }else if(strlen($Username)>50) {
        $errors['Username'] = "name must be less than or equal 50 chars";
    }elseif(!preg_match("/^[a-zA-Z ]*$/",$Username)) {
        $errors['Username'] = "Digit are not allowed";
    }
    
    //email (required, email, 100)
    if($Email == "") {
        $errors['Email'] = "email is required";
    }else if(! filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $errors['Email'] = "EMAIL NOT CORRECT";
    }
    //password (required, string, min6)
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
    if (empty($password)) {
      $errors['password'] = "password is required";
    }
    elseif (!preg_match($pattern, $password)) {
      $errors['password'] = "password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
      
    }

    //phone(required, numeric)
    if($Phone == ""){
      $errors['Phone'] = "phone is required";
    }
    else if(!preg_match('/^[0-9]+$/', $Phone)) {
      $errors['Phone'] = "phone is incorrect";
    }
    
    if(! empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['Username'] = $Username;
        $_SESSION['Email'] = $Email;
        $_SESSION['password'] = $password;
        $_SESSION['Phone'] = $Phone;
        header("location: signup.php");
        exit();
    }else {
      // Store data in session
      $_SESSION['data'] = [
        'Email' => $Email,
        'password' => $password,
      ];
      exit();    
  }
}

?>
    <?php 
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
    $Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
    $Phone = isset($_SESSION['Phone']) ? $_SESSION['Phone'] : "";
    $Email = isset($_SESSION['Email']) ? $_SESSION['Email'] : "";
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : "";
    $Address = isset($_SESSION['Address']) ? $_SESSION['Address'] : "";
    unset($_SESSION['errors']);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form action="signup.php" method="post">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" name="Username">
                    <p class="text-danger"><?php echo isset($errors['Username']) ? $errors['Username'] : ''; ?></p>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name = "Email" >
                    <p class="text-danger"><?php echo isset($errors['Email']) ? $errors['Email'] : ''; ?></p>
                  </div>
                  <div class="form-group">
                    <label>password</label>
                    <input type="password" class="form-control p_input" name="password">
                    <p class="text-danger"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></p>
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control p_input" name="Phone">
                    <p class="text-danger"><?php echo isset($errors['Phone']) ? $errors['Phone'] : ''; ?></p>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control p_input" name="Address">
                    <p class="text-danger"><?php echo isset($errors['Address']) ? $errors['Address'] : ''; ?></p>
                  </div>
                  
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      
                      <div class="text-center">
                        <button type="submit"  class="btn btn-primary btn-block enter-btn" name="submit">Signup</button>
                      </div>
                      <div class="d-flex">
                        <button class="btn btn-facebook col me-2">
                          <i class="mdi mdi-facebook"></i> Facebook </button>
                          <button class="btn btn-google col">
                            <i class="mdi mdi-google-plus"></i> Google plus </button>
                          </div>
                          <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                          <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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