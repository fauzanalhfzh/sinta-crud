<?php
include 'koneksi.php';

$query = "SELECT * FROM tb_dosen";
$sql = mysqli_query($conn, $query);
$no = 0;
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <div class="wrapper">
    <aside id="sidebar" class="js-sidebar">
      <!-- Content For Sidebar -->
      <div class="h-100">
        <div class="sidebar-logo">
          <a href="#">SINTA CRUD</a>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Admin Elements
          </li>
          <li class="sidebar-item">
            <a href="../index.php" class="sidebar-link">
              <i class="fa-solid fa-list pe-2"></i>
              Dashboard
            </a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
              Data Master
            </a>
            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
              <li class="sidebar-item">
                <a href="mahasiswa.php" class="sidebar-link">Mahasiswa</a>
              </li>
              <li class="sidebar-item">
                <a href="dosen.php" class="sidebar-link">Dosen & Staff</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
              Akademik
            </a>
            <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">Jadwal Kuliah</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">Kartu Rencana Studi</a>
              </li>
              <li class="sidebar-item">
                <a href="#" class="sidebar-link">Kartu Hasil Studi</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </aside>
    <div class="main">
      <nav class="navbar navbar-expand px-3 border-bottom">
        <button class="btn" id="sidebar-toggle" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                <img src="../image/Logo.png" class="avatar img-fluid rounded" alt="">
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Setting</a>
                <a href="#" class="dropdown-item">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <main class="content px-3 py-2">
        <div class="container-fluid">
          
          <!-- Table Element -->
          <a href="dosenKelola.php" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
          <div class="card border-0">
            <div class="card-header">
              <h5 class="card-title">
                Daftar Nama Dosen dan Staff
              </h5>
              <h6 class="card-subtitle text-muted">
                Last Updated 2023
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">Nama Dosen & Staff</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th>Foto</th>
                    <th>alamat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  while ($result = mysqli_fetch_assoc($sql)) {
                  ?>
                    <tr>
                      <td>
                        <?php echo ++$no . "."; ?>
                      </td>
                      <td>
                        <?php echo $result['nidn']; ?>
                      </td>
                      <td>
                        <?php echo $result['nama_dosen']; ?>
                      </td>
                      <td>
                        <?php echo $result['jenis_kelamin']; ?>
                      </td>
                      <td>
                      <img src="../image/data/dosen/<?php echo $result['foto_dosen'] ?>" width="150"">
                      </td>
                      <td>
                        <?php echo $result['alamat'] ?>
                      </td>
                      <td>
                        <a href="dosenKelola.php?ubah=<?php echo $result['id_dosen'] ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="proses.php?hapusDosen=<?php echo $result['id_dosen'] ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Apakah anda yakin ingin menghapus??')"></i></a>
                        <a href="dosenDetail.php?detail=<?php echo $result['id_dosen'] ?>" type="button" class="btn btn-warning btn-sm"><i class="fa fa-user" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </main>
      <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
      </a>
      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a href="#" class="text-muted">
                  <strong>SINTA CRUD</strong>
                </a>
              </p>
            </div>
            <div class="col-6 text-end">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a href="#" class="text-muted">Contact</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="text-muted">About Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/script.js"></script>
</body>

</html>