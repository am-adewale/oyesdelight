<?php
// Include config file
require_once "config.php";

// Check if user is already logged in
if(isLoggedIn()) {
    redirect("dashboard.php");
    exit;
}

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Check for successful registration message
$registered = isset($_GET['registered']) ? true : false;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Check if email is empty
    if(empty(trim($_POST["login-email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["login-email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["login-password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["login-password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, full_name, email, password FROM users WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()) {
                // Check if email exists, if yes then verify password
                if($stmt->rowCount() == 1) {
                    if($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $username = $row["full_name"];
                        $hashed_password = $row["password"];
                        
                        if($password == $hashed_password) { // Direct comparison as requested
                            // Password is correct, start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $id;
                            $_SESSION["username"] = $username;
                            
                            // Update last login time
                            $update_sql = "UPDATE users SET last_login = NOW() WHERE id = :id";
                            if($update_stmt = $pdo->prepare($update_sql)) {
                                $update_stmt->bindParam(":id", $id, PDO::PARAM_INT);
                                $update_stmt->execute();
                            }
                            
                            // Redirect user to welcome page
                            redirect("dashboard.php");
                        } else {
                            // Password is not valid
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    // Email doesn't exist
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyesdelight Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #ff6b6b;
            --secondary: #ffa502;
            --dark: #2f3542;
            --light: #f1f2f6;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f9f9f9;
            background-image: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-header h2 {
            color: var(--dark);
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .form-header p {
            color: #666;
            font-size: 14px;
        }
        
        .logo {
            color: var(--primary);
            font-size: 32px;
            margin-bottom: 15px;
            display: inline-block;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark);
            font-weight: 500;
            font-size: 14px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            background-color: #f8f9fa;
        }
        
        .form-group input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.2);
            outline: none;
            background-color: white;
        }
        
        .form-group i {
            position: absolute;
            left: 15px;
            top: 38px;
            color: #777;
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #999;
            font-size: 14px;
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        
        .divider::before {
            margin-right: 10px;
        }
        
        .divider::after {
            margin-left: 10px;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
        }
        
        .facebook {
            background: #3b5998;
        }
        
        .google {
            background: #db4437;
        }
        
        .apple {
            background: #000;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        
        .form-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
        }
        
        .error-text {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 5px;
        }
        
        @media (max-width: 768px) {
            .form-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <div class="logo">
                <i class="fas fa-utensils"></i> Oyesdelight
            </div>
            <h2>Welcome Back</h2>
            <p>Log in to your account to order food</p>
        </div>
        
        <?php if($registered): ?>
            <div class="success-message">
                Registration successful! Please login with your credentials.
            </div>
        <?php endif; ?>
        
        <?php if(!empty($login_err)): ?>
            <div class="error-message"><?php echo $login_err; ?></div>
        <?php endif; ?>
        
        <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="login-email">Email Address</label>
                <i class="fas fa-envelope"></i>
                <input type="email" id="login-email" name="login-email" placeholder="john@example.com" value="<?php echo $email; ?>" required>
                <span class="error-text"><?php echo $email_err; ?></span>
            </div>
            
            <div class="form-group">
                <label for="login-password">Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="login-password" name="login-password" placeholder="Enter your password" required>
                <span class="error-text"><?php echo $password_err; ?></span>
            </div>
            
            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#" class="forgot-link">Forgot Password?</a>
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        
        <div class="divider">or login with</div>
        
        <div class="social-login">
            <div class="social-btn facebook"><i class="fab fa-facebook-f"></i></div>
            <div class="social-btn google"><i class="fab fa-google"></i></div>
            <div class="social-btn apple"><i class="fab fa-apple"></i></div>
        </div>
        
        <div class="form-footer">
            Don’t have an account? <a href="signup.php">Create one</a>
        </div>
    </div>
</body>
</html>
