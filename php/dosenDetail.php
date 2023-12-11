<?php
include 'koneksi.php';

// Ambil ID siswa dari URL
$dosenId = isset($_GET['detail']) ? $_GET['detail'] : null;

// Pastikan ID siswa adalah bilangan bulat positif sebelum digunakan dalam query
$dosenId = is_numeric($dosenId) ? intval($dosenId) : null;

// Periksa apakah ID siswa valid sebelum menjalankan query
if ($dosenId) {
    $query = "SELECT * FROM tb_dosen WHERE id_dosen = $dosenId";
    $sql = mysqli_query($conn, $query);

    // Ambil hasil query
    $result = mysqli_fetch_assoc($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Info</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../detail.css">
</head>
<body class="card">
  <div class="container">
    <div class="profile-wrapper">
      <div class="profile">
        <div class="profile-image">
          <!-- Periksa apakah hasilnya memiliki path foto yang valid -->
          <?php if ($result && $result['foto_dosen']) : ?>
            <img src="../image/data/dosen/<?php echo $result['foto_dosen']; ?>" alt="Foto dosen">
          <?php else : ?>
            <!-- foto default jika tidak ada foto yang ditemukan -->
            <img src="image/data/defaul.jpg" alt="Foto Default">
          <?php endif; ?>
        </div>
       
        <div class="profile-name">
          <h2>
          <?php echo $result['nama_dosen']; ?>
          </h2>
          <div class="profile-detail">
          <?php echo $result['nidn']; ?>
          </div>
          <div class="profile-detail">
          <?php echo $result['alamat'] ?>
          </div>
          <div class="profile-detail">
          <?php echo $result['jenis_kelamin']; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>