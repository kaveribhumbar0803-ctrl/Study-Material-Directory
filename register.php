<?php
session_start();
require_once "config.php";

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";

    if ($username === "" || $password === "" || $confirm_password === "") {
        $message = "Please fill in all fields.";
        $message_type = "error";
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
        $message_type = "error";
    } elseif (strlen($password) < 6) {
        $message = "Password must be at least 6 characters.";
        $message_type = "error";
    } else {

        // Check whether username already exists
        $check = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ?");
        mysqli_stmt_bind_param($check, "s", $username);
        mysqli_stmt_execute($check);
        $result = mysqli_stmt_get_result($check);

        if (mysqli_num_rows($result) > 0) {
            $message = "Username already exists. Please choose another.";
            $message_type = "error";
        } else {

            // Securely hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO users (username, password) VALUES (?, ?)"
            );

            mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                $message = "Account created successfully! You can now login.";
                $message_type = "success";
            } else {
                $message = "Unable to create account.";
                $message_type = "error";
            }

            mysqli_stmt_close($stmt);
        }

        mysqli_stmt_close($check);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Create Account | Study Material Directory</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.card {
    width: 100%;
    max-width: 430px;
    background: white;
    padding: 35px;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
}

.logo {
    text-align: center;
    font-size: 55px;
    margin-bottom: 5px;
}

h1 {
    text-align: center;
    color: #333;
    margin: 5px 0;
}

.subtitle {
    text-align: center;
    color: #777;
    margin-bottom: 25px;
}

label {
    display: block;
    font-weight: bold;
    color: #444;
    margin-bottom: 7px;
}

input {
    width: 100%;
    padding: 13px;
    border: 1px solid #ddd;
    border-radius: 10px;
    font-size: 15px;
    margin-bottom: 18px;
    outline: none;
}

input:focus {
    border-color: #667eea;
    box-shadow: 0 0 5px rgba(102,126,234,0.3);
}

button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}

button:hover {
    opacity: 0.9;
}

.message {
    padding: 12px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
}

.success {
    background: #d4edda;
    color: #155724;
}

.error {
    background: #f8d7da;
    color: #721c24;
}

.login-link {
    text-align: center;
    margin-top: 22px;
}

.login-link a {
    color: #667eea;
    font-weight: bold;
    text-decoration: none;
}

.login-link a:hover {
    text-decoration: underline;
}

.footer {
    text-align: center;
    color: #999;
    font-size: 12px;
    margin-top: 20px;
}
</style>
</head>

<body>

<div class="card">

    <div class="logo">📚</div>

    <h1>Study Material Directory</h1>

    <p class="subtitle">🆕 Create Student Account</p>

    <?php if ($message !== ""): ?>
        <div class="message <?php echo $message_type; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="register.php">

        <label>👤 Username</label>
        <input
            type="text"
            name="username"
            placeholder="Enter your username"
            required
        >

        <label>🔒 Password</label>
        <input
            type="password"
            name="password"
            placeholder="Create a password"
            required
        >

        <label>🔐 Confirm Password</label>
        <input
            type="password"
            name="confirm_password"
            placeholder="Re-enter your password"
            required
        >

        <button type="submit">
            ✨ Create Account
        </button>

    </form>

    <div class="login-link">
        Already have an account?
        <a href="login.php">Login here</a>
    </div>

    <div class="footer">
        Student Portal • Study Material Directory
    </div>

</div>

</body>
</html>