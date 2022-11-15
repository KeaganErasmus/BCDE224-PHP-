<?php
  include_once('functions.php');
  $product_shuffle = $product->getProductData();
  $users_shuffle = $users->getUsersData('Users');
?>

<body>
    <main>
      <div id="catalog">
        <?php
        foreach($product_shuffle as $item)
        {
          ?>
          <a href="<?php printf('%s?productCode=%s', 'product.php',$item['productCode'])?>">
            <img src="<?php echo $item['productImage'];?>" alt="<?php echo $item['productName'] ?? "Unkown"?>" />
          </a>
          <h6><?php echo $item['productName'] ?? "Unkown"?></h6>
          <h6><?php echo '$' .$item['productPrice'] ?? "Unkown"?></h6>
          <h6><?php echo $item['productCode'] ?? "Unkown"?></h6>
          <!-- <p><?php echo $item['productImage']?></p> -->
          <?php
        }
          ?>       
      </div>
    </main>
    <aside></aside>
    <?php
