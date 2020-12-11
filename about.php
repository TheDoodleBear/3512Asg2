<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="COMP3512 Assignment02">
  <meta name="author" content="">
  <title>COMP 3512 Assign1</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/app.css" />
  <script src="js/jscript.js"></script>
</head>

<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Assignment2</label>
    <ul>
      <li><a class="active" href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="galleries.php">Galleries</a></li>
      <li><a href="browse-paintings.php">Browse/Search Paintings</a></li>
      <li><a href="favorites.php">Favorites</a></li>
      <?php
      if (isset($_SESSION['CustID'])) {
        echo "<li><a href='logout.php'>LogOut</a></li>";
      } else {
        echo "<li><a href='login.php'>Login</a></li>";
      }
      ?>
    </ul>
  </nav>
  <div id="aboutPage">
    <h1>Mount Royal University COMP 3512 Assignment 2</h1>
    <h2>Professor: Randy Connolly</h2>
    <h3>Fall Semester 2020</h3>
    <div id="contributors">
      <h3>Group Members</h3>
      <ul>
        <li><a href="https://github.com/TheDoodleBear">Lorenzo Young</a></li>
        <li><a href="https://github.com/rwong210 ">Ryan Wong</a></li>
        <li><a href="https://github.com/Deckard73">Adrian Boettcher</a></li>
        <li><a href="https://github.com/dhudo986">Dustin Hudon</a></li>
        <li><a href="https://github.com/Chukwu-j/">Jeremiah Chukwu</a></li>
      </ul>
    </div>
    <div id="repo">
      <h3>Assignment 2 Repository</h3>
      <a href="https://github.com/TheDoodleBear/3512Asg2">Assignment 2</a>
    </div>
    <div id="credit">
      <!-- Any external code we used can go here to show credit -->
    </div>
  </div>
</body>

</html>