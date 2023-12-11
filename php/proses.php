<?php
include 'koneksi.php';

if (isset($_POST['aksi'])) {
  if($_POST['aksi'] == "addMahasiswa"){
    
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    
    $split = explode('.', $_FILES['foto']['name']);
    $ekstensi = $split[count($split)-1];
    
    $foto = $nisn.'.'.$ekstensi;

    $alamat = $_POST['alamat'];

    $dir = "../image/data/mahasiswa/";
    $tmpFile = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmpFile, $dir.$foto);
    $query = "INSERT INTO tb_siswa VALUES (null, '$nisn', '$nama_siswa', '$jenis_kelamin', '$foto', '$alamat')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
      header("location:mahasiswa.php");
    } else {
      echo $query;
    }
    
  }else if ($_POST['aksi'] == "editMahasiswa") {
    $id_siswa = $_POST['id_siswa'];
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    // mengedit foto
    $queryShow = "SELECT * FROM tb_siswa where id_siswa = '$id_siswa'";
    $queryShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($queryShow);

    if ($_FILES['foto']['name'] == "") {
      $foto = $result['foto_siswa'];
    } else {
      $split = explode('.', $_FILES['foto']['name']);
      $ekstensi = $split[count($split)-1];

      $foto = $result['nisn'].'.'.$ekstensi;
      unlink("../image/data/mahasiswa/".$result['foto_siswa']);
      move_uploaded_file($_FILES['foto']['tmp_name'], '../image/data/mahasiswa/'.$foto);
    }

    $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto_siswa='$foto' WHERE id_siswa='$id_siswa';";

    $sql = mysqli_query($conn, $query);
    header("location:mahasiswa.php");

  }else if($_POST['aksi'] == "addDosen") {

    $nidn = $_POST['nidn'];
    $nama_dosen = $_POST['nama_dosen'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    
    $split = explode('.', $_FILES['foto']['name']);
    $ekstensi = $split[count($split)-1];
    
    $foto = $nidn.'.'.$ekstensi;

    $alamat = $_POST['alamat'];

    $dir = "../image/data/dosen/";
    $tmpFile = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmpFile, $dir.$foto);
    $query = "INSERT INTO tb_dosen VALUES (null, '$nidn', '$nama_dosen', '$jenis_kelamin', '$foto', '$alamat')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
      header("location:dosen.php");
    } else {
      echo $query;
    }
  }else if($_POST['aksi'] == "editDosen"){
    // echo "edit Dosen";
    // die();
    $id_dosen = $_POST['id_dosen'];
    $nidn = $_POST['nidn'];
    $nama_dosen = $_POST['nama_dosen'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    // mengedit foto
    $queryShow = "SELECT * FROM tb_dosen where id_dosen = '$id_dosen'";
    $queryShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($queryShow);

    if ($_FILES['foto']['name'] == "") {
      $foto = $result['foto_dosen'];
    } else {
      $split = explode('.', $_FILES['foto']['name']);
      $ekstensi = $split[count($split)-1];

      $foto = $result['nidn'].'.'.$ekstensi;
      unlink("../image/data/dosen/".$result['foto_dosen']);
      move_uploaded_file($_FILES['foto']['tmp_name'], '../image/data/dosen/'.$foto);
    }

    $query = "UPDATE tb_dosen SET nidn='$nidn', nama_dosen='$nama_dosen', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto_dosen='$foto' WHERE id_dosen='$id_dosen';";

    $sql = mysqli_query($conn, $query);
    header("location:dosen.php");
  }
}

// hapus mahasiswa
if (isset($_GET['hapusSiswa'])) {
  $id_siswa = $_GET['hapusSiswa'];

  $queryShow = "SELECT * FROM tb_siswa where id_siswa = '$id_siswa'";
  $queryShow = mysqli_query($conn, $queryShow);
  $result = mysqli_fetch_assoc($queryShow);

  unlink("../image/data/mahasiswa/".$result['foto_siswa']);

  $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'";
  $sql = mysqli_query($conn, $query);

  if ($sql) {
    header("location:mahasiswa.php");
  } else {
    echo $query;
  }
}

// hapus dosen
if (isset($_GET['hapusDosen'])) {
  $id_dosen = $_GET['hapusDosen'];

  $queryShow = "SELECT * FROM tb_dosen where id_dosen = '$id_dosen'";
  $queryShow = mysqli_query($conn, $queryShow);
  $result = mysqli_fetch_assoc($queryShow);

  unlink("../image/data/dosen/".$result['foto_dosen']);

  $query = "DELETE FROM tb_dosen WHERE id_dosen = '$id_dosen'";
  $sql = mysqli_query($conn, $query);

  if ($sql) {
    header("location:dosen.php");
  } else {
    echo $query;
  }
}
?>
