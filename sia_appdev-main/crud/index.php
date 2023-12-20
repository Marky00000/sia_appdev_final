<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple E-commerce Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .dashboard {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .welcome-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #666;
        }

        .login-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .user-login-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #5bc0de; 
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .admin-login-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #d9534f; 
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .user-login-button:hover {
            background-color: #4cae4c; 
        }

        .admin-login-button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Welcome!</h1>
        <p class="welcome-message">this system serves as our final project for system integration <br>
        application and application development</p>

        <div class="login-buttons">
            <a href="http://172.20.10.13/sia_appdev-main/crud/users_login_form.php" class="user-login-button">User Login</a>
            <a href="http://localhost/sia_appdev-main/crud/login.php" class="admin-login-button">Admin Login</a>
        </div>
    </div>
</body>
</html>
