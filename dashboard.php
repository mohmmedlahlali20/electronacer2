<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Layout/css/product.css">
    
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Catalogue de Produits</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .delete-user, .accept-user {
        text-align: center;
    }
</style>
<body class="bg-gray-100 p-8 bg-gray-100">
  
  
  <!-- Barre de Navigation -->
  <nav  class="bg-blue-500 p-4">
    <div class="container mx-auto flex items-center justify-between">
      <!-- Logo -->
      <a href="#" class="text-white text-xl font-semibold"> WELECOM IN ELECTRO NACER</a>
      <div>
      <a href=""><img style="text-align: center; margin-left:50%" width="10%" height="10%" src="./Layout/img/Nouveau_projet1.png" alt=""></a>
      <h1 style="text-align: center; margin-left:120px;font-size:30px;color:aliceblue;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif , bold;">Electro_Nacer</h1>
      </div>
      
      <!-- Bouton de Menu pour les petits écrans -->
      <button id="menuToggle" class="text-white focus:outline-none lg:hidden">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>

      <!-- Menu de Navigation -->
      <div class="hidden lg:flex lg:items-center lg:w-auto">
        <ion-icon name="journal-outline"></ion-icon>
        <a href="#" class="text-white hover:text-gray-300 px-4 py-2">0.00 USD</a>
        <a href="#" class="text-white hover:text-gray-300 px-4 py-2"></a>
        <a href="#" class="text-white hover:text-gray-300 px-4 py-2"></a>
      </div>
    </div>
    
    <div>
    <label for="categorias">Selecciona una categoría:</label>
  <select id="categorias" name="categorias">
    <option value="opcion1">Categoría 1</option>
    <option value="opcion2">Categoría 2</option>
    <option value="opcion3">Categoría 3</option>
  
  </select> 
    </div>
  </nav>

  <!-- Menu Déroulant pour les Petits Écrans -->
  <div class="lg:hidden bg-blue-500 text-white p-4">
    <a href="#" class="block py-2">Our Product</a>
    <ion-icon name="basket-outline"></ion-icon>
    <a href="#" class="block py-2">0.00 USD</a>
    <a href="#" class="block py-2">Contact</a>
  </div>

  <h1 style="text-align: center; font-size:40px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:blue;margin:10px 10px 10px 10px;">table des donnes</h1><hr>
<!-- php dyal admin tableau -->
    <table border="8" width="90%">
        <h3>USERS</h3>
        <tr>
            <th>id</th>
            <th>Username</th>
            <th>PassWord</th>
            <th>email</th>
            <th>delete user</th>
            <th>accepter user </th>
        </tr>
<?php
require_once './tmp/connection.php';

$sql = "SELECT * FROM users";
$quy = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($quy);

foreach ($quy as $row) {
    $id = $row['id'];
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Password'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td><a href='delete.php?id=$id'>delete user</a></td>";
    echo "<td><a href='index.php?id=$id'>add user</a></td>";
    echo "</tr>";
}
// close tag php

?><br><br>
    </table>
    <!-- add imag in database -->
    <div class="container-5">
    <form class="max-w-md mx-auto"  action="dashboard.php" method="post" enctype="multipart/form-data"><br><br>
    <div class="flex flex-col justify-center container mx-auto px-4">
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outlin" type="text" name="titre" placeholder="titre">

      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outlin" type="text" name="description" placeholder="description">

      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outlin" type="text" name="prix" placeholder="prix">

      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="image" accept="image/*">
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" name="submit">Button</button>
    </div>
    </form>
    </div>
  <h2>hufdojsodnjb</h2>
    <!-- php -->
   
        <?php
require_once './tmp/connection.php';

// Fetch existing products
$sql = "SELECT * FROM product";
$quy = mysqli_query($conn, $sql);

echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Price</th>
    <th>Image</th>
    <th>delete image</th>

    </tr>";

while ($row = mysqli_fetch_assoc($quy)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['titre'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['prix'] . "</td>";
    echo "<td><img src='./uploads/" . $row['image'] . "' width='100' height='100'></td>";
    echo "<td><a href='delete.php?id=" . $row['id'] . "'>delete product</a></td>";
    echo "</tr>";
}

echo "</table>";

// Add a new product
if (isset($_POST['submit'])) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    // Upload image to server

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];


    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
      $allowed_exs = array("jpg", "jpeg", "png"); 

      if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = './uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
          $sql = "INSERT INTO product (titre, description, prix, image) VALUES ('$titre', '$description', '$prix', '$new_img_name')";

				mysqli_query($conn, $sql);
				
        exit();
			}else {
        echo "Error: " . mysqli_error($conn);
			}

    
}

mysqli_close($conn);

?>



  <footer class="bg-blue-500 text-white p-8 mt-8">
    <div class="container mx-auto flex flex-col md:flex-row justify-between">
      <!-- Colonne de Liens -->
      <div class="mb-4 md:mb-0">
        <h2 class="text-lg font-semibold mb-2">Liens Utiles</h2>
        <ul>
          <li><a href="#" class="hover:underline">Conditions d'utilisation</a></li>
          <li><a href="#" class="hover:underline">&copy All Rights Reserved</a></li>
          <li><a href="#" class="hover:underline">FAQ</a></li>
        </ul>
      </div>

      <!-- Informations de Contact -->
      <div>
        <h2 class="text-lg font-semibold mb-2">Contact</h2>
        <ion-icon name="mail-outline"></ion-icon>
        <p>Email : electroNacer@gmail.com</p>
        <ion-icon name="call-outline"></ion-icon>
        <p>Téléphone : +1 123 456 7890</p>
      </div>
      <div style="gap: 30px; font-size:30px;color:aquamarine">
        <h2 class="text-lg font-semibold mb-2">social media </h2>
        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
        <a href="#"><ion-icon name="logo-whatsapp"></ion-icon></a>
        

      </div>
    </div>
  </footer>

  
<script src="./Layout/js/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>