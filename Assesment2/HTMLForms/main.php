<?php
  $product_shuffle = $product->getData();
?>

<body>
    <nav></nav>

    <main>
      <div id="catalog">
        <?php
        foreach($product_shuffle as $item){
        ?>
        <a href="<?php printf('%s?productCode=%s', 'product.php',$item['productCode'])?>"><img src="<?php echo $item['productImage'] ?? "img/hammer.jpg";?>" alt="<?php echo $item['productName'] ?? "Unkown"?>" /></a>
        <h6><?php echo $item['productName'] ?? "Unkown"?></h6>
        <h6><?php echo '$' .$item['productPrice'] ?? "Unkown"?></h6>
        <h6><?php echo $item['productCode'] ?? "Unkown"?></h6>
        <?php
              }?>

       
      </div>
    </main>
    <aside></aside>