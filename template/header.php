<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $title; ?></title>

  <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
</head>

<body style="background-color: violet">

  <nav class="navbar bg-info navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Bookstore</a>
      </div>

      <!--/.navbar-collapse -->
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="pub_profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Profile</a></li>

          <!-- link to publiser_list.php -->
          <!-- <li><a href="publisher_list.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp; Publisher</a></li> -->
          <!-- link to books.php -->
          <li><a href="books.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Books</a></li>
          <!-- <?php if (isset($_SESSION['publisherid'])) { ?>
            <a class="link" href="logout.php" style="text-decoration:none">logout</a>
          <?php } else { ?>
            <a class="link" href="login.php" style="text-decoration:none">login</a>
          <?php } ?> -->
          <li><a href="login2.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li> 

        </ul>
      </div>
    </div>
  </nav>
  <?php
  if (isset($title) && $title == "Index") {
  ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: green">
      <div class="container">
        <h1>Welcome to bookstore</h1>
        <p class="lead">This site has been made to view books and their publishers</p>

      </div>
    </div>
  <?php } ?>

  <div class="container" id="main">