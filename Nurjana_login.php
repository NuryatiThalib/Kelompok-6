<?php 
include'koneksi.php';

 ?>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: gold;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-weight: 700;
            text-align: center;
        }
        .login-container .input-group {
            margin-bottom: 15px;
        }
        .login-container .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        .login-container .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container .input-group input:focus {
            border-color: #007bff;
        }
        .login-container .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
        }
        .login-container .btn:hover {
            background-color: green;
        }
        .login-container .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
           
           $login =  mysqli_query($koneksi,"SELECT * FROM tbl_users
                WHERE username = '$username'");
           
            if(mysqli_num_rows($login) === 1){

           $pass = mysqli_fetch_assoc($login);
           if( $password == $pass['pass']){
            echo '<p>Login berhasil!</p>';
                header('location:dasboard.php');
                exit;
           }

                
            }
            
                $error = true;
            
        }
        ?>
        <?php if (isset($error)): ?>
            <p style="color: red; font-style: italic;">username atau password salah</p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn" name="login">Login</button>
        </form>
    </div>
</body>
</html>