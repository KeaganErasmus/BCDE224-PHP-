<?php
  $sellerID = $_COOKIE;
  $sellerID = $_COOKIE['sellerID'];
  foreach($users->getUsersData("Seller") as $theUser) : 
    if($theUser['sellerFName'] == $_SESSION['user']):
      setcookie('sellerID', $theUser['sellerID']);
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
      <p><?php echo $theUser['sellerFName']?></p>
      <br />
      <h2 for="">Email</h2>
      <p><?php echo $theUser['sellerEmail']?></p>
      <br />
      <h2 for="">Products Listed</h2>
      <a href="sellPage.php"><button>Add Item</button></a>
      <div>
        <?php foreach($users->getSellerProductData($sellerID) as $item)
        {
          echo $item['productName'];
        }?>
      </div>
    </main>
  </body>
</html>

<?php
  endif;;
  endforeach;;
?>