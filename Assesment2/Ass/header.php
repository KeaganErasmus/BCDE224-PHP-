<?php
// session_start();
require('functions.php');
include('database/connect.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Agora</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
  </head>

  <?php if(!isset($_SESSION['user'])): ;?>
  <header>
      <a href="index.php"><h1>Agora</h1></a>
  </header>
  <?php else: ;?>

  
  <?php
  // var_dump($_SESSION);
  foreach($users->getUsersData() as $theUser) : 
    if($theUser['usersUsername'] == $_SESSION['user']):
?>
  <header>
      <a href="index.php"><h1>Agora</h1></a>
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <?php if(!isset($_SESSION['user'])): ?>
          <li><a href="login.php">Login</a></li>
          <!-- Nothing gets added to the user -->
          
          <!-- if the user is logged in show the users name and link it to their account -->
          <?php elseif (isset($_SESSION['user'])):;?>
            <!-- <li><a href="seller.php"><?php echo $theUser['usersUsername']?></a></li> -->

            <?php if($theUser['userType'] === 'seller'):;?>
            <!-- go to the seller account page -->
              <li><a href="seller.php"><?php echo $_SESSION['user']?></a></li>
            <?php elseif($theUser['userType'] === 'buyer'):;?>
            <!-- go to the buyer account page -->
              <li><a href="buyer.php"><?php echo $_SESSION['user']?></a></li>
            <?php endif;;?>
        <?php endif;;?>
      </ul>
  </header>
  <?php
  endif;;
  endforeach;;

?>
<?php endif;;?>