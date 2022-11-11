<?php
  $productCode = $_GET['productCode'] ?? 1;
  foreach($product->getData() as $item) : 
    if($item['productCode'] == $productCode):
?>

<!DOCTYPE html>
    <aside>
      <p><?php echo $item['productName'] ?? "Unknown"?></p>
      <img src="<?php echo $item['productImage'] ?? "Unknown"?>" alt="<?php echo $item['productImage'] ?? "Unknown"?>" />
      <p><?php echo $item['productDescription'] ?? "Unknown"?></p>
    </aside>

    <main>
      <p><?php echo '$' . $item['productPrice'] ?? "Unknown"?></p>
      <button type="submit">Buy</button>
    </main>
  </body>
</html>

<?php
  endif;;
  endforeach;;
?>