<?php
require_once './tmp/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
	// check email alrady exist
	




    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Error: " . mysqli_error($conn));
    }

    $user = mysqli_fetch_assoc($query);

    if ($user != '') {
        if ($user['Password'] == $password) {
            $_SESSION['email'] = $email;
            $_SESSION['Password'] = $password;
            $Role = $user['Role'];
            $_SESSION['Role'] = $Role;

            if ($user['Verified'] == 0) {
                
                header('Location: att.php');
            } else {
                
                if ($Role == 'admin') {
                    header('Location: dashboard.php');
                } else {
                    header('Location: product.php');
                }
            }
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Layout/css/stayl.css">
    <title>Document</title>
</head>
<body>
    <!-- component -->
<div class="h-screen md:flex">
	<div
		class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center hidden">
		<div>
			<h1 class="text-white font-bold text-4xl font-sans">WELCOM to electro nacer</h1>
			<p class="text-white mt-1">YOU CAN CREATE A NEW ACCOUNT</p>

		</div>
		<div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
		<div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
	</div>
	<div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
		<form class="bg-white" method="post">
			<h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
			<p class="text-sm font-normal text-gray-600 mb-7">MY ACCOUNT</p>
					<div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
						</svg>
						                <input class="pl-2 outline-none border-none" type="text" name="email" id="" placeholder="Email Address" />
                        </div>
						<div class="flex items-center border-2 py-2 px-3 rounded-2xl">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
								fill="currentColor">
								<path fill-rule="evenodd"
									d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
									clip-rule="evenodd" />
							</svg>
							            <input class="pl-2 outline-none border-none" type="password" name="password" id="" placeholder="Password" />
                        </div>
							<button type="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">SIGN UP</button>
						<div style="margin-left: -0px;" id="to_signe">
							<a style="display: flex; justify-content:center ; font-family:bold; font-size:20px ; color:aliceblue ;" href="index.php">creat a new account</a>
						</div>
							
		</form>
	</div>
</div>
<script src="./Layout/js/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
</body>
</html>