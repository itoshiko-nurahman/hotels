<?php
// Nama file .txt
$filename = 'hotel.txt';

// Baca isi file
$data = file_get_contents($filename);
// Pisahkan data per baris
$dataArray = explode("\n", $data);

// Cek apakah parameter alert ada dan bernilai 1
if (isset($_GET['alert']) && $_GET['alert'] == 1) {
  echo '<script>alert("Pesanan sedang di proses!");</script>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title> Oii Hotel</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <section id="header">
    <center>
      <a href="" class="logo">Oii<span>Hotel</span></a>
    </center>
  </section>

  <section id="hero">
    <h2>Oii Hotel</h2>
    <h1>Menikmati Pengalaman Menginap yang Luar Biasa</h1>
    <p>Nikmati kenyamanan dan layanan terbaik di hotel kami</p>
    <button><a href="#products1">Reservasi Sekarang</a></button>
  </section>

  <section id="products1" class="section-p1">
    <h2>Pilihan Kamar</h2>
    <p>Aman, Nyaman, dan Terpercaya</p>

    <div class="pro-container">
      <?php
      // Perulangan untuk tiap baris
      foreach ($dataArray as $row) {
        // Pisahkan data berdasarkan tanda titik koma
        $rowData = explode(';', $row);
      ?>
        <div class="pro">
          <img src="img/products/<?= $rowData[0] ?>" alt="">
          <div class="des">
            <span>Kamar</span>
            <h5><?= $rowData[1] ?></h5>

            <h4>Rp.<?= $rowData[2] ?></h4>
          </div>
          <a href="reservasi.php?id=<?= $rowData[3] ?>"><i class="fa fa-shopping-cart cart" aria-hidden="true"></i> </a>
        </div>
      <?php } ?>
    </div>
  </section>

  <footer class="section-p1">
    <div class="copyright">
      <p>© 2024, Oii<span>Hotel</span></p>
    </div>
  </footer>
</body>
<script>
  window.onscroll = function() {
    myFunction()
  };

  var navbar = document.getElementById("header");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
</script>

</html>