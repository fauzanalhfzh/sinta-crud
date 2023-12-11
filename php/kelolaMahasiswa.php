<!DOCTYPE html>
 <?php
 include"koneksi.php";

 $nisn = '';
 $nama_siswa = '';
 $jenis_kelamin = '';
 $alamat = '';

  if (isset($_GET['ubah'])) {
    $id_siswa = $_GET['ubah'];

    $query = "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];
  
  }

  ?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajar CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
  </head> 
  <body>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          SINTA IU
        </a>
      </div>
    </nav>
    <!-- judul -->
    <div class="container">
    <h1 class="mt-4">Tambah Data</h1>
    <!-- form -->
    <form method="POST" action="proses.php" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo "$id_siswa"; ?>" name="id_siswa">
    <div class="mb-3 row">
      <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
      <div class="col-sm-10">
        <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Nomor Induk Siswa Nasional" required value="<?php echo $nisn; ?>">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
      <div class="col-sm-10">
        <input type="text" name="nama_siswa" class="form-control" id="nama" placeholder="Nama Lengkap" required value="<?php echo $nama_siswa; ?>">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
      <div class="col-sm-10">
        <select value="<?php echo $jenis_kelamin; ?>" id="jkel" name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
          <option selected>Jenis Kelamin</option>
          <option <?php if($jenis_kelamin == 'Laki-laki'){ echo "selected";} ?> value="Laki-laki">Laki-laki</option>
          <option <?php if($jenis_kelamin == 'Perempuan'){ echo "selected";} ?> value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="foto" class="col-form-label col-sm-2">Foto Siswa</label>
      <div class="col-sm-10">
        <input class="form-control" type="file" name="foto" id="foto" accept="image/*" <?php if(!isset($_GET['ubah'])){echo "required";} ?>>
      </div>
      </div>
    <div class="mb-3 row">
      <label for="alamat" class="col-form-label col-sm-2">Alamat lengkap</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?php echo $alamat; ?></textarea>
      </div>
      </div>
      <div class="mb-3 row">
        <div class="col mt-3">
        <?php
          if (isset($_GET['ubah'])) {
          ?>  
        <button type="submit" name="aksi" value="editMahasiswa" class="btn btn-success">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Simpan Perubahan
        </button>
         
          <?php
            } else {
          ?>
              <button type="submit" value="addMahasiswa" name="aksi" class="btn btn-primary">
              <i class="fa fa-floppy-o" aria-hidden="true"></i>
               Tambahkan
            </button>
          <?php
            }
          ?>
          <a href="mahasiswa.php" type="button" class="btn btn-danger"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Batal</a>
        </div>
      </div>
    </form>
    </div>

    </div>
    </body>
    </html>
