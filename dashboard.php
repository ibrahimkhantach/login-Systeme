<?php
    session_start() ;
    require_once 'db.php';

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit();
    }

    if(isset($_COOKIE['counter'])){
        setcookie("counter",++$_COOKIE['counter'],time()+60*60*24);
    }
    else{
        setcookie("counter",1,time()+60*60*24);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .dashboard-card {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 700;
        }
        .welcome-text {
            color: #666;
            margin-bottom: 30px;
        }
        .stats {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 1px solid #e9ecef;
        }
        .stats p {
            margin: 0;
            color: #6c757d;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
        .stats span {
            display: block;
            font-size: 32px;
            font-weight: 700;
            color: #4CAF50;
            margin-top: 5px;
        }
        .logout-btn {
            display: inline-block;
            background-color: #ff4d4d;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }
        .logout-btn:hover {
            background-color: #e60000;
        }
    </style>
</head>
<body>
    <div class="dashboard-card">
        <h1>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p class="welcome-text">Welcome back to your dashboard.</p>
        
        <div class="stats">
            <p>Your Visits</p>
            <span><?php echo isset($_COOKIE['counter']) ? $_COOKIE['counter'] : 1; ?></span>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>