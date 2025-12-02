<?php
    session_start() ;
    require_once 'db.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if(empty($username) || empty($password) || empty($confirm_password)){
            $message = "All fields are required";
        }
        else if($password != $confirm_password){
            $message = "Passwords do not match";
        }else{
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            try {
                $stmt = $conn->prepare("INSERT INTO users(username,password) values(?,?)");
                $stmt->execute([$username, $passwordHash]);
                $message = "Registration successful";
                header("Location: login.php");
                exit();
            } catch(PDOException $e) {
                $message = "Registration failed: " . $e->getMessage();
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            font-family: 'inter', sans-serif;
            
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 20px;
            width: 30%;
            margin: auto;
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input{
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input:focus{
            outline: none;
            border-color: #4CAF50;
        }

        input[type="submit"]{
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover{
            background-color: #45a049;
        }

        h1{
            text-align: center;
        }

        a{
            color: #4CAF50;
            text-decoration: none;
            text-align: end;
        }
        a:hover{
            text-decoration: underline;
        }
        .message{
            color: red;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

    </style>
</head>
<body>
    <h1>Register</h1>
    <span class="message"><?php if(isset($message)) echo $message; ?></span>
    <form action="" method="Post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <a href="login.php">Login</a>

        <input type="submit" value="Register" name="submit">
    </form>
    
</body>
</html>