<?php
$id = $_GET['id'];
if (isset($_POST['nisn'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama_siswa'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_kelas = $_POST['id_kelas'];

    $query = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn',nis='$nis',nm_siswa='$nama',tempat_lahir='$tempat_lahir',tgl_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',id_kelas='$id_kelas' WHERE nisn='$id'");

    if ($query) {
        echo '<script>alert("Data Berhasil di Updute");location.href="?page=siswa";</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3"> Edit siswa</h1>

<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="form-label">NISN</label>
                        <div class="col-12">
                            <input type="text" name="nisn" class="form-control" value="<?php echo $data['nisn']  ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">NIS</label>
                        <div class="col-12">
                            <input type="text" name="nis" class="form-control" value="<?php echo $data['nis']  ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Nama Siswa</label>
                        <div class="col-12">
                            <input type="text" name="nama_siswa" class="form-control" value="<?php echo $data['nm_siswa']  ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Tempat lahir</label>
                        <div class="col-12">
                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']  ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">tanggal lahir</label>
                        <div class="col-12">
                            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data['tgl_lahir']  ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Jenis kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                        <option value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') { echo 'selected'; }?>>Perempuan</option>
                            <option value="laki-laki" <?php if($data['jenis_kelamin'] == 'laki-laki') { echo 'selected'; }?>>laki-laki</option>
                        </select>
                        </div>
                    <div class="mb-3">
                        <label for="form-label">Kelas dan Jurusan</label> 
                        <select name="id_kelas" class="form-select">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                        while ($kelas = mysqli_fetch_array($query)) {
                         ?>
                         <option value="<?php echo $kelas['id_kelas']?>"
                         <?php if($data['id_kelas'] == $kelas['id_kelas']) { echo 'selected';}
                          ?> >
                         <?php echo $kelas['nm_kelas'] ?> - <?php echo $kelas['nm_jurusan'] ?></option>

                         <?php
                         }
                         ?>
                         </select>
                         </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>