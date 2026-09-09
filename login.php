<?php
session_start();
include "config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, username, password FROM users WHERE username = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user["password"])) {

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];

        header("Location: index.php");
        exit();

    } else {
        $error = "Invalid username or password.";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Login | Study Material Directory</title>

<style>

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    font-family: Arial, sans-serif;

    background:
        radial-gradient(circle at top left, #667eea, transparent 35%),
        radial-gradient(circle at bottom right, #764ba2, transparent 35%),
        linear-gradient(135deg, #141e30, #243b55);

    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.login-container {
    width: 100%;
    max-width: 430px;
}

.login-card {
    background: rgba(255, 255, 255, 0.97);
    padding: 40px 35px;
    border-radius: 25px;

    box-shadow:
        0 20px 60px rgba(0, 0, 0, 0.35);

    text-align: center;
}

.logo {
    width: 80px;
    height: 80px;

    margin: 0 auto 18px;

    border-radius: 50%;

    background: linear-gradient(135deg, #667eea, #764ba2);

    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 40px;

    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
}

h1 {
    margin: 5px 0;
    color: #222;
    font-size: 27px;
}

.subtitle {
    color: #777;
    margin-bottom: 30px;
    font-size: 14px;
}

.input-group {
    position: relative;
    margin-bottom: 18px;
}

.input-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
}

input {
    width: 100%;
    padding: 14px 15px 14px 45px;

    border: 2px solid #e5e5e5;
    border-radius: 12px;

    font-size: 15px;
    outline: none;

    transition: 0.3s;
}

input:focus {
    border-color: #667eea;

    box-shadow:
        0 0 0 3px rgba(102, 126, 234, 0.12);
}

.login-btn {
    width: 100%;

    padding: 14px;

    border: none;
    border-radius: 12px;

    background: linear-gradient(135deg, #667eea, #764ba2);

    color: white;

    font-size: 16px;
    font-weight: bold;

    cursor: pointer;

    margin-top: 8px;

    transition: 0.3s;
}

.login-btn:hover {
    transform: translateY(-2px);

    box-shadow:
        0 8px 20px rgba(102, 126, 234, 0.35);
}

.error {
    background: #ffe5e5;
    color: #d63031;

    padding: 10px;
    border-radius: 10px;

    margin-bottom: 18px;

    font-size: 14px;
}

.register-section {
    margin-top: 25px;
    padding-top: 20px;

    border-top: 1px solid #eeeeee;
}

.register-text {
    color: #777;
    font-size: 14px;
    margin-bottom: 12px;
}

.register-btn {
    display: block;

    width: 100%;

    padding: 12px;

    border: 2px solid #667eea;
    border-radius: 12px;

    color: #667eea;
    background: white;

    text-decoration: none;

    font-size: 15px;
    font-weight: bold;

    transition: 0.3s;
}

.register-btn:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

.footer {
    margin-top: 25px;

    color: #888;
    font-size: 13px;
}

.footer span {
    color: #667eea;
    font-weight: bold;
}

</style>
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="logo">
            📚
        </div>

        <h1>Student Material Directory</h1>

        <p class="subtitle">
            🔐 Student Login
        </p>

        <?php if ($error != "") { ?>

            <div class="error">
                ⚠️ <?php echo htmlspecialchars($error); ?>
            </div>

        <?php } ?>

        <form method="POST" action="login.php">

            <div class="input-group">

                <span class="input-icon">👤</span>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                    required
                    autocomplete="username"
                >

            </div>

            <div class="input-group">

                <span class="input-icon">🔒</span>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    required
                    autocomplete="current-password"
                >

            </div>

            <button type="submit" class="login-btn">
                🔐 Login to Portal
            </button>

        </form>


        <!-- CREATE ACCOUNT -->

        <div class="register-section">

            <div class="register-text">
                Don't have an account?
            </div>

            <a href="register.php" class="register-btn">
                🆕 Create Student Account
            </a>

        </div>


        <div class="footer">

            🎓 <span>Study Material Directory</span>

            <br>

            Secure Student Access

        </div>

    </div>

</div>

</body>

</html>