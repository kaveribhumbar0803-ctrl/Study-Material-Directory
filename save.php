<?php

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data safely
    $title = trim($_POST["title"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $unit = trim($_POST["unit"] ?? "");
    $resource_link = trim($_POST["resource_link"] ?? "");
    $uploader_name = trim($_POST["uploader_name"] ?? "");

    // Server-side validation
    if (
        empty($title) ||
        empty($subject) ||
        empty($unit) ||
        empty($resource_link) ||
        empty($uploader_name)
    ) {
        die("Please fill all required fields.");
    }

    // Secure prepared statement
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO study_material
        (title, subject, unit, resource_link, uploader_name)
        VALUES (?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("Unable to process the request.");
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $title,
        $subject,
        $unit,
        $resource_link,
        $uploader_name
    );

    // Execute query
    if (mysqli_stmt_execute($stmt)) {

        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Material Added Successfully</title>

            <style>

                * {
                    box-sizing: border-box;
                    margin: 0;
                    padding: 0;
                    font-family: Arial, sans-serif;
                }

                body {
                    min-height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: linear-gradient(135deg, #667eea, #764ba2);
                    padding: 20px;
                }

                .success-card {
                    width: 100%;
                    max-width: 550px;
                    background: white;
                    border-radius: 22px;
                    padding: 45px 35px;
                    text-align: center;
                    box-shadow: 0 20px 50px rgba(0,0,0,0.25);
                }

                .check-circle {
                    width: 90px;
                    height: 90px;
                    margin: 0 auto 25px;
                    border-radius: 50%;
                    background: #e8f8ef;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 48px;
                }

                h1 {
                    color: #333;
                    font-size: 30px;
                    margin-bottom: 12px;
                }

                .subtitle {
                    color: #666;
                    font-size: 16px;
                    margin-bottom: 28px;
                }

                .material-box {
                    background: #f5f7ff;
                    border-radius: 14px;
                    padding: 18px;
                    margin-bottom: 28px;
                    border-left: 5px solid #667eea;
                    text-align: left;
                }

                .material-box p {
                    color: #444;
                    margin: 9px 0;
                }

                .material-title {
                    font-size: 18px;
                    font-weight: bold;
                    color: #667eea !important;
                }

                .buttons {
                    display: flex;
                    gap: 12px;
                    justify-content: center;
                    flex-wrap: wrap;
                }

                .btn {
                    text-decoration: none;
                    color: white;
                    padding: 13px 22px;
                    border-radius: 10px;
                    font-weight: bold;
                    transition: 0.3s;
                    display: inline-block;
                }

                .home-btn {
                    background: #667eea;
                }

                .view-btn {
                    background: #764ba2;
                }

                .btn:hover {
                    transform: translateY(-3px);
                    opacity: 0.9;
                }

                .footer {
                    margin-top: 25px;
                    color: #999;
                    font-size: 13px;
                }

                @media (max-width: 500px) {

                    .success-card {
                        padding: 35px 20px;
                    }

                    h1 {
                        font-size: 25px;
                    }

                    .btn {
                        width: 100%;
                    }
                }

            </style>
        </head>

        <body>

            <div class="success-card">

                <div class="check-circle">
                    ✅
                </div>

                <h1>Material Added Successfully!</h1>

                <p class="subtitle">
                    🎉 Your study material has been saved successfully.
                </p>

                <div class="material-box">

                    <p class="material-title">
                        📚 ' . htmlspecialchars($title) . '
                    </p>

                    <p>
                        📖 <strong>Subject:</strong> ' . htmlspecialchars($subject) . '
                    </p>

                    <p>
                        📌 <strong>Unit:</strong> ' . htmlspecialchars($unit) . '
                    </p>

                    <p>
                        👤 <strong>Uploaded by:</strong> ' . htmlspecialchars($uploader_name) . '
                    </p>

                </div>

                <div class="buttons">

                    <a href="index.php" class="btn home-btn">
                        ➕ Add Another
                    </a>

                    <a href="view.php" class="btn view-btn">
                        📖 View All Materials
                    </a>

                </div>

                <div class="footer">
                    Study Material Directory • Student Portal
                </div>

            </div>

        </body>
        </html>
        ';

    } else {
        die("Unable to save the material.");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {

    echo "Invalid request.";

}

?>