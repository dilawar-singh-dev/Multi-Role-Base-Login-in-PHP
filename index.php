<?php
session_start();
if (isset($_SESSION['admin']) || isset($_SESSION['user'])  ) {
   header('location:home.php');
}
?>

<?php
function LoginSystem()
{
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
include "connection.php";
$email = mysqli_real_escape_string($connection , stripslashes($_REQUEST['email']));
$pass = mysqli_real_escape_string($connection ,stripslashes($_REQUEST['pass']));
$encpass = password_hash($pass , PASSWORD_DEFAULT);
$fetch_dataold = " SELECT pass FROM users WHERE email = '$email' LIMIT 1 " ;
$fetch_resultold = $connection->query($fetch_dataold);
   if ($fetch_resultold->num_rows > 0)
 {
   while ($fetch_rowold = $fetch_resultold->fetch_assoc())
 {
     $passnewfetchold = $fetch_rowold['pass'];
if (password_verify( $pass , $passnewfetchold)) {
$sql =  " SELECT email AND pass FROM `users` WHERE email = '$email' AND pass = '$passnewfetchold'";
$result = mysqli_query($connection , $sql);
$row = mysqli_num_rows($result);
if( $row == 1 )
{
   $fetch_data = " SELECT type FROM users WHERE email = '$email' AND pass = '$passnewfetchold'" ;
   $fetch_result = $connection->query($fetch_data);
   if ($fetch_result->num_rows > 0)
 {
   while ($fetch_row = $fetch_result->fetch_assoc())
 {
         $fetch_type = $fetch_row['type'];
         if ($fetch_type == '1')
         {
      $_SESSION['admin'] = $email;
      header('location:home.php');
       }
       elseif($fetch_type == '0')
       {
       $_SESSION['user'] = $email;
       header('location:home.php');
       }
}
}
}
}
else {
echo "<span style='color:red'>Invalid Username or Password.</span>";
}
}
}
else {
echo "<span style='color:red'>Invalid Username or Password.</span>";
}
$connection->close();
}
}
LoginSystem();
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="style.css">

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="" method="POST">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address"  required>
                <label for="inputEmail">Email address</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
