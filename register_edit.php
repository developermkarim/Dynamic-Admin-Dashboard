<?php
error_reporting(0);
session_start();
include('includes/header.php');
include('includes/navbar.php');
require_once 'includes/Database.php';
$updateObj = new Database;
$dbmethod = $updateObj->DB_Connect();
$editId = $_GET['edit_id'];
$dbquery = $dbmethod->query("SELECT * FROM admin_panel_job_project where id='$editId'");
if ($dbquery->rowCount() > 0) {
   while ($updateRow = $dbquery->fetch(PDO::FETCH_ASSOC)) {
    $Uname = $updateRow['Username'];
    $Uemail = $updateRow['Email'];
    $Upassword = $updateRow['Password'];
   }
}

if (isset($_POST['update-btn'])){
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con_password = $_POST['Con-password'];

     $Updatequery = $dbmethod->query("UPDATE admin_panel_job_project set Username='$userName',Email='$email',Password='$password' where id = '$editId'");
     if ($Updatequery) {
        header('refresh:1 register.php');
        $_SESSION['success'] = "Data is Updated successfully";
        
     }
     else {
        $_SESSION['error'] = "Data is not updated";
     }
    }
    
    
?>

<form action="" method="post">
      <div class="input_box">
        <input type="text" placeholder="User Name" name="userName" required value="<?php echo $Uname ?>">
        <div class="icon"><i class="fas fa-user"></i></div>
      </div>
      <div class="input_box">
        <input type="email" placeholder="Email or Phone" name="email" required value="<?php echo $Uemail ?>">
        <div class="icon"><i class="fas fa-user"></i></div>
      </div>
      <div class="input_box">
        <input type="password" placeholder="Password" name="password" required value="<?php echo $Upassword ?>">
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
      <div class="input_box">
        <input type="password" placeholder="Confirm Password" name="Con-password" required value="<?php echo $Upassword ?>">
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
     
      <div class="input_box button modal-footer">
        <input type="submit" value="Update" name="update-btn" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="sign_up">
        already have an Account? <a href="login.php">Log In</a>
      </div>
    </form>
<!-- Bootstrap Modal Box For Registration Form End -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>