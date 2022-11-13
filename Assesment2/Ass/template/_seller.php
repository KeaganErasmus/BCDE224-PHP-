<?php
  $userID = $_GET['usersID'] ?? 1;
  foreach($users->getUsersData() as $theUser) : 
    if($theUser['usersID'] == $userID):
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Agor/sellerAcount</title>
  </head>
  <body>
    <main>
      <h2 for="">First Name</h2>
      <p>Keagan</p>
      <p><?php echo $theUser['usersUsername']?></p>
      <br />
      <h2 for="">last Name</h2>
      <p>Erasmus</p>
      <br />
      <h2 for="">Email</h2>
      <p><?php echo $theUser['usersEmail']?></p>
      <br />
      <h2 for="">Products Listed</h2>
      <a href="sellPage.php"><button>Add Item</button></a>
      <div>
        <img src="img/hammer.jpg" alt="" />
        <img src="img/screwdriver.jpg" alt="" />
        <img src="img/hammer.jpg" alt="" />
        <img src="img/screwdriver.jpg" alt="" />
      </div>
    </main>
  </body>
</html>

<?php
  endif;;
  endforeach;;
?>