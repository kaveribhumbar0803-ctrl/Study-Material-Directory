<?php

include "config.php";

$sql = "SELECT * FROM study_material ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Unable to load study materials.");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Study Materials</title>

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
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 55px;
            margin-bottom: 10px;
        }

        h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            font-size: 15px;
        }

        .material {
            background: #f7f8ff;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 18px;
            border-left: 5px solid #667eea;
            transition: 0.3s;
        }

        .material:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .material h2 {
            color: #333;
            margin-bottom: 15px;
            font-size: 21px;
        }

        .info {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .badge {
            background: #e9ebff;
            color: #555;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .uploader {
            color: #666;
            margin-bottom: 15px;
        }

        .resource-btn {
            display: inline-block;
            padding: 11px 18px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-weight: bold;
        }

        .resource-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }

        .navigation {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .nav-btn {
            display: inline-block;
            padding: 12px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-weight: bold;
        }

        .nav-btn:hover {
            opacity: 0.9;
        }

        .logout {
            background: #e74c3c;
        }

        .footer {
            text-align: center;
            color: #999;
            margin-top: 25px;
            font-size: 13px;
        }

        @media (max-width: 600px) {

            .container {
                padding: 25px 18px;
            }

            h1 {
                font-size: 26px;
            }

            .material h2 {
                font-size: 18px;
            }

            .nav-btn {
                width: 100%;
                text-align: center;
            }

            .resource-btn {
                width: 100%;
                text-align: center;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <div class="logo">📖</div>

        <h1>Study Materials</h1>

        <p class="subtitle">
            📚 Explore and access your study resources
        </p>

    </div>


    <?php if (mysqli_num_rows($result) > 0) { ?>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <div class="material">

                <h2>
                    📘 <?php echo htmlspecialchars($row["title"]); ?>
                </h2>

                <div class="info">

                    <span class="badge">
                        📚 Subject:
                        <?php echo htmlspecialchars($row["subject"]); ?>
                    </span>

                    <span class="badge">
                        🔢 Unit:
                        <?php echo htmlspecialchars($row["unit"]); ?>
                    </span>

                </div>

                <p class="uploader">

                    👤 Uploaded by:
                    <b>
                        <?php echo htmlspecialchars($row["uploader_name"]); ?>
                    </b>

                </p>

                <a
                    href="<?php echo htmlspecialchars($row["resource_link"]); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="resource-btn"
                >
                    🔗 Open Resource
                </a>

            </div>

        <?php } ?>

    <?php } else { ?>

        <div class="empty">

            <h2>📭 No Materials Found</h2>

            <p>
                Add your first study material from the home page.
            </p>

        </div>

    <?php } ?>


    <div class="navigation">

        <a href="index.php" class="nav-btn">
            🏠 Back to Home
        </a>

        <a href="search.php" class="nav-btn">
            🔎 Search Materials
        </a>

        <a href="logout.php" class="nav-btn logout">
            🚪 Logout
        </a>

    </div>


    <div class="footer">

        🔐 Secure Student Study Portal © 2026

    </div>

</div>

</body>

</html>

<?php

mysqli_close($conn);

?>