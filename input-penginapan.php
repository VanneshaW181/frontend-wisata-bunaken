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
                	    <h2 class="h3 section-title">Tambah Penginapan</h2>
                        <div class="input-group">
                            <input type="text" name="nama" placeholder="Nama Penginapan" required/>
                        </div>
                        <div class="input-group">
                            <input type="text" name="deskripsi" placeholder="Deskripsi Penginapan" required/>
                		</div>
                		<div class="input-group">
                            <input type="text" name="kapasitas" placeholder="Kapasitas Penginapan" required/>
                        </div>
                        <div class="input-group">
                            <input type="text" name="lokasi" placeholder="Lokasi Penginapan" required/>
                        </div>
                        <div class="input-group">
                            <input type="file" name="foto" placeholder="Foto penginapan" required/>
                        </div>
                		<div class="input-group">
                            <button type="submit" name="simpan"  class="btn btn-primary">Simpan</button>
                        </div>
                	</form>
                	<?php
                	if(isset($_POST['simpan'])){
                		$folder = './asset/penginapan/';
                		$name_p = $_FILES['foto']['name'];
                		$sumber_p = $_FILES['foto']['tmp_name'];
                		move_uploaded_file($sumber_p, $folder.$name_p);
                		$insert = mysqli_query(
                		    $conn, 
                		    "INSERT INTO penginapan VALUES (NULL,'".$_POST['nama']."','".$_POST['deskripsi']."','".$_POST['kapasitas']."','".$_POST['lokasi']."','".$name_p."')"
                		);
                		if($insert){
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