<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Layout/css/product.css">
    
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Catalogue de Produits</title>
</head>

<body class="bg-gray-100 p-8 bg-gray-100">
   <!-- get product in data base -->
   

   
  
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
    
  </nav>
  

  <!-- Menu Déroulant pour les Petits Écrans -->
  


  <div class="container mx-auto dii">
    <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 50px;
        color: #2504ff;
        font-weight: bold;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 10px;
        margin-right: 10px;
        text-align:center;
        " id="titels" class="text-3xl font-semibold mb-8">Catalogue de Produits</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 ">
      <div>
      <label style="font-family:bold italic; color:black" for="categorias"> filtre les prix</label>
  <select name="categorias">
    <option value="opcion1">100-200$</option>
    <option value="opcion2">300-400$</option>
    <option value="opcion3">plus que 400$</option>
  </select>
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="filterCategory">Filtre</button>
      </div>
      <!-- filtre les product par  price  -->


      </div> 
            <!-- Produit 1 -->
  <div class="flex gap-20 flex-wrap">
      <?php
require('./tmp/connection.php');

$sql = "SELECT * FROM product";

$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='w-64 m-4 p-4 bg-white rounded-lg shadow-md '>
            <img class='w-full h-64 object-cover mb-6 rounded-lg' src='./uploads/" . $row['image'] . "' alt=''>
            <h2 class='text-lg font-semibold text-gray-800 capitalize'>" . (isset($row['titre']) ? $row['titre'] : 'NOT FOUND') . "</h2>
            <p class='text-gray-600 mb-4'>" . (isset($row['description']) ? $row['description'] : 'No description') . "</p>
            <div class='flex items-center justify-between'>
                <h3 class='text-xl font-semibold text-gray-800'>" . (isset($row['prix']) ? $row['prix'] : 'no price??') . " $</h3>
                <button class='bg-indigo-600 text-white px-4 py-2 rounded-md'>Add to Cart</button>
            </div>
        </div>";
    }
} 

$conn->close();
?>
<!-- filtre les product par titre de database -->
</div>
<?php 

require('./tmp/connection.php');

// Check if the filter form is submitted
if (isset($_POST['filterCategory'])) {
    $priceFilter = "";  // Initialize the price filter string
    //  help me

    // Adjust this part based on your actual database structure
    if ($_POST['categorias'] == 'opcion1') {
        $priceFilter = "BETWEEN 100 AND 200";
    } elseif ($_POST['categorias'] == 'opcion2') {
        $priceFilter = "BETWEEN 300 AND 400";
    } elseif ($_POST['categorias'] == 'opcion3') {
        $priceFilter = "> 400";
    }

    // Retrieve products with the applied filter
    $products = getProducts($conn, $priceFilter);
} else {
    // Retrieve all products without filtering
    $products = getProducts($conn);
}

// Display the products
foreach ($products as $row) {
    // ... (Your existing product display code)
}
$conn->close();

function getProducts($conn, $priceFilter = "") {
  $sql = "SELECT * FROM product";

  // Append WHERE clause for price filtering if a filter is provided
  if (!empty($priceFilter)) {
      $sql .= " WHERE prix " . $priceFilter;
  }

  $result = $conn->query($sql);

  if (!$result) {
      die("Error: " . $conn->error);
  }

  $products = array();
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $products[] = $row;
      }
  }

  return $products;
}



?> 


      <!-- Produit 1 -->
      



  </footer>

  
<script src="./Layout/js/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>