<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Study Material Directory</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo {
            font-size: 55px;
            margin-bottom: 10px;
        }

        h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .welcome {
            color: #777;
            font-size: 16px;
        }

        .form-card {
            background: #f7f8ff;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .form-card h2 {
            color: #444;
            margin-bottom: 20px;
            font-size: 22px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            color: #444;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102,126,234,0.3);
        }

        .add-btn {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .add-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .navigation {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .nav-btn {
            display: block;
            padding: 16px 10px;
            text-align: center;
            text-decoration: none;
            color: white;
            background: #667eea;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .nav-btn:hover {
            transform: translateY(-3px);
            opacity: 0.9;
        }

        .logout-btn {
            background: #e74c3c;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999;
            font-size: 13px;
        }

        @media (max-width: 700px) {
            .navigation {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 25px;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div class="logo">📚</div>

        <h1>Study Material Directory</h1>

        <p class="welcome">
            🎓 Welcome to your Student Study Hub
        </p>
    </div>


    <div class="form-card">

        <h2>➕ Add New Study Material</h2>

        <form action="save.php" method="POST">

            <label>📖 Material Title</label>
            <input type="text" name="title" required
                   placeholder="Enter material title">

            <label>📚 Subject</label>
            <input type="text" name="subject" required
                   placeholder="Enter subject">

            <label>🔢 Unit</label>
            <input type="text" name="unit" required
                   placeholder="Enter unit">

            <label>🔗 Resource Link</label>
            <input type="url" name="resource_link"
                   placeholder="https://example.com"
                   required>

            <label>👤 Uploader Name</label>
            <input type="text" name="uploader_name"
                   placeholder="Enter your name"
                   required>

            <button type="submit" class="add-btn">
                🚀 Add Study Material
            </button>

        </form>

    </div>


    <div class="navigation">

        <a href="view.php" class="nav-btn">
            📖 View All Materials
        </a>

        <a href="search.php" class="nav-btn">
            🔎 Search Materials
        </a>

        <a href="logout.php" class="nav-btn logout-btn">
            🚪 Logout
        </a>

    </div>


    <div class="footer">
        🔐 Secure Student Study Portal
        <br>
        Study Material Directory © 2026
    </div>

</div>

</body>
</html>