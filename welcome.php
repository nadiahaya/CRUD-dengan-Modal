<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>P14 | Pendaftaran Siswa</title>
  </head>


  <body>
  <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">DIGITAL TELENT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="index.php">Calon Peserta</a>
            <a class="nav-item nav-link"  data-toggle="modal" data-target="#tambahData">Daftar Baru</a>
          </div>
        </div>
      </div>
    </nav>
  <!-- end navbar -->

  <?php 
    include 'koneksi.php';
    if (isset($_REQUEST['simpan'])) {
      // $id_siswa = $_REQUEST['id_siswa'];
      $nama_siswa = $_REQUEST['nama_siswa'];
      $alamat = $_REQUEST['alamat'];
      $jenis_kelamin = $_REQUEST['jenis_kelamin'];
      $agama = $_REQUEST['agama'];
      $sekolah_asal = $_REQUEST['sekolah_asal'];

      $result = mysqli_query($db,"INSERT INTO siswa (nama_siswa, alamat, jenis_kelamin, agama, sekolah_asal) 
                      values ('$nama_siswa','$alamat','$jenis_kelamin','$agama','$sekolah_asal')");
      if ($result) {
        echo "<script>
        alert('Tambah Data Berhasil !');
        document.location='index.php';
        </script>";
      }else{
        echo "<script>
        alert('Tambah Data Gagal !');
        document.location='index.php';
        </script>";
      }
    }
    ?>

<!-- Menampilkan data  -->
<div class="container">
  <h1>Selamat Datang Calon Peserta Digital Telent</h1>
  <hr>
  <h7>Silahkan pilih <strong>Menu Daftar Baru</strong> untuk melakukan Pendaftaran</h7>

</div>
<!-- Menampilkan Data -->

<!-- Modal Tambah Data -->
<div class="container"> 
  <div class="modal fade bs-example-modal-lg" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel">
      <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="tambahDataLabel">Tambah Data Peserta</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="" method="POST">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Nama Siswa</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="nama_siswa" placeholder="Masukkan Nama Siswa">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-12">
              <textarea class="form-control" name="alamat"  placeholder="Masukkan Alamat"></textarea>
            </div>
          </div>
          <div class="form-group d-flex">
            <div class="col-sm-6">
              <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                  <option>Pilih Jenis Kelamin</option>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="col-sm-6">
              <label>Agama</label>
                <select class="form-control" name="agama">
                  <option>Pilih Agama</option>
                  <option value ="Islam">Islam</option>
                  <option value = "Kristen">Kristen</option>
                  <option value = "Khatolik">Katholik</option>
                  <option value = "Hindu">Hindu</option>
                  <option value = "Budha">Budha</option>
                  <option value = "Konghucu">Konghucu</option>
                  <option value = "Lainnya">Lainnya</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Asal Sekolah</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="sekolah_asal" placeholder="Masukkan Asal Sekolah">
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <button type="reset" class="btn btn-danger" name="reset">Reset</button>
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Akhir modal tambah data -->

</div>
  <!-- end container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>