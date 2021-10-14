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
        <a class="navbar-brand">DIGITAL TELENT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="welcome.php">Calon Peserta</a>
            <a class="nav-item nav-link"  data-toggle="modal" data-target="#tambahData">Daftar Baru</a>
          </div>
        </div>
      </div>
    </nav>
  <!-- end navbar -->

  
    <!-- Aksi Insert Data dalam DB -->
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
    
    //   // Script update data
    if (isset($_REQUEST['update'])) {
      $id_siswa = $_REQUEST['id_siswa'];
      $nama_siswa = $_REQUEST['nama_siswa'];
      $alamat = $_REQUEST['alamat'];
      $jenis_kelamin = $_REQUEST['jenis_kelamin'];
      $agama = $_REQUEST['agama'];
      $sekolah_asal = $_REQUEST['sekolah_asal'];

      $result = mysqli_query($db,"UPDATE siswa SET 
                      id_siswa='$id_siswa', 
                      nama_siswa='$nama_siswa', 
                      alamat='$alamat', 
                      jenis_kelamin='$jenis_kelamin', 
                      agama='$agama',
                      sekolah_asal='$sekolah_asal' 
                      WHERE id_siswa='$id_siswa'");
      if ($result) {
        echo "<script>
        alert('Edit Data Berhasil !');
        document.location='index.php';
        </script>";
      }else{
        echo "<script>
        alert('Edit Data Gagal !');
        document.location='index.php';
        </script>";
      }
    }
    // // Akhir update data

    if (isset($_REQUEST['hapus'])) {
      $id_siswa=$_REQUEST['id_siswa'];

      $result = mysqli_query($db,"DELETE FROM siswa WHERE id_siswa='$id_siswa'");
      
      if ($result) {
        echo "<script>
        alert('Hapus Data Berhasil !');
        document.location='index.php';
        </script>";
      }else{
        echo "<script>
        alert('Hapus Data Gagal !');
        document.location='index.php';
        </script>";
      }
    }
    ?>

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


<!-- Menampilkan data  -->
<div class="container">
  <br>
  <h2 class="text-center">Pendaftar</h2>
  <br>
<table class="table table-striped">
		<tr>
      <th>No</th>
			<th>Id Siswa</th>
			<th>Nama Siswa</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Asal Sekolah</th>
			<th>Aksi</th>
		</tr>
		<?php
      include 'koneksi.php';
      $no = 1;
		  $query = mysqli_query($db,"SELECT * FROM siswa ORDER BY id_siswa ASC");
		  while ($data=mysqli_fetch_array($query)) {
		?>
		<tr>
      <td><?php echo $no++; ?></td>
			<td><?php echo $data['id_siswa']; ?></td>
			<td><?php echo $data['nama_siswa']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php if($data['jenis_kelamin']=="L"){echo "Laki-Laki";} else {echo "Perempuan";} ?></td>
			<td><?php echo $data['agama']; ?></td>
			<td><?php echo $data['sekolah_asal']; ?></td>
			<td>
				<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $data['id_siswa']; ?>">Edit</a>
        <a href="#" class="btn btn-danger btn-sm" data-target=".bs-example-modal-lg<?php echo $data['id_siswa']; ?>" data-toggle="modal">Hapus</a>
			</td>
      
      <!-- Edit Data -->
				<div class="modal fade bs-example-modal-lg" id="edit<?php echo $data['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog  modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h4 class="modal-title" id="myModalLabel">Edit Data Peserta</h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				      </div>
				      <div class="modal-body">
				        <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Id Siswa</label>
                  <div class="col-sm-12">
                    <input type="text" name="id_siswa" value="<?php echo $data['id_siswa']; ?>" readonly>
				            <!-- <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']; ?>">  -->
                  </div>
						    </div>
						  <div class="form-group">
						    <label class="col-sm-2 control-label">Nama Siswa</label>
						    <div class="col-sm-12">
						      <input type="text" class="form-control" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>">
						    </div>
						  </div>
						  <div class="form-group">
						    <label  class="col-sm-2 control-label">Alamat</label>
						    <div class="col-sm-12">
						      <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>">
						    </div>
						  </div>
						  <div class="form-group d-flex">
						    <div class="col-sm-6">
                  <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                      <option>Pilih Jenis Kelamin</option>
                      <option value="L" <?php if($data['jenis_kelamin']=="L"){echo "selected";} ?>>Laki-Laki</option>
                      <option value="P" <?php if($data['jenis_kelamin']=="P"){echo "selected";} ?>>Perempuan</option>
                    </select>
						    </div>
						    <div class="col-sm-6">
                  <label>Agama</label>
                    <select class="form-control" name="agama">
                      <option>Pilih Agama</option>
                      <option value="Islam" <?php if($data['agama']=="Islam"){echo "selected";} ?>>Islam</option>
                      <option value="Kristen" <?php if($data['agama']=="Kristen"){echo "selected";} ?>>Kristen</option>
                      <option value="Khatolik" <?php if($data['agama']=="Khatolik"){echo "selected";} ?>>Khatolik</option>
                      <option value="Hindu" <?php if($data['agama']=="Hindu"){echo "selected";} ?>>Hindu</option>
                      <option value="Budha" <?php if($data['agama']=="Budha"){echo "selected";} ?>>Budha</option>
                      <option value="Konghucu" <?php if($data['agama']=="Konghucu"){echo "selected";} ?>>Konghucu</option>
                      <option value="Lainnya" <?php if($data['agama']=="Lainnya"){echo "selected";} ?>>Lainnya</option>
                    </select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label  class="col-sm-2 control-label">Asal Sekolah</label>
						    <div class="col-sm-12">
						      <input type="text" class="form-control" name="sekolah_asal" value="<?php echo $data['sekolah_asal']; ?>">
						    </div>
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
				        <button type="submit" class="btn btn-primary" name="update">Simpan</button>
				       </form>
				      </div>
				    </div>
				  </div>
				</div>
      <!-- Akhir Edit Data -->

     <!-- Hapus data -->
				<div class="modal fade bs-example-modal-lg<?php echo $data['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <h7>Apakah Data Akan Dihapus?</h7>
                  <form action="" method="POST">
                  <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']; ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                </form>
                </div>
            </div>
          </div>
        </div>
      </div>
				<!-- Akhir hapus data -->
		</tr>
		<?php } ?>
	</table>
</div>
<!-- Menampilkan Data -->

</div>
  <!-- end container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>