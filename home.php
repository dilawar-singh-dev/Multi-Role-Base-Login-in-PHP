<?php include("login-check.php"); ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Home</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="style.css">

</head>
<body class="">


  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="w-100 navbar-nav d-flex justify-content-end">
      <li class="nav-item text-right">
        <a class="nav-link btn btn-danger text-white" href="logout.php">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <div class="alert alert-success w-100 text-center">

      <?php
      echo $_SESSION['success_login'];
      ?>

    </div>


    <div class="col-12 text-center text-white align-self-center mt-5">
    <h1><?php
           if(isset($_SESSION['admin']))
           {
             echo "WELCOME ADMIN";
           }
           else
           {
             echo "WELCOME USER";
           }
       ?></h1>
    </div>

  </div>


</div>
</body>
</html>
