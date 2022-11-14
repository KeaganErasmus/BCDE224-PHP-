<?php
// var_dump($_SESSION);
  // $userID = $_GET['usersID'] ?? 2;
  foreach($users->getUsersData() as $theUser) : 
    if($theUser['usersUsername'] == $_SESSION['user']):
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Agor/buyerAcount</title>
  </head>
  <body>
    <aside></aside>
    <main>
      <h2 for="">User Name</h2>
      <p><?php echo $theUser['usersUsername']?></p>
      <br />

      <h2 for="">Email</h2>
      <p><?php echo $theUser['usersEmail']?></p>
      <br />
      <h2 for="">Products Bought</h2>

      <img src="img/hammer.jpg" alt="" />
      <img src="img/screwdriver.jpg" alt="" />
    </main>
  </body>
</html>

<?php
  endif;;
  endforeach;;
?>