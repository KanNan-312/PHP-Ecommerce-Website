<?php
  $conn = new mysqli('localhost', 'root', 'kth302110', 'lab_db');
  if ($conn -> connect_error) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }

  $sqls = [];
  // CREATE TABLES
  // table users
  $sqls[] = "CREATE table if not exists users(
    user_id INT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL
  );";

  // table products
  $sqls[] = "CREATE table if not exists products(
    product_id INT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    description VARCHAR(255) NOT NULL,
    image_url VARCHAR(255)
  );";

  // INSERT VALUES
  $sqls[] = "INSERT INTO users(user_id, username, password, role) VALUES
    (1, 'admin', 'Admin123', 'admin'),
    (2, 'user2', 'User2lab', 'normal'),
    (3, 'user3', 'User3lab', 'normal');
  ";

  $sqls[] = "INSERT INTO products(product_id, product_name, category, price, description, image_url ) VALUES
    (1, 'ASUS Vivobook', 'computer', 1000, 'This is an ASUS Vivobook ', 'https://cdn.tgdd.vn/Products/Images/44/284257/asus-vivobook-15x-oled-a1503za-i5-l1290w-040722-050332-600x600.jpg'),
    (2, 'HP Pavilion', 'computer', 950.7, 'HP Pavilion Laptop Premium.', 'https://ssl-product-images.www8-hp.com/digmedialib/prodimg/lowres/c07963197.png'),
    (3, 'Ardruino', 'circuit', 10, 'This is an Adruino circuit', 'https://nshopvn.com/wp-content/uploads/2019/03/arduino-uno-r3-dip-b1hz-1-600x600.jpg'),
    (4, 'Logitec keyboard', 'other', 10.5, 'This is a Logitec keyboard', 'https://resource.logitech.com/w_800,c_lpad,ar_1:1,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/products/logitech/keyboards/k480-multi-device-wireless/bluetooth-multi-device-keboard-k4806.png?v=1'),
    (5, 'razer mouse', 'other', 50, 'Razer mouse for playing games.', 'https://bizweb.sapocdn.net/thumb/1024x1024/100/329/122/products/chuot-gaming-razer-deathadder-essential.png?v=1630418051317'),
    (6, 'IC', 'circuit', 5.1, 'simple IC circuit', 'https://d3jlfsfsyc6yvi.cloudfront.net/image/mw:1024/q:85/https%3A%2F%2Fhaygot.s3.amazonaws.com%3A443%2Fcheatsheet%2F16175.jpg');

    ";

  foreach($sqls as $sql)
    if ($conn -> query($sql) === True) {
      echo "Query performed successfully <br>";
    }
    else {
      echo "Query error: " . $conn -> error;
    }
?>