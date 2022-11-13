<?php
  $userID = $_GET['usersID'] ?? 1;
  foreach($users->getUsersData() as $theUser) : 
    if($theUser['usersID'] == $userID):
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
      <h2 for="">First Name</h2>
      <p>Keagan</p>
      <p><?php echo $theUser['usersUsername']?></p>
      <br />
      <h2 for="">last Name</h2>
      <p>Erasmus</p>
      <br />
      <h2 for="">Email</h2>
      <p>keaganemail@gmail.com</p>
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