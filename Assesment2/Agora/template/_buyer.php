<?php
  foreach($users->getUsersData('Buyer') as $theUser) : 
    if($theUser['buyerFName'] == $_SESSION['user']):
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
      <p><?php echo $theUser['buyerFName']?></p>
      <br />

      <h2 for="">Email</h2>
      <p><?php echo $theUser['buyerEmail']?></p>
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