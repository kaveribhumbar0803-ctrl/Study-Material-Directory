<?php

include "config.php";

$results = [];
$searched = false;
$search = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $search = trim($_POST["search"] ?? "");

    if ($search != "") {

        $searched = true;

        // Secure prepared statement
        $stmt = mysqli_prepare(
            $conn,
            "SELECT * FROM study_material
             WHERE subject LIKE ?
             OR unit LIKE ?
             OR title LIKE ?
             ORDER BY id DESC"
        );

        if (!$stmt) {
            die("Unable to process search.");
        }

        $keyword = "%" . $search . "%";

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $keyword,
            $keyword,
            $keyword
        );

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }

        mysqli_stmt_close($stmt);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Search Materials</title>

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
    font-size: 60px;
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

.search-box {
    background: #f7f8ff;
    padding: 25px;
    border-radius: 18px;
    margin-bottom: 30px;
}

.search-box label {
    display: block;
    font-weight: bold;
    color: #444;
    margin-bottom: 10px;
}

.search-row {
    display: flex;
    gap: 10px;
}

.search-row input {
    flex: 1;
    padding: 14px;
    border: 2px solid #ddd;
    border-radius: 10px;
    font-size: 15px;
    outline: none;
}

.search-row input:focus {
    border-color: #667eea;
}

.search-btn {
    border: none;
    padding: 14px 22px;
    border-radius: 10px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    font-weight: bold;
    cursor: pointer;
    font-size: 15px;
}

.search-btn:hover {
    opacity: 0.9;
}

.result-title {
    color: #444;
    margin-bottom: 18px;
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
}

.no-result {
    text-align: center;
    padding: 35px;
    background: #f7f8ff;
    border-radius: 18px;
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
        padding: 22px;
    }

    h1 {
        font-size: 27px;
    }

    .search-row {
        flex-direction: column;
    }

    .search-btn {
        width: 100%;
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

        <div class="logo">🔎📚</div>

        <h1>Search Materials</h1>

        <p class="subtitle">
            Find study resources quickly and easily
        </p>

    </div>


    <div class="search-box">

        <form method="POST">

            <label>
                🔍 Search by Title, Subject or Unit
            </label>

            <div class="search-row">

                <input
                    type="text"
                    name="search"
                    placeholder="Example: DBMS, Unit 4, Python..."
                    value="<?php echo htmlspecialchars($search); ?>"
                    required
                >

                <button type="submit" class="search-btn">
                    🔎 Search
                </button>

            </div>

        </form>

    </div>


    <?php if ($searched) { ?>

        <?php if (count($results) > 0) { ?>

            <h2 class="result-title">
                📚 <?php echo count($results); ?> Result(s) Found
            </h2>

            <?php foreach ($results as $row) { ?>

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

            <div class="no-result">

                <h2>😕 No Materials Found</h2>

                <p>
                    Try searching with another subject, unit or title.
                </p>

            </div>

        <?php } ?>

    <?php } ?>


    <div class="navigation">

        <a href="index.php" class="nav-btn">
            🏠 Home
        </a>

        <a href="view.php" class="nav-btn">
            📖 View All
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