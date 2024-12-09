<?php

$id = $_GET["id"];

$filename = 'hotel.txt';

// Baca isi file
$data = file_get_contents($filename);
// Pisahkan data per baris
$dataArray = explode("\n", $data);

foreach ($dataArray as $row) {
  // Pisahkan data berdasarkan tanda titik koma
  $rowData = explode(';', $row);


  // Validasi ID
  if ($id == $rowData[3]) {
    // echo "ID valid.";
    $gambar = $rowData[0];
    $nama = $rowData[1];
    $harga = $rowData[2];
    break; // Keluar dari perulangan jika data ditemukan
  }
}

if (isset($_POST['submit'])) {
  // Menerima inputan dari form dan memasukkantnya ke dalam variabel
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $nomor = $_POST['nomor'];
  $kamar = $_POST['kamar'];

  // Membuat array untuk menampung data yang diinputkan
  $dataArray = array(
    'nama' => $nama,
    'email' => $email,
    'nomor' => $nomor,
    'kamar' => $kamar
  );

  function saveFile($data)
  {
    // Menulis data ke dalam file contactForm.txt
    // Membuka file contactForm.txt
    $file = fopen('buy.txt', 'a+');

    // Menggunakan perulangan foreach untuk menulis data ke dalam file
    foreach ($data as $key => $value) {
      fwrite($file, $key . ': ' . $value . "\n");
      // fwrite($file, $value . ";");
    }
    // Pemisah antar data
    fwrite($file, "\n");
    // Menutup file
    fclose($file);
  };

  saveFile($dataArray);

  // Mengarahkan kembali ke halaman utama

  header('Location: index.php?alert=1');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title> Oii Hotel</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section id="header">
    <center>
      <a href="" class="logo">Oii<span>Hotel</span></a>
    </center>
  </section>

  <section id="page-header">
    <h2>Reservasi</h2>
    <p>Reservasi sekarang sebelum penuh!!</p>
  </section>

  <center style="padding-top: 15px;">
    <a href="index.php"><button class="normal">Kembali</button></a>
  </center>

  <section id="form-details">
    <form action="" method="POST">
      <img src="img/products/<?= $gambar ?>" alt="">
      <span>Kamar : <b><?= $nama ?></b></span>
      <span>harga : <b><?= $harga ?></b></span>
      <input type="text" name="nama" placeholder="Username" required>
      <input type="text" name="email" placeholder="E-mail" required>
      <input type="number" name="nomor" placeholder="Nomor HP" required>
      <input type="hidden" name="kamar" value="<?= $nama ?>">
      </textarea>
      <button class="normal" name="submit">submit</button>
    </form>
  </section>

  <footer class="section-p1">

    <div class="copyright">
      <p>© 2024, OiiHotel </p>
    </div>

  </footer>
</body>

</html>