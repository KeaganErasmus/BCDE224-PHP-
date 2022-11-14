<?php
  // $userID = $_POST['usersUsername'];
  // $userName = $users->getUserName();

  // var_dump($_SESSION['user']);
  foreach($users->getUsersData() as $theUser) : 
    if($theUser['usersUsername'] == $_SESSION['user']):
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Agor/sellerAcount</title>
  </head>
  <body>
    <main>
      <h2 for="">User Name</h2>
      <p><?php echo $theUser['usersUsername']?></p>
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