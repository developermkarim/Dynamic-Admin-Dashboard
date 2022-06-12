<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Bootstrap Modal Box For Registration Form start -->
<!-- Modal -->
<!-- Error of Session -->
<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}

?>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign Up Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="main_div">
    <form action="sign-up.php" method="post">
      <div class="input_box">
        <input type="text" placeholder="User Name" name="userName" required>
        <div class="icon"><i class="fas fa-user"></i></div>
      </div>
      <div class="input_box">
        <input type="email" placeholder="Email or Phone" name="email" required>
        <div class="icon"><i class="fas fa-user"></i></div>
      </div>
      <div class="input_box">
        <input type="password" placeholder="Password" name="password" required>
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
      <div class="input_box">
        <input type="password" placeholder="Confirm Password" name="Con-password" required>
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
      <div class="option_div">
       
      </div>

      <div class="input_box button">
        <input type="submit" value="Sign Up" name="sign-btn">
      </div>
      <div class="sign_up">
        already have an Account? <a href="login.php">Log In</a>
      </div>
    </form>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Custom in bootstrap -->
<div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="card-header mt-3">
    <h6 class="m-0 font-weight-bold text-primary"> Admin Profile
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
 Add Admin Profile
</button>
</h6>
</div>
<!-- Card Body Here -->
<div class="card-body">
    <div class="table">
    
    </div>
</div>
</div>
<!-- Bootstrap Modal Box For Registration Form End -->
    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>