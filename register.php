<?php
error_reporting(0);
session_start();
include('includes/header.php');
include('includes/navbar.php');
require_once 'includes/Database.php';
?>

<!-- Bootstrap Modal Box For Registration Form start -->
<!-- Modal -->
<!-- Error of Session -->

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
     
      <div class="input_box button modal-footer">
        <input type="submit" value="Sign Up" name="sign-btn" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="sign_up">
        already have an Account? <a href="login.php">Log In</a>
      </div>
    </form>
  </div>
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
<?php
// delete here
require_once 'includes/Database.php';
$deleteObj = new Database;
$dbmethod = $deleteObj->DB_Connect();
$DeleteId = $_GET['delete_id'];
if (isset($DeleteId)) {
    $dbquery = $dbmethod->query("DELETE FROM admin_panel_job_project WHERE id = '$DeleteId '");
    if ($dbquery) {
        $_SESSION['success'] = "delete is successful";
        header('location:register.php');
    }
    else{
        $_SESSION['error'] = "delete is failed";
    }

}
// session varible 
if (isset($_SESSION['error']) && isset($_SESSION['error']) !="") {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['success']) && isset($_SESSION['success']) != "") {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

?>
   <table class="table" width="100%" >
  <thead>
    <tr>
      <th scope="col">S/L Id</th>
      <th scope="col">User Name</th>
      <th scope="col">Email Id</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $selectObj = new Database;
    $dbmethod = $selectObj->DB_Connect();
    $dbquery = $dbmethod->query('SELECT * FROM admin_panel_job_project');
    if ($dbquery->rowCount() > 0) {
        while ($row = $dbquery->fetch(PDO::FETCH_ASSOC)) {
       
    ?>
    <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['Username'] ?></td>
      <td><?php echo $row['Email'] ?></td>
      <td><?php echo $row['Password'] ?></td>
      <td><a class="btn btn-success" href="register_edit.php?edit_id=<?php echo $row['id'] ?>">Edit</a> </td>
      <td><a class="btn btn-danger" href="?delete_id=<?php echo $row['id'] ?>">Delete</a> </td>
    </tr>
    <?php
    }
}
    ?>
  </tbody>
</table>
</div>
</div>
<!-- Bootstrap Modal Box For Registration Form End -->
    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>