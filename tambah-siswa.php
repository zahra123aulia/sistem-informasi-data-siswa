<?php
if (isset($_POST['nisn'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nm_siswa'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_kelas = $_POST['id_kelas'];

    $query = mysqli_query($koneksi, "INSERT INTO siswa (nisn,nis,nm_siswa,tempat_lahir,tgl_lahir,jenis_kelamin,id_kelas) VALUES('$nisn','$nis','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$id_kelas')");

    if ($query) {
        echo '<script>alert("Data Berhasil di Tambah");location.href="?page=siswa";</script>';
    }
}
?>

<h1 class="h3 mb-3"> Tambah siswa</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                                <div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="form-label">NISN</label>
                                            <div class="col-12">    
                                                <input type="text" name="nisn" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-label">NIS</label>
                                            <div class="col-12">
                                                <input type="text" name="nis" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-label">Nama Siswa</label>
                                            <div class="col-12">
                                                <input type="text" name="nm_siswa" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-label">Tempat lahir</label>
                                            <div class="col-12">
                                                <input type="text" name="tempat_lahir" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-label">tanggal lahir</label>
                                            <div class="col-12">
                                                <input type="date" name="tgl_lahir" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-label">Jenis kelamin</label>
                                            <select name="jenis_kelamin" class="form-select">
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                        </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="form-label">Kelas dan Jurusan</label> 
                                            <select name="id_kelas" class="form-select">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                                            while ($data = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $data['id_kelas']?> "><?php echo $data['nm_kelas'] ?> - <?php echo $data['nm_jurusan'] ?></option>
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