<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $url_post_register = "{$baseUrl}/register";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $data_post_register = (['username' => $_POST['username'], 'email' => $_POST['email'], 'password' => $password]);
        $options = array(
            'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data_post_register),
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents( $url_post_register, false, $context );
    $response = json_decode( $result );
       
   echo "<script>alert('$response->message')</script>"; 
   header("Location: login.php");
} else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
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
                <?php echo $_SESSION['error']?>
            </div>
            <section class="hero-form" >
                <div class="container-form">
                    <form action="" method="POST" class="login-email">
                        <h2 class="h3 section-title">Register</h2>
                        <div class="input-group">
                            <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                        </div>
                        <div class="input-group">
                            <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                        </div>
                        <div class="input-group">
                            <button name="submit" class="btn btn-primary">Register</button>
                        </div>
                        <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login </a></p>
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