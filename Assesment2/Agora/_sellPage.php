<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style/style.css" />
    <title>Agor/Buypage</title>
  </head>
  <body>
    <aside></aside>
    <main>
      <form action="includes/_addItem.php" method="post">
        <h1>Product Code</h1>
        <input type="text" name="productCode" id="" required />

        <h1>Product Name</h1>
        <input type="text" name="productName" id="" required />

        <h1>Add product image</h1>
        <input type="file" name="productImage" id="" required />

        <h1>Add description</h1>
        <input type="text" name="productDescription" id="" required />

        <h1>Price</h1>
        $<input type="number" name="productPrice" id="" required />

        <br />
        <button type="submit">Add Item</button>
      </form>
    </main>
  </body>
</html>
