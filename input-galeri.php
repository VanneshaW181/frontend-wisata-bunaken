<?php 

include 'koneksi.php';
 
if(!isset($_SESSION)) 
{
    session_start(); 
}
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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
            <section class="hero-form" >
                <div class="container-form">
                	<form action="" method="post" enctype="multipart/form-data" class="login-email">
                	    <h2 class="h3 section-title">Tambah Gallery</h2>
                        <div class="input-group">
                            <input type="text" name="judul" placeholder="Masukkan judul" required/>
                        </div>
                        <div class="input-group">
                            <input type="file" name="foto" placeholder="Deskripsi foto"/>
                        </div>
                        <div class="input-group">
                            <input type="text" name="deskripsi" placeholder="Deskripsi foto" />
                		</div>
                		<div class="input-group">
                            <button type="submit" name="simpan"  class="btn btn-primary">Simpan</button>
                        </div>
                	</form>
                	<?php
                    if(isset($_POST['simpan'])){
                        $url_post_galeri = "http://localhost:3000/galeri";
                		$folder = './asset/gallery/data/';
                		$name_p = $_FILES['foto']['name'];
                		$sumber_p = $_FILES['foto']['tmp_name'];
                		move_uploaded_file($sumber_p, $folder.$name_p);
                        $data_post_galeri = (['nama' => $_POST['judul'], 'foto' => $name_p, 'deskripsi' => $_POST['deskripsi'], NULL]);
                		$options = array(
                            'http' => array(
                            'header'  => "Content-type: application/json\r\n",
                            'method'  => 'POST',
                            'content' => json_encode($data_post_galeri),
                        )
                    );
                    $context  = stream_context_create($options);
                    $result = file_get_contents( $url_post_galeri, false, $context );
                    $response = json_decode( $result );
                        // $insert = mysqli_query(
                		//     $conn, 
                		//     "INSERT INTO galeri VALUES (NULL,'".$_POST['judul']."','".$name_p."','".$_POST['deskripsi']."',NULL)"
                		// );
                		if($response){
                			echo'Data berhasil disimpan';
                		}else{
                			echo'Gagal disimpan';
                		}
                	}
                	?>
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