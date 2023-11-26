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
    <div>
    <label for="categorias">Selecciona una categoría:</label>
  <select id="categorias" name="categorias">
    <option value="opcion1">Categoría 1</option>
    <option value="opcion2">Categoría 2</option>
    <option value="opcion3">Categoría 3</option>
    <!-- Agrega más opciones según sea necesario -->
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

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      <!-- Produit 1 -->
      <?php
require('./tmp/connection.php');

$sql = "SELECT * FROM product";

$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='w-64 m-4 p-4 bg-white rounded-lg shadow-md'>
            <img class='w-full h-64 object-cover mb-6 rounded-lg' src='{$row['image']}' alt=''>
            <h2 class='text-lg font-semibold text-gray-800 capitalize'>" . (isset($row['name']) ? $row['name'] : 'N/A') . "</h2>
            <p class='text-gray-600 mb-4'>" . (isset($row['description']) ? $row['description'] : 'No description') . "</p>
            <div class='flex items-center justify-between'>
                <h3 class='text-xl font-semibold text-gray-800'>" . (isset($row['price']) ? $row['price'] : 'N/A') . " $</h3>
                <button class='bg-indigo-600 text-white px-4 py-2 rounded-md'>Add to Cart</button>
            </div>
        </div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>




      <!-- Ajoutez plus de produits ici -->

    </div>
  </div>
  <footer class="bg-blue-500 text-white p-8 mt-8">
    <div class="container mx-auto flex flex-col md:flex-row justify-between">
      <!-- Colonne de Liens -->
      <div class="mb-4 md:mb-0">
        <h2 class="text-lg font-semibold mb-2">Liens Utiles</h2>
        <ul>
          <li><a href="#" class="hover:underline">Conditions d'utilisation</a></li>
          <li><a href="#" class="hover:underline">&copy All Rights Reserved</a></li>
          
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