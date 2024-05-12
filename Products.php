<?php
$servername = "localhost: 3306";
$username = "root";
$password = "";
$dbname = "products";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Products.css">
  <title>zara products</title>
</head>

<body>
  <h1>
    Products</h1>
  <div class="shop-section">
    <?php
    $dbh = new PDO('mysql:host=localhost: 3306;dbname=products', 'root', '');
    $data = $dbh->query("select * FROM items")->fetchAll();
    $cnt = 1;
    foreach ($data as $row) {
      ?>
      <div class="box">
        <div class="box-content">
          <h2><?php echo $row['Name']; ?></h2>
          <div class="box-img" style="height: 250px;">
            <a href="product1.html">
              <!-- <img src="pic1.jpg" alt="pic1.jpg" height="300" width="300"/> -->
              <img src="uploadImage/<?php echo basename($row['Image']); ?>" width="100%" height="240px">
            </a>
          </div>
          <div class="price">
            <h2>$<?php echo $row['Price']; ?></h2>
          </div>
        </div>
      </div>
      <?php $cnt = $cnt + 1;
    } ?>
    <!-- <div class="box">
      <div class="box-content">
        <h2>HOODIES</h2>
        <div class="box-img" style="background-image: url('pic1.jpg');">
          <a href="product1.html">
            <img src="pic1.jpg" alt="pic1.jpg" height="300" width="300"/>
          </a>
        </div>
      </div>
    </div> -->

    <!-- 
    <div class="box">
      <div class="box-content">
        <h2>ABSTRACT JACQUARD SWEATER</h2>
        <div class="box-img" style="background-image: url('pic2.jpg');">
          <a href="product2.html">
            <img src="pic2.jpg" alt="pic2.jpg" height="300" width="300"/>
          </a>
        </div>
      </div>
    </div>


    <div class="box">
      <div class="box-content">
        <h2>STRIPED TEXTURED OVERSHIRT</h2>
        <div class="box-img" style="background-image: url('pic3.jpg');">
          <a href="product3.html">
            <img src="pic3.jpg" alt="pic3.jpg" height="300" width="300"/>
          </a>
        </div>
      </div>
    </div>


    <div class="box">
      <div class="box-content">
        <h2>RELAXED FIT CARGO TROUSERS</h2>
        <div class="box-img" style="background-image: url('pic4.jpg');">
          <a href="product4.html">
            <img src="pic4.jpg" alt="pic4.jpg" height="300" width="300"/>
          </a>
        </div>
      </div>
    </div>


    <div class="box">
      <div class="box-content">
        <h2>TEXTURED RIPSTOP TROUSERS</h2>
        <div class="box-img" style="background-image: url('pic5.jpg');">
          <a href="product5.html">
            <img src="pic5.jpg" alt="pic5.jpg" height="300" width="300"/>
          </a>
        </div>
      </div>
    </div>


    <div class="box">
      <div class="box-content">
        <h2>LINEN JOGGER WAIST TROUSERS</h2>
        <div class="box-img" style="background-image: url('pic6.jpg');">
          <a href="product6.html">
            <img src="pic6.jpg" alt="pic6.jpg" height="300" width="300"/>
          </a>
        </div>
      </div>
    </div>


  <div class="box">
      <div class="box-content">
        <h2>CHUNKY RUNNING SNEAKERS WITH PIECES</h2>
        <div class="box-img" style="background-image: url('pic7.jpg');">
          <a href="product7.html">
            <img src="pic7.jpg" alt="pic7.jpg" height="300" width="300"/>
          </a>
        </div>
      </div>
    </div>

    <div class="box">
      <div class="box-content">
        <h2>RUNNING SNEAKERS WITH CHUNKY SOLES</h2>
        <div class="box-img" style="background-image: url('pic9.jpg');">
          <a href="product8.html">
            <img src="pic8.jpg" alt="pic8.jpg" height="300" width="300"/>
          </a>
        </div>
      </div>
    </div> -->


  </div>

  <div class="back-home">
    <a href="Zara.html">Home</a>
  </div>
</body>

</html>