<?php 

include 'koneksi.php';
 
?>
<!DOCTYPE html>
<html>

<head>
    <?php
        include 'head.php';
    ?>
</head>

<body id="top">

    <header class="header" data-header>
	    <?php include 'header.php'; ?>
    </header>

    <main>
        <article>
            <section class="hero" id="home">
                <div class="container">
                    <h2 class="h1 hero-title">Desa Wisata Bunaken</h2>
                    <p class="hero-text">
                        Website Desa Wisata Bunaken !
                    </p>
                    <div class="btn-group">
                        <a href="#gallery">
                            <button class="btn btn-primary">Explore more</button>
                        </a>
                    </div>
                </div>
            </section>
            
            <section class="package" id="package">
                <div class="container">
                
                    <p class="section-subtitle">Book Now!</p>
                    <h2 class="h2 section-title">Penginapan Desa Wisata Bunaken</h2>
                    
                    <p class="section-text">
                    Penginapan Desa Bunaken adalah sebuah akomodasi di Pulau Bunaken, Sulawesi Utara, yang menawarkan suasana alami dan tenang dengan pemandangan laut yang indah. Terdapat berbagai jenis akomodasi yang dilengkapi dengan fasilitas modern, dan Anda dapat menikmati berbagai aktivitas menarik seperti snorkeling, diving, dan berenang di laut yang jernih. Restoran yang tersedia di penginapan ini juga menyajikan hidangan lokal dan internasional yang lezat dan segar. Selain itu, penginapan ini juga aktif dalam mendukung keberlanjutan lingkungan dan budaya setempat.
                    </p>
                    
                    <!--
                        Looping data penginapan dari database
                    -->
                    <ul class="package-list">
                        <?php
                        $url = "http://localhost:3000/penginapan";
	
                        $response = file_get_contents($url);
                        $data = json_decode($response);
                        
                        $result = $data->data;
                        
                        
                        	// $penginapan = mysqli_query($conn, "SELECT * FROM penginapan");
                            // while($hasil = mysqli_fetch_array($penginapan)){
                                foreach($result as $hasil) {
                        ?>
                    	
                        <li>
                            <div class="package-card">
                                <figure class="card-banner">
                                    <img src="asset/penginapan/<?php echo $hasil->foto_penginapan; ?>" alt="Experience The Great Holiday On Beach" loading="lazy">
                                </figure>
                                <div class="card-content">
                                    <h3 class="h3 card-title"><?php echo $hasil->nama_penginapan."<br>" ;?></h3>
                                    <p class="card-text">
                                        <?php echo $hasil->deskripsi_penginapan."<br>" ;?>
                                    </p>
                                    <ul class="card-meta-list">
                                        <li class="card-meta-item">
                                            <div class="meta-box">
                                                <ion-icon name="time"></ion-icon>
                                                <p class="text">-</p>
                                            </div>
                                        </li>
                                        <li class="card-meta-item">
                                            <div class="meta-box">
                                                <ion-icon name="people"></ion-icon>
                                                <p class="text"><?php echo $hasil->kapasitas_penginapan."<br>" ;?></p>
                                            </div>
                                        </li>   
                                        <li class="card-meta-item">
                                            <div class="meta-box">
                                                <ion-icon name="location"></ion-icon>
                                                <p class="text"><?php echo $hasil->lokasi_penginapan."<br>" ;?></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-price">
                                    <div class="wrapper">
                                        <p class="reviews"></p>
                                        <div class="card-rating">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>
                                    </div>
                                    <p class="price">
                                        Book For More Info!
                                        <span></span>
                                    </p>
                                    <a href="#">
                                        <button class="btn btn-secondary">Click Here</button>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    
                
                </div>
            </section>
            
            <section class="gallery" id="gallery">
                <div class="container">
                
                    <p class="section-subtitle">Photo Gallery</p>
                    
                    <h2 class="h2 section-title">Photo's From Travellers</h2>
                    
                    <p class="section-text">
                        Dokumentasi Desa Wisata Bunaken
                    </p>
                    
                    <ul class="gallery-list">
                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="asset/gallery/gallery1.jpg" alt="Gallery image">
                            </figure>
                        </li>
                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="asset/gallery/gallery2.jpg" alt="Gallery image">
                            </figure>
                        </li>
                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="asset/gallery/bunaken-pintu.jpg" alt="Gallery image">
                            </figure>
                        </li>
                        
                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="asset/gallery/gallery4.jpg" alt="Gallery image">
                            </figure>
                        </li>
                        
                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="asset/gallery/gallery5.jpg" alt="Gallery image">
                            </figure>
                        </li>
                    </ul>
                
                </div>
            </section>
            
            <section id="gallery2">
                <?php
                 $url_galeri = "http://localhost:3000/galeri";
	
                 $response_galeri = file_get_contents($url_galeri);
                 $data_galeri = json_decode($response_galeri);
                 
                 $result_galeri = $data_galeri->data;
                 
                 
                	// $galeri = mysqli_query($conn, "SELECT * FROM galeri");
                	// while($hasil = mysqli_fetch_array($galeri)){
                        foreach($result_galeri as $hasil_galeri){

                	?>
                	<div class="box-produk">
                	    <div><img src="asset/gallery/data/<?php echo $hasil_galeri->foto; ?>" /></div>
                		<p><?php echo $hasil_galeri->nama;?></p>
                        
                	</div>
            	<?php } ?>
            </section>
            
            <section class="team" id="team">
                <div class="container">
                
                    <div class="team-list">
                        <p class="section-subtitle"></p>
                        
                        <h2 class="h2 section-title">Kelompok 1 PW</h2>
                        
                        <p class="section-text">
                            <br>
                            1. Vannesha Wowor - 210211060181
                            <br>
                            2. Vennesia Wowor - 210211060109
                            <br>
                            3. Syalom Purnama - 210211060066
                            <br>
                            4. Alifiah Makadolang - 210211060015
                            <br><br><br>
                        </p>
                    </div>
                    <a href=https://drive.google.com/drive/folders/1S9ehzxZmEhBjhXNa64TutIWTrR8GHCYz>
                        <button class="btn btn-primary">
                            Click Here For Video
                        </button>
                    </a>
                
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
