<?php
  $productCode = $_GET['productCode'] ?? 1;
  foreach($product->getProductData() as $item) : 
    if($item['productCode'] == $productCode):
?>

<!DOCTYPE html>
    <aside>
      <p><?php echo $item['productName'] ?? "Unknown"?></p>
      <img src="<?php echo $item['productImage']?>" alt="<?php echo $item['productName'] ?? "Unknown"?>" />
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