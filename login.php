<?php
include 'koneksi.php';
 
// error_reporting(0);
 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>

<head>
  <?php include 'head.php'; ?>
</head>

<body id="top">

    <header class="header" data-header>
	    <?php include 'header.php'; ?>
    </header>

    <main>
        <article>
            <div class="alert alert-warning" role="alert">
            <?php 
                    if (isset($_SESSION['error']) && isset($_SESSION['error'][$errorCode])) {
                        echo $_SESSION['error'][$errorCode] . '<br />';
                    }
                ?>
            </div>
            <section class="hero-form" >
                <div class="container-form">
                    <form action="" method="POST" class="login-email">
                        <h2 class="h3 section-title">Login</h2>
                        <div class="input-group">
                            <input type="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="input-group">
                            <button name="submit" class="btn btn-primary">Login</button>
                        </div>
                        <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
                    </form>
                </div>
            </section>
        </article>
    </main>
	
    <footer class="footer">
        <?php include 'footer.php'; ?>
    </footer>
	
    <script src="styles/style.js"></script>
    
    <!-- 
    - ionicon link
    -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>